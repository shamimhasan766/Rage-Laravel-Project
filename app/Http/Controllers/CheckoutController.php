<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    function Checkout(){
        $customer = Auth::guard('customer')->user();
        $charges = Charge::all();
        return view('frontend.checkout', [
            'carts'=> $customer->Cart,
            'charges'=> $charges
        ]);
    }
}
