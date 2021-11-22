<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Doctor_paitent;
use App\Find_care;
use App\Symptom;
use App\Soap_information;
use App\Soap_document;
use App\Patient_visit_summary;



class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $page_title = "Patients";
     $today_consult   = Find_care::where('assigned_to',Auth::id())->where('status',1)->where('is_deleted',0)->latest()->paginate(14);
     return view('doctor.patients',compact('today_consult','page_title'));
    }

    public function patient_detail($id)
    {
        //
        $page_title ='Patients';
        $fc   = Find_care::where('id',base64_decode($id))->where('status',1)->where('is_deleted',0)->first();
        $symptoms = Symptom::find(explode(',',$fc->symptoms));
        return view('doctor.patient_detail',compact('fc','page_title','symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consult_patient()
    {
        //
        return view('doctor.consult_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ordertest(Request $request)
    {
        //
        $page_title = "Ordertest";
        return view('doctor.ordertest',compact('page_title'));
    }

    public function prescribe(Request $request)
    {
        //
         $page_title = "Prescribe";
         return view('doctor.prescribe',compact('page_title'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        //
        return view('doctor.patient_detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function soap_information(Request $request)
    {
        //
        //  print_r($request->all());
        //  die;
        // $request->validate([
        //       'subjective'=>'required',
        //       'objective'=>'required',
        //       'mental_status'=>'required',
        //       'vital_signs'=>'required',
        //       'assessment'=>'required',
        //       'impression'=>'required',
        //       'diagnosis'=>'required',
        //       'result'=>'required',
        //       'type_dx_code'=>'required',
        //       'prescription_ordered'=>'required',
        //       'how_many'=>'required',
        //       'education'=>'required',
        //       'diet'=>'required',
        //       'exercise'=>'required',
        //       'medication_use'=>'required',
        //       'symptoms'=>'required',
        //       'smokings_alcohol'=>'required',
        //       'activity_level'=>'required',
        //       'follow_up_visit'=>'required',
        //     ]);
            
        try{
           $patientsoap = new  Soap_information;
           $patientsoap->patient_id           = base64_decode($request->patient_id);
           $patientsoap->doctor_id            = Auth::id();
           $patientsoap->find_care_id         = base64_decode($request->find_care_id);
           $patientsoap->subjective           = $request->subjective;
           $patientsoap->objective            = $request->objective;
           $patientsoap->mental_status        = $request->mental_status;
           $patientsoap->vital_signs          = $request->vital_signs;
           $patientsoap->assessment           = $request->assessment;
           $patientsoap->impression           = $request->impression;
           $patientsoap->diagnosis            = $request->diagnosis;
           $patientsoap->result               = $request->result;
           $patientsoap->type_dx_code         = $request->type_dx_code;
           $patientsoap->prescription_ordered = $request->prescription_ordered;
           $patientsoap->how_many             = $request->how_many;
           $patientsoap->education            = $request->education;
           $patientsoap->diet                 = $request->diet;
           $patientsoap->exercise             = $request->exercise;
           $patientsoap->medication_use       = $request->medication_use;
           $patientsoap->symptoms             = $request->symptoms;
           $patientsoap->smokings_alcohol     = $request->smokings_alcohol;
           $patientsoap->activity_level       = $request->activity_level;
           $patientsoap->follow_up_visit      = $request->follow_up_visit;
           $patientsoap->save();
           
           if(isset($request->test_files) && count($request->test_files) > 0 ){
               foreach($request->test_files as $row){
                   $filename = time().'.'.$row->getClientOriginalExtension();
                   $row->move('public/soap_document',$filename);
                   
                   $sd = new Soap_document;
                   $sd->soap_information_table_id = $patientsoap->id;
                   $sd->patient_id                = base64_decode($request->patient_id);
                   $sd->name                      = 'public/soap_document/'.$filename;
                //   $sd->name = 'public/soap_document/'.$filename;
                   $sd->save();
               }
           }
           return response()->json(['status'=>true]);
           
        }catch(\Exception $e){
            
           return response()->json(['status'=>false]); 
        }
            // echo "<pre>";
            // print_r($request->all());
            // die;
            
        //   return back()->with('success','Information has been updated successfully.');
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patient_visit_summery(Request $request)
    {
        //
        try{
        $pvs = new Patient_visit_summary;
        $pvs->find_care_id                                           = base64_decode($request->find_care_id);
        $pvs->patient_id                                             = base64_decode($request->patient_id);
        $pvs->doctor_id                                              = Auth::id();
        $pvs->plan_of_care_summary                                   = $request->plan_of_care_summary;
        $pvs->medications                                            = $request->medications;
        $pvs->lab_tests                                              = $request->lab_tests;
        $pvs->what_to_monitor_for_at_home                            = $request->what_to_monitor_for_at_home;
        $pvs->when_to_seek_emergency_help                            = $request->when_to_seek_emergency_help;
        $pvs->your_suggested_next_follow_up_with_pcp_or_telemedicine = $request->your_suggested_next_follow_up_with_pcp_or_telemedicine;
        $pvs->save();
        
        return response()->json(['status'=>true]);
        
        }catch(\Exception $e){
            return $e->getMessage();
        return response()->json(['status'=>false]);
        
        }
        
        
       
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
