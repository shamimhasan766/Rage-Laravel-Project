<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function AllCoupon(){
        $coupons = Coupon::all();
        return view('admin.coupon.all_coupon', [
            'coupons'=> $coupons
        ]);
    }
    function AddCoupon(){
        return view('admin.coupon.add_coupon');
    }
    function StoreCoupon(Request $request){
        $request->validate([
            'name'=> ['required', 'regex:/^[^\s]+$/'],
            'type'=> 'required',
            'amount'=> 'required|numeric',
            'validity'=> 'required|date',
        ], [
            'name.regex' => 'Coupon cannot contain spaces.',
            'name.required'=> 'Name Field Is Required'
        ]);

        Coupon::insert([
            'name'=>$request->name,
            'type'=> $request->type,
            'amount'=> $request->amount,
            'validity'=> $request->validity,
            'min_spend'=> $request->min_spend,
            'created_at'=> Carbon::now()
        ]);
        return back()->withSuccess('New Coupon Added');
    }
}
