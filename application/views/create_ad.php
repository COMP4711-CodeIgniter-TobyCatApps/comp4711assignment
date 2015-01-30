<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Advertisement</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">	
			<p>Fill in the fields below and click on the "submit" button to view a preview of your posting.</p>
			<h2>New Advertisement</h2>
			<form method="post"  action="/create_ad/submit"> 	
				<div class="form-group">
					<label for="category">Category (select one):</label>
					<select class="form-control" id="category">
						<option>Community</option>
						<option>Personal</option>
						<option>Housing</option>
						<option>For Sale</option>
						<option>Services</option>
						<option>Jobs</option>
					</select>
				</div>
				<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label for="price">Price:</label>
					<input type="number" step="any" class="form-control" name="price">
				</div>
				<div class="form-group">
					<label for="description">Description:</label>
					<textarea class="form-control" rows="5" name="description"></textarea>
				</div>
				<div class="form-group">
					<button type="button" class="btn">Upload Image</button>
					<button type="submit" class="btn btn-default" value="Submit">Submit</button>
					<a  type="button" class="btn btn-default" href="/">Cancel</a>
				</div>
			</form>
		</div> <!-- form container -->
		<!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>
