<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider ;
use App\Models\Blog ;
use App\Models\Clinic ;
use App\Models\Gallery ;
use App\Models\Service ;
use App\Models\Doctor ;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sliders = Slider::where('status',1)->latest()->get()->take(3);
        $data = [];
        foreach ($sliders as $slider){
            $data[] = $slider ;
        }

        $blog = Blog::where('status','=','1')->get() ;

        $clinic = Clinic::where('status','=','1')->get();

         $gallery = Gallery::where('status','=','1')->get();
         $sevices = Service::where('status','=','1')->get();
         $docotrs = Doctor::where('status','=','1')->get() ;


        return view('front.index')->withBlog($blog)->withClinincs($clinic)->withGalleries($gallery)->withServices($sevices)->withDoctor($docotrs);
    }
}
