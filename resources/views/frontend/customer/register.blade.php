
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wpocean.com/html/tf/themart/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Feb 2024 05:32:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/') }}/images/favicon.png">
    <title>Themart - eCommerce HTML5 Template</title>
    <link href="{{ asset('frontend/') }}/css/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/flaticon_ecommerce.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/owl.theme.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/odometer-theme-default.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/sass/style.css" rel="stylesheet">
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="{{ asset('frontend/') }}/images/preloader.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <div class="wpo-login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="wpo-accountWrapper" action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="wpo-accountInfo">
                                <div class="wpo-accountInfoHeader">
                                    <a href="index.html"><img src="{{ asset('frontend/') }}/images/logo-2.svg" alt=""></a>
                                    <a class="wpo-accountBtn" href="{{ route('customer.login') }}">
                                        <span class="">Log in</span>
                                    </a>
                                </div>
                                <div class="image">
                                    <img src="{{ asset('frontend/') }}/images/login.svg" alt="">
                                </div>
                                <div class="back-home">
                                    <a class="wpo-accountBtn" href="/">
                                        <span class="">Back To Home</span>
                                    </a>
                                </div>
                            </div>
                            <div class="wpo-accountForm form-style">
                                <div class="fromTitle">
                                    <h2>Signup</h2>
                                    <p>Sign into your pages account</p>
                                </div>
                                @if (session('register'))
                                    <div class="alert alert-success">{{ session('register') }}</div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="name">Full Name</label>
                                        <input type="text" id="name" name="name" placeholder="Your name here.." value="{{ old('name') }}">
                                        {!! $errors->has('name') ? '<strong class="text-danger">' . $errors->first('name') . '</strong>' : '' !!}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label>Email</label>
                                        <input type="text" id="email" name="email" placeholder="Your email here.." value="{{ old('email') }}">
                                        {!! $errors->has('email') ? '<strong class="text-danger">' . $errors->first('email') . '</strong>' : '' !!}
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="pwd2" type="password" placeholder="Your password here.." value="" name="password">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal3" type="button"><i class="ti-eye"></i></button>
                                            </span>
                                            {!! $errors->has('password') ? '<strong class="text-danger">' . $errors->first('password') . '</strong>' : '' !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="pwd3" type="password" placeholder="Your password here.." value="" name="password_confirmation">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal2" type="button"><i class="ti-eye"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <button type="submit" class="wpo-accountBtn">Signup</button>
                                    </div>
                                </div>
                                <h4 class="or"><span>OR</span></h4>
                                <ul class="wpo-socialLoginBtn">
                                    <li><button class="facebook" tabindex="0" type="button"><span><i class="ti-facebook"></i></span></button></li>
                                    <li><button class="twitter" tabindex="0" type="button"><span><i class="ti-twitter"></i></span></button></li>
                                    <li><button class="linkedin" tabindex="0" type="button"><span><i class="ti-linkedin"></i></span></button></li>
                                </ul>
                                <p class="subText">Sign into your pages account <a href="{{ route('customer.login') }}">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('frontend/') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend/') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('frontend/') }}/js/modernizr.custom.js"></script>
    <script src="{{ asset('frontend/') }}/js/jquery.dlmenu.js"></script>
    <script src="{{ asset('frontend/') }}/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('frontend/') }}/js/script.js"></script>
</body>


<!-- Mirrored from wpocean.com/html/tf/themart/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Feb 2024 05:32:50 GMT -->
</html>
