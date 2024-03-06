<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function AddColor(){
        $colors = Color::all();
        return view('admin.inventory.add_color', [
            'colors'=> $colors,
        ]);
    }
    function AddSize(){
        $sizes = Size::all();
        return view('admin.inventory.add_size', [
            'sizes'=> $sizes,
        ]);
    }
    function ColorStore(Request $request){
        $request->validate([
            'color_name'=> 'required',
            'color_code'=> 'required'
        ]);
        Color::insert([
            'color_name'=> $request->color_name,
            'color_code'=> $request->color_code
        ]);
        return back()->with('color_success', 'Color Added Successfully');
    }
    function SizeStore(Request $request){
        $request->validate([
            'size_name'=> 'required',
        ]);
        Size::insert([
            'size_name'=> $request->size_name,
        ]);
        return back()->with('size_success', 'Size Added Successfully');
    }
    function Inventory($id){
        $product = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id', $id)->get();
        return view('admin.inventory.inventory', [
            'product'=> $product,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'inventories'=> $inventories
        ]);
    }
    function InventoryStore(Request $request, $id){
        $request->validate([
            'quantity'=> 'required|numeric',
            'price'=> 'required|numeric'
        ]);
        if (Inventory::Where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()) {
            Inventory::Where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
            return back()->withSuccess('Inventory Updated Successfully');
        }
        else{
        $product = Product::find($id);
        $after_discount = $request->price - $request->price / 100 * ($product->discount);
        Inventory::insert([
            'product_id'=> $id,
            'color_id'=> $request->color_id,
            'size_id'=> $request->size_id,
            'quantity'=>$request->quantity,
            'price'=> $request->price,
            'after_discount'=>$after_discount
        ]);

        return back()->withSuccess('Inventory Added Successfully');
        }
    }
    function InventoryDelete($id){
        Inventory::find($id)->delete();
        return back()->withDelete('Inventory Deleted Successfully');
    }
}
