<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function AllCategory(){
        $categories = Category::all();
        return view('admin.all_category', [
            'categories'=> $categories
        ]);
    }
    function AddCategory(){
        return view('admin.add_category');
    }

    function CategoryStore(Request $request){

        $request->validate([
            'name'=> 'required|unique:categories',
            'photo'=> 'required|mimes:jpg,gif,jpeg,png|max:1024',
        ]);

        $slug = Str::lower(str_replace(' ', '-',$request->name)).'-'. random_int(200000, 999999);

        $extension = $request->photo->extension();
        $path = 'uploads/category/' ;
        $file_name = str::lower(str_replace(' ' , '-', $request->name)).'-'. uniqid() . '.'. $extension;
        Image::make($request->photo)->save(public_path('uploads/category/'.$file_name));

        Category::insert([
            'name'=> $request->name,
            'photo'=> $path. $file_name,
            'slug'=> $slug,
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('success', 'Category Added');
    }

    function CategoryDelete($id){
        $category = Category::find($id);

        // unlink($category->photo);
        $category->delete();
         return back()->with('delete', 'Category Deleted');
    }

    function CategoryEdit(Request $request, $id){

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ],
        [
            'name.required'=> 'name field is required'
        ]);

        // Find the category to be updated
        $category = Category::findOrFail($id);
        $slug = Str::lower(str_replace(' ', '-',$request->name)).'-'. random_int(200000, 999999);

        // Update category name
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();


        if ($request->hasFile('photo')) {
            $request->validate([
            'photo' => 'mimes:jpg,gif,jpeg,png|max:1024',
            ]);
            unlink(public_path($category->photo));
            $extension = $request->photo->extension();
            $path = 'uploads/category/';
            $file_name = Str::lower(str_replace(' ', '-', $request->name)). '-' . uniqid() . '.' . $extension;
            Image::make($request->photo)->save(public_path($path . $file_name));

            // Update category image path in the database
            $category->photo = $path . $file_name;
            $category->save();
        }
        else{
            return response()->json(['message' => 'no']);
        }
        return response()->json(['message' => 'Category updated successfully']);
    }

    function TrashCategory(){
        $trashCategories = Category::onlyTrashed()->get();
        return view('admin.trash',[
            'categories'=> $trashCategories
        ]);
    }

    function RestoreCategory($id){
        $Category = Category::onlyTrashed()->find($id);
        $Category->restore();
        return back()->with('restored','Category "'.$Category->name .'" restored');
    }

    function CategoryForceDelete($id){
       $category = Category::onlyTrashed()->find($id);
       unlink($category->photo);
       $category->forceDelete();
       Subcategory::where('category_id', $id)->delete();
       Subcategory::onlyTrashed()->where('category_id', $id)->forceDelete();
       return back()->with('force_delete', 'Category "'. $category->name .'" Permanently Deleted');
    }

    function CategorySelectDelete(Request $request){
       $categories_id = $request->categories_id;
       foreach ($categories_id as $category_id){
            Category::find($category_id)->delete();
       }
       return back()->with('selected_delete', 'Selected Categories Deleted');
    }


    function CategorySelectTrash(Request $request){
        $categories_id = $request->categories_id;


        foreach ($categories_id as $category_id)
        {
            if($request->btn == 'restore'){
                Category::onlyTrashed()->find($category_id)->restore();
            }
            else
            {
                $category = Category::onlyTrashed()->find($category_id);
                unlink($category->photo);
                $category->forceDelete();
                Subcategory::where('category_id', $category_id)->delete();
            }
        }

        // return Back Condition
        if($request->btn == 'restore'){
            return back()->with('selected_restore','Selected Category Restored');
        }
        else
        {
            return back()->with('selected_delete','Selected Category Permanently Deleted');
        }

    }
}
