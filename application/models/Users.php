<?php

class Users extends MY_Model
{
    public function __construct()
    {
        parent::__construct('users','ID');
        $this->load->helper('file');

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
    public function get_id_by_credentials($username,$password)
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
    public function get_current_user_id()
    {
        return $this->session->userdata(SESSION_UID);
    }

    /**
     * returns true if the current user is an admin; false otherwise.
     *
     * @return true if the current user is an admin; false otherwise.
     */
    public function is_current_user_admin()
    {
        $currUser = $this->get($this->get_current_user_id());
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
}
