<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\ClinicDescription','clinic_id');
    }
}
