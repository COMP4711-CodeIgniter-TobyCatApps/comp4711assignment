<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Template header here -->
<div class="container">
  <h2>Register</h2>
  <form role="form">
    <div class="form-group">
      <label for="dname">Display Name:</label>
      <input type="text" class="form-control" id="dname" placeholder="Enter display name">
    </div>
    <div class="form-group required">
      <label for="uname">User Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username">
    </div>
    <div class="form-group required">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <div class="form-group required">
      <label for="pwdconfirm">Confirm Password:</label>
      <input type="password" class="form-control" id="pwdconfirm" placeholder="Confirm password">
    </div>
    <div class="form-group required">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <input type="button" class="btn btn-default" value="Cancel" onClick="history.go(-1);return true;">
    <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
  </form>
</div>
<!-- Template footer here -->
</body>
</html>
