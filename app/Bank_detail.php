<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_detail extends Model
{
    //
    public function doctor(){
        return $this->hasone('App\User','id','doctor_id');
    }
}