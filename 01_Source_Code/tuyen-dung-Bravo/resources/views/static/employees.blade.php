@extends('layouts.staticIndex')
<!-- end Header -->
@section('title')
    <title>
        {{'For Employees - BRAVO'}}
    </title>
@endsection
<!-- Hero section -->
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1522071820081-009f0129c71c.jpg')}}">
        <div class="bg-black-06">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h1 class="display-4 margin-0">For Talents</h1>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end bg-black-* -->
    </div>

    <div class="section">
        <div class="container">
            <div class="row col-spacing-40">
                <div class="col-12 col-lg-6">
                    <p>Have you always wanted to work for top companies worldwide, or maybe a thriving startup?
                        Whether you are looking for a senior legal position or an entry level administration position;
                        whether you want to work full time or part time; whether you want to work fully remotely or on
                        sight; whether you want to be fully employed or work freelance; we have all those options
                        ready for you.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <p>At BRAVO we believe that employees are the most valuable and most expensive asset. That is
                        why we are very committed to our talents.
                        We know that looking for a new job is stressful, time consuming and exhausting. We&#39;re here to help
                        you every step of the way. That is why we take our time with you to get to know you and find you the perfect fit for you.</p>
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
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                          <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Apply</h5>
                        <p>Create an account with us and upload your resume to our database. Our recruiters will review your
                            application and get back to you with recommendations.</p>
                    </div>
                </div>
                <!-- Service box 2 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
{{--                            <i class="fas fa-heart"></i>--}}
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Consult</h5>
                        <p>Have a one on one talk with one of our recruiters and discuss in detail what it is you want and what
                            we can offer to you.</p>
                    </div>
                </div>
                <!-- Service box 3 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Train</h5>
                        <p>Once we have identified your needs we will provide a general and a personalized training
                            programme for you to help you fit in the new position.</p>
                    </div>
                </div>
                <!-- Service box 4 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Engage</h5>
                        <p>Once you have finished the necessary training program, we will assist you during the recruitment
                            process and help you with the onboarding process all the way.</p>
                    </div>
                </div>
                <!-- Service box 5 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Manage</h5>
                        <p>Once you have been employed, we will be at your disposal at all time. Guide you if you need
                            assistance, help you network and more.</p>
                    </div>
                </div>
                <!-- Service box 6 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Legal</h5>
                        <p>We help you with all legal matters. If you are hired we take care of your taxes and other obligations;
                            we also assist with relocation, visa and more.</p>
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
