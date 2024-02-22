@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h3>Product Details</h3></div>
                <div class="card-body">
                    <table class="table table-borderd text-wrap">
                        <tr class="mb-2">
                            <th>Product Name</th>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Product Code (SKU)</th>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Slug</th>
                            <td>{{ $product->slug }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Category</th>
                            <td>{{ $product->Category->name }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Subcategory</th>
                            <td>{{ $product->Subcategory->subcategory }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Brand</th>
                            <td>{{ $product->Brand->name }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Discount</th>
                            <td>{{ $product->discount ."%" }}</td>
                        </tr>
                        <tr class="mb-2 text-wrap">
                            <th class="text-wrap">Short Description</th>
                            <td class="text-wrap">{{ $product->short_desc }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Long Description</th>
                            <td class="text-wrap">{!! $product->long_desc !!}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Additional Information</th>
                            <td class="text-wrap">{!! $product->additional_info !!}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Tags</th>
                            <td>
                                @php
                                    $tags = explode(',', $product->tags);
                                @endphp
                                @foreach ($tags as $tag)
                                    <span class="badge badge-sm badge-primary">{{ App\Models\Tag::find($tag)->tag_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr class="mb-2">
                            <th>Preview Image</th>
                            <td><img src="../../{{ $product->preview_img }}" alt=""></td>
                        </tr>
                        <tr class="mb-2">
                            <th>Gallery Images</th>
                            <td>
                                @foreach ($galleries as $gallery)
                                    <img src="../../{{ $gallery->gallery_path }}" alt="">
                                @endforeach
                            </td>
                        </tr>
                        <tr class="mb-2">
                            <th>Created At</th>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                        <tr class="mb-2">
                            <th>Updated At</th>
                            <td>{{ $product->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
