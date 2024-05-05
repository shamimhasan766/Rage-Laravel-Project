@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">All Requests</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Request Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                    @foreach ($cancel_requests as $sl=>$request)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $request->order_id }}</td>
                        <td>{{ $request->created_at->diffForHumans() }}</td>
                        <td>{{ $request->reason }}</td>
                        <td>
                            @if ($request->status == 0)
                                <span class="badge bg-info text-white">Pending</span>
                            @elseif ($request->status == 1)
                                <span class="badge bg-success text-white">Approved</span>
                            @elseif ($request->status == 2)
                                <span class="badge bg-danger text-white">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('update.cancel.requests', $request->id) }}" method="POST">
                            @csrf
                                <button name="status" value="1" class="btn btn-success btn-sm" type="submit">Approve</button>
                                <button name="status" value="2" class="btn btn-danger btn-sm" type="submit">Declined</button>
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
