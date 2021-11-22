<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Find_care;
use App\Children;
use Hash;

class ConsultController extends Controller
{
    
    public function index($id,$find_care_id)
    {
     $page_title ="Consult-patient";
    
     $find_care = Find_care::where('id',base64_decode($find_care_id))->first();
     
     if($find_care->type=='Self'){
       $patient = User::find(base64_decode($id));  
     }else{
       $patient = Children::find(base64_decode($id));
     }
    //  return $patient;
    //  die;
      
     return view('doctor.consult_patient',compact('page_title','patient','find_care'));
    }
    
    public function show(Request $request){
        $page_title ="Consult";
        $today_consult = Find_care::where('assigned_to',Auth::id())->where('status',1)->where('is_deleted',0)->latest()->get();
        return view('doctor.consult',compact('today_consult','page_title'));
    }

  
  
}