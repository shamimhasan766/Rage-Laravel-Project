<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function Tags(){
        $tags = Tag::paginate(10);
        return view('admin.tags.all_tag', [
            'tags'=> $tags
        ]);
    }
    function TagStore(Request $request){
        $request->validate([
            'tag_name.*' => 'required|unique:tags,tag_name'
        ], [
            'tag_name.*.required' => 'The tag name field is required.',
            'tag_name.*.unique' => 'The tag name must be unique.'
        ]);

        foreach ($request->tag_name as $tag) {
            Tag::insert([
                'tag_name'=> $tag,
                'created_at'=> Carbon::now()
            ]);
        }
        return back()->with('success', 'Tag Added Successfully');
    }

    function TagDelete($id){
        Tag::find($id)->delete();
        return back()->with('success', 'Tag deleted To Tash');
    }


    function TagEdit(Request $request, $id){

        $request->validate([
            'tag_name' => 'required|unique:tags,tag_name,' . $id
        ],
        [
            'name.required'=> 'Tag field is required'
        ]);

        // Find the Tag to be updated
        $tag = Tag::findOrFail($id);

        // Update Tag name
        $tag->tag_name = $request->tag_name;
        $tag->save();

        return response()->json(['message' => 'Tag updated successfully']);
    }

    function TagTrash(){
        $tags = Tag::onlyTrashed()->get();
        return view('admin.tags.tags_trash', [
            'tags'=> $tags
        ]);
    }

    function RestoreTag($id){
        $tag = Tag::onlyTrashed()->find($id);
        $tag->restore();
        return back()->with('restored','Tag restored');
    }

    function DeleteTagPermanent($id){
        $tag = Tag::onlyTrashed()->find($id);
        $tag->forceDelete();
        return back()->with('force_delete', 'Tag Permanently Deleted');
     }

}
