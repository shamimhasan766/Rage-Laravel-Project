<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    function Color(){
        return $this->belongsTo(Color::class, 'color_id');
    }
    function Size(){
        return $this->belongsTo(Size::class, 'size_id');
    }
}
