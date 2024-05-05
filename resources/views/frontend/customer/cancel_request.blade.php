@extends('frontend.master')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto my-3">
        <div class="card">
            <div class="card-header"><h4>Order Cancel Request</h4></div>
            <div class="card-body">
                <form action="{{ route('cancel.request.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Order Id</label>
                        <input type="text" value="{{ $order_id }}" disabled class="form-control">
                        <input type="text" name="order_id" value="{{ $order_id }}" hidden class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Cancel Reason</label>
                        <textarea name="reason" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
