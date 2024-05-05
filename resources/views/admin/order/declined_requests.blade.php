@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">Order List</div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Order Id</th>
                        <th>declined at</th>
                        <th>Total</th>
                    </tr>
                    @foreach ($orders as $sl=>$order)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->updated_at->format('d-M-y') }}</td>
                            <td>TK {{ $order->Order->total }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
