<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\ContactEmails;
use App\Models\Doctor;
use App\Models\MedicalEquipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //


    public function index(){

        $doctors = Doctor::all()->count();
        $clinics = Clinic::all()->count();
        $messages = ContactEmails::all()->count();
        $equipments = MedicalEquipment::all()->count();
        $appointments = Appointment::all()->count();
        return view('admin.dashboard.index')
            ->with('doctors',$doctors)
            ->with('clinics',$clinics)
            ->with('messages',$messages)
            ->with('equipments',$equipments)
            ->with('appointments',$appointments);
    }
}
