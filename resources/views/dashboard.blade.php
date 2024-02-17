@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header"><h3>Welcome To Dashboard</h3></div>
        <div class="card-body bg-light">
        <div class="container mt-5">
          <div class="row">

            <div class="col-md-3 p-2">
              <div class="card">
                <a href="{{ route('user.list') }}">
                  <div class="card-body">
                    <h3 class="count-card-title text-center">{{ App\Models\User::all()->count() }}</h3>
                    <h3 class="count-card-text text-center">Total Users</h3>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 p-2">
              <div class="card">
                <a href="{{ route('all.category') }}">
                  <div class="card-body">
                    <h3 class="count-card-title text-center">{{ App\Models\Category::all()->count() }}</h3>
                    <h3 class="count-card-text text-center">Total Category</h3>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-md-3 p-2">
              <div class="card">
              <a href="{{ route('all.sub.category') }}">
                <div class="card-body">
                  <h3 class="count-card-title text-center">{{ App\Models\Subcategory::all()->count() }}</h3>
                  <h3 class="count-card-text text-center">Total Subcategory</h3>
                </div>
              </a>
              </div>
            </div>

            <div class="col-md-3 p-2">
              <div class="card">
                <a href="{{ route('brands') }}">
                  <div class="card-body">
                    <h3 class="count-card-title">{{ App\Models\Brands::all()->count() }}</h3>
                    <h3 class="count-card-text">Total Brands</h3>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-md-3 p-2">
              <div class="card">
                <a href="{{ route('tags') }}">
                  <div class="card-body">
                    <h3 class="count-card-title">{{ App\Models\Tag::all()->count() }}</h3>
                    <h3 class="count-card-text">Total Tags</h3>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 p-2">
              <div class="card">
                <a href="./testimonial/testimonial.php?section=Testimonials">
                  <div class="card-body">
                    <h3 class="count-card-title"></h3>
                    <h3 class="count-card-text">Total Testimonials</h3>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 p-2">
              <div class="card">
                <a href="./messages/allmessages.php?section=All Messages">
                  <div class="card-body">
                    <h3 class="count-card-title"></h3>
                    <h3 class="count-card-text">Total Messagess</h3>
                  </div>
                </a>
              </div>
            </div>

          </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection
