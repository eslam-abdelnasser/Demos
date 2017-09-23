<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\DoctorDescription','doctor_id');
    }
}
