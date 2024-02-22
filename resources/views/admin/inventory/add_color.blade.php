@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h3>Color List</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($colors as $sl=>$color)

                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $color->color_name }}</td>
                        <td style="margin-top: 16px; margin-left:20px; background:{{ $color->color_code }} " class="badge badge-danger">{{ $color->color_code }}</td>
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
            @if (session('color_success'))
                <div class="alert alert-success">{{ session('color_success') }}</div>
            @endif
            <div class="card-header"><h3>Add Color</h3></div>
            <div class="card-body">
                <form action="{{ route('color.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Color Name</label>
                        <input type="text" name="color_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choose Color</label>
                        <input type="color" name="color_code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Add Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
