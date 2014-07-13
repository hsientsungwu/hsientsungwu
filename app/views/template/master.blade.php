<!DOCTYPE html 
      PUBLIC "-//W3C//DTD HTML 4.01//EN"
      "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en-US">
<head profile="http://www.w3.org/2005/10/profile">
    <link rel="icon" type="image/png" href="favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'HsienTsungWu | Steve Wu')</title>

    <!-- Bootstrap core CSS -->
    <link href="/packages/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the 'Full Width Pics' Template -->
    <link href="/css/full-width-pics.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('head')
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">HsienTsungWu</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/#blog">Blog</a>
                    </li>
                    <li><a href="/#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="full-width-image-1">

        <div class="circular logo-wrapper"></div>
        <div class="social-wrapper">
            <a href="http://twitter.com/HsienTsungWu" target="_blank"><i class="fa fa-twitter-square fa-3x"></i></a>
            <a href="http://facebook.com/limitles5" target="_blank"><i class="fa fa-facebook-square fa-3x"></i></a>
            <a href="http://github.com/hsientsungwu" target="_blank"><i class="fa fa-github-square fa-3x"></i></a>
        </div>

    </div>
    
    <div class="content">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row footer-section">
                <div class="col-lg-12">
                    Copyright &copy; HSIENTSUNGWU.COM 2014
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->

    <!-- JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
    <script src="/packages/bootstrap/js/bootstrap.js"></script>

    @yield('scripts')
</body>

</html>
