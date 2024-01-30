<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function SubCategory(){
        return view('admin.subcategory');
    }
    
    function AddSubCategory(){
        return view('admin.add_subcategory');
    }
}
