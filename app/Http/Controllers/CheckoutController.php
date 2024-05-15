<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\Charge;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShippingAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function Checkout(){
        $customer = Auth::guard('customer')->user();
        $charges = Charge::all();
        $countries = Country::all();
        $billingaddress = BillingAddress::where('customer_id', Auth::guard('customer')->id())->get()->first();
        $shippingaddress = ShippingAddress::where('customer_id', Auth::guard('customer')->id())->get();

        return view('frontend.checkout', [
            'carts'=> $customer->Cart,
            'charges'=> $charges,
            'countries'=> $countries,
            'billingaddress'=> $billingaddress,
            'shippingaddress'=> $shippingaddress,
        ]);
    }
    function AddAddress(Request $request){
        if($request->btn == 'billing'){
            BillingAddress::insert([
                'customer_id'=> Auth::guard('customer')->id(),
                'first_name'=> $request->bill_name,
                'country_id'=> $request->bill_country_id,
                'city_id'=> $request->bill_city_id,
                'zip'=> $request->bill_zip,
                'company'=> $request->bill_Company,
                'email'=> $request->bill_email,
                'phone'=> $request->bill_phone,
                'address'=> $request->bill_Adress,
                'additional_info'=> $request->bill_massage,
                'created_at'=> Carbon::now()
            ]);
            return back()->withSuccess('Billing Address Added');
        }
        if($request->btn == 'shipping'){
            ShippingAddress::insert([
                'customer_id'=> Auth::guard('customer')->id(),
                'first_name'=> $request->ship_name,
                'country_id'=> $request->ship_country,
                'city_id'=> $request->ship_city,
                'zip'=> $request->ship_zip,
                'company'=> $request->ship_Company,
                'email'=> $request->ship_email,
                'phone'=> $request->ship_phone,
                'address'=> $request->ship_Adress,
                'additional_info'=> $request->ship_massage,
                'created_at'=> Carbon::now()
            ]);
            return back()->withSuccess('Shipping Address Added');
        }
        if($request->btn == 'update_billing'){
            $BillingAddress = Auth::guard('customer')->user()->BillingAddress;
            $BillingAddress->first_name = $request->bill_name;
            $BillingAddress->country_id = $request->bill_country_id;
            $BillingAddress->city_id = $request->bill_city_id;
            $BillingAddress->zip = $request->bill_zip;
            $BillingAddress->company = $request->bill_Company;
            $BillingAddress->email = $request->bill_email;
            $BillingAddress->phone = $request->bill_phone;
            $BillingAddress->address = $request->bill_Adress;
            $BillingAddress->additional_info = $request->bill_massage;
            $BillingAddress->save();

            return back()->withSuccess('Billing Address Updated');
        }


    }
    function DeleteShippingAddress($id){
        ShippingAddress::find($id)->delete();
        return back()->withSuccess('Shipping Address Deleted');
    }
    function StoreOrder(Request $request){
        $request->validate([
            'selected_charge'=> 'required'
        ],
        [
            'selected_charge.required'=> 'please select delevery charge'
        ]);
        if($request->payment == 1){

            $billingaddress = BillingAddress::where('customer_id', Auth::guard('customer')->id())->get()->first();
            $order_id = '1010'. random_int(000000, 999999);
            $charge = Charge::find($request->selected_charge);
            Order::insert([
                'order_id'=> $order_id,
                'customer_id'=> Auth::guard('customer')->id(),
                'total'=> $request->sub,
                'discount'=> $request->discount,
                'charge'=> $charge->charge,
                'billing_id'=> $billingaddress->id,
                'shipping_id'=> $request->shipping_id,
                'payment_type'=> $request->payment,
                'created_at'=> Carbon::now(),
            ]);

            $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
            foreach($carts as $cart){
                $InventoryItem = $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first();
                OrderProduct::insert([
                    'order_id'=> $order_id,
                    'customer_id'=> Auth::guard('customer')->id(),
                    'product_id'=> $cart->product_id,
                    'color_id'=> $cart->color_id,
                    'size_id'=> $cart->size_id,
                    'quantity'=> $cart->quantity,
                    'price'=> $InventoryItem->after_discount,
                    'created_at'=> Carbon::now()
                ]);
                $InventoryItem->decrement('quantity', $cart->quantity);
                $cart->delete();
            }

            // Sending Invoice Mail

            Mail::to($billingaddress->email)->send(new InvoiceMail($order_id));


            // SMS
            // $url = "http://bulksmsbd.net/api/smsapi";
            // $api_key = "x6nwYLhKPEvYcIRwzCeL";
            // $senderid = "8809617618226";
            // $number = $billingaddress->phone;
            // $message = "Your Ecommerce Order has been placed. Order Id : #$order_id . You will get your parcel soon... please keep your total payment amount TK ".($request->sub - $request->discount)+ $charge->charge ."--/";

            // $data = [
            //     "api_key" => $api_key,
            //     "senderid" => $senderid,
            //     "number" => $number,
            //     "message" => $message
            // ];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // $response = curl_exec($ch);
            // curl_close($ch);

            return redirect()->route('order.success');
        }
        elseif($request->payment == 2){
            $billingaddress = BillingAddress::where('customer_id', Auth::guard('customer')->id())->get()->first();
            $charge = Charge::find($request->selected_charge);
            $data = [
                'customer_id'=> Auth::guard('customer')->id(),
                'total'=> $request->sub,
                'discount'=> $request->discount,
                'charge'=> $charge->charge,
                'shipping_id'=> $charge->shipping_id,
                'billing_id'=> $billingaddress->id,
            ];
            return redirect('/pay')->with('data', $data);
        }
        elseif($request->payment == 3){
            $billingaddress = BillingAddress::where('customer_id', Auth::guard('customer')->id())->get()->first();
            $charge = Charge::find($request->selected_charge);
            $data = [
                'customer_id'=> Auth::guard('customer')->id(),
                'total'=> $request->sub,
                'discount'=> $request->discount,
                'charge'=> $charge->charge,
                'shipping_id'=> $charge->shipping_id,
                'billing_id'=> $billingaddress->id,
            ];
            return redirect()->route('stripe.pay')->with('data', $data)->with('main_total', ($request->sub + $charge->charge)- $request->discount);
        }
    }
    function InvoiceTesting(){
        return view('frontend.mail.invoice2');
    }
    function OrderSuccess(){
        return view('frontend.customer.order_success');
    }

}
