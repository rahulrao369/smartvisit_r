<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    // public function patient(){
    //     return $this->hasOne('App\User','patient_id','patient_id');
    // }
    
    // public function getchild(){
    //     return $this->hasOne('App\Children','patient_id','child_patient_id');
    // }
    
     public function findcare(){
        return $this->hasOne('App\Find_care','id','find_care_id');
    }
}