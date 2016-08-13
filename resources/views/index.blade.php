
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset("bower_components/bootstrap/dist/css/bootstrap.min.css") !!}" rel="stylesheet">
    <link href="{!! asset("bower_components/font-awesome/css/font-awesome.min.css") !!}" rel="stylesheet">
    <link href="{!! asset("bower_components/bootstrap-social/bootstrap-social.css") !!}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{!! asset("css/cover.css") !!}" rel="stylesheet">
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">{{$name}}</h3>
                    <nav class="nav nav-masthead">
                        <a class="nav-link active" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Cover your page.</h1>
                <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
                <p class="lead">
                    @foreach($links as $name => $link)
                    <a href="{{$link['url']}}" class="btn btn-social btn-{{$link['class']}}">
                        <span class="fa fa-{{$link['class']}}"></span>
                        {{$name}}
                    </a>
                    @endforeach
                </p>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{!! asset("bower_components/jquery/dist/jquery.min.js") !!}"></script>
<script src="{!! asset("bower_components/tether/dist/js/tether.min.js") !!}"></script>
<script src="{!! asset("bower_components/bootstrap/dist/js/bootstrap.min.js") !!}"></script>
</body>
</html>
