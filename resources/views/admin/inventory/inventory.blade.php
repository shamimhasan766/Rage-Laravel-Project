@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <div class="card-header"><h3>Inventory List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>After Discount</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($inventories as $inventory)

                    <tr>
                        <td>{{ $inventory->Color == null ? "NA": $inventory->Color->color_name }}</td>
                        <td>{{ $inventory->Size == null ? "NA" : $inventory->Size->size_name }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>{{ $inventory->price }}</td>
                        <td>{{ $inventory->after_discount }}</td>
                        <td>
                            <a href="{{ route('delete.inventory', $inventory->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-header"><h3>Add Inventory</h3></div>
            <div class="card-body">
                <form action="{{ route('inventory.store', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" disabled value="{{ $product->product_name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Select Color</label>
                        <select name="color_id">
                            <option value="">Select Color</option>
                            @foreach ($colors as $color)

                            <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                            @endforeach
                        </select>
                        <p><a class="text-success m-2" target="blank" href="{{ route('add.color') }}">not getting your color?</a></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Select Size</label>
                        <select name="size_id">
                            <option value="" >Select Size</option>
                            @foreach ($sizes as $size)

                            <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                            @endforeach
                        </select>
                        <p><a class="text-success m-2" target="blank" href="{{ route('size') }}">not getting your size?</a></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
