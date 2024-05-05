<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;
    protected $table = 'billing_address';
    function Country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    function City(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
