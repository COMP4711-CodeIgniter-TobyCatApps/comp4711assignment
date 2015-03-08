<div class="container">
    <h2>{username}</h2>
    <img id="profile_pic" src="{baseurl}{imagesrc}" alt="your image" height="140"/> <!-- move size to css? -->
    <!-- <input type="file" onchange="readURL(this);" accept="image/*" /> <!-- Still need to check images serverside -->
    <div>
        <h3>{displayname}</h3>
        <h4>{email}</h4>
    </div>
    <div>
        <h4>Reputation:</h4>
            <div id="stars" class="rating">
                {reputation}
            </div>
    </div>
    <div>
        <h4>Ads</h4>
        {cards}
    </div>
    <div>
        <h4>Reviews</h4>
        <hr></hr>
        {reviews}
    </div>
    {rating}
</div><!-- /.container -->

