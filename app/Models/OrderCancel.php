<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCancel extends Model
{
    use HasFactory;
    function Order(){
        return $this->hasOne(Order::class, 'order_id','order_id');
    }
}
