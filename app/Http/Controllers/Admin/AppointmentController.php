<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Models\Clinic;
use App\Models\ClinicDescription;
use App\Models\Doctor;
use App\Models\DoctorDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment ;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //
    public function  index(){

        $appointment = Appointment::all();
        return view('admin.appointment.index')->with('appointments',$appointment);
    }



    public function patient($id){

        $patient = Appointment::find($id);

        return view('admin.show')->withPatient($patient);

    }

    public function show($id){

        $appointment = Appointment::find($id);

        if($appointment->seen == 0){
            $appointment->seen ="1";
            $appointment->seen_by = Auth::id();
        }
        $appointment->save();

        $name = Admin::where('id',$appointment->seen_by)->value('name');
        $doctor = DoctorDescription::where('doctor_id',$appointment->doctor_id)->get();

        $clinic = ClinicDescription::where('clinic_id',$appointment->clinic_id)->get();


        return view('admin.appointment.show')
            ->with('name',$name)
            ->with('appointment',$appointment)
            ->with('doctors',$doctor)
            ->with('clinics',$clinic);
    }
}
