@extends('layouts.staticIndex')
<!-- end Header -->
@section('title')
    <title>
        {{'For Companies - BRAVO'}}
    </title>
@endsection
<!-- Hero section -->
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1486406146926-c627a92ad1ab.jpg')}}">
        <div class="bg-black-06">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h1 class="display-4 margin-0">For Companies</h1>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end bg-black-* -->
    </div>

    <div class="section">
        <div class="container">
            <div class="row col-spacing-40">
                <div class="col-12 col-lg-6">
                    <p>At BRAVO we believe that employees are the most valuable and most expensive asset. A
                        companyâ€™s success depends on the people steering it, that is why we are committed to finding you
                        the best and most suitable talents to fill your companyâ€™s needs and help you grow.
                        No matter the stage in which a company is, we provide talents from start-up key roles, to large
                        corporations. We offer an intensive recruiting process, including our own training academy all this in
                        order to provide you the talent you need.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <p>With BRAVO you can fully employ one of our talents or decide to contract them. Contracted
                        talents will still be managed by BRAVO so you do not need to worry about taxes, employment
                        obligations etc. You can chose to engage our talents on full time basis or part time basis; long term
                        or short term; and also chose if you want them to work remotely, on sight or a hybrid.</p>
                </div>
            </div><!-- end row -->


        </div><!-- end container -->
    </div>

    <div class="section padding-top-0">
        <div class="container">
            <div class="row align-items-center margin-top-30 col-spacing-50">
                <!-- About Image -->

                <!-- About Content -->
                <div class="col-12 col-lg-6">
                    <h3 class="font-weight-light">Positions we prioritize</h3>
                    <p style="  text-align: justify;text-justify: inter-word;"><span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Legal <br>
                        <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Administration <br>
                        <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Finance <br>
                        <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Human Resources <br>
                        <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Management
                    </p>

                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{asset('/static/assets/images/job-positions.jpg')}}" alt="">
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>


    <!-- Services section -->
    <div class="section padding-top-0">
        <div class="container">
            <div class="row">
                <!-- Service box 1 -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Quality</h5>
                        <p>Thanks to our internal vetting process, we can guarantee that our talents will be able to provide high
                            quality work from day one. We have developed our own academy to provide the necessary training,
                            additionally we spend a lot of one on one time with our talents to learn and improve their skills.</p>
                    </div>
                </div>
                <!-- Service box 2 -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            {{--                            <i class="fas fa-heart"></i>--}}
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Assessment</h5>
                        <p>We assess our talents based on a multi-faceted approach. Besides skill and experience, we focus on
                            digital literacy and especially on cultural fit. We want to make sure that the talents you recruit are
                            ready to adapt from day one. We continuously review and assess our talents performance, to
                            ensure high performance.</p>
                    </div>
                </div>
                <!-- Service box 3 -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Efficiency</h5>
                        <p>We know that the recruiting process is a long and bureaucratic procedure, we are here to help you
                            improve this experience. We provide a quick short list of top talents who best suit you. We assist you
                            during the whole recruitment procedure from the initial resume assessment to the exit interview.</p>
                    </div>
                </div>
                <!-- Service box 4 -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Support</h5>
                        <p>Our work is not done once you have contracted or hired the talent. We provide continuous support,
                            whether it be assessing their performance; further training; exit interview; replacing talents and
                            more. We will be your side throughout the entire process, and make sure to make your experience
                            easy and enjoyable.</p>
                    </div>
                </div>

            </div><!-- end row -->
            <div class="row d-flex justify-content-center">
                <a class="button button-lg button-radius button-dark margin-top-40" href="{{route('register')}}">Register now!</a>

            </div>

        </div><!-- end container -->
    </div>
    <!-- end Services section -->




    <!-- Scroll to top button -->
    <div class="scrolltotop">
        <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- end Scroll to top button -->


@endsection
