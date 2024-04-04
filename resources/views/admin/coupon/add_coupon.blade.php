@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-header"><h3>Add Coupon</h3></div>
            <div class="card-body">
                <form action="{{ route('store.coupon') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Coupon Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        <strong class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</strong>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Coupon Type</label>
                        <select name="type" class="form-select" id="">
                            <option selected disabled>Select One</option>
                            <option value="0">Percentage %</option>
                            <option value="1">Amount</option>
                        </select>
                        <strong class="text-danger">{{ $errors->has('type') ? $errors->first('type') : '' }}</strong>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control">
                        <strong class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</strong>
                    </div>
                    <div class="mb-3">
                        <label for="validity" class="form-label">Validity</label>
                        <input type="date" class="form-control" name="validity">
                        <strong class="text-danger">{{ $errors->has('validity') ? $errors->first('validity') : '' }}</strong>
                    </div>
                    <div class="mb-3">
                        <label for="min_spend" class="form-label">Min Spend</label>
                        <input placeholder="optional" type="number" class="form-control" name="min_spend">
                        <strong class="text-danger">{{ $errors->has('min_spend') ? $errors->first('min_spend') : '' }}</strong>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
