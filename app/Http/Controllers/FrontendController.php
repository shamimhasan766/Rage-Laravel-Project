<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Tag;
use Carbon\Cli\Invoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FrontendController extends Controller
{
    function Index() {
        $categories= Category::all();
        $products = Product::where('status',1)->latest()->get();
        $banners = Banner::Where('status',1)->get();
        return view('frontend.index', [
            'categories'=> $categories,
            'products'=> $products,
            'banners'=> $banners
        ]);
    }
    function ProductDetails($slug){
        $product = Product::where('slug', $slug)->get();
        $product = $product->first();
        $avaiable_colors = Inventory::where('product_id', $product->id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')
        ->get();
        $avaiable_sizes = Inventory::where('product_id', $product->id)
        ->groupBy('size_id')
        ->selectRaw('count(*) as total, size_id')
        ->orderBy('size_id', 'desc')
        ->get();
        return view('frontend.product_details', [
            'product'=> $product,
            'avaiable_colors'=> $avaiable_colors,
            'avaiable_sizes'=> $avaiable_sizes
        ]);
    }
    function GetSize(Request $request){
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();

        $string = '';
        foreach($sizes as $size){
            if($size->size_id == null){
                $string .= '<li class="color"><input id="size" type="radio" name="size" value="">
                                <label for="size">NA</label>
                            </li>';
            }else{
                $string .= '<li class="color"><input id="size'.$size->size_id.'" type="radio" name="size" value="'.$size->size_id.'">
                                <label for="size'.$size->size_id.'">'.$size->Size->size_name.'</label>
                            </li>';
            }
        }
        return $string;
    }
    function CategoryProduct($slug){
        $category = Category::where('slug', $slug)->get()->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('frontend.category_product', [
            'products'=> $products,
            'category'=> $category
        ]);
    }
    function SubcategoryProduct($id){
        $subcategory = Subcategory::find($id);
        $products = Product::where('subcategory_id', $subcategory->id)->get();
        return view('frontend.subcategory_product',[
            'subcategory'=> $subcategory,
            'products' => $products
        ]);
    }
    function TagProduct($id){
        $tag = Tag::find($id);
        $products = $tag->Product;
        return view('frontend.tag_product', [
            'tag'=> $tag,
            'products'=>$products
        ]);
    }
    function ExcitingOffer($discount){
        $products = Product::where('discount' , '<=', $discount)->where('discount', '>', 0)->get();
        return view('frontend.exciting_offer',[
            'discount'=> $discount,
            'products'=> $products
        ]);
    }
    function AllProduct(){
        $products = Product::all();
        return view('frontend.all_product', [
            'products'=> $products
        ]);
    }
}
