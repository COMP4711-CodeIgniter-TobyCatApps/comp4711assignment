<div class="container">
    <h2>Update Profile</h2>
    <img id="profile_pic" src="#" alt="your image" /> <!-- Using profileManagement.js -->
    <input type="file" onchange="readURL(this);" accept="image/*"/>

    <!-- <input type="file" onchange="readURL(this);" accept="image/*" /> <!-- Still need to check images serverside -->
    <form action="" method="post">
        {fname}
        {foldpassword}
        {fnewpassword}
        {fconfirmpassword}
        {femail}
        {fsubmit}
        {fcancel}
    </form>
</div><!-- /.container -->
<script src="assets/js/profileManagement.js"></script>
