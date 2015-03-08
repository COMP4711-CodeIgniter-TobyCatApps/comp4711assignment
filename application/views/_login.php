<!-- <div class="errors">{message}</div> -->
<form class="navbar-form navbar-right" action="/welcome/login" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="hidden" name="currenturl" value="{current_url}">
    </div>
    <button type="submit" class="btn btn-default">Sign In</button>
</form>
