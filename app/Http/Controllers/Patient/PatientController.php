<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Visit_reason;
use App\Callback_slot;
use App\Find_care;
use App\Symptom_photo;
use App\Call;
use App\Slot;
use App\Transaction;
use App\Children;
use App\Subsymptom;
use App\Medical_condition;
use App\Find_care_madication;
use App\Patient_detail;



use Carbon\Carbon;


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
    //  $paitents = Doctor_paitent::where('doctor_id',Auth::id())
    //                                                         ->where('is_deleted',0)
    //                                                         ->paginate(14);
     $findcare =  Find_care::where('patient_id',Auth::id())
                                                        //  ->where('assigned_to','!=',0)
                                                        //  ->whereDate('date',Carbon::today())
                                                         ->where('payment_status',2)
                                                         ->where('status',1)
                                                         ->where('is_deleted',0)
                                                         ->latest()
                                                         ->get();
     return view('patient.dashboard',compact('page_title','findcare'));
    }

    public function find_care($id)
    {
        //
        $page_title ='Find care';
        
        $id = $id;
        if(Auth::id() == base64_decode($id)){
           $type = 'Self'; 
        }else{
           $type='Child';
        }
        
        $visit_reasons = Visit_reason::where('status',1)->where('is_deleted',0)->orderby('id','asc')->get();
        
        $callback_slots = Slot::where('status',1)->where('is_deleted',0)->latest()->get();
        
        $subsymptoms_main = Subsymptom::with(['subsymptoms_list'])->where('type',1)->where('status',1)->where('is_deleted',0)->latest()->get();
        
        $medical_condition = Medical_condition::where('status',1)->where('is_deleted',0)->latest()->get();
        
        // echo "<pre>";
        // print_r($subsymptoms_main->toArray()); die;
        
        return view('patient.quick',compact('page_title','visit_reasons','callback_slots','subsymptoms_main','medical_condition','id','type'));
    }
    
    public function find_care_post(Request $request){
        //  echo "<pre>";
        //  print_r($request->all()); die;
        // return $request->all(); 
        
        // $timeslot = Callback_slot::find($request->time);
        $timeslot = Slot::find($request->time);
        $find_care = new Find_care;
        $find_care->patient_id       = Auth::id();
        $find_care->type             = $request->type;
        
        if($request->type==='Child'){
            
             $find_care->child_patient_id = base64_decode($request->patient_id);
        }
        
        $find_care->reason_id        = $request->reason_for_vist;
        $find_care->symptoms         = implode(',',$request->symptomss);      
        $find_care->symptoms_details = $request->symptoms_details;
        $find_care->subsymptoms      = (isset($request->subsymptoms) && count($request->subsymptoms) > 0 ) ? implode(',',$request->subsymptoms):'';
        
        $find_care->how_long         = $request->how_long_days.' '.$request->how_long_duration;
 
        
        $find_care->currently_any_medication       = $request->currently_any_medication;
        
        
        
        $find_care->have_allergies   = $request->have_allergies;
        
        if($request->have_allergies=='Yes'){
            
             $find_care->drug_allergies        = (count($request->allergy_name) > 0 ) ? implode(',',$request->allergy_name):'';
        }else{
             $find_care->drug_allergies='';
        }
       
        
        $find_care->medical_conditions       = (isset($request->medical_condition) && count($request->medical_condition)> 0) ? implode(',',$request->medical_condition):'';
        $find_care->medical_other_conditions = (isset($request->medical_other_conditions) && count($request->medical_other_conditions) > 0) ? implode(',',$request->medical_other_conditions):'';
        
        $find_care->temprature       = $request->temperature;
        $find_care->systolic_bp      = $request->systolic;
        $find_care->diastolic_dp     = $request->diastolic;
        $find_care->o2_saturation    = $request->o2_saturation;
        $find_care->heart_rate       = $request->heart_rate;
        $find_care->resp             = $request->resp;
        $find_care->lc_number        = $request->lc_number;
        $find_care->date             = $request->date;
        $find_care->time             = $timeslot->name;
        $find_care->is_urgent        = isset($request->urgent) ? 'Yes':'No';
        $find_care->save();
        
        
        
        // current medication
        if($request->currently_any_medication=='Yes'){
            
            if(count($request->medication_name) > 0 && count($request->medication_how_long) > 0){
            foreach($request->medication_name as $key => $row){
                
                $fdcm = new Find_care_madication;
                $fdcm->find_care_id = $find_care->id;
                $fdcm->name         = $row;
                $fdcm->how_long     = $request->medication_how_long[$key];
                $fdcm->save();
                
            } 
            
          }
         
        }
        
       
        
        
        if(isset($request->simages) && count($request->simages) > 0){
            foreach($request->simages as $row){
                $filename = time().'.'.$row->getClientOriginalExtension();
                $row->move('public/symptom_photo',$filename);
                
                $sm = new Symptom_photo;
                $sm->find_care_id = $find_care->id;
                $sm->image        = '/public/symptom_photo/'.$filename;
                $sm->user_id      = Auth::id();
                $sm->save();
                
            }
        }
        
        $transaction = new Transaction;
        $transaction->patient_id   = Auth::id();
        $transaction->find_care_id = $find_care->id;
        $transaction->amount       = 100;
        $transaction->save();
    
        // $amount = $transaction->amount;
        
        
        // return view('patient.payment',compact('amount'));
        return redirect('patient/payment?ttid='.base64_encode($transaction->id));
        
        // return response()->json(['status'=>true,'message'=>'Request has been submitted.']);
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    
    public function pharmacy()
    {
        //
        $page_title ='Pharmacy';
        return view('patient.pharmacy',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function my_lab()
    {
        //
        $page_title ='My lab';
        return view('patient.my_lab',compact('page_title'));
    }

    public function alerts()
    {
        //
         $page_title ='Alerts';
         return view('patient.alerts',compact('page_title'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $page_title ='Patient details';
        return view('doctor.patient_detail',compact('page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check_for_call(Request $request)
    {
        //
       $call =  Call::where('patient_id',Auth::id())->where('status',1)->where('is_calling',1)->first();
       if(!empty($call)){
           return response()->json(['status'=>true,'doctor_name'=>$call->doctor->first_name.' '.$call->doctor->last_name,'temp_token'=>$call->temp_token,'channel'=>$call->channel,'call_id'=>$call->id]);
       }else{
           return response()->json(['status'=>false,'message'=>'Temporary no any calls.']);
       }
       
       
    }
    
   public function reject_call(Request $request){
        $call =  Call::find($request->call_id);
        $call->status =3; //rejected
        $call->save();
        return response()->json(['status'=>true,'message'=>'call rejected successfully.']);
        
   }
   
     public function accept_call(Request $request){
        $call =  Call::find($request->call_id);
        $call->status =2; //acceot
        $call->save();
        return response()->json(['status'=>true,'message'=>'call accepted successfully.']);
        
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
    public function destroy()
    {
        //
        Auth::logout();
        return redirect('patient/login');
    }
    
    
    
    public function visitfor(){
        $page_title ='Find care';
        
        $childerns = Children::where('parent_id',Auth::id())->where('status',1)->latest()->where('is_deleted',0)->get();
        return view('patient.visitfor',compact('page_title','childerns'));
    }
    
    
    public function addchild(){
        $page_title ='Find care';
        
        return view('patient.addchild',compact('page_title'));
    }
    
    public function store_child(Request $request){
        
   // return $request->all();
        
        $request->validate([
               'first_name'=>'required',
               'last_name' =>'required',
            //   'middle_name' =>'required',
               'gender'=>'required',
            //   'sufix' =>'required',
               'dob' =>'required',
            ]);
            // return $request->all();
        $children = new Children;
        $children->parent_id  = Auth::id();
        $children->first_name  = $request->first_name;
        $children->middle_name = ($request->middle_name) ? $request->middle_name:'';
        $children->last_name   = $request->last_name;
        $children->suffix      = ($request->suffix) ?  $request->suffix:'';
        $children->dob         = $request->dob;
        $children->gender      = $request->gender;
        $children->save();
        
        
        $patient_chc_id = 'SMV000'.$children->id;
        $pd = new Patient_detail;
        $pd->patient_id = $children->id;
        $pd->parent_id  = Auth::id();
        $pd->chc_id     = $patient_chc_id;
        $pd->save();
        
        if($request->gender==1){
            $gend = 'M';
        }else{
            $gend = 'F';
        }
        
        
        
        $ch = curl_init();
        // $data = http_build_query($dataArray);
        $getUrl = "https://cli-cert.changehealthcare.com/servlet/DxLogin?userid={{env('CHANGE_HEALTH_CARE_USER_ID')}}&PW={{env('CHANGE_HEALTH_CARE_PWD')}}&hdnBusiness={{env('HDN')}}&apiLogin=true&target=jsp/lab/person/PersonDemographics.jsp&actionCommand=loadPMSData&P_ACT=".$patient_chc_id."&P_LNM=".$request->last_name."&P_FNM=".$request->first_name.' '.$request->middle_name."&P_DOB=".Carbon::parse($request->dob)->format('m/d/Y')."&P_SEX=".$gend."";
        // return $getUrl;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);

        $response = curl_exec($ch);
        // echo $response;
        // if(curl_error($ch)){
        //     echo 'Request Error:' . curl_error($ch);
        // }
        // else
        // {
        //     echo $response;
        // }

        curl_close($ch);
        
        // echo $getUrl;
        // print_r($server_output);
        
        
        
        
         return redirect('patient/visitfor');
    }
    
    public function duration(){
        
        $page_title ='Find care';
        
        return view('patient.duration',compact('page_title'));
    }
    
    public function delete_child($id){
        
        $child = Children::find(base64_decode($id));
        $child->is_deleted = 1;
        $child->save();
        
        return redirect('patient/visitfor');
        //->with('success','Child has removed successfully.');
    }
    
    
     public function calling($call_id){
        //  return $call_id;
        $page_title = 'xyz';
     $call =  Call::find($call_id);
        return view('patient.callpage',compact('page_title','call'));
    }
    
}