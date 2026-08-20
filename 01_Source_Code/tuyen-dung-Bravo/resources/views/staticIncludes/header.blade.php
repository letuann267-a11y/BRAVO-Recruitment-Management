<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="{{asset('/assets/img/logos/logo Bravo 2.png')}}" type="image/png"/>
    <meta property="og:image" content="{{asset('/assets/img/logos/logo Bravo 2.png')}}"/>

   @yield('title')
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
    <meta name="description" content="BRAVO recruitment website" />
    @yield('styles')
</head>
<body data-preloader="1">
@if (session('contact_success'))
    <div class="alert alert-success alert-dismissible fade show text-center" style="z-index: 999; position: fixed; width: 100%" role="alert">
        {{session('contact_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- Header -->
<div class="header center sticky">
    <div class="container">
        <!-- Logo -->
        <div class="header-logo">
            <a href="{{route('index')}}"> <img class="logo-dark" style="height: 30px" src="{{asset('/assets/img/logos/logo Bravo.png')}}" alt="Bravo logo"></a>
{{--            <h3><a href="{{route('index')}}">BRAVO</a></h3>--}}
            <!--
            <img class="logo-dark" src="../assets/images/your-logo-dark.png" alt="">
            <img class="logo-light" src="../assets/images/your-logo-light.png" alt="">
            -->
        </div>
        <!-- Menu -->
        <div class="header-menu">
            <ul class="nav">

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('about')}}">About</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About Bravo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                @if (auth()->user() && auth()->user()->role->name =='user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('job.list')}}">For Users</a>
                    </li>
                @endif

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('contact')}}">Contact</a>--}}
{{--                </li>--}}

            </ul>
        </div>
        <div class="navbar-nav justify-content-end">
            <ul class="list-inline">
                @if(auth()->user())
                <li class="list-inline-item">
                    @if(auth()->user()->email_verified_at == null && (auth()->user()->role->name == 'company' || auth()->user()->role->name == 'user'))
                        <form method="post" action="{{ route('verification.resend', ['id' => auth()->user()->id]) }}">
                        @csrf
                            <button type="submit" class="btn btn-danger mx-2 mb-2">
                             <i class="fas fa-envelope"></i> Verification Email
                            </button>
                        </form>
                    @endif
                </li>
                <li class="list-inline-item">
                    <a class="nav-link" href="{{route('login')}}">
                        @if (auth()->user()->role->name=='administrator' || auth()->user()->role->name=='user')
                            {{auth()->user()->name. " " . auth()->user()->surname}}
                        @else
                            {{auth()->user()->company->name}}
                        @endif
                    </a>
                </li>
                    @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">
                        Log in
                    </a>
                </li>
            @endif
        </ul>
    </div>
        <!-- Menu Toggle -->
        <button class="header-toggle">
            <span></span>
        </button>
    </div><!-- end container -->
</div>

