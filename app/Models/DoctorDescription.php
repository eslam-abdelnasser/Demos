<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorDescription extends Model
{
    //
    protected $table = 'doctor-description';



    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
