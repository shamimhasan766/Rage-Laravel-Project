@extends('frontend.master')
@section('content')
<!-- start error-404-section -->
<section class="error-404-section mb-4">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="content clearfix">
                    <div class="error">
                        <img src="{{ asset('frontend/images/ordersuccess.webp') }}" alt="">
                    </div>
                    <div class="error-message">
                        <h3>Thanks For Shopping From Us</h3>
                        <p>Your Order Has Been Placed Successfully!!!!</p>
                        <a href="{{ route('index') }}" class="theme-btn">Back to home</a>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end error-404-section -->
@endsection
