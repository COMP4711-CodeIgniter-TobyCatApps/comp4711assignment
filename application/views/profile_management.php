<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Template header here -->
<div class="container">
  <h2>Update Profile</h2>
  <form role="form">
    <div class="form-group">
      <label for="dname">Display Name:</label>
      <input type="text" class="form-control" id="dname" placeholder="Enter display name">
    </div>
    <div class="form-group required">
      <label for="oldpwd">Old Password:</label>
      <input type="password" class="form-control" id="oldpwd" placeholder="Enter old password">
    </div>
    <div class="form-group required">
      <label for="newpwd">New Password:</label>
      <input type="password" class="form-control" id="newpwd" placeholder="Enter new password">
    </div>
    <div class="form-group required">
      <label for="cnewpwd">Confirm New Password:</label>
      <input type="password" class="form-control" id="cnewpwd" placeholder="Confirm new password">
    </div>
    <div class="form-group required">
      <label for="email">Change Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <!-- add button tutorial: http://jsfiddle.net/gregorypratt/dhyzV/ -->
    <!-- <input type="button" class="btn btn-default" id="get_file" value="Upload Image"> -->
    <input type="file" id="user_photo" accept="image/*"> <!-- Still need to check images serverside -->
    <button type="submit" class="btn btn-default">Done</button>
    <input type="button" class="btn btn-default" value="Cancel" onClick="history.go(-1);return true;">
    <!--<button type="submit" class="btn btn-default">Cancel</button> -->
  </form>
</div>
<!-- Template footer here -->
</body>
</html>
