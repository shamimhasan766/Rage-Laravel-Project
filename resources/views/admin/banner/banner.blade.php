@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3>All Banner</h3></div>
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
                        @foreach ($banners as $sl=>$banner)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $banner->title }}</td>
                            <td><img src="{{ $banner->banner_img }}" alt=""></td>
                            <td>{{ $banner->button_text }}</td>
                            <td><a href="{{ route('banner.status', $banner->id) }}" class="badge badge-{{ $banner->status == 0? 'danger': 'success' }}">{{ $banner->status == 0? 'deactive': 'active' }}</a></td>
                                <td>
                                    <a title="Edit" class="edit btn btn-primary shadow btn-xs sharp"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('banner.delete', $banner->id); }}" title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
