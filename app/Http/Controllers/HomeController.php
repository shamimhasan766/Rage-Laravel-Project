<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    function Dashboard(){
        $users = User::all();
        return view('dashboard', compact('users'));
    }
    function Dark(){
        $users = User::all();
        return view('dark', compact('users'));
    }
    function Index(){
        return view('Home');
    }
    
    function Contact(){
        return view('Contact');
    }

    function About(Request $request){
        $age = $request->age;
        return view('About', ['age'=>$age]);
    }
}
