<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function blog($slug){


        return view('front.details.blog');
    }

    public function clinic($slug){

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
