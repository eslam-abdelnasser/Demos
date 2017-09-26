<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\MedicalEquipment;
use Illuminate\Http\Request;
use App\Models\Blog ;
use PhpParser\Comment\Doc;

class ListController extends Controller
{
    //

    public function blog(){
        $blog = Blog::where('status','=','1')->paginate(10);
        return view('front.list.blog')->withBlog($blog);
    }

    public function clinic(){
        $clinics = Clinic::where('status','=','1')->paginate(10);
        return view('front.list.clinic')->with('clinics',$clinics);
    }

    public function doctor(){
        $doctors = Doctor::where('status','=','1')->paginate(10);
        return view('front.list.doctor')->with('doctors',$doctors);
    }

    public function equipment(){
        $equipments = MedicalEquipment::where('status','=','1')->paginate(10);
        return view('front.list.equipment')->with('equipments',$equipments);
    }

    public function  career(){
        $careers = Career::where('status','=','1')->paginate(10);
        return view('front.list.career')->with('careers',$careers);
    }



    public function service(){

        return view('front.list.service');
    }






}
