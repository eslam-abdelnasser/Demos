<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalEquipmentDescription extends Model
{
    //
    protected $table = 'medical_equipment_descriptions';


    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function medical_equipment(){
        return $this->belongsTO('App\Models\MedicalEquipment','medical_equipment_id');
    }
}
