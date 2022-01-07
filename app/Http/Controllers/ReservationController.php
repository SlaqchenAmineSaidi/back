<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reserver(Request $request)
    {
        $request->validate([
            'gender'=> 'required',
            'day'=>'required|date',
            'time'=>'required',
        ]);
        $reservation = Reservation::create([
            'gender'=> $request->gender,
            'day'=>$request->day,
            'time'=>$request->time,
            'user_id'=>$request->user()->id
        ]);
        return response()->json($reservation->only('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showen($id)
    {
        // $reservations=User::with('reservations')->where('id',$id)->get();
        $reservations=Reservation::where('user_id',$id)->get();
        return response()->json($reservations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
