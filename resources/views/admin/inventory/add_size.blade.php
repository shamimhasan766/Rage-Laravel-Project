@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h3>Size List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Size Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sizes as $sl=>$size)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $size->size_name }}</td>
                        <td>
                            <a class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-auto">
            @if (session('size_success'))
                <div class="alert alert-success">{{ session('size_success') }}</div>
            @endif
            <div class="card-header"><h3>Add Size</h3></div>
            <div class="card-body">
                <form action="{{ route('size.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Size Name</label>
                        <input type="text" name="size_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Add Size</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
