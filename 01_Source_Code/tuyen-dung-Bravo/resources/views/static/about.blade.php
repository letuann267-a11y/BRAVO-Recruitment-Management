@extends('layouts.staticIndex')
<!-- end Header -->
@section('title')
    <title>
        {{'About - BRAVO'}}
    </title>
@endsection
<!-- Hero section -->
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1517048676732-d65bc937f952.jpg')}}">
        <div class="bg-black-06">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h1 class="display-4 margin-0">About us</h1>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end bg-black-* -->
    </div>

    <!-- About section -->
    <div class="section">
        <div class="container">
            <div class="row align-items-center col-spacing-50">
                <div class="col-12 col-lg-5">
                    <h3 class="font-weight-light">We're a team of professionals who loves what they do</h3>
                    <p>We are a team of professionals who have worked with numerous international companies and offered tailored solutions to their staffing needs.
                        Our niche is in renting out remote entry level employees which we will manage entirely. You no longer need to waste time with a full recruitment process and spend resources on medical insurance, vacation days and so on, we will take care of all of this, so you can concentrate on getting the work done and developing your company. </p>
                    <a class="button button-lg button-rounded button-reveal-right-dark margin-top-30" href="#"><span>Get In Touch</span><i class="ti-arrow-right"></i></a>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="row gallery-wrapper col-spacing-10">
                        <!-- Gallery image box 1 -->
                        <div class="col-6 gallery-box">
                            <div class="gallery-img">
                                <a href="https://images.unsplash.com/photo-1552664730-d307ca884978?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" data-gallery-title="Gallery Image 1">
                                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Gallery image box 2 -->
                        <div class="col-6 gallery-box">
                            <div class="gallery-img">
                                <a href="https://images.unsplash.com/photo-1499540633125-484965b60031?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80" data-gallery-title="Gallery Image 2">
                                    <img src="https://images.unsplash.com/photo-1499540633125-484965b60031?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80" alt="">
                                </a>
                            </div>
                        </div>
                    </div><!-- end row/gallery-wrapper -->
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end About section -->

    <!-- section 1 -->
    <div class="section-lg" style="padding: 0; padding-bottom: 100px ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    <h1 class="display-4 font-weight-thin margin-0">01.</h1>
                </div>
                <div class="col-12 col-md-8">
                    <h3 class="font-weight-normal">Mission</h3>
                    <div class="divider-width-40px margin-bottom-20">
                        <hr class="bg-black-09">
                    </div>
                    <p>Our mission is to find the ideal candidate for companies from all over the world.</p>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="container" style="margin-top: 70px;">
            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    <h1 class="display-4 font-weight-thin margin-0">02.</h1>
                </div>
                <div class="col-12 col-md-8">
                    <h3 class="font-weight-normal">Vision</h3>
                    <div class="divider-width-40px margin-bottom-20">
                        <hr class="bg-black-09">
                    </div>
                    <p>To become a trusted long term partner for our clients and build the best matchmaking database.</p>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="container" style="margin-top: 70px;">
            <div class="row align-items-center">
                <div class="col-12 col-md-4">
                    <h1 class="display-4 font-weight-thin margin-0">03.</h1>
                </div>
                <div class="col-12 col-md-8">
                    <h3 class="font-weight-normal">Values</h3>
                    <div class="divider-width-40px margin-bottom-20">
                        <hr class="bg-black-09">
                    </div>
                    <p>Our work at BRAVO is focused on three key values: Transparency, Reasonability and Efficiency.</p>
                </div>
            </div><!-- end row -->

        </div><!-- end container -->

    </div>
    <!-- end section 1 -->
    <div class="container" style="margin-top: 10px; margin-bottom:60px; text-align:center">
        <div class="row align-items-center">
            <div class="col-12">
                <p style="font-size:18px;">Finding the missing variable to your success </p>
            </div>
        </div>
    </div>
    <!-- Features section -->
{{--    <div class="section">--}}
{{--        <div class="container">--}}
{{--            <div class="row icon-5xl">--}}
{{--                <div class="col-12 col-md-4">--}}
{{--                    <i class="ti-briefcase text-dark"></i>--}}
{{--                    <h5 class="font-weight-normal margin-top-20">Mission</h5>--}}
{{--                    <p>Our mission is to find the ideal candidate for companies from all over the world. </p>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-4">--}}
{{--                    <i class="ti-settings text-dark"></i>--}}
{{--                    <h5 class="font-weight-normal margin-top-20">Vision</h5>--}}
{{--                    <p>To become a trusted long term partner for our clients and build the best matchmaking database.</p>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-4">--}}
{{--                    <i class="ti-face-smile text-dark"></i>--}}
{{--                    <h5 class="font-weight-normal margin-top-20">Values</h5>--}}
{{--                    <p>Our work at BRAVO is focused on three key values: Transparency, Reasonability and Efficiency. </p>--}}
{{--                </div>--}}
{{--            </div><!-- end row -->--}}

{{--        </div><!-- end container -->--}}

{{--    </div>--}}
    <!-- end Features section -->




    <!-- Services section -->
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h2 class="font-weight-normal">Our team</h2>
            </div>
        </div>
        <!-- Team section -->
        <div class="section padding-top-0 mt-2">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="border-all border-radius padding-30">
                            <img class="img-circle-md" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                            <div class="margin-top-30">
                                <h6 class="font-weight-normal margin-0 line-height-140">Ilir Perolli</h6>
                                <span class="font-small font-weight-normal">Founder</span>
                                <p class="margin-top-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            </div>
                            <ul class="list-inline margin-top-20">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="border-all border-radius padding-30">
                            <img class="img-circle-md" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                            <div class="margin-top-30">
                                <h6 class="font-weight-normal margin-0 line-height-140">Atdhe Lila</h6>
                                <span class="font-small font-weight-normal">Co-Founder</span>
                                <p class="margin-top-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            </div>
                            <ul class="list-inline margin-top-20">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="border-all border-radius padding-30">
                            <img class="img-circle-md" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                            <div class="margin-top-30">
                                <h6 class="font-weight-normal margin-0 line-height-140">Albi Kusari</h6>
                                <span class="font-small font-weight-normal">Manager</span>
                                <p class="margin-top-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            </div>
                            <ul class="list-inline margin-top-20">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div><!-- end row -->
            </div><!-- end container -->
        </div>
        <!-- end Team section -->
    </div><!-- end container -->
    <!-- end Services section -->

    <!-- Clients Section -->
    @include('staticIncludes.clients')
    <!-- End of Clients Section -->
    <!-- End of Clients Section -->
    <!-- Scroll to top button -->
    <div class="scrolltotop">
        <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- end Scroll to top button -->

@endsection
