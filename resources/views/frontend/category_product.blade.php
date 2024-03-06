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
                        <li><a href="/">Home</a></li>
                        <li><a href="/">Categories</a></li>
                        <li>{{ $category->name }}</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- start of themart-interestproduct-section -->
<section class="themart-interestproduct-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="wpo-section-title">
                    <h2>{{ $category->name }} Products</h2>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="row">
                @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
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
                        <div class="text">
                            @php
                                $length = Str::length($product->product_name)
                            @endphp
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
                                    @php
                                        $after_discount = $product->Inventory->first()->after_discount;
                                        $integer_price = intval($after_discount); // Extract integer part of the price
                                    @endphp
                                    <span class="present-price">&#2547;{{ number_format($integer_price) }}</span>
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
                <div class="more-btn">
                    <a class="theme-btn-s2" href="product.html">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of themart-interestproduct-section -->

@endsection
