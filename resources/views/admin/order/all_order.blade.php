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
                        <th>Order Date</th>
                        <th>Total</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($orders as $sl=>$order)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->created_at->format('d-M-y') }}</td>
                            <td>{{ ($order->total + $order->charge) - $order->discount. ' TK' }}</td>
                            <td class="text-white">
                                @if ($order->payment_type == 1)
                                    <span class="badge bg-secondary">Cash On Delevery</span>
                                @elseif ($order->payment_type == 2)
                                    <span class="badge bg-primary">SSL</span>
                                @elseif ($order->payment_type == 3)
                                    <span class="badge bg-warning">Stripe</span>
                                @endif
                            </td>
                            <td class="text-white">
                                @if ($order->status == 1)
                                    <span class="badge bg-secondary">Placed</span>
                                @elseif ($order->status == 2)
                                    <span class="badge bg-primary">Proccesing</span>
                                @elseif ($order->status == 3)
                                    <span class="badge bg-warning">shipping</span>
                                @elseif ($order->status == 4)
                                    <span class="badge bg-info">ready to deliver</span>
                                @elseif ($order->status == 5)
                                    <span class="badge bg-success">Delivered</span>
                                @elseif ($order->status == 0)
                                    <span class="badge bg-danger">cancelled</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('status.update', $order->id) }}" method="POST">
                                @csrf
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Change Status
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button name="status" value="1" class="dropdown-item" type="submit">Placed</button>
                                        <button name="status" value="2" class="dropdown-item" type="submit">Proccessing</button>
                                        <button name="status" value="3" class="dropdown-item" type="submit">shipping</button>
                                        <button name="status" value="4" class="dropdown-item" type="submit">ready to deliver</button>
                                        <button name="status" value="5" class="dropdown-item" type="submit">delivered</button>
                                        <button name="status" value="0" class="dropdown-item" type="submit">cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
