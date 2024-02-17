@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Add New Brand</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Brand Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Choose Logo</label>
                            <input type="file" name="logo" class="form-control" id="">
                            @error('logo')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-block m-auto">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
