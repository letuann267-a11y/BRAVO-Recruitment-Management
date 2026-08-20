
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Oops... Page not found</title>
    <!-- Favicon -->

    <!-- CSS -->
    <link href="{{asset('/static/assets/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/sal/sal.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/css/theme.css')}}" rel="stylesheet">
    <!-- Fonts/Icons -->
    <link href="{{asset('/static/assets/plugins/font-awesome/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/themify/themify-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <link rel="icon" href="{{asset('/assets/img/logos/logo Bravo 2.png')}}" type="image/png"/>
    <meta property="og:image" content="{{asset('/assets/img/logos/logo Bravo 2.png')}}">
</head>
<body data-preloader="1">

<div class="section-fullscreen">
    <div class="container">
        <div class="position-middle">
            <div class="row">
                <div class="col-12 col-md-10 coffset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <h1 class="display-1 font-weight-bold">404</h1>
                    <h5 class="font-weight-light text-black-05">Sorry, It appears that the page you were looking for doesn't exist or might have been moved.</h5>
                    <a class="button button-xl button-radius button-reveal-left-grey margin-top-30" href="{{route('home')}}"><i class="fas fa-home"></i><span>Go home page</span></a>
                </div>
            </div><!-- end row -->
        </div><!-- end position-middle -->
    </div><!-- end container -->
</div>

<!-- ***** JAVASCRIPTS ***** -->
<script src="{{asset('/static/assets/plugins/jquery.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
<script src="{{asset('/static/assets/plugins/plugins.js')}}"></script>
<script src="{{asset('/static/assets/js/functions.js')}}"></script>
</body>
</html>
