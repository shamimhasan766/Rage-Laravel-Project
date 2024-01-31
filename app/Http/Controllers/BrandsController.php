<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Subcategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    function Brands(){
        $brands = Brands::all();
        return view('admin.brands', [
            'brands'=> $brands
        ]);
    }
    function AddBrand(){
        return view('admin.add_brand');
    }
    function BrandTrash(){
        $brands = Brands::onlyTrashed()->get();
        return view('admin.brands_trash', [
            'brands'=> $brands
        ]);
    }

    function StoreBrand(Request $request){
        $request->validate([
            'name'=> 'required',
            'logo'=> 'required|image|max:1024'
        ]);

        $name = $request->name;
        $logo = $request->logo;
        $extension = $logo->extension();
        $file_name = $name.'_'.uniqid().'.'. $extension;

        Image::make($logo)->save(public_path('uploads/brands/'. $file_name));
        Brands::insert([
            'name'=> $name,
            'logo'=> 'uploads/brands/'. $file_name,
            'created_at'=> Carbon::now()
        ]);


        return back()->with('success', 'Brand Added');
    }

    function SoftDeleteBrand($id){
        Brands::find($id)->delete();
        return back()->with('delete', 'Brand Deleted! You can see this on trash');
    }
    function RestoreBrand($id){
        $brand = Brands::onlyTrashed()->find($id);
        if ($brand) {
            $brand->restore();
            return back()->with('restored', 'Brand "' . $brand->name . '" restored');
        } else {
            return back()->with('error', 'Brand not found in the trash.');
        }
    }
    function RestoreSubcategory($id){
        $subcategory = Subcategory::onlyTrashed()->find($id);
        $subcategory->forceDelete();
        return back()->with('force_delete', 'Subcategory "'. $subcategory->subcategory .'" Permanently Deleted');
    }

    function BrandForceDelete($id){
        $brand = Brands::onlyTrashed()->find($id);
        unlink($brand->logo);
        $brand->forceDelete();
        return back()->with('force_delete', 'Brand Permanently Deleted');
     }

}
