<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function SubCategory(){
        $categories = Category::all();
        return view('admin.subcategory.subcategory', [
            'categories'=>$categories
        ]);
    }

    function AddSubCategory(){
        $categories = Category::all();
        return view('admin.subcategory.add_subcategory', [
            'categories'=> $categories
        ]);
    }
    function StoreSubCategory(Request $request){
        $request->validate([
            'category'=> ['required', new \App\Rules\CategoryExists],
            'subcategory'=> 'required'
        ]);

        Subcategory::insert([
            'category_id'=> $request->category,
            'subcategory'=> $request->subcategory,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('success', 'Subcategory added');
    }
    function DeleteSubCategory($id){
        Subcategory::find($id)->delete();
        return back()->with('success', 'Subcategory Deleted');
    }
    function SubcategoryTrash(){
        $subcategories = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.subcategory_trash', [
            'subcategories'=> $subcategories
        ]);
    }
    function RestoreSubcategory($id){
        $subcategory = Subcategory::onlyTrashed()->find($id);
        $subcategory->restore();
        return back()->with('restored','SubCategory "'.$subcategory->name .'" restored');
    }

    function SubcategoryForceDelete($id){
        $subcategory = Subcategory::onlyTrashed()->find($id);
        $subcategory->forceDelete();
        return back()->with('force_delete', 'SubCategory Permanently Deleted');
    }

    function SubcategoryEdit(Request $request, $id){

        $request->validate([
            'subcategory' => 'required|unique:subcategories,subcategory,' . $id
        ],
        [
            'subcategory.required'=> 'Subcategory field is required'
        ]);

        // Find the Subcategory to be updated
        $subcategory = Subcategory::findOrFail($id);

        // Update category name
        $subcategory->subcategory = $request->subcategory;
        $subcategory->save();


        return response()->json(['message' => 'Subcategory updated successfully']);
    }


    function SubcategorySelectTrash(Request $request){
        $subcategories_id = $request->subcategories_id;


        foreach ($subcategories_id as $subcategory_id)
        {
            if($request->btn == 'restore'){
                Subcategory::onlyTrashed()->find($subcategory_id)->restore();
            }
            else
            {
                $subcategory = Subcategory::onlyTrashed()->find($subcategory_id);
                $subcategory->forceDelete();
            }
        }

        // return Back Condition
        if($request->btn == 'restore'){
            return back()->with('selected_restore','Selected SubCategory Restored');
        }
        else
        {
            return back()->with('selected_delete','Selected SubCategories Permanently Deleted');
        }

    }
}
