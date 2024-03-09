<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    function CustomerProfile(){
        $countries = Country::all();
        return view('frontend.customer.profile', [
            'countries'=> $countries,
        ]);
    }
    function CustomerAccountDetails(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'email',
            'zip' => 'nullable|numeric'
        ]);
        $Customer = Customer::find(Auth::guard('customer')->user()->id);
        $Customer->name = $request->name;
        $Customer->phone = $request->phone;
        $Customer->zip = $request->zip;
        if ($request->photo) {
            $request->validate([
                'photo'=> 'image',
            ]);
            if ($Customer->photo) {
                unlink(public_path($Customer->photo));
            }
            $photo = $request->photo;
            $extension = $photo->extension();
            $fileName = $request->name. uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/customer/'.$fileName));
            $Customer->photo = 'uploads/customer/'. $fileName;
        }
        $Customer->save();
        return back()->withSuccess('Account Details Updated');
    }
    function CustomerPasswordUpdate(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|confirmed', // Ensure that the new password matches the confirmation
        ]);

        $customer = Auth::guard('customer')->user();

        if (!Hash::check($request->current_password, $customer->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect()->back()->with('pass_success', 'Password updated successfully.');
    }
    function CustomerGetCity(Request $request){
        $string = '';
        $cities = City::where('country_id', $request->country_id)->get();
        foreach($cities as $city){
            $string .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        echo $string;
    }
    function CustomerUpdateAddress(Request $request){
        $request->validate([
            'country'=> 'required',
            'city'=> 'required',
            'address'=> 'required'
        ]);
        $user = Auth::guard('customer')->user();
        $user->country_id = $request->country;
        $user->city_id = $request->city;
        $user->address = $request->address;
        $user->save();
        return back()->withAddress('Customer Address Updated');
    }
}
