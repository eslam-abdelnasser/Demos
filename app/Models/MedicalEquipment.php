<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalEquipment extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\MedicalEquipmentDescription','medical_equipment_id');
    }
}
