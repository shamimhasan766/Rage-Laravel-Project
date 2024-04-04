<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function AddToCart(Request $request, $slug){
        $product = Product::where('slug', $slug)->get()->first();

        $AddToCart = new Cart();
        $AddToCart->customer_id = Auth::guard('customer')->user()->id;
        $AddToCart->product_id = $product->id;
        $AddToCart->color_id = $request->color;
        $AddToCart->size_id = $request->size;
        $AddToCart->quantity = $request->quantity;
        $AddToCart->created_at = Carbon::now();
        $AddToCart->save();

        return back()->with('addtocart', 'Cart Added To Cart');
    }
    function CartRemove($id){
        Cart::find($id)->delete();
        return back();

    }
    function Cart(Request $request){
        $coupon = Coupon::where('name', $request->coupon)->first();
        $discount = 0;
        $min_spend = 0;
        $type = '';
        $msg = '';
        if ($request->coupon) {
            if (Coupon::where('name', $request->coupon)->exists()) {
                if(Carbon::now() < $coupon->validity){
                    $discount= $coupon->amount;
                    $min_spend = $coupon->min_spend;
                    $type = $coupon->type;
                }
                else{
                    $discount = 0;
                    $msg = 'Coupon Is Expired';
                }
            }
            else{
                $discount = 0;
                $msg = 'Invalid Coupon Code';
            }
        }

        $carts = Auth::guard('customer')->user()->Cart;

        return view('frontend.cart',[
            'carts'=> $carts,
            'discount'=> $discount,
            'msg'=> $msg,
            'type'=> $type,
            'min_spend'=> $min_spend
        ]);

    }
    function CartUpdate(Request $request){
        foreach($request->quantity as $cart_id =>$quantity){
            $cart = Cart::find($cart_id);
            $cart->quantity = $quantity;
            $cart->save();
        }
        return back();
    }
}
