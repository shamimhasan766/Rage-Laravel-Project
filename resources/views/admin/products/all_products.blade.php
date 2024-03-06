@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center"><h3 class="d-block m-auto">All Products</h3></div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table-responsive table text-wrap">
                    <tr>
                        <th>SL</th>
                        <th>SKU</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th>Discount</th>
                        <th>Short Description</th>
                        {{-- <th>Tags</th> --}}
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($products as $sl=>$product)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $product->sku }}</td>
                        <td class="text-wrap">{{ $product->product_name }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->subcategory_id }}</td>
                        <td>{{ $product->brand_id }}</td>
                        <td>{{ $product->discount }}%</td>
                        <td class="text-wrap">{{ $product->short_desc }}</td>
                        {{-- <td>
                            @php
                                $tags = explode(',', $product->tags);
                            @endphp
                            @foreach ($tags as $tag)
                                <span class="badge badge-sm badge-primary">{{ App\Models\Tag::find($tag)->tag_name }}</span>
                            @endforeach
                        </td> --}}
                        <td><img src="{{ $product->preview_img }}" alt=""></td>
                        <td>
                            <a href="{{ route('product.status', $product->id) }}" class="badge badge-{{ $product->status == 0? 'danger': 'success' }}">{{ $product->status == 0? 'deactive': 'active' }}</a>
                        </td>
                        <td>
                            <div class="dropdown">
                                <i style="cursor: pointer; font-size: 30px;" class="fas fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"></i>

                                <ul style="background: #f2f2f2f2; border-radius: 10px;" class="dropdown-menu">
                                  <li><a style="font-size: 20px;" class="dropdown-item" href="{{ route('edit.product', $product->id) }}">Edit</a></li>
                                  <li><a style="font-size: 20px;" class="dropdown-item" href="{{ route('view.product',$product->id) }}">View</a></li>
                                  <li><a style="font-size: 20px;" class="dropdown-item" href="{{ route('inventory',$product->id) }}">Inventory</a></li>
                                  <li><a style="font-size: 20px;" class="dropdown-item" href="{{ route('delete.product', $product->id) }}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
