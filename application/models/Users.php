<?php

class Users extends MY_Model
{
    public function __construct()
    {
        parent::__construct('users','ID');
        $this->load->helper('file');

        $this->load->model('reviews');
        $this->load->model('ads');

        $this->DEFAULT_IMAGE_PATH   = 'assets/img/default-profile-image.png';
        $this->ROOT_USER_IMAGE_PATH = 'uploads/users/';
    }

    /**
     * returns id of user that has matching correct user id and password.
     *
     * @param  $username username of the user to validate.
     * @param  $password password of the user to validate.
     *
     * @return id of the user, or null if no user was found.
     */
    public function getIdByCredentials($username,$password)
    {
        $users = $this->some('username',$username);
        if((count($users) > 0) && ($users[0]->password == $password))
        {
            return $users[0]->ID;
        }
        else
        {
            return null;
        }
    }

    /**
     * returns the id of the currently logged in user; null if no user is logged
     *   in.
     *
     * @return id of the currently logged in user; null if no one is logged in.
     */
    public function getCurrentUserId()
    {
        return $this->session->userdata(SESSION_UID);
    }

    /**
     * returns the record of the currently logged in user; null if no user is
     *   logged in.
     *
     * @return record of the currently logged in user; null if no one is logged
     *   in.
     */
    public function getCurrentUser()
    {
        return $this->get($this->getCurrentUserId());
    }

    public function checkUsernameAvailability($username)
    {
        return (count($this->some('username',$username)) == 0);
    }

    /**
     * returns true if the current user is an admin; false otherwise.
     *
     * @return true if the current user is an admin; false otherwise.
     */
    public function isCurrentUserAdmin()
    {
        $currUser = $this->get($this->getCurrentUserId());
        return ($currUser != null && $currUser->type == 1);
    }

    public function setUserImage($userId,$imageFileName)
    {
        // get the user from the database
        $user = $this->get($userId);

        // delete the previous image
        unlink('./uploads/users/'.$userId.'/'.$user->imageFileName);

        // associate the new image with the user
        $user->imageFileName = $imageFileName;
        $this->update($user);
    }

    public function getUserImageSrc($userId)
    {
        $user = $this->get($userId);
        return ($user->imageFileName) ?
            $this->ROOT_USER_IMAGE_PATH.$user->ID.'/'.$user->imageFileName :
            $this->DEFAULT_IMAGE_PATH;
    }

    public function delete($userID,$key2=null)
    {
        // delete all ads associated with this user
        $ads = $this->ads->some('userID',$userID);
        foreach($ads as $ad)
        {
            $this->ads->delete($ad->ID);
        }

        // delete reviews associated with this user
        $user = $this->get($userID);
        $reviews = array_merge($this->reviews->some('to',$user->username),
            $this->reviews->some('from',$user->username));
        foreach($reviews as $review)
        {
            $this->reviews->delete($review->ID);
        }

        // delete the user's image folder
        unlink($this->getUserImageSrc($userID));
        rmdir($this->ROOT_USER_IMAGE_PATH.$user->ID);

        // delete the ad
        parent::delete($userID,null);
    }
}
