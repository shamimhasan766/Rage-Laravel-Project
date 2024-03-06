@extends('frontend.master')
@section('content')
<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <h2 class="d-none">Hide</h2>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.html">Home</a></li>
                        <li>Product</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- product-area-start -->
<div class="shop-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="shop-filter-wrap">
                    <div class="filter-item">
                        <div class="shop-filter-item">
                            <div class="shop-filter-search">
                                <form>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Search..">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="shop-filter-item category-widget">
                            <h2>Categories</h2>
                            <ul>
                                <li><a href="#">Fashion<span>(10)</span></a></li>
                                <li><a href="#">Winter Ware<span>(20)</span></a></li>
                                <li><a href="#">Bags<span>(30)</span></a></li>
                                <li><a href="#">Shoes<span>(12)</span></a></li>
                                <li><a href="#">Men Fashion<span>(10)</span></a></li>
                                <li><a href="#">Weman Fashion<span>(22)</span></a></li>
                                <li><a href="#">Watch<span>(15)</span></a></li>
                                <li><a href="#">Kids<span>(18)</span></a></li>
                                <li><a href="#">Headphones<span>(16)</span></a></li>
                                <li><a href="#">Hats<span>(35)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="shop-filter-item">
                            <h2>Filter by price</h2>
                            <div class="shopWidgetWraper">
                                <div class="priceFilterSlider">
                                    <form action="#" method="get" class="clearfix">
                                        <div id="sliderRange"></div>
                                        <div class="pfsWrap">
                                            <label>Price:</label>
                                            <span id="amount"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="shop-filter-item">
                            <h2>Color</h2>
                            <ul>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Green <span>(21)</span>
                                        <input type="radio" name="topcoat2">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Blue <span>(24)</span>
                                        <input type="radio" name="topcoat2">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Red<span>(13)</span>
                                        <input type="radio" name="topcoat2">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Brown<span>(27)</span>
                                        <input type="radio" name="topcoat2">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Yellow<span>(12)</span>
                                        <input type="radio" name="topcoat2">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        White<span>(32)
                                        </span>
                                        <input type="radio" name="topcoat2">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="shop-filter-item">
                            <h2>Size</h2>
                            <ul>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Small <span>(10)</span>
                                        <input type="radio" name="topcoat3">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Medium<span>(24)</span>
                                        <input type="radio" name="topcoat3">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Large<span>(13)</span>
                                        <input type="radio" name="topcoat3">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="topcoat-radio-button__label">
                                        Extra Large<span>(18)</span>
                                        <input type="radio" name="topcoat3">
                                        <span class="topcoat-radio-button"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="shop-filter-item new-product">
                            <h2>New Products</h2>
                            <ul>
                                <li>
                                    <div class="product-card">
                                        <div class="card-image">
                                            <div class="image">
                                                <img src="assets/images/new-product/1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3><a href="product.html">Stylish Pink Coat</a></h3>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>30</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-card">
                                        <div class="card-image">
                                            <div class="image">
                                                <img src="assets/images/new-product/2.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3><a href="product.html">Blue Bag</a></h3>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>30</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-card">
                                        <div class="card-image">
                                            <div class="image">
                                                <img src="assets/images/new-product/3.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3><a href="product.html">Kids Blue Shoes</a></h3>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>30</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <div class="shop-filter-item tag-widget">
                            <h2>Popular Tags</h2>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Theme</a></li>
                                <li><a href="#">Stylish</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="shop-section-top-inner">
                    <div class="shoping-product">
                        <p>We found <span>10 items</span> for you!</p>
                    </div>
                    <div class="shoping-list">
                        <ul class="nav nav-mb-3 main-tab" id="tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="grid-tab" data-bs-toggle="pill"
                                    data-bs-target="#grid" type="button" role="tab" aria-controls="grid"
                                    aria-selected="true"><i class="fa fa-th "></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="list-tab" data-bs-toggle="pill"
                                    data-bs-target="#list" type="button" role="tab" aria-controls="list"
                                    aria-selected="false"><i class="fa fa-list "></i></button>
                            </li>
                        </ul>
                    </div>
                    <div class="short-by">
                        <ul>
                            <li>
                                Sort by:
                            </li>
                            <li>
                                <select name="show">
                                    <option value="">Default Sorting</option>
                                    <option value="">Popularity</option>
                                    <option value="">Average Rating</option>
                                    <option value="">Newness</option>
                                    <option value="">Low To High</option>
                                    <option value="">High To Low</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                        <div class="product-wrap">
                            <div class="row align-items-center">
                                @forelse ($products as $product)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="{{ asset($product->preview_img) }}" alt="">
                                            <div class="tag {{ $product->discount ? 'sale':'new' }}">{{ $product->discount ? '- '.$product->discount.'%' :'new' }}</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview-{{ $product->id }}">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        @php
                                            $length = Str::length($product->product_name)
                                        @endphp
                                        <div class="text">
                                            <h2><a title="{{ $product->product_name }}" href="{{ route('product.details', $product->slug) }}">{{ $length >=25 ? Str::substr($product->product_name, 0, 25) . '...' : $product->product_name }}</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                @if ($product->discount)
                                                <span class="present-price">&#2547;{{ $product->Inventory->first()->after_discount }}</span>
                                                <del class="old-price">&#2547;{{ $product->Inventory->first()->price }}</del>
                                                @else
                                                <span class="present-price">&#2547;{{ $product->Inventory->first()->after_discount }}</span>
                                                @endif
                                            </div>
                                            <div class="shop-btn">
                                                <a class="theme-btn-s2" href="{{ route('product.details', $product->slug) }}">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Pop up view start --}}
                                <div id="popup-quickview-{{ $product->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog quickview-dialog">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                                    class="ti-close"></i></button>
                                            <div class="modal-body d-flex">
                                                <div class="product-details">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-5">
                                                            <div class="product-single-img">
                                                                <div class="modal-product">
                                                                    <div class="item">
                                                                        <img src="{{ asset($product->preview_img) }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="product-single-content">
                                                                <h5><a class="text-dark" title="{{ $product->product_name }}" href="{{ route('product.details', $product->slug) }}">{{ $length >=25 ? Str::substr($product->product_name, 0, 25) . '...' : $product->product_name }}</a></h5>
                                                                <p>
                                                                    @if ($product->discount)
                                                                        @php
                                                                            $after_discount = $product->Inventory->first()->after_discount;
                                                                            $integer_price = intval($after_discount); // Extract integer part of the price
                                                                        @endphp
                                                                        <span class="present-price">&#2547;{{ number_format($integer_price) }}</span>
                                                                        <del class="old-price">&#2547;{{ $product->Inventory->first()->price }}</del>
                                                                    @else
                                                                        <span class="present-price">&#2547;{{ $product->Inventory->first()->after_discount }}</span>
                                                                    @endif

                                                                </p>
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                </ul>
                                                                <p>{{$product->short_desc}}
                                                                </p>
                                                                <div class="pro-single-btn">
                                                                    <div class="quantity cart-plus-minus">
                                                                        <input type="text" value="1">
                                                                        <div class="dec qtybutton">-</div>
                                                                        <div class="inc qtybutton"></div>
                                                                    </div>
                                                                    <a href="#" class="theme-btn">Add to cart</a>
                                                                </div>
                                                                <div class="social-share">
                                                                    <span>Share with : </span>
                                                                    <ul class="socialLinks">
                                                                        <li><a href='#'><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a href='#'><i class="fa fa-linkedin"></i></a></li>
                                                                        <li><a href='#'><i class="fa fa-twitter"></i></a></li>
                                                                        <li><a href='#'><i class="fa fa-instagram"></i></a></li>
                                                                        <li><a href='#'><i class="fa fa-youtube-play"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- popup-quickview -->
                                </div>
                                {{-- Pop up view end --}}
                                @empty
                                <h2 class="text-center">No Product Found</h2>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade product-list" id="list" role="tabpanel"
                        aria-labelledby="list-tab">
                        <div class="product-row">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/1.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Wireless Headphones</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/2.png" alt="">
                                            <div class="tag sale">Sale</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Blue Bag with Lock</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/3.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Stylish Pink Top</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>120</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$150.00</span>
                                                <del class="old-price">$180.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/4.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Brown Com Boots</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>190</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$180.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/5.png" alt="">
                                            <div class="tag sale">Sale</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Winter Sweter</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/6.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Blue Kids Shoes</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/7.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Stylish Bag</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>140</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$130.00</span>
                                                <del class="old-price">$180.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/8.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Finger Rings</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/1.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Wireless Headphones</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/2.png" alt="">
                                            <div class="tag sale">Sale</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Blue Bag with Lock</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/3.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Stylish Pink Top</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>120</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$150.00</span>
                                                <del class="old-price">$180.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/4.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Brown Com Boots</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>190</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$180.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/5.png" alt="">
                                            <div class="tag sale">Sale</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Winter Sweter</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/6.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Blue Kids Shoes</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/7.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Stylish Bag</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>140</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$130.00</span>
                                                <del class="old-price">$180.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/8.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Finger Rings</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/2.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Blue Bag with Lock</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="assets/images/interest-product/5.png" alt="">
                                            <div class="tag new">New</div>
                                            <ul class="cart-wrap">
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Add To Cart"><i class="fi flaticon-add-to-cart"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#popup-quickview">
                                                    <button data-bs-toggle="tooltip" data-bs-html="true" title="Quick View"><i
                                                            class="fi flaticon-eye"></i></button>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="Wish List"><i class="fi flaticon-heart"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text">
                                            <h2><a href="product-single.html">Stylish Bag</a></h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">$120.00</span>
                                                <del class="old-price">$200.00</del>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur,
                                                 adipisicing elit.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-area-end -->
@endsection
