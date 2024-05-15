@extends('frontend.master')
@section('content')
<section class="wpo-page-title">
    <h2 class="d-none">Hide</h2>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li>Checkout</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->
@if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif
<!-- wpo-checkout-area start-->
<div class="wpo-checkout-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-page-title">
                    <h2>Your Checkout</h2>
                    <p>There are 4 products in this list</p>
                </div>
            </div>
        </div>
        <div class="checkout-wrap">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="caupon-wrap s3">
                        <div class="biling-item">
                                <form method="POST" action="{{ route('add.address') }}">
                                    @csrf
                                <div class="coupon coupon-3">
                                    <h2>Billing Address</h2>
                                </div>
                                @if ($billingaddress)
                                    <div style="border: 1px green solid; padding: 10px; color: black; ">
                                        <p style="color: black; font-weight: 600; margin: 0;">
                                        {{ $billingaddress->address }} , <br>
                                        {{ $billingaddress->City->name }} ,</br>
                                        {{ $billingaddress->Country->name }}</p>
                                    </div>
                                @endif
                                <div class="biling-item-3">
                                    <input id="togglebilling" type="checkbox">
                                    <label class="fontsize" for="togglebilling">{{ $billingaddress ? 'Edit Address': 'Add a billing Address?' }}</label>
                                    <div class="billing-adress" id="openbilling">
                                        <div class="contact-form form-style">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <input type="text" value="{{ $billingaddress->first_name ?? Auth::guard('customer')->user()->name }}" placeholder="Name*"
                                                        name="bill_name">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <select name="bill_country_id" style="width: 100%;" class="form-control bill_country">
                                                        <option disabled="" selected="">Country*</option>
                                                        @if ($billingaddress)

                                                        @foreach ($countries as $country)
                                                        <option {{ $billingaddress->country_id == $country->id ? 'selected': '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach

                                                        @else

                                                        @foreach ($countries as $country)
                                                        <option {{ Auth::guard('customer')->user()->country_id == $country->id ? 'selected': '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach

                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <select name="bill_city_id" style="width: 100%;" class="form-control bill_city">
                                                        @if ($billingaddress)
                                                        <option value="{{ $billingaddress->city_id }}" selected>{{ $billingaddress->City->name }}</option>
                                                        @else
                                                        @php
                                                        if (Auth::guard('customer')->user()->city_id){
                                                            echo '<option selected value='. Auth::guard("customer")->user()->City->id.'>'.Auth::guard("customer")->user()->City->name.'</option>';
                                                        }
                                                        else{
                                                            echo '<option disabled="" selected="">City</option>';
                                                        }
                                                        @endphp
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" value="{{ $billingaddress->zip ?? Auth::guard('customer')->user()->zip }}" placeholder="Postcode / ZIP*"
                                                        name="bill_zip">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" placeholder="Company Name*" value="{{ $billingaddress->company ?? '' }}" id="Company"
                                                        name="bill_Company">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" value="{{ $billingaddress->email ?? Auth::guard('customer')->user()->email }}" placeholder="Email Address*" id="email4"
                                                        name="bill_email">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" value="{{ $billingaddress->phone ?? Auth::guard('customer')->user()->phone }}" placeholder="Phone*" id="email2"
                                                        name="bill_phone">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                <input type="text" value="{{ $billingaddress->address ?? Auth::guard('customer')->user()->address }}" placeholder="Address*" id="Adress"
                                                        name="bill_Adress">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="note-area">
                                                        <textarea name="bill_massage"
                                                            placeholder="Additional Information">{{ $billingaddress->additional_info ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <button name="btn" value="{{ $billingaddress ? 'update_billing' : 'billing' }}" type="submit" class="btn btn-{{ $billingaddress ? 'success': 'primary' }}">{{ $billingaddress ? 'Update Billing Address': 'Add Billing Address' }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="coupon coupon-3">
                                    <h2 style="color: green;">Ship to a Different Address?</h2>
                                </div>
                                @if ($shippingaddress)
                                <ul class="mb-3">

                                    @foreach ($shippingaddress as $item)
                                    <li>
                                        <input class="shipping_id" id="shipping{{ $loop->iteration }}" value="{{ $item->id }}" type="radio" name="shipping_id">
                                        <label class="text-danger" style="margin-left: 5px" for="shipping{{ $loop->iteration }}">{{ $item->address }}</label>
                                        <a href="{{ route('delete.shipping.address', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fa fa-trash ml-5"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                                <div class="biling-item-3">
                                    <input id="toggle4" type="checkbox">
                                    <label class="fontsize" for="toggle4">Add a shipping address</label>
                                    <div class="billing-adress" id="open4">
                                        <div class="contact-form form-style">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <input type="text" placeholder="Full Name*" id="fname6"
                                                        name="ship_name">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <select class="ship_country" name="ship_country" id="Country2" class="form-control">
                                                        <option disabled="" selected="">Country*</option>
                                                        @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <select name="ship_city" class="ship_city" id="">
                                                        <option disabled="" selected="">City*</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" placeholder="Postcode / ZIP*" id="Post1"
                                                        name="ship_zip">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" placeholder="Company Name*" id="Company1"
                                                        name="ship_Company">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" placeholder="Email Address*" id="email5"
                                                        name="ship_email">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <input type="text" placeholder="Phone*" id="phone1"
                                                        name="ship_phone">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <input type="text" placeholder="Address*" id="Adress1"
                                                        name="ship_Adress">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="note-area">
                                                        <textarea name="ship_massage"
                                                            placeholder="Additional Information"></textarea>
                                                    </div>
                                                </div>
                                                <div class="my-3">
                                                    <button name="btn" value="shipping" type="submit" class="btn btn-primary">Add Shipping Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <form action="{{ route('store.order') }}" method="POST">
                                @csrf
                            <div class="cout-order-area">
                                <h3>Your Order</h3>
                                <div class="oreder-item">
                                    <div class="title">
                                        <h2>Products <span>Subtotal</span></h2>
                                    </div>
                                    @foreach ($carts as $cart)

                                    <div class="oreder-product">
                                        <div class="images">
                                            <span>
                                                <img src="{{ asset($cart->Product->preview_img) }}" alt="">
                                            </span>
                                        </div>
                                        <div class="product">
                                            <ul>
                                                <li class="first-cart">{{ Str::substr($cart->Product->product_name, 0, 25) }} (x{{ $cart->quantity }})</li>
                                                <li>
                                                    <div class="rating-product">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <span>15</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <span>&#2547;{{ $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->after_discount }}</span>
                                    </div>
                                    @endforeach
                                    <!-- Shipping -->
                                    <div class="mt-3 mb-3">
                                        <div class="title border-0">
                                            <h2>Delivery Charge</h2>
                                        </div>
                                        <ul>
                                            @foreach ($charges as $charge)
                                                <li class="free">
                                                    <input data-id="{{ $charge->id }}" class="charge" id="charge{{ $loop->iteration }}" type="radio" name="selected_charge">
                                                    <label for="charge{{ $loop->iteration }}">{{ $charge->location }}: <span>&#2547;{{ $charge->charge }}</span></label>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="title s2 discount">
                                        <h2>Discount<span>&#2547; {{ session('discount') }}</span></h2>
                                    </div>
                                    <hr>
                                    <div class="title s2">
                                        <h2>Total <span>&#2547; <span id="total">{{ round(session('sub') - session('discount')) }}</span></span></h2>
                                    </div>
                                </div>
                            </div>
                            @error('selected_charge')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div class="caupon-wrap s5">
                                <div class="payment-area">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="payment-option" id="open5">
                                                <h3>Payment</h3>
                                                <div class="payment-select">
                                                    <ul>
                                                        <li class="">
                                                            <input id="remove" type="radio" name="payment"
                                                                value="1">
                                                            <label for="remove">Cash on Delivery</label>
                                                        </li>
                                                        <li class="">
                                                            <input id="add" type="radio" name="payment" checked="checked" value="2">
                                                            <label for="add">Pay With SSLCOMMERZ</label>
                                                        </li>
                                                        <li class="">
                                                            <input id="getway" type="radio" name="payment"
                                                                value="3">
                                                            <label for="getway">Pay With STRIPE</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div id="open6" class="payment-name active">
                                                    <div class="contact-form form-style">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-12">
                                                                <div class="submit-btn-area text-center">
                                                                    <button id="order_btn" class="theme-btn" type="submit">Place
                                                                        Order</button>
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
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.charge').on('click', function(){
            var charge_id = $(this).data('id');
            var discount = '{{ session("discount") }}';
            var sub = '{{ session("sub") }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('get.charge')}}',
                type: 'POST',
                data: {'charge_id': charge_id, 'sub': sub, 'discount': discount},
                success:function(data){
                    $('#total').html(data)
                }
            });
        })
        $('.shipping_id').on('click', function() {
            var shipping_id = $('input[name="shipping_id"]:checked').val();
            var shippingElement = $('<input>', {
                type: 'hidden', // or 'text', 'checkbox', etc., depending on your needs
                name: 'shipping_id', // replace 'your_input_name' with the desired name
                value: shipping_id // replace 'your_input_value' with the desired value
            });

            $('.discount').append(shippingElement);
        });
        $('#order_btn').on('click', function(){
            $('.charge').each(function() {
                // Get the value of the 'data-id' attribute for this charge
                let chargeId = $(this).data('id');
                // Set the value attribute for this charge input element to its 'data-id' value
                $(this).val(chargeId);
            });
            // Create the input element
            var discountElement = $('<input>', {
                type: 'hidden', // or 'text', 'checkbox', etc., depending on your needs
                name: 'discount', // replace 'your_input_name' with the desired name
                value: '{{ session("discount") }}' // replace 'your_input_value' with the desired value
            });
            var subElement = $('<input>', {
                type: 'hidden', // or 'text', 'checkbox', etc., depending on your needs
                name: 'sub', // replace 'your_input_name' with the desired name
                value: '{{ session("sub") }}' // replace 'your_input_value' with the desired value
            });


            // Add the input element to the element with the class 'discount'
            $('.discount').append(discountElement);
            $('.discount').append(subElement);
        })

        $('.bill_country').on('change', function(){
            var country_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('customer.get.city')}}',
                type: 'POST',
                data: {'country_id': country_id},
                success:function(data){
                    $('.bill_city').html(data)
                    $('.bill_city').select2();
                }
            });
        })
        $('.ship_country').on('change', function(){
            var country_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('customer.get.city')}}',
                type: 'POST',
                data: {'country_id': country_id},
                success:function(data){
                    $('.ship_city').html(data)
                    $('.ship_city').select2();
                }
            });
        })





        $(document).ready(function() {
            $('.bill_country').select2();
        });
    </script>
@endsection
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
