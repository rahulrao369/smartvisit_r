<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    //
    
    public function patient(){
        return $this->hasOne('App\User','id','patient_id');
    }
    
    public function doctor(){
        return $this->hasOne('App\User','id','doctor_id');
    }
}