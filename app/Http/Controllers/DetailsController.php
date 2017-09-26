<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Career;
use App\Models\Clinic;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function blog($slug){


        return view('front.details.blog');
    }

    public function clinic($slug){
        $clinic = Clinic::where('slug','=',$slug);
        dd($clinic);
        return view('front.details.clinic');
    }

    public function doctor($slug){

        return view('front.details.doctor');
    }

    public function equipment($slug){

        return view('front.details.equipment');
    }

    public function  career($slug){

        return view('front.details.career');
    }
}
