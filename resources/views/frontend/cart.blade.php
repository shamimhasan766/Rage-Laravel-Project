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
                        <li><a href="product.html">Product Page</a></li>
                        <li>Cart</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- cart-area-s2 start -->
<div class="cart-area-s2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-page-title">
                    <h2>Your Cart</h2>
                    <p>There are {{ $carts->count() }} products in this list</p>
                </div>
            </div>
        </div>
        <div class="cart-wrapper">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <div class="cart-item">
                            <table class="table-responsive cart-wrap">
                                <thead>
                                    <tr>
                                        <th class="images images-b">Product</th>
                                        <th class="ptice">Price</th>
                                        <th class="stock">Quantity</th>
                                        <th class="ptice total">Subtotal</th>
                                        <th class="remove remove-b">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sub = 0;
                                    @endphp
                                    @foreach ($carts as $cart)
                                    @php
                                    $price = $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount;
                                    @endphp
                                    <tr class="wishlist-item">
                                        <td class="product-item-wish">
                                            <div class="check-box"><input type="checkbox" class="myproject-checkbox"></div>
                                            <div class="images">
                                                <span>
                                                    <img src="{{ asset($cart->Product->preview_img) }}" alt="">
                                                </span>
                                            </div>
                                            <div class="product">
                                                <ul>
                                                    <li class="first-cart">{{ $cart->Product->product_name }}</li>
                                                    <li>
                                                        <div class="rating-product">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <span>130</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="ptice cartabc">&#2547;<span class="price">{{ $price }}</span></td>
                                        <td class="td-quantity cartabc">
                                            <div class="quantity">
                                                <input name="quantity[{{ $cart->id }}]" class="text-value" type="number" min="1" value="{{ $cart->quantity }}">
                                                <div data-price="{{ $price }}" class="dec qtybutton">-</div>
                                                <div data-price="{{ $price }}" class="inc qtybutton">+</div>
                                                <strong class="message text-danger"></strong>
                                            </div>
                                        </td>
                                        <td class="ptice cartabc">&#2547;<span class="subtotal">{{ $price * $cart->quantity }}</span></td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn"><a data-bs-toggle="tooltip" data-bs-html="true" title=""
                                                href="{{ route('cart.remove', $cart->id) }}" data-bs-original-title="Remove from Cart" aria-label="Remove from Cart"><i
                                                    class="fi ti-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @php
                                        $sub += $price * $cart->quantity;
                                    @endphp
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="cart-action mb-3">
                            <div></div>
                            <button class="theme-btn-s2" type="submit"><i class="fi flaticon-refresh"></i> Update Cart</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    @php
                        if ($sub > $min_spend) {
                            if ($type == 0) {
                               $discount = $sub / 100 * $discount;
                            }
                        }
                        else {
                            $discount = 0;
                            $msg = 'To Use This Coupon You have To Spend At Least '. $min_spend.' TK';
                        }
                    @endphp
                    <div class=" mb-3">
                        <form class="apply-area mb-2" action="{{ route('cart') }}" method="GET">
                            @csrf
                            <input type="text" class="form-control" name="coupon" placeholder="Enter your coupon">
                            <button class="theme-btn-s2" type="submit">Apply</button>
                        </form>
                        @if ($msg)
                            <strong class="text-danger">{{ $msg }}</strong>
                        @endif
                    </div>

                    <div class="cart-total-wrap">
                        <h3>Cart Totals</h3>
                        <div class="sub-total">
                            <h4>Subtotal</h4>
                            <span>&#2547;{{ round($sub) }}</span>
                        </div>
                        <!-- Shipping -->
                        {{-- <div class="shipping-option">
                            <span>Shipping</span>
                            <ul>
                                <li class="free">
                                    <input id="Free" type="radio" name="color" value="30" checked>
                                    <label for="Free">Free Shipping</label>
                                </li>
                                <li class="free">
                                    <input id="Local" type="radio" name="color" value="30">
                                    <label for="Local">Local Pickup: <span>$10.00</span></label>
                                </li>
                                <li class="free">
                                    <span>
                                        Shipping options will be updated during checkout.
                                    </span>
                                </li>
                            </ul>
                        </div> --}}
                        <!-- Start Calculate Shipping -->
                        {{-- <div class="calculate-shipping">
                            <h4 class="calculate-shipping-label">Calculate Shipping
                                <i class="fi flaticon-down"></i>
                            </h4>
                            <form action="#" class="calculate-shipping-form">
                                <!-- Country list -->
                                <div class="country-list">
                                    <p class="country-list-label">United Kingdom (UK)</p>
                                    <i class="fi flaticon-down"></i>
                                    <div class="countries-wrapper">
                                        <div class="country-search">
                                            <input type="search" class="form-control" placeholder="Search..">
                                            <button type="submit"><i class="fi flaticon-search"></i></button>
                                        </div>
                                        <ul>
                                            <li>United Arab Emirates</li>
                                            <li>United Kingdom (UK)</li>
                                            <li>Ukraine</li>
                                            <li>United States (US)</li>
                                            <li>Uzbekistan</li>
                                            <li>Virgin Islands (British)</li>
                                            <li>United Arab Emirates</li>
                                            <li>United Kingdom (UK)</li>
                                            <li>Ukraine</li>
                                            <li>United States (US)</li>
                                            <li>Uzbekistan</li>
                                            <li>Virgin Islands (British)</li>
                                        </ul>
                                    </div>
                                </div> <!-- End Country list -->

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="State / County">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Town / City">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Postcode / ZIP">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn theme-btn-s2">Update</button>
                                </div>

                            </form>
                        </div> --}}
                        <!-- End Calculate Shipping -->
                        <div class="total">
                            <h4>Discount</h4>
                            <span>&#2547;{{ round($discount) }}</span>
                        </div>
                        <div class="total">
                            <h4>Total</h4>
                            <span>&#2547;{{ round($sub - $discount) }}</span>
                        </div>
                        @php
                            session([
                                'discount'=> $discount,
                                'sub'=> $sub
                            ])
                        @endphp
                        <a class="theme-btn-s2" href="{{ route('checkout') }}">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-prodact">
            <h2>You May be Interested in…</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
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
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="product.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
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
                                <span>120</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$160.00</span>
                                <del class="old-price">$190.00</del>
                            </div>
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="product.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
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
                                <span>150</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$150.00</span>
                                <del class="old-price">$200.00</del>
                            </div>
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="product.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product-item">
                        <div class="image">
                            <img src="assets/images/interest-product/4.png" alt="">
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
                            <h2><a href="product-single.html">Brown Com Boots</a></h2>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>120</span>
                            </div>
                            <div class="price">
                                <span class="present-price">$120.00</span>
                                <del class="old-price">$150.00</del>
                            </div>
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="product.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->



@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var td = document.getElementsByClassName('cartabc');
    var array = Array.from(td);
    array.map((item)=>{
        item.addEventListener('click', function(e){

            if(e.target.className == 'inc qtybutton'){
                var price = e.target.dataset.price;
                var quantity = e.target.parentElement.firstElementChild.value;
                var sub = price*quantity;
                var aaa = item.nextElementSibling.firstElementChild.innerHTML = sub
            }
            if(e.target.className == 'dec qtybutton'){
                var price = e.target.dataset.price;
                var quantityInput = e.target.parentElement.firstElementChild;
                var quantity = e.target.parentElement.firstElementChild.value;
                if (quantity == 0 || isNaN(quantity)) {
                    // Prevent decreasing quantity below 1 or equal to 0
                    quantityInput.value = 1;
                    quantity = 1;
                    alert("Quantity Can't Be 0")
                }

                var sub = price*quantity;
                var aaa = item.nextElementSibling.firstElementChild.innerHTML = sub
            }
        })
    })
</script>
@endsection
