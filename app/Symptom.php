<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    //
    public function visitReason(){
         return $this->hasOne('App\Visit_reason','id','visit_reason_id');
    }
   
}