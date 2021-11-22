<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Carbon\Carbon;

use App\User;
use App\City;
use App\State;
use App\Country;
use App\Doctor_time;
use App\Clinical_update;
use App\Mailing_address;
use App\Find_care;
use App\Declined_request;
use App\Doctor_paitent;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title ='Dashboard';
        
        $get_patients    = Doctor_paitent::where('doctor_id',Auth::id())->count();
        
        $today_date      = Carbon::now()->format('Y-m-d');
        
        $mytime          = Doctor_time::select('time')->where('is_deleted',0)->get()->toArray();
        
        $getdoctorHours     = Doctor_time::where('doctor_id',Auth::id())->where('is_deleted',0)->count();
        $doctorHours=0;
        if($getdoctorHours !=0){
            $doctorHours = $getdoctorHours*2;
        }
        
        $declined =  Declined_request::where('doctor_id',Auth::id())->pluck('find_care_id')->toArray();
        
        $patient_request = Find_care::where('assigned_to',0)
                                        ->whereNotIn('id',$declined)
                                        ->whereIn('time',$mytime)
                                        ->where('status',1)
                                        ->where('is_urgent','No')
                                        ->where('is_deleted',0)
                                        ->where('payment_status',2)
                                        ->latest()
                                        ->limit(30)
                                        ->get();
        
       $today_consult   = Find_care::where('assigned_to',Auth::id())
                                    ->whereDate('date','<=',date('Y-m-d'))
                                    ->where('status',1)
                                    ->where('is_deleted',0)
                                    ->where('payment_status',2)
                                    ->latest()
                                    ->get();
                                    
        // print_r($today_consult); die;
                                    
                                    
        $today_consult_urgent  = Find_care::whereDate('date',$today_date)
                                    ->where('is_urgent','Yes')
                                    ->where('status',1)
                                    ->where('payment_status',2)
                                    ->where('is_deleted',0)
                                    ->latest()
                                    ->get();
                                    
        
      $recent_consult   = Find_care::with('patient')->where('assigned_to',Auth::id())
                                    ->where('status',3)
                                    ->where('is_deleted',0)
                                    ->where('payment_status',2)
                                    ->latest()
                                    ->groupby('patient_id')
                                    ->orderby('id','desc')
                                    ->get();
                                    
                                    // echo "<pre>";
                                    // print_r($today_consult_urgent->toArray()); die;
        
      $clinical_update = Clinical_update::where('status',1)->where('is_deleted',0)->limit(3)->latest()->get();
     
        return view('doctor.index',compact('page_title','patient_request','clinical_update','today_consult','get_patients','recent_consult','today_consult_urgent','doctorHours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        //
        $page_title = "Profile";
        $doctor = User::find(Auth::id());
        $country   = Country::where('status',1)->where('is_deleted',0)->latest()->get();
        return view('doctor.profile',compact('doctor', 'country','page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_doctor_information(Request $request)
    {
        
        // return $request->all();
        $doctor = User::find(Auth::id());
        $doctor->first_name  = $request->first_name;
        $doctor->last_name   = $request->last_name;
        $doctor->phone       = $request->phone;
        $doctor->address     = $request->address;
        $doctor->lat         = $request->latitude;
        $doctor->lng         = $request->longitude;
        $doctor->postal_code = $request->postal_code;
        $doctor->mailing_address_1 = $request->mailing_address_1;
        $doctor->mailing_address_2 = $request->mailing_address_2;
        $doctor->save();
       
        // $mailing_address = Mailing_address::where('user_id',Auth::id())->first();
        // if(empty($mailing_address)){
        //   $mailing_address = new Mailing_address;
        // }
        // $mailing_address->user_id              = $doctor->id;
        // $mailing_address->office_first_name    = $request->office_first_name;
        // $mailing_address->office_last_name     = $request->office_last_name;
        // $mailing_address->office_email         = $request->office_email;
        // $mailing_address->office_phone         = $request->office_phone;
        // $mailing_address->office_address_1     = $request->office_address_1;
        // $mailing_address->office_address_2     = $request->office_address_2;
        // $mailing_address->office_city          = $request->office_city;
        // $mailing_address->office_state         = $request->office_state;
        // $mailing_address->office_country       = $request->office_country;
        // $mailing_address->office_zip_code      = $request->office_zip_code;
        // $mailing_address->residence_first_name = $request->residence_first_name;
        // $mailing_address->residence_last_name  = $request->residence_last_name;
        // $mailing_address->residence_email      = $request->residence_email;
        // $mailing_address->residence_phone      = $request->residence_phone;
        // $mailing_address->residence_address_1  = $request->residence_address_1;
        // $mailing_address->residence_address_2  = $request->residence_address_2;
        // $mailing_address->residence_city       = $request->residence_city;
        // $mailing_address->residence_state      = $request->residence_state;
        // $mailing_address->residence_country    = $request->residence_country;
        // $mailing_address->residence_zip_code   = $request->residence_zip_code;
        // $mailing_address->save();

        return response()->json(['status'=>true,'message'=>'Information updated successfully.']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_image(Request $request)
    {
        //
        // return $request->file('image');

        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move('public/doctor/images',$filename);
        $doctor = User::find(Auth::id());
        $doctor->image = '/public/doctor/images/'.$filename;
        $doctor->save();

        return response()->json(['status'=>true,'message'=>'profile updated successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
        //
         
        $doctor = User::find(Auth::id());
       // return $request->old_password; die;
        if(!Hash::check($request->old_password,$doctor->password)){
        return response()->json(['status'=>false,'message'=>'Old password not matched.']);
        }
        $doctor->password = Hash::make($request->new_password);
        $doctor->save();

        return response()->json(['status'=>true,'message'=>'Password updated successfully.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notification_setting(Request $request)
    {
        //
          $doctor = User::find(Auth::id());
          $doctor->notification = $request->type;
          $doctor->save();
          return response()->json(['status'=>true,'message'=>'Notification setting updated successfully.']);
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
        return redirect('/');
    }
    
    
    public function accept_patient($id,$status){
        
        if($status==1){
            
            $find_care =  Find_care::find(base64_decode($id));
            $find_care->assigned_to = Auth::id();
            $find_care->status = 2;
            $find_care->save();
            
            $checkPatientExist = Doctor_paitent::where('doctor_id',Auth::id())->where('patient_id',$find_care->patient_id)->first();
            if(empty($checkPatientExist)){
                $createPatient = new Doctor_paitent;
                $createPatient->doctor_id  = Auth::id();
                $createPatient->patient_id = $find_care->patient_id;
                $createPatient->save();
            }
            
            
            return back()->with('success','Patient Appointment accepted.');
        }else{
                
            $declined = new Declined_request;
            $declined->find_care_id = base64_decode($id);
            $declined->doctor_id    = Auth::id();
            $declined->save();
            
            return back()->with('success','Request removed successfully.');
        
        }
      
        
        
      
        
      
       
    }
    
    
    
    
    
    
    
    
    
    
}
