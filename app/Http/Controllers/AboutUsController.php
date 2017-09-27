<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs ;
use App\Models\Gallery ;
class AboutUsController extends Controller
{
    //

    public function index(){

        $about_us  = AboutUs::find(1);

        return view('front.about-us')->withAbout($about_us);


    }


    public function media(){

        $gallery = Gallery::where('status','=','1')->get();
        return view('front.media')->withGalleries($gallery);
    }
}
