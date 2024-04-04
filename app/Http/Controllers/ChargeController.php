<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    function Charge(){
        $charges = Charge::all();
        return view('admin.charge.charge', [
            'charges'=> $charges
        ]);
    }
    function StoreCharge(Request $request){
        $request->validate([
            'location'=> 'required',
            'charge'=> 'required|integer'
        ]);
        Charge::insert([
            'location'=> $request->location,
            'charge'=> $request->charge,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('success', 'Charge Added Successfully');
    }
    function DeleteCharge($id){
        Charge::find($id)->delete();
        return back()->withDelete('Charge Deleted');
    }
    function GetCharge(Request $request){
        $charge = Charge::find($request->charge_id);
        $total = $charge->charge + $request->sub;
        return $total;
    }
}
