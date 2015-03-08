<div class="container">
    <h2>Update Profile</h2>
    <div class="errors">{message}</div>
    <form enctype="multipart/form-data" action="/profile_management/confirm" method="post">
        {fimage}
        {fname}
        {foldpassword}
        {fnewpassword}
        {fconfirmpassword}
        {femail}
        {fsubmit}
        {fcancel}
    </form>
</div><!-- /.container -->
