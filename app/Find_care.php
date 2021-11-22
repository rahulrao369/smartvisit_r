<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Find_care extends Model
{
    //
    public function patient(){
        return $this->hasOne('App\User','id','patient_id');
    }
    
    public function getchild(){
        return $this->hasOne('App\Children','id','child_patient_id');
    }
    
     public function images(){
        return $this->hasOne('App\Symption_photo','find_care_id','id');
    }
    
    
    public function visit_reason(){
        return $this->hasOne('App\Visit_reason','id','reason_id');
    }
    
    public function doctor(){
        return $this->hasOne('App\User','id','assigned_to');
    }
    public function symptom_photo(){
        return $this->hasMany('App\Symptom_photo','find_care_id','id')->where('status','!=',2);
    }
    
    public function find_care_madications(){
        return $this->hasMany('App\Find_care_madication','find_care_id','id');
    }
    
     public function transaction(){
        return $this->hasOne('App\Transaction','find_care_id','id');
    }
}