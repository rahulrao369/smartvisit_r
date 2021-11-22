<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\State;
use App\Country;
use App\Clinical_update;
use App\User;
use App\Symptom;
use App\Declined_request;

use Zoom;
use Auth;
use Str;
use Hash;
use Illuminate\Support\Facades\Route;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     if(Auth::check() && Auth::user()->role==1){
            return redirect('patient/dashboard');
        }
        
       if(Auth::check() && Auth::user()->role==2){
            return redirect('doctor/dashboard');
        }
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clinical_update()
    {
        //
        $page_title = "Clinical Updates";
        $clinical_update = Clinical_update::where('status',1)->where('is_deleted',0)->latest()->get();
        return view('doctor.clinical_update',compact('clinical_update','page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clinical_details($id)
    {
        //
        $page_title = "Clinical Updates";
        $clinical_update = Clinical_update::find(base64_decode($id));
        return view('doctor.clinical_details',compact('clinical_update','page_title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_state(Request $request)
    {
        //
        $state = State::where('country_id',$request->country_id)
                                                    ->where('status',1)
                                                    ->where('is_deleted',0)
                                                    ->get();

        $html = '';
           if(count($state) > 0 ){
             $html.= '<option value="">--select--</option>';
             foreach($state as $kye => $row){
             $html.= '<option value="'.$row->id.'">'.$row->name.'</option>';
             }
            }

        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_city(Request $request)
    {
        //
         $city = City::where('state_id',$request->state_id)
                                                    ->where('status',1)
                                                    ->where('is_deleted',0)
                                                    ->get();

        $html = '';
           if(count($city) > 0 ){
             $html.= '<option value="">--select--</option>';
             foreach($city as $kye => $row){
             $html.= '<option value="'.$row->id.'">'.$row->name.'</option>';
             }
            }

        return $html;
    }


    public function form_load_data(Request $request){
        

         $country = Country::where('status',1)->where('is_deleted',0)->get();
         
         $state = State::where('country_id',$request->country_id)
                                                    ->where('status',1)
                                                    ->where('is_deleted',0)
                                                    ->get();

         $city = City::where('state_id',$request->state_id)
                                                    ->where('status',1)
                                                    ->where('is_deleted',0)
                                                    ->get();

        

        $html = '<option value="" selected disabled>--select--</option>';
           if(count($state) > 0 ){
             // $html.= '<option value="" selected disabled>--select--</option>';
             foreach($state as $kye => $row){
             $html.= '<option value="'.$row->id.'" '.($row->id==$request->state_id ? 'selected':'').'>'.$row->name.'</option>';
             }
            }

        

        $html1 = '<option value="" selected disabled>--select--</option>';
           if(count($city) > 0 ){
             // $html1.= '<option value="" selected disabled>--select--</option>';
             foreach($city as $kye => $row){
             $html1.= '<option value="'.$row->id.'" '.($row->id==$request->city_id ? 'selected':'').'>'.$row->name.'</option>';
             }
            }

         
         $html2 = '<option value="" selected disabled>--select--</option>';
           if(count($country) > 0 ){
           
             foreach($country as $kye => $row){
             $html2.= '<option value="'.$row->id.'" '.($row->id==$request->country_id ? 'selected':'').'>'.$row->name.'</option>';
             }
            }






              $html11 = '<option value="" selected disabled>--select--</option>';
           if(count($state) > 0 ){
             // $html.= '<option value="" selected disabled>--select--</option>';
             foreach($state as $kye => $row){
             $html11.= '<option value="'.$row->id.'" '.($row->id==$request->rstate_id ? 'selected':'').'>'.$row->name.'</option>';
             }
            }

        

        $html12 = '<option value="" selected disabled>--select--</option>';
           if(count($city) > 0 ){
             // $html1.= '<option value="" selected disabled>--select--</option>';
             foreach($city as $kye => $row){
             $html12.= '<option value="'.$row->id.'" '.($row->id==$request->rcity_id ? 'selected':'').'>'.$row->name.'</option>';
             }
            }

         
         $html13 = '<option value="" selected disabled>--select--</option>';
           if(count($country) > 0 ){
           
             foreach($country as $kye => $row){
             $html13.= '<option value="'.$row->id.'" '.($row->id==$request->rcountry_id ? 'selected':'').'>'.$row->name.'</option>';
             }
            }


         return response()->json(['office_state'=>$html,'office_city'=>$html1,'office_country'=>$html2,
            'residence_state'=>$html11,'residence_city'=>$html12,'residence_country'=>$html13]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patient(Request $request, $id)
    {
        //
        return view('patient.login');
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
    
    
    
    public function validate_name(Request $request){
      
      $key = "WS68-ZYC1-NFD1";
      $fulname =rawurlencode($request->name);

      
      
      $url ='https://trial.serviceobjects.com/NV2/api.svc/NameInfoV2?Name='.$fulname.'&Option=&LicenseKey='.$key.'&format=json';
  
      $curl_handle=curl_init();
      curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($curl_handle,CURLOPT_URL,$url);
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      $buffer = curl_exec($curl_handle);
      curl_close($curl_handle);
      if (empty($buffer)){
          return $buffer;
      }
      else{
          return $buffer;
      }
        
    }
    
    
    
    public function validate_email(Request $request){
        
      $email =$request->email;
      $emailExist = User::where('email',$email)->where('status',1)->where('is_deleted',0)->first();
      if($emailExist) return response()->json(['email'=>'Email already exist.']);
      $key = "WS73-KMB1-SGX4";
      

      
      
      $url ='https://trial.serviceobjects.com/ev3/web.svc/json/ValidateEmailAddress?EmailAddress='.$email.'&AllowCorrections=false&Timeout=200&LicenseKey='.$key.'';
  
      $curl_handle=curl_init();
      curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($curl_handle,CURLOPT_URL,$url);
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      $buffer = curl_exec($curl_handle);
      curl_close($curl_handle);
      if (empty($buffer)){
          return $buffer;
      }
      else{
          return $buffer;
      }
        
        
    }
    
    
    
    public function validate_address(Request $request){
        
      $key = "WS72-KLY1-JNM2";
      $address =$request->address;

      
      
      $url ='https://trial.serviceobjects.com/AV3/api.svc/GetBestMatchesSingleLineJson?BusinessName=smartvisit&Address='.rawurlencode($address).'&LicenseKey='.$key.'';
  
      $curl_handle=curl_init();
      curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($curl_handle,CURLOPT_URL,$url);
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      $buffer = curl_exec($curl_handle);
      curl_close($curl_handle);
      if (empty($buffer)){
          return $buffer;
      }
      else{
          return $buffer;
      }
    }
    
    
    
    
    
     public function check_patient_email(Request $request)
    {
       $email =  User::where('email',$request->email)->where('status',1)->where('is_deleted',0)->first();
       
       if(!empty($email)) return response()->json(['status'=>false,'message'=>'*email already exist.']);
       
       return response()->json(['status'=>true,'message'=>'*You can register by this email.']);
    }
    
    public function check_patient_phone(Request $request)
    {
       $phone =  User::where('phone',$request->phone)->where('status',1)->where('is_deleted',0)->first();
       
       if(!empty($phone)) return response()->json(['status'=>false,'message'=>'*phone number already exist.']);
       
       return response()->json(['status'=>true,'message'=>'*You can register by this phone.']);
    }
    
    
    public function success_page(){
        return view('success_page');
    }
    
    
    
    public function get_symtoms(Request $request){
        
      $data = Symptom::where('visit_reason_id',$request->id)->where('is_deleted',0)->get();
      
      $html = '';
      
      foreach($data as $row){
         $html.='<li><article class="feature1"><input type="checkbox" id="symptomss" name="symptomss[]" value="'.$row->id.'"/><div><span>'.$row->name.'</span></div></article></li>'; 
      }
      
      echo $html;
    }
    
    
    
    public function test(Request $request){
        
           $routeName = Route::currentRouteName();
        // 	dd($routeName);
        $page_title = "Patient";
        return view('patient/'.$routeName,compact('page_title'));
    }
    
    
    public function calling($patient_id){
        $page_title = 'xyz';
        return view('doctor.callpage',compact('page_title','patient_id'));
    }
    
    
    public function forgetpassword(){
        
        return view('patient.forgetpassword');
    }
    
    public function send_mail_forget_password(Request $request){
        
        
            $request->validate([
                               'email'=>'required|email',
                               'role'=>'required'
                              ]);
                              
            $user = User::where('email',$request->email)->where('role',$request->role)->where('status',1)->where('is_deleted',0)->first();
            if(empty($user)) return back()->with('success','Email not found.');
            $token =  (String)Str::uuid();
              
            
            
            $to = $user->email;
            
            $subject = "Smartvisit forget password";
            
           $urlklink =base64_encode('email='.$to.'&forget-token='.$token);
            $message = "<html>
            <head>
            <title>Smartvisit</title>
            </head>
            <body>
             <a href='".url('reset-password?Tz='.$urlklink)."'><h4>click here for reset password</a>
            </body>
            </html>
            ";
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <project@cloudwapp.in>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            
            if(mail($to,$subject,$message,$headers)){
                $user->is_forget = 1;
                $user->forget_token = $token;
                $user->save();
                return back()->with('success','Email has sent to your email.'); 
            }else{
                return back()->with('failed','Email cannot send.'); 
            }
            
            
    }
    
    
    
    public function reset_password(Request $request){
        
    //   print_r($_GET); die();
         if($request->submit){
                         
                   $url = explode('&', base64_decode($_GET['Tz']));
                   $email = explode('=',$url[0]);   
                   $token = explode('=',$url[1]);   
                         
                   

              $request->validate([
               'password'         =>'required|min:6',
               'confirm_password' =>'required|min:6|same:password'
              ]);
              
                              
             $user = User::where('email',$email[1])->where('forget_token',$token[1])->where('status',1)->where('is_deleted',0)->first();
             if(empty($user)) return redirect('login');
             $user->password = Hash::make($request->password);
             $user->is_forget = 0;
             $user->forget_token = '';
             $user->save();
             
             $page =3;
            
             return view('patient.reset_password',compact('page'));
              
         }
         
           $url = explode('&', base64_decode($_GET['Tz']));
           $email = explode('=',$url[0]);   
           $token = explode('=',$url[1]);  
                   
         $is_user_forget = User::where('email',$email[1])->where('is_forget',0)->where('forget_token',$token[1])->where('status',1)->where('is_deleted',0)->first();
         if(!empty($is_user_forget)){
            //  token expire
            
             $page = 2;
             return view('patient.reset_password',compact('page'));
         }
        //  $user = User::where('email',$request->email)->where('forget_token',$request->forget_token)->where('status',1)->where('is_deleted',0)->first();
        //  if(empty($user)){
             
        //  }
        
         $page = 1;
         return view('patient.reset_password',compact('page'));
    }
    
    
    
    public function sendSms(){
            
            
            $id = env('TWILIO_ACCOUNT_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $from = env('TWILIO_NUMBER');
           
            $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
           
            $to = "+12013797871"; // twilio trial verified number
            $body = "Verification";
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
            
               //return $user = Zoom::user();
               
            // $user = Zoom::user()->create([
            //     'first_name' => 'First Name',
            //     'last_name' => 'Last Name',
            //     'email' => 'test@test.com',
            //     'password' => 'secret123'
            // ]); 
            
            //   $meeting = Zoom::meeting();
            
            // return Hash::make(123456789);
        //     $user = Zoom::user()->create([
        //             'first_name' => 'First Name',
        //             'last_name' => 'Last Name',
        //             'email' => 'example@example.com',
        //             'password' => '123456789',
        //             'type'=>1
        //     ]);
        //     print_r($user); die;
     
     
        // //  $users = Zoom::user()->all();
        // // //   $users = Zoom::user()->where('status',1)->get();
        // //   print_r($user);
        // //   die;
           
        //         $meeting = Zoom::meeting()->make([
        //           'topic' => 'New meeting',
        //           'type' => 8,
        //           'start_time' => new \Carbon\Carbon('2021-09-20 04:00:00'), // best to use a Carbon instance here.
        //         ])->toArray();
        //         echo "<pre>";
        //         print_r($meeting);
                    
        
    }
    
    
    
    public function declined_request(Request $request){
        
        // $declined = new Declined_request;
        // $declined->find_care_id = $request->find_care_id;
        // $declined->doctor_id    = Auth::id();
        // $declined->save();
        
        // return response()->json(1);
    }
    
    
    
    
}
