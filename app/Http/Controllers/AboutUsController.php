<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //

    public function index(){

        return view('front.about-us');


    }


    public function media(){

        return view('front.media');
    }
}
