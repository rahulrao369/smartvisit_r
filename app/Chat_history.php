<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat_history extends Model
{
    //
    
    public function receiver(){
        return $this->hasOne('App\User','id','receiver_id');
    }
    
    public function sender(){
        return $this->hasOne('App\User','id','sender_id');
    }
}