@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-10 m-auto">
        @if (session('delete'))
        <div class="alert alert-success">{{ session('delete') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Coupons List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Validity</th>
                            <th>Min Spend</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $sl=>$coupon)

                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->type }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>
                                @if (Carbon\Carbon::now() > $coupon->validity)
                                    <span class="badge badge-warning">Expired {{ Carbon\Carbon::now()->diffInDays($coupon->validity)}} Days Ago</span>
                                    @else
                                    <span class="badge badge-success">{{ Carbon\Carbon::now()->diffInDays($coupon->validity)}} Days Remaining</span>
                                @endif
                            </td>
                            <td>{{ $coupon->min_spend }}</td>
                            <td>{{ $coupon->created_at }}</td>
                            <td>
                                <a title="Edit" href="" class="edit btn btn-primary btn-icon"><i class="fa fa-edit"></i></a>
                                <a title="Delete" href="" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
