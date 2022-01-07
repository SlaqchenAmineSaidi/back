<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceControlleur extends Controller
{
    public function book(Request $request)
    {
        $request->validate([
            'reservation_id'=> 'required',
            'title'=>'required',
            'price'=>'required',
        ]);
        $service = Service::create([
            'title'=>$request->title,
            'price'=>$request->price,
            'reservation_id'=>$request->reservation_id,
        ]);
        return response()->json($service->only('id'));
    }

    public function show($id)
    {
        $services=Reservation::with('service')->where('user_id',$id)->get();
        return response()->json($services);
    }

    public function showall()
    {
        $services=Service::with('reservation')->get();
        return response()->json($services);
    }
    
}
