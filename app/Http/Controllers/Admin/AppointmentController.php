<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment ;
class AppointmentController extends Controller
{
    //
    public function  index(){

        $appointment = Appointment::all();
        return view('appointment.index')->withAppointment($appointment);
    }



    public function patient($id){



        $patient = Appointment::find($id);

        return view('admin.show')->withPatient($patient);


    }
}
