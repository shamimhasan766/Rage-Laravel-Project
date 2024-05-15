<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\StripePay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Mail;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $data = session('data');
        $transaction_id = uniqid();
        StripePay::where('transaction_id', $transaction_id)
        ->updateOrInsert($data,[
            'transaction_id' => $transaction_id,
            'currency' => 'BDT',
            'created_at' => Carbon::now(),
        ]);


        return view('stripe.stripe',[
            'main_total'=> session('main_total'),
            'transaction_id'=> $transaction_id
        ]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $transaction_id = session('transaction_id');

        $data = StripePay::where('transaction_id', $transaction_id)->first();
        $stripe_total = ($data->total + $data->charge) - $data->discount;

        Stripe\Charge::create ([
                "amount" => 100 * $stripe_total,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        $order_id = '1010'. random_int(000000, 999999);
        Order::insert([
            'order_id'=> $order_id,
            'customer_id'=> $data->customer_id,
            'total'=> $data->total,
            'discount'=> $data->discount,
            'charge'=> $data->charge,
            'billing_id'=> $data->billing_id,
            'shipping_id'=> $data->shipping_id,
            'payment_type'=> 3,
            'created_at'=> Carbon::now(),
        ]);

        $carts = Cart::where('customer_id', $data->customer_id)->get();
        foreach($carts as $cart){
            $InventoryItem = $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first();
            OrderProduct::insert([
                'order_id'=> $order_id,
                'customer_id'=> $data->customer_id,
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
        $billingaddress = BillingAddress::find($data->billing_id);

        Mail::to($billingaddress->email)->send(new InvoiceMail($order_id));


        //SMS
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "x6nwYLhKPEvYcIRwzCeL";
        $senderid = "8809617618226";
        $number = $billingaddress->phone;
        $message = "Your Ecommerce Order has been placed. Order Id : #$order_id . You will get your parcel soon... your total payment amount TK ".($data->total - $data->discount)+ $data->charge ."--/ has been paid by Stripe Payment";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
       return redirect()->route('order.success');

    }
}
