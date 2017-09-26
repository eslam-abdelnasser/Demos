<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    //

    public function blog(){

        return view('front.list.blog');
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
