<div class="container">
    <h2>{username}</h2>
    <img id="profile_pic" src="{baseurl}{imagesrc}" alt="your image" height="140"/> <!-- move size to css? -->
    <!-- <input type="file" onchange="readURL(this);" accept="image/*" /> <!-- Still need to check images serverside -->
    <div>
        <h3>{displayname}</h3>
        <h4>{email}</h4>
    </div>
    <div>
        <h4>Reputation: {reputation}</h4>
    </div>
    <div>
        <h4>Ads</h4>
        {cards}
    </div>
    <div>
        <h4>Reviews</h4>
        {reviews}
    </div>
    <form action="/user_detail/confirm" method="post">
        {frating}
        {freview}
        <div id="stars" class="rating">
            <span id="1" ><i class="glyphicon glyphicon-star"></i></span>
            <span id="2" ><i class="glyphicon glyphicon-star"></i></span>
            <span id="3" ><i class="glyphicon glyphicon-star"></i></span>
            <span id="4" ><i class="glyphicon glyphicon-star"></i></span>
            <span id="5" ><i class="glyphicon glyphicon-star"></i></span>
            <!--<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>-->
        </div>
        {fsubmit}
    </form>

</div><!-- /.container -->

