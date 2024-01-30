@extends('layouts.layout')

@section('content')
    <div class="row">
       <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Edit Profile Information</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('updateprofile')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="name" value="{{Auth::user()->name}}" name="name" class="form-control" id="">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
       </div>

       <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Edit Password</div>
                <div class="card-body">
                    @if (session('pass_success'))
                        <div class="alert alert-success">{{session('pass_success')}}</div>
                    @endif
                    <form action="{{route('update.password')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" value="{{old('currentpass')}}" name="currentpass" class="form-control" id="">
                        @error('currentpass')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        @if (session('match'))
                            <strong class="text-danger">{{session('match')}}</strong>
                        @endif
                        </div>
                        <div class="mb-3 pass">
                        <label class="form-label">New Password</label>
                        <input type="password" value="" name="password" class="form-control" class="password" id="password">
                        <i class="fas fa-eye"></i>
                        @error('password')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <div class="mb-3 pass">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" value="" name="password_confirmation" class="form-control" id="confirmPass">
                        @error('password_confirmation')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
       </div>

       <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Update Profile Photo</div>
                <div class="card-body">
                    @if (session('photo_success'))
                        <div class="alert alert-success">{{session('photo_success')}}</div>
                    @endif
                    <form action="{{route('update.photo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 pass">

                        @if (Auth::user()->photo == null)
                            <img height="200" id="blah" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="">
                        @else
                            <img src="{{ asset(Auth::user()->photo) }}" height="200" id="blah" alt="">
                        @endif

                        </div>

                        <div class="mb-3 pass">
                        <label class="form-label">Choose Image</label>
                        <input type="file" value="" name="image" class="form-control" id="confirmPass" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        @error('image')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
       </div>
    </div>
@endsection

<style>
    .pass{
        position: relative;
    }
    .pass i {
    cursor: pointer;
    position: absolute;
    top: 40px;
    right: 10px;
    }
</style>

@section('script')
$('.pass i').click(function () {
    var PassInput = $('#password');
    var ConfirmInput = $('#confirmPass');

    // Check the current type and toggle it
    if (PassInput.attr('type') === 'password') {
        PassInput.attr('type', 'text');
        ConfirmInput.attr('type', 'text');
    } else {
        PassInput.attr('type', 'password');
        ConfirmInput.attr('type', 'password');
    }
});
@endsection
