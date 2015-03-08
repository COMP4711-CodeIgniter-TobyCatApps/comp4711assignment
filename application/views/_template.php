<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>{page_title}</title>

    <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href="{baseurl}assets/css/bootstrap.css" rel="stylesheet">
    <link href="{baseurl}assets/css/formfields.css" rel="stylesheet">
    <link href="{baseurl}assets/css/custom.css" rel="stylesheet">
    <link href="{baseurl}assets/css/card.css" rel="stylesheet">
    <link href="{baseurl}assets/css/simple-sidebar.css" rel="stylesheet">
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
                <a class="navbar-brand" href="{baseurl}">{navbar_title}</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                {navbar_buttons}
                {navbar_user}
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        {page_body}
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{baseurl}assets/js/jquery.min.js"></script>
    <script src="{baseurl}assets/js/bootstrap.min.js"></script>
    <script src="{baseurl}assets/js/formfields.js"></script>
    <script src="{baseurl}assets/js/rating.js"></script>

    <!-- for rich text editing -->
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

</body>
</html>
