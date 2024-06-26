<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $guard= 'customer';

    function Country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    function City(){
        return $this->belongsTo(City::class, 'city_id');
    }
    function BillingAddress(){
        return $this->hasOne(BillingAddress::class);
    }
    function Cart(){
        return $this->hasMany(Cart::class, 'customer_id');
    }
}
