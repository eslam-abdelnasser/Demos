<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog ;

class ListController extends Controller
{
    //

    public function blog(){
        $blog = Blog::where('status','=','1')->paginate(10);
        return view('front.list.blog')->withBlog($blog);
    }

    public function clinic(){

        return view('front.list.clinic');
    }

    public function doctor(){

        return view('front.list.doctor');
    }

    public function equipment(){

        return view('front.list.equipment');
    }

    public function  career(){

        return view('front.list.career');
    }






}
