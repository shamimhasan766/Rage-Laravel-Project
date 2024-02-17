@extends('layouts.layout')

@section('content')
    <div class="row">


        <div class="col-lg-6 m-auto">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header"><h4>Add Category</h4></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Category Name">
                            @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category Photo</label>
                            <input type="file" name="photo" class="form-control" placeholder="">
                            @error('photo')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>


    </script>

@endsection
