<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    function EditProfile(){
        return view('admin.user_profile');
    }
    function UpdateProfile(Request $request){
        User::find(Auth::id())->update([
            'name'=> $request->name
        ]);

        return back()->with('success', 'Name Updated');
    }
    function UpdatePassword(Request $request){
        $request->validate([
            'currentpass'=> 'required',
            'password'=> ['required', RulesPassword::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols() , 'confirmed'],
            'password_confirmation'=> 'required',
        ]);

        if(password_verify($request->currentpass , Auth::user()->password)){
            User::find(Auth::id())->update([
                'password'=> bcrypt($request->password)
            ]);
            return back()->with('pass_success', 'Password Updated');
        }
        else{
            return back()->with('match', 'password does not matched');
        }
    }

    function UpdatePhoto(Request $request){
        $request->validate([
            'image'=>'required|mimes:jpg,gif,jpeg,png|max:1024',
        ],[
            'image.required'=> 'Image Field is Must',
            'image.max'=> 'Image Field is Must less than 1 MB',
            'image.mimes'=> 'Image Field is Must type of jpg, jpeg, png',
        ]);

        if(Auth::user()->photo != null){
            unlink(public_path(Auth::user()->photo));
        }

        $image = $request->image;
        $extension = $image->extension();
        $filename = Auth::user()->name .'_'. Auth::id() .'.'. $extension;
        $path = 'uploads/users/'. $filename;
        Image::make($image)->save(public_path($path));
        User::find(Auth::id())->update([
            'photo'=> $path,
        ]);

        return back()->with('photo_success', 'Profile Photo Updated');
    }

    function UserList(){
        $users = User::all();
        return view('admin.userlist', compact('users'));
    }

    function UserDelete($id){
        $user = User::find($id);
        if($user->photo != null){
            unlink(public_path($user->photo));
        }
        $user->delete();
        return back()->with('delete', 'User "' .$user->name .'" Deleted');
    }
}
