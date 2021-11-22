<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsymptom extends Model
{
    //
    public function subsymptoms_list(){
        return $this->hasMany('App\Subsymptom','parent_id','id')->where('is_deleted',0)->latest();
    }
    
    public function main_subsystem(){
        return $this->hasOne('App\Subsymptom','id','parent_id');
    }
}
