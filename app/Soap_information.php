<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soap_information extends Model
{
    //
    
    public function patient(){
        return $this->hasOne('App\User','id','patient_id');
    }
    
    public function doctor(){
        return $this->hasOne('App\User','id','doctor_id');
    }
    
     public function find_care(){
        return $this->hasOne('App\Find_care','id','find_care_id');
    }
}