<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use App\Models\Career;
use App\Models\CareerDescription;
use App\Models\Clinic;
use App\Models\ClinicDescription;
use App\Models\Doctor;
use App\Models\DoctorDescription;
use App\Models\MedicalEquipment;
use App\Models\MedicalEquipmentDescription;
use Illuminate\Http\Request;
use App\Models\BlogDescription ;
class DetailsController extends Controller
{
    //
    public function blog($slug){

        $blogDescription = BlogDescription::where('slug','=',$slug)->first();
        $blog = Blog::find($blogDescription->blog_id);
        return view('front.details.blog')->withBlog($blog);
    }

    public function clinic($slug){
        $clinicDescription = ClinicDescription::where('slug','=',$slug)->first();
        $clinic = Clinic::find($clinicDescription->clinic_id);
        return view('front.details.clinic')->with('clinic',$clinic);
    }

    public function doctor($slug){
        $doctorDescription = DoctorDescription::where('slug','=',$slug)->first();
        $doctor = Doctor::find($doctorDescription->doctor_id);
        return view('front.details.doctor')->with('doctor',$doctor);
    }

    public function equipment($slug){
        $equipmentDescription = MedicalEquipmentDescription::where('slug','=',$slug)->first();
        $equipment = MedicalEquipment::find($equipmentDescription->medical_equipment_id);
        return view('front.details.equipment')->with('equipment',$equipment);
    }

    public function  career($slug){
        $careerDescription = CareerDescription::where('slug','=',$slug)->first();
        $career = MedicalEquipment::find($careerDescription->career_id);
        return view('front.details.career')->with('career',$career);
    }
}
