<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function Subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    function Brand(){
        return $this->belongsTo(Brands::class, 'brand_id');
    }
}
