<div class="row">
	<h2>Create an Ad</h2>
	<div class="errors">{message}</div>
	<form enctype="multipart/form-data" action="/Create_ad/submit" method="post">
		{ad_images}
		{ad_category}
		{ad_title}
		{ad_price}
		{ad_description}
		{ad_submit}
		{ad_cancel}
	</form>
</div>

