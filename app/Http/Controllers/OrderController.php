<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderCancel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function Orders(){
        $orders = Order::where('status','>',0)->latest()->get();
        return view('admin.order.all_order', [
            'orders'=> $orders
        ]);
    }
    function StatusUpdate(Request $request, $id){
       $order = Order::find($id);
       $order->status = $request->status;
       $order->updated_at = Carbon::now();
       $order->save();
       return back();
    }
    function CancelRequests(){
        $cancel_requests = OrderCancel::where('status', 0)->get();
        return view('admin.order.cancel_requests', [
            'cancel_requests'=> $cancel_requests
        ]);
    }
    function UpdateCancelRequests(Request $request, $id){
        $cancelorder = OrderCancel::find($id);
       $cancelorder->status = $request->status;
       $cancelorder->updated_at = Carbon::now();
       $cancelorder->save();
       if($request->status == 1){
        $order = Order::where('order_id', $cancelorder->order_id)->first();
        $order->status = 0;
        $order->updated_at = Carbon::now();
        $order->save();
       }
       return back();
    }
    function CancelledOrder(){
        $cancelledOrders = Order::where('status', 0)->get();
        return view('admin.order.cancelled_order', [
            'orders'=> $cancelledOrders
        ]);
    }
    function DeclinedRequests(){
        $declinedrequests = OrderCancel::where('status', 2)->get();
        return view('admin.order.declined_requests',[
            'orders'=> $declinedrequests
        ]);
    }
}
