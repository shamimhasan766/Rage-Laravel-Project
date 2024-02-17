@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">Add Sub Category</div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('store.subcategory') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Select Category</label>
                        <select name="category" class="form-select" id="">
                            <option value="" disabled selected>Select One</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subcatagory Name</label>
                        <input type="text" name="subcategory" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block m-auto">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
