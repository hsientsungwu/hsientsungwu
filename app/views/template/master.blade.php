<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'HsienTsungWu | Steve Wu')</title>

    <!-- Bootstrap core CSS -->
    <link href="/packages/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the 'Full Width Pics' Template -->
    <link href="/css/full-width-pics.css" rel="stylesheet">

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
                    <li><a href="/blog/">Blog</a>
                    </li>
                    <li><a href="/contact/">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="full-width-image-1">

        <div class="logo-wrapper">
            <img class="img-responsive" src="http://placehold.it/200x200&text=Logo" />
        </div>

    </div>
    
    @yield('content')

    <!-- FOOTER -->
    <div class="container">
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; HSIENTSUNGWU.COM 2014
                </div>
            </div>
        </footer>
    </div>

    </div>
    <!-- /container -->

    <!-- JavaScript -->
    <script src="/packages/bootstrap/js/jquery-1.10.2.js"></script>
    <script src="/packages/bootstrap/js/bootstrap.js"></script>

    @yield('scripts')
</body>

</html>
