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
                    <li><a href="product.html">Product</a></li>
                    <li>Product Single</li>
                </ol>
            </div>
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- product-single-section  start-->
<div class="product-single-section section-padding">
<div class="container">
    <div class="product-details">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="product-single-img">
                    <div class="product-active owl-carousel">
                        @foreach ($product->Gallery as $gallery)
                        <div class="item">
                            <img src="{{ asset($gallery->gallery_path) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="product-thumbnil-active  owl-carousel">
                        @foreach ($product->Gallery as $gallery)
                        <div class="item">
                            <img src="{{ asset($gallery->gallery_path) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-single-content">
                    <h2 class="text-start">{{ $product->product_name }}</h2>
                    <div class="price">
                        @if ($product->discount)
                            <span class="present-price">&#2547;{{ $product->Inventory->first()->after_discount }}</span>
                            <del class="old-price">&#2547;{{ $product->Inventory->first()->price }}</del>
                            @else
                            <span class="present-price">&#2547;{{ $product->Inventory->first()->after_discount }}</span>
                        @endif
                    </div>
                    <div class="rating-product">
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <i class="fi flaticon-star"></i>
                        <span>120</span>
                    </div>
                    <p>{{$product->short_desc}}
                    </p>
                    <div class="product-filter-item color">
                        <div class="color-name">
                            <span>Color :</span>
                            <ul>
                                @foreach ($avaiable_colors as $color)
                                @if ($color->color_id == null)
                                <li class="color1"><input checked id="color" type="radio" name="color" value="">
                                    <label for="color">NA</label>
                                </li>
                                @else
                                <li class="color1"><input class="color_id" id="color{{ $color->color_id }}" type="radio" name="color" value="{{ $color->color_id }}">
                                    <label style="background: {{ $color->Color->color_code }}" for="color{{ $color->color_id }}"></label>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="product-filter-item color filter-size">
                        <div class="color-name">
                            <span>Sizes:</span>
                            <ul class="size_item">
                                @foreach ($avaiable_sizes as $size)
                                @if ($size->size_id == null)

                                <li class="color"><input id="size" type="radio" name="size" value="">
                                    <label for="size">NA</label>
                                </li>
                                @else
                                <li class="color"><input id="size{{ $size->size_id }}" type="radio" name="size" value="{{ $size->size_id }}">
                                    <label for="size{{ $size->size_id }}">{{ $size->Size->size_name }}</label>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="pro-single-btn">
                        <div class="quantity cart-plus-minus">
                            <input class="text-value" type="text" value="1">
                        </div>
                        <a href="#" class="theme-btn-s2">Add to cart</a>
                        <a href="#" class="wl-btn"><i class="fi flaticon-heart"></i></a>
                    </div>
                    <ul class="important-text">
                        <li><span>SKU: </span>{{ $product->sku }}</li>
                        <li><span>Categories: </span>{{ $product->Category->name }}</li>
                        <li><span>Tags: </span>
                        @foreach ($product->Tags as $tag)
                            <a href="{{ route('tag.product', $tag->id) }}" class="text-black">#{{ $tag->tag_name }}</a>
                        @endforeach
                        </li>
                        <li><span>Stock:</span>{{ $product->Inventory->first()->quantity }} Items In Stock</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tab-area">
        <ul class="nav nav-mb-3 main-tab" id="tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="descripton-tab" data-bs-toggle="pill"
                    data-bs-target="#descripton" type="button" role="tab" aria-controls="descripton"
                    aria-selected="true">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Ratings-tab" data-bs-toggle="pill" data-bs-target="#Ratings"
                    type="button" role="tab" aria-controls="Ratings" aria-selected="false">Reviews
                    (3)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Information-tab" data-bs-toggle="pill"
                    data-bs-target="#Information" type="button" role="tab" aria-controls="Information"
                    aria-selected="false">Additional info</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="descripton" role="tabpanel"
                aria-labelledby="descripton-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="Descriptions-item">
                                {!! $product->long_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Ratings" role="tabpanel" aria-labelledby="Ratings-tab">
                <div class="container">
                    <div class="rating-section">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="comments-area">
                                    <div class="comments-section">
                                        <h3 class="comments-title">3 reviews for Stylish Pink Coat</h3>
                                        <ol class="comments">
                                            <li class="comment even thread-even depth-1" id="comment-1">
                                                <div id="div-comment-1">
                                                    <div class="comment-theme">
                                                        <div class="comment-image"><img
                                                                src="assets/images/blog-details/comments-author/img-1.jpg"
                                                                alt></div>
                                                    </div>
                                                    <div class="comment-main-area">
                                                        <div class="comment-wrapper">
                                                            <div class="comments-meta">
                                                                <h4>Lily Zener</h4>
                                                                <span class="comments-date">December 25, 2022 at 5:30 am</span>
                                                                <div class="rating-product">
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="comment-area">
                                                                <p>Turpis nulla proin donec a ridiculus. Mi suspendisse faucibus sed lacus. Vitae risus eu nullam sed quam.
                                                                     Eget aenean id augue pellentesque turpis magna egestas arcu sed.
                                                                    Aliquam non faucibus massa adipiscing nibh sit. Turpis integer aliquam aliquam aliquam.
                                                                    <a class="comment-reply-link"
                                                                            href="#"><span>Reply...</span></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div>
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img
                                                                        src="assets/images/blog-details/comments-author/img-2.jpg"
                                                                        alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>Leslie Alexander</h4>
                                                                        <div class="rating-product">
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                        </div>
                                                                        <span class="comments-date">December 26, 2022 at 5:30 am</span>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>Turpis nulla proin donec a ridiculus. Mi suspendisse faucibus sed lacus. Vitae risus eu nullam sed quam.
                                                                            Eget aenean id augue pellentesque turpis magna egestas arcu sed.
                                                                           Aliquam non faucibus massa adipiscing nibh sit. Turpis integer aliquam aliquam aliquam.
                                                                           <a class="comment-reply-link"
                                                                                   href="#"><span>Reply...</span></a>
                                                                       </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="comment">
                                                <div>
                                                    <div class="comment-theme">
                                                        <div class="comment-image"><img
                                                                src="assets/images/blog-details/comments-author/img-1.jpg"
                                                                alt></div>
                                                    </div>
                                                    <div class="comment-main-area">
                                                        <div class="comment-wrapper">
                                                            <div class="comments-meta">
                                                                <h4>Jenny Wilson</h4>
                                                                <div class="rating-product">
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                    <i class="fi flaticon-star"></i>
                                                                </div>
                                                                <span class="comments-date">December 30, 2022 at 3:12 pm</span>
                                                            </div>
                                                            <div class="comment-area">
                                                                <p>Turpis nulla proin donec a ridiculus. Mi suspendisse faucibus sed lacus. Vitae risus eu nullam sed quam.
                                                                    Eget aenean id augue pellentesque turpis magna egestas arcu sed.
                                                                   Aliquam non faucibus massa adipiscing nibh sit. Turpis integer aliquam aliquam aliquam.
                                                                   <a class="comment-reply-link"
                                                                           href="#"><span>Reply...</span></a>
                                                               </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div> <!-- end comments-section -->
                                    <div class="col col-lg-10 col-12 review-form-wrapper">
                                        <div class="review-form">
                                            <h4>Add a review</h4>
                                            <form>
                                                <div class="give-rat-sec">
                                                    <div class="give-rating">
                                                        <label>
                                                            <input type="radio" name="stars" value="1">
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="2">
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="3">
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="4">
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="5">
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                            <span class="icon">★</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <textarea class="form-control"
                                                        placeholder="Write Comment..."></textarea>
                                                </div>
                                                <div class="name-input">
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        required>
                                                </div>
                                                <div class="name-email">
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        required>
                                                </div>
                                                <div class="rating-wrapper">
                                                    <div class="submit">
                                                        <button type="submit" class="theme-btn-s2">Post
                                                            review</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end comments-area -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Information" role="tabpanel" aria-labelledby="Information-tab">
                <div class="container">
                    <div class="Additional-wrap">
                        <div class="row">
                            <div class="col-12">
                                {!! $product->additional_info !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-product">
</div>
</div>
<!-- product-single-section  end-->
@endsection

@section('script')
    <script>
        $('.color_id').on('click', function(){
            let color_id = $(this).val();
            let product_id = '{{ $product->id }}'

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('get.size') }}',
                type: 'POST',
                data: {'color_id': color_id, 'product_id': product_id},
                success:function(data){
                    $('.size_item').html(data);
                }
            })
        })
    </script>
@endsection
