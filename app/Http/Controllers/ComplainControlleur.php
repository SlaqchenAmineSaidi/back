<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainControlleur extends Controller
{
    public function complain(Request $request)
    {
        $request->validate([
            'complain' => 'required',
        ]);
 
        $complain = Complain::create([
            'complain' =>$request->complain,
            'user_id'=>$request->user()->id
        ]);
        return response()->json($complain);
    }

    public function showComplains()
    {
        $complains=Complain::with('user')->get();
        return response()->json($complains);
    }
}
