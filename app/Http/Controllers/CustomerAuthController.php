<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    function CustomerLogin(){
        return view('frontend.customer.login');
    }
    function CustomerRegister(){
        return view('frontend.customer.register');
    }
    function CustomerStore(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:customers',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|confirmed',

        ]);
        Customer::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('index');
        }
        //return back()->withRegister('Customer Registration Successfull');
    }
    function CustomerLoginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:customers,email',
            'password'=> 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('index');
        }
        else{
            return back()->with('pass_err', 'password is incorrect');
        }
    }
    function CustomerLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('index');
    }
}
