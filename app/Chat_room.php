<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat_room extends Model
{
    //
    
    // public function patient(){
    //     return $this->hasOne('App\User','id','patient_id');
    // }
    
    public function user(){
        return $this->hasOne('App\User','id','sender_id');
    }
}