<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    function Billing(){
        return $this->belongsTo(BillingAddress::class, 'billing_id');
    }
    function Shipping(){
        return $this->belongsTo(ShippingAddress::class, 'shipping_id');
    }
    function OrderCancel(){
        return $this->hasOne(OrderCancel::class, 'order_id', 'order_id');
    }

}
