<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //

    public function patient(Request $request){

        $appointment = new Appointment();
        $appointment->name = $request->name ;
        $appointment->email = $request->email ;
        $appointment->phone = $request->phone ;
        $appointment->clinic_id = $request->clinic ;
        $appointment->doctor_id = $request->doctor ;
        $appointment->message   = $request->message ;
        $appointment->seen     = '0' ;

        $appointment->save();
        return response()->json(['response' => 'This is post method']);
    }
}
