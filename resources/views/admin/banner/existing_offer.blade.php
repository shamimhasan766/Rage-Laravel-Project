@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3>All Existing Offer</h3></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Banner</th>
                            <th>Button Text</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-header">Add Banner</div>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Your Banner Title">
                            <strong class="text-danger">{{ $errors->first('title') ?? '' }}</strong>
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label">Banner</label>
                            <input type="file" name="banner" class="form-control">
                            <strong class="text-danger">{{ $errors->first('banner') ?? '' }}</strong>
                        </div>
                        <div class="mb-3">
                            <label for="button" class="form-label">Button Text</label>
                            <input type="text" name="button" class="form-control" placeholder="Optional">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
