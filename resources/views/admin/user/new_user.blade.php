@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-header"><h4>Add New User</h4></div>
                <div class="card-body">
                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" value="{{ old('username') }}" name="username" class="form-control">
                            <strong class="text-danger">{{ $errors->first('username') ?? '' }}</strong>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" class="form-control">
                            <strong class="text-danger">{{ $errors->first('email') ?? '' }}</strong>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input value="{{ old('password') }}" type="text" name="password" class="form-control">
                            <strong class="text-danger">{{ $errors->first('email') ?? '' }}</strong>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
