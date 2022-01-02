<?php

namespace App\Http\Controllers;

use App\Models\Washing;
use Illuminate\Http\Request;

class WashingController extends Controller
{
    public function wash(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'wash_name' => 'required',
        ]);
 
        $washing = Washing::create([
            'phone_number' =>$request->phone_number,
            'wash_name' =>$request->wash_name,
            'user_id'=>$request->user()->id
        ]);
        return response()->json($request);
    }
}
