@extends('layouts.staticIndex')
@section('title')
    <title>{{ 'Home - BRAVO Recruitment' }}</title>
@endsection
@section('content')
<div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1486406146926-c627a92ad1ab.jpg')}}">
    <div class="section-xl bg-black-03">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8">
                    <h1 style="background: -webkit-linear-gradient(#F8C506, #CDA305); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">BRAVO Recruitment Website</h1>
                    <h4 class="font-weight-light letter-spacing-1 margin-bottom-20 text-white">He thong tuyen dung tap trung cho cac chi nhanh cua BRAVO</h4>
                    <p class="text-white-09" style="max-width: 720px;">
                        Website ho tro gioi thieu doanh nghiep, ket noi ung vien voi co hoi nghe nghiep, tiep nhan ho so va theo doi qua trinh tuyen dung tren mot nen tang thong nhat.
                    </p>
                    <a class="button button-lg button-radius button-white-3 margin-top-20" href="{{route('register')}}">Dang ky ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section padding-top-0">
    <div class="container">
        <div class="row align-items-center margin-top-70 col-spacing-50">
            <div class="col-12 col-lg-6">
                <img src="{{asset('/static/assets/images/photo-1454165804606-c3d57bc86b40.jpg')}}" alt="">
            </div>
            <div class="col-12 col-lg-6">
                <h3 class="font-weight-light">Ve BRAVO</h3>
                <p style="text-align: justify;text-justify: inter-word;">
                    BRAVO la doanh nghiep van hanh theo mo hinh nhieu chi nhanh va can mot he thong tuyen dung thong nhat de gioi thieu thong tin doanh nghiep, dang tuyen cac vi tri va tiep nhan ho so ung vien truc tuyen.
                </p>
                <p style="text-align: justify;text-justify: inter-word;">
                    He thong nay cho phep ung vien cap nhat ho so, tim kiem cong viec va ung tuyen; dong thoi ho tro HR chi nhanh dang tin, danh gia muc do phu hop cua ung vien va quan ly ket qua tuyen dung minh bach hon.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="section-lg bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1542744173-8e7e53415bb0.jpg')}}">
    <div class="bg-dark-grey-07">
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">20</h1>
                    <h6 class="font-small font-weight-normal uppercase">Years of growth</h6>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">3</h1>
                    <h6 class="font-small font-weight-normal uppercase">User roles</h6>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Profiles managed</h6>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">24</h1>
                    <h6 class="font-small font-weight-normal uppercase">Support availability</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-lg">
    <div class="container">
        <div class="row text-center margin-bottom-40">
            <div class="col-12">
                <h2 class="font-weight-light">Gia tri noi bat</h2>
            </div>
        </div>
        <div class="row icon-5xl text-center">
            <div class="col-12 col-lg-4">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">1</h2>
                    </div>
                    <h5 class="font-weight-normal">Minh bach</h5>
                    <p>Thong tin tin tuyen dung, ho so ung vien va ket qua xu ly duoc theo doi ro rang tren he thong.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">2</h2>
                    </div>
                    <h5 class="font-weight-normal">Tap trung</h5>
                    <p>Du lieu duoc quan ly thong nhat giua ung vien, HR chi nhanh va bo phan quan tri nhan su.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">3</h2>
                    </div>
                    <h5 class="font-weight-normal">Phu hop</h5>
                    <p>He thong ho tro sap xep muc do phu hop dua tren tieu chi priority de toi uu quy trinh tuyen dung.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section padding-top-0">
    <div class="container">
        <div class="row align-items-center margin-top-30 col-spacing-50">
            <div class="col-12 col-lg-6">
                <h3 class="font-weight-light">Quy trinh van hanh</h3>
                <p style="text-align: justify;text-justify: inter-word;">
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Ung vien tao tai khoan, cap nhat ho so va tim kiem cong viec. <br>
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> HR chi nhanh dang tin tuyen dung va thiet lap tieu chi uu tien. <br>
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> He thong tiep nhan ho so, sap xep muc do phu hop va theo doi trang thai ung tuyen. <br>
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> HR chi nhanh cap nhat ket qua va gui phan hoi den ung vien.
                </p>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{asset('/static/assets/images/offer.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1527689368864-3a821dbccc34.jpg')}}">
    <div class="bg-black-06">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <h2 class="font-weight-light margin-0">San sang tro thanh mot phan cua BRAVO?</h2>
                </div>
                <div class="col-12 col-lg-4 text-lg-right">
                    <a class="button button-xl button-radius button-white-3" href="{{route('register')}}">Tao tai khoan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1587560699334-cc4ff634909a.jpg')}}">
    <div class="bg-black-06">
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-10">
                    <h2>Ban can ho tro them?</h2>
                    <div class="row">
                        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 text-center">
                            <form action="{{route('contact.store')}}" method="POST" id="laravel-contact-form">
                                @csrf
                                <div class="contact-form">
                                    @if (session('contact_success'))
                                        <div class="alert alert-success text-center" role="alert">
                                            {{ session('contact_success') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger text-center" role="alert">
                                            Please check the form and try again.
                                        </div>
                                    @endif

                                    <div class="form-row">
                                        <div class="col-12 col-sm-6">
                                            <input type="text" id="name" style="border-color:#D0D0D0; color:white" name="name" autocomplete="off" placeholder="Name" value="{{old('name')}}" required>
                                            @error('name')
                                            <span style="float:left; margin-bottom: 10px; margin-top: -10px; color:red ">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <input type="email" id="email" style="border-color:#D0D0D0; color:white" name="email" autocomplete="off" placeholder="E-Mail" value="{{old('email')}}" required>
                                            @error('email')
                                            <span style="float:left; margin-bottom: 10px; margin-top: -10px; color:red ">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="text" id="subject" style="border-color:#D0D0D0; color:white" name="subject" autocomplete="off" placeholder="Subject" value="{{old('subject')}}" required>
                                    @error('subject')
                                    <span style="float:left; margin-bottom: 10px; margin-top: -10px; color:red ">{{$message}}</span>
                                    @enderror
                                    <textarea name="message" id="message" style="border-color:#D0D0D0; color:white" placeholder="Message" required>{{old('message')}}</textarea>
                                    @error('message')
                                    <span style="float:left; margin-bottom: 10px; margin-top: -10px; color:red ">{{$message}}</span>
                                    @enderror
                                    <button class="button button-lg button-rounded button-outline-white-2" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scrolltotop">
    <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
</div>
@endsection
