<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('/assets/img/logos/logo Bravo 2.png')}}" type="image/png"/>
    <meta property="og:image" content="{{asset('/assets/img/logos/logo Bravo 2.png')}}"/>
       @yield('title')

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />

    <meta name="description" content="BRAVO recruitment website" />

    @yield('styles')
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('includes.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">

            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <b>BRAVO</b>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                @if(auth()->user()->email_verified_at == null && (auth()->user()->role->name == 'company' || auth()->user()->role->name == 'user'))
                    <form id="verificationForm" method="post" action="{{ route('verification.resend', ['id' => auth()->user()->id]) }}">
                        @csrf
                        <button type="button" onclick="resendVerification()" class="btn btn-danger mx-2 mb-2">
                            <i class="fas fa-envelope"></i> Verification Email
                        </button>
                    </form>
                @endif
                <a @if (auth()->user()->role->name=='administrator' || auth()->user()->role->name=='user') href="{{route('user.show',auth()->user()->slug)}}" @else href="{{route('company.show',auth()->user()->slug)}}"  @endif class="nav-link text-body font-weight-bold px-2">
                    <i class="fa fa-user me-1"></i>
                <span class="d-sm-inline d-none">
                    @if (auth()->user()->role->name=='administrator' || auth()->user()->role->name=='user') 
                    {{auth()->user()->name. " " . auth()->user()->surname}} 
                @else 
                    {{auth()->user()->company->name}} 
                @endif
                </span>
                </a>
                </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
<script>
    function resendVerification() {
        fetch("{{ route('verification.resend', ['id' => auth()->user()->id]) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "https://mail.google.com";
            } else {
                console.error('Error resending verification email');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
