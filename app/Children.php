<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    //
    
    protected $table = 'childrens';
    
    public function patient_basic_details(){
        return $this->hasOne('App\Patient_detail','patient_id','id');
    }
}
