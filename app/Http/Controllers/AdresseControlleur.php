<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;

class AdresseControlleur extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'adress1' => 'required',
            'adress2' => 'required',
        ]);
 
        $adresse = Adresse::create([
            'adress1' =>$request->adress1,
            'adress2' =>$request->adress2,
            'service_id'=>$request->service_id
        ]);
        return response()->json($adresse);
    }

    public function showAdresse($id)
    {
        $adresses=Adresse::where('service_id',$id)->get();
        return response()->json($adresses);
    }

    public function showallAdresses()
    {
        $adresses=Adresse::with('service')->get();
        return response()->json($adresses);
    }
}
