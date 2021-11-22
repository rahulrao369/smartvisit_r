<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_paitent extends Model
{
    //
    public function paitent_details(){
    	return $this->hasOne('App\User','id','paitent_id');
    }

    // public function paitent_basic_details(){
    // 	return $this->hasOne('App\Paitent_detail','paitent_id','paitent_id');
    // }
}
