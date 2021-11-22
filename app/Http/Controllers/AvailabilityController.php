<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slot;
use App\Find_care;
use App\Doctor_time;
use Auth;
use Carbon\Carbon;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //'Wed Aug 25 2021 11:23:56 GMT+0530 (India Standard Time)'
        // Wed Aug 25 2021 11:31:03
        
        //  $dt = Carbon::now()->format('D M d Y H:i:s');
        //  return Carbon::now(-5);
        $page_title = "Calendar";
        $slots = Slot::where('status',1)->where('is_deleted',0)->get();
        $find_care = Find_care::with(['patient','getchild'])->where('assigned_to',Auth::id())->get();
        // echo "<pre>";
        // print_r($find_care); die;
        
        $caldata = [];
        
        foreach($find_care as $row){
          $caldata[] = [
                           'id'=> $row->id,
                           'title'=>(($row->type==='Child') ?  $row->getchild->first_name.' '.$row->getchild->middle_name.' '.$row->getchild->last_name : $row->patient->first_name.' '.$row->patient->last_name).'<br> '.$row->time,
                           'start'=> Carbon::parse($row->date)->format('D M d Y'),
                        //   'allDay'=> false,
                           'className'=> 'info',
                           'url'=>url('doctor/consult-patient/'.(($row->type=='Child') ? base64_encode($row->child_patient_id) : base64_encode($row->patient_id)).'/'.base64_encode($row->id))
                       ];  
        }
        // print_r($caldata); die;
        return view('doctor.availability',compact('slots','page_title','caldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function get_my_appointments(Request $request){
         $find_care = Find_care::where('assigned_to',$request->doctor_id)->get();
         $appointments = [];
         foreach($find_care as $row){
             $appointments[] = [
                                   'id'=> 999,
                                   'title'=> 'Repeating Event',
                                   'start'=> new Date(y, m, d, 16, 0),
                                   'allDay'=> false,
                                   'className'=> 'info'
                                ];
         }
         
         return response()->json($appointments);
    }
    
    
    public function availability_edit()
    {
        //
         $page_title = "My availability";
         $slots = Slot::where('status',1)->where('is_deleted',0)->get();
         return view('doctor.availability_edit',compact('slots','page_title'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $page_title = "My availability";
          $dt = Doctor_time::where('doctor_id',Auth::id())->where('is_deleted',0)->get();
         $dtdata = [];
         foreach($dt as $row){
            $dtdata[] = $row->time; 
         }
        //  return $dtdata; 
         $slots = Slot::where('status',1)->where('is_deleted',0)->get();
         return view('doctor.availability_time',compact('slots','page_title','dtdata'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function available_times(Request $request)
    {
        //
         $request->validate([
                            'time'=>'required'
                           ]);
                           
         Doctor_time::where('doctor_id',Auth::id())->update(['is_deleted'=>1]);
        foreach($request->time as $row){
            
            $dt = new Doctor_time;
            $dt->doctor_id  = Auth::id();
            $dt->time    = $row;
            $dt->save(); 
            
        }
        
        return back()->with('success','Available time updated successfully.');
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
