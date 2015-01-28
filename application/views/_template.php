<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>{pagetitle}</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    <style type="text/css"></style>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://getbootstrap.com/examples/starter-template/#">{title}</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                {navbar}
                <!--ul class="nav navbar-nav">
                    <li class="active"><a href="http://getbootstrap.com/examples/starter-template/#">Home</a></li>
                    <li><a href="http://getbootstrap.com/examples/starter-template/#about">About</a></li>
                    <li><a href="http://getbootstrap.com/examples/starter-template/#contact">Contact</a></li>
                </ul-->
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        {content}
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


</body>
</html>
