<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\blogDescription','blog_id');
    }
}
