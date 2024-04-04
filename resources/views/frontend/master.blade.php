
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="">
    @yield('link')
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

        <!-- start header -->

            <!-- end topbar -->
            <!--  start header-middle -->
            <div class="header-middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="/"><img src="{{ asset('frontend/') }}/images/logo.png"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <form action="#" class="middle-box">
                                <div class="category">
                                    <select name="service" class="form-control">
                                        <option selected="">All Category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                        <option>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control"
                                            placeholder="What are you looking for?">
                                        <button class="search-btn" type="submit"> <i class="fi flaticon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="middle-right">
                                <ul>
                                    <li><a href="compare.html"><i class="fi flaticon-right-and-left"></i><span>Compare</span></a>
                                    </li>
                                    <li>
                                        @auth('customer')
                                            @if (Auth::guard('customer')->user()->photo)
                                            <a href="{{ route('customer.profile') }}">
                                                <img style="border-radius: 100%" height="40" id="" src="{{ asset(Auth::guard('customer')->user()->photo) }}" alt="">
                                            </a>
                                            @else
                                            <a href="{{ route('customer.profile') }}">
                                                <span>
                                                    <img height="40" id="" src="{{ Avatar::create(Auth::guard('customer')->user()->name)->toBase64() }}" alt="">
                                                </span>
                                            </a>
                                            @endif
                                        @else
                                        <a href="{{ route('customer.login') }}">
                                            <i class="fi flaticon-user-profile"></i>
                                            <span>Login</span>
                                        </a>
                                        @endauth
                                    </li>
                                    <li>
                                        <div class="header-wishlist-form-wrapper">
                                            <button class="wishlist-toggle-btn"> <i class="fi flaticon-heart"></i>
                                                <span class="cart-count">3</span></button>
                                            <div class="mini-wislist-content">
                                                <button class="mini-cart-close"><i class="ti-close"></i></button>
                                                <div class="mini-cart-items">
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img src="{{ asset('frontend/') }}/images/cart/img-1.jpg" alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="product.html">Stylish Pink Coat</a>
                                                            <span class="mini-cart-item-price">$150</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img
                                                                    src="{{ asset('frontend/') }}/images/cart/img-2.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="product.html">Blue Bag</a>
                                                            <span class="mini-cart-item-price">$120</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img
                                                                    src="{{ asset('frontend/') }}/images/cart/img-3.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="product.html">Kids Blue Shoes</a>
                                                            <span class="mini-cart-item-price">$120</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-action clearfix">
                                                    <div class="mini-btn">
                                                        <a href="wishlist.html" class="view-cart-btn">View Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if (Auth::guard('customer')->check())
                                    <li>
                                        <div class="mini-cart">
                                            <button class="cart-toggle-btn"> <i class="fi flaticon-add-to-cart"></i>
                                                @if (Auth::guard('customer')->user()->Cart->count() != 0)
                                                <span class="cart-count">{{ Auth::guard('customer')->user()->Cart->count() }}</span>
                                                @endif
                                            </button>
                                            <div class="mini-cart-content">
                                                <button class="mini-cart-close"><i class="ti-close"></i></button>
                                                <div class="mini-cart-items">
                                                    @php
                                                        $subtotal = 0;
                                                    @endphp
                                                    @forelse (Auth::guard('customer')->user()->Cart as $cart)
                                                    @php
                                                        $price = $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount;
                                                        $subtotal += $price * $cart->quantity;
                                                    @endphp
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href=""><img src="{{ asset($cart->Product->preview_img) }}" alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="">{{ $cart->Product->product_name }}</a>
                                                            <span class="mini-cart-item-price">&#2547; {{ $price }} x {{ $cart->quantity }}</span>
                                                            <span class="mini-cart-item-quantity"><a href="{{ route('cart.remove', $cart->id) }}"><i
                                                                class="ti-close"></i></a></span>
                                                                <span>Color: {{ $cart->Color->color_name ?? '' }}, Size: {{ $cart->Size->size_name ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <p>No Prodect Added To Cart</p>
                                                    @endforelse
                                                </div>
                                                <div class="mini-cart-action clearfix">
                                                    <span class="mini-checkout-price">Subtotal:
                                                        <span>&#2547; {{ $subtotal }}</span></span>
                                                    <div class="mini-btn">
                                                        <a href="{{ route('cart') }}" class="view-cart-btn">View Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li>
                                        <a title="Cart" href="{{ route('customer.login') }}"> <!-- Link to login page -->
                                            <div class="mini-cart">
                                                <button class="cart-toggle-btn"> <i class="fi flaticon-add-to-cart"></i>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end header-middle -->
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6 col-sm-5 col-6 d-block d-lg-none">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend/') }}/images/logo.svg"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-3">
                                <div class="header-shop-item">
                                    <button class="header-shop-toggle-btn"><span>Shop By Category</span> </button>
                                    <div class="mini-shop-item">
                                        <ul id="metis-menu">
                                            @foreach (App\Models\Category::all() as $category)
                                                <li class="header-catagory-item">
                                                    <a class="menu-down-{{ App\Models\Subcategory::Where('category_id', $category->id)->exists() ? 'arrow': '' }}" href="#">{{ $category->name }}</a>
                                                    @if (App\Models\Subcategory::Where('category_id', $category->id)->exists())
                                                        <ul class="header-catagory-single">
                                                            @foreach (App\Models\Subcategory::Where('category_id', $category->id)->get() as $subcategory)
                                                            <li><a href="{{ route('subcategory.product', $subcategory->id) }}">{{ $subcategory->subcategory }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="menu-item-has-children">
                                            <a href="/">Home</a>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">FAQ</a>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-2 col-md-1 col-1">
                                <div class="header-right">
                                    <a href="recent-view.html" class="recent-btn"><i class="fi flaticon-refresh"></i>
                                        <span>Recently Viewed</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        <!-- end of header -->
        @yield('content')

        <!-- start of wpo-site-footer-section -->
        <footer class="wpo-site-footer">
            <div class="wpo-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="{{ asset('frontend/') }}/images/logo-2.svg" alt="blog">
                                </div>
                                <p>Elit commodo nec urna erat morbi at hac turpis aliquam.
                                    In tristique elit nibh turpis. Lacus volutpat ipsum convallis tellus pellentesque
                                    etiam.</p>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Contact Us</h3>
                                </div>
                                <div class="contact-ft">
                                    <ul>
                                        <li><i class="fi flaticon-mail"></i>themart@gmail.com</li>
                                        <li><i class="fi flaticon-phone"></i>(208) 555-0112 <br>(704) 555-0127</li>
                                        <li><i class="fi flaticon-pin"></i>4517 Washington Ave. Manchter,
                                            Kentucky 495</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Popular</h3>
                                </div>
                                <ul>
                                    <li><a href="product.html">Men</a></li>
                                    <li><a href="product.html">Women</a></li>
                                    <li><a href="product.html">Kids</a></li>
                                    <li><a href="product.html">Shoe</a></li>
                                    <li><a href="product.html">Jewelry</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="widget instagram">
                                <div class="widget-title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul class="d-flex">
                                    <li><a href="project-single.html"><img src="{{ asset('frontend/') }}/images/instragram/1.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend/') }}/images/instragram/2.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend/') }}/images/instragram/4.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend/') }}/images/instragram/3.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend/') }}/images/instragram/4.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend/') }}/images/instragram/1.jpg"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="wpo-lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <p class="copyright"> Copyright &copy; 2023 Themart by <a href="index.html">wpOceans</a>.
                                All
                                Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of wpo-site-footer-section -->

        <!-- start wpo-newsletter-popup-area-section -->
        {{-- <section class="wpo-newsletter-popup-area-section">
            <div class="wpo-newsletter-popup-area">
                <div class="wpo-newsletter-popup-ineer">
                    <button class="btn newsletter-close-btn"><i class="ti-close"></i></button>
                    <div class="img-holder">
                        <img src="{{ asset('frontend/') }}/images/newsletter.jpg" alt>
                    </div>
                    <div class="details">
                        <h4>Get 30% discount shipped to your inbox</h4>
                        <p>Subscribe to the Themart eCommerce newsletter to receive timely updates to your favorite products</p>
                        <form>
                            <div>
                                <input type="email" placeholder="Enter your email">
                                <button type="submit">Subscribe</button>
                            </div>
                            <div>
                                <label class="checkbox-holder"> Don't show this popup again!
                                    <input type="checkbox" class="show-message">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- end wpo-newsletter-popup-area-section -->

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
    @yield('scripts')
    <!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    @yield('script')
</body>
</html>
