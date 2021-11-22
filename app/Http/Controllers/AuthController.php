<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Carbon\Carbon;

use App\User;
use App\Patient_detail;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function __construct(){
        
    }
    
    
     public function index()
    {
        //
        // return env('CHANGE_HEALTH_CARE_USER_ID');
        if(Auth::check() && Auth::user()->role==1){
            return redirect('patient/dashboard');
        }
        
       if(Auth::check() && Auth::user()->role==2){
            return redirect('doctor/dashboard');
        }
        return view('login');
    }
    
    
    
    // public function index()
    // {
    //     //
        
    //     if(Auth::check() && Auth::user()->role==1){
    //         return redirect('patient/dashboard');
    //     }
        
    //   if(Auth::check() && Auth::user()->role==2){
    //         return redirect('doctor/dashboard');
    //     }
    //     return view('doctor.login');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
     public function login(Request $request)
    {
        //
        // return $request->all();
        $request->validate([
         'email'    =>'required|email',
         'password' =>'required',
         'role'     =>'required'
        ]);

        // $credentials  = $request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=> $request->role,'is_deleted'=>0])){
           
           if(Auth::user()->role==1){
               
              return redirect('patient/dashboard');
           }
           if(Auth::user()->role==2){
               
               return redirect('doctor/dashboard');
           }
           
        }
        return back()->withInput()->with('failed','Please check email or password.');
    }
    
    
    
    // public function doctor_login(Request $request)
    // {
    //     //
    //     $request->validate([
    //      'email'=>'required|email',
    //      'password' =>'required'
    //     ]);

    //     // $credentials  = $request->only('email','password');
    //     if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>2,'is_deleted'=>0])){
    //     return redirect('doctor/dashboard');
    //     }
    //     return back()->withInput()->with('failed','Please check email or password.');
    // }
    
    
    
    
    public function doctor_register(){
        
      if(Auth::check() && Auth::user()->role==1){
            return redirect('patient/dashboard');
        }
        
       if(Auth::check() && Auth::user()->role==2){
            return redirect('doctor/dashboard');
        }
         return view('doctor.register');
        
    }
     public function doctor_post_register(Request $request)
    {
        
        // print_r($request->all()); die;
        // $request->validate([
        //     'first_name'=>'required',
        //     'last_name'=>'required',
        //     'email'=>'email|required',
        //     'password'=>'required|min:6',
        //     'confirm_password'=>'required|min:6|same:password'
        // ]);
        
        // $checkphone = User::where('phone',$request->phone)->where('is_deleted',0)->first();
        // if($checkphone) return back()->with('failed','Phone already exist.');
        
        // $checkemail = User::where('email',$request->email)->where('is_deleted',0)->first();
        // if($checkemail) return back()->with('failed','Email already exist.');
        
        $vf = mt_rand(100000, 999999);
        $user = new User;
        $user->image = '/public/users/default.png';
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->password   = Hash::make($request->password);
        $user->phone      = $request->phone;
        $user->address    = $request->address;
        $user->lat        = $request->latitude;
        $user->lng        = $request->longitude;
        $user->postal_code= $request->postal_code;
        $user->mailing_address_1 ='';
        $user->mailing_address_2 ='';
        
        if(!empty($request->doc)){
            $file = $request->doc;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('public/doctor/images',$filename); 
            $user->document    = $filename;
        }else{
            $user->document ='';
        }
       
        $user->role       = 2;
        $user->verfication_code = $vf;
        $user->save();
        
        
        $id = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $from = env('TWILIO_NUMBER');
        $to = "+91".$request->phone; // twilio trial verified number
        $body = "Verification OTP: ".$vf;
        $data = array (
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url );
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);
        var_dump($post);
        var_dump($y);
            
            
            
            // $to = $user->email;
            // $subject = "Smartvisit email verification";
            
            // $message = "<html>
            // <head>
            // <title>Smartvisit</title>
            // </head>
            // <body>
            //  <h4>Verification code :".$vf."</h4>
            // </body>
            // </html>
            // ";
            
            // // Always set content-type when sending HTML email
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // // More headers
            // $headers .= 'From: <project@cloudwapp.in>' . "\r\n";
            // // $headers .= 'Cc: myboss@example.com' . "\r\n";
            
            // mail($to,$subject,$message,$headers);
            
            
        // return redirect('patient/dashboard');
        return response()->json(['status'=>true,'message'=>"registration succesfully."]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function patient_index()
    {
        //
        if(Auth::check() && Auth::user()->role==1){
            return redirect('patient/dashboard');
        }
        
       if(Auth::check() && Auth::user()->role==2){
            return redirect('doctor/dashboard');
        }
         return view('patient.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patient_login(Request $request)
    {
        //
         $request->validate([
         'email'=>'required|email',
         'password' =>'required'
        ]);

        // $credentials  = $request->only('email','password');
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>1,'is_deleted'=>0])){
        return redirect('patient/dashboard');
        }
        return back()->withInput()->with('failed','Please check email or password.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patient_register()
    {
        
      if(Auth::check() && Auth::user()->role==1){
            return redirect('patient/dashboard');
        }
        
       if(Auth::check() && Auth::user()->role==2){
            return redirect('doctor/dashboard');
        }
        
      return view('patient.register');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    
    public function patient_post_register(Request $request)
    {
        // $request->validate([
        //     'first_name'=>'required',
        //     'last_name'=>'required',
        //     'email'=>'email|required',
        //     'password'=>'required|min:6',
        //     'confirm_password'=>'required|min:6|same:password'
        // ]);
        
        // $checkphone = User::where('phone',$request->phone)->where('is_deleted',0)->first();
        // if($checkphone) return back()->with('failed','Phone already exist.');
        
        // $checkemail = User::where('email',$request->email)->where('is_deleted',0)->first();
        // if($checkemail) return back()->with('failed','Email already exist.');
        
        $vf = mt_rand(100000, 999999);
        $user = new User;
        $user->image = '/public/users/default.png';
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->password   = Hash::make($request->password);
        $user->phone      = $request->phone;
        $user->dob        = $request->dob;
        $user->gender     = $request->gender;
        $user->address    = $request->address;
        $user->lat        = $request->latitude;
        $user->lng        = $request->longitude;
        $user->postal_code= $request->postal_code;
        $user->role       = 1;
        $user->verfication_code = $vf;
        $user->mailing_address_1 ='';
        $user->mailing_address_2 ='';
        $user->save();
        
        $patient_chc_id = 'SMV000'.$user->id;
        $pd = new Patient_detail;
        $pd->patient_id = $user->id;
        $pd->parent_id  = 0;
        $pd->chc_id     = $patient_chc_id;
        $pd->save();
        
        if($request->gender==1){
            $gend = 'M';
        }else{
            $gend = 'F';
        }
        
        $ch = curl_init();
        // $data = http_build_query($dataArray);
        $getUrl = "https://cli-cert.changehealthcare.com/servlet/DxLogin?userid={{env('CHANGE_HEALTH_CARE_USER_ID')}}&PW={{env('CHANGE_HEALTH_CARE_PWD')}}&hdnBusiness={{env('HDN')}}&apiLogin=true&target=jsp/lab/person/PersonDemographics.jsp&actionCommand=loadPMSData&P_ACT=".$patient_chc_id."&P_LNM=".$request->last_name."&P_FNM=".$request->first_name."&P_DOB=".Carbon::parse($user->dob)->format('m/d/Y')."&P_SEX=".$gend."";
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
                
        
        
        $id = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $from = env('TWILIO_NUMBER');
        $to = "+91".$request->phone; // twilio trial verified number
        $body = "Verification OTP: ".$vf;
        $data = array (
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url );
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);
        
        
        
        // 
            // $to = $user->email;
            // $subject = "Smartvisit email verification";
            
            // $message = "<html>
            // <head>
            // <title>Smartvisit</title>
            // </head>
            // <body>
            //  <h4>Verification code :".$vf."</h4>
            // </body>
            // </html>
            // ";
            
            // // Always set content-type when sending HTML email
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // // More headers
            // $headers .= 'From: <project@cloudwapp.in>' . "\r\n";
            // // $headers .= 'Cc: myboss@example.com' . "\r\n";
            
            // mail($to,$subject,$message,$headers);
            
            
            
            
            
        // return redirect('patient/dashboard');
        return response()->json(['status'=>true,'message'=>"registration succesfully."]);
    }
    
    
     
    public function verify_email(Request $request){
        
        $request->validate([
             'code'=>'required',
             'eem_code'=>'required'
            ],[
               'eem_code.required'=>'Something is wrong.' 
            ]);
            
        $user = User::where('email',base64_decode($request->eem_code))->where('verfication_code',$request->code)->first();
        if(empty($user)) return back()->with('failed',"Please check  your OTP.");
        
        if($user->status ==1){
            return redirect('login')->with('success',$user->role==1 ? "Patient account is already verified,login here!.":"Doctor account is already verified,login here!.");
        }else{
            
            $user->status =1;
            $user->save();
            
            return redirect('login')->with('success',$user->role==1 ? "Patient account verfication successfully,login here!.":"Doctor account verfication successfully,login here!.");
        
        }
 
        
    }
    
    
    
    
    public function logout(Request $request){
        
        Auth::logout();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
