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

    <title>
        Reset Password - BRAVO
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <meta name="description" content="BRAVO - Online Recruitment Platform" />
</head>

<body class="bg-gray-200">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{route('index')}}">
                        <img class="logo-dark" style="height: 30px" src="{{asset('/assets/img/logos/logo Bravo.png')}}" alt="Bravo logo">
                        {{--                    BRAVO--}}
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{route('index')}}">
                                    <i class="fa fa-home opacity-6 text-dark me-1"></i>

                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{route('about')}}">
                                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                    About Bravo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{route('contact')}}">
                                    <i class="fab fa-telegram opacity-6 text-dark me-1"></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav d-lg-block d-none">
                            <li class="nav-item">
                                <a href="{{route('register')}}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Create account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content main-content-bg mt-0">
    <section class="min-vh-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0 mt-sm-12 mt-9 mb-4">
                        <div class="card-header text-center pt-4 pb-1">
                            <h4 class="font-weight-bolder mb-1">Reset password</h4>
                            <p class="mb-0">You will receive an e-mail in maximum 60 seconds</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{route('password.email')}}">
                                @csrf
                                @if (session('status'))

                                    <span style="color:green;">{{ session('status') }}</span>

                                    @endif
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email">
                                    @error('email')
                                    <span style="color:red;">{{ $message }}</span>
                                    @enderror
                               </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark btn-lg w-100 my-4 mb-2">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
    <div class="container">

        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, BRAVO, All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<!--   Core JS Files   -->
<script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>

</html>
