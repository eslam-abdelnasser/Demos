<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicDescription extends Model
{
    //
    protected $table = 'clinic-description';



    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }


}
