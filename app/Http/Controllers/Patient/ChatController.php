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
use App\Chat_history;
use App\Chat_room;
use Carbon\Carbon;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
     //
     $page_title = "Inbox";
     $inbox = Chat_history::where('sender_id',Auth::id())->Orwhere('receiver_id',Auth::id())->orderby('updated_at','desc')->get();
     return view('patient.inbox',compact('page_title','inbox'));
    }
    
    
     public function chat($id)
    {

     $page_title = "Chat";
     $user_id = Auth::id();
     $receiver_id = base64_decode($id);
     $receiverdata = User::find(base64_decode($id));
     $chatroom  = Chat_room::where('sender_id',$user_id)->where('receiver_id',base64_decode($id))->orwhere('receiver_id',$user_id)->orwhere('sender_id',base64_decode($id))->orderby('created_at','asc')->get();
    
     Chat_history::where('receiver_id',$user_id)->where('is_seen',0)->update(['is_seen'=>1]);
     Chat_room::where('receiver_id',$user_id)->where('is_seen',0)->update(['is_seen'=>1]);
     
     return view('patient.chat',compact('page_title','chatroom','receiver_id','receiverdata'));
    }

  
    
  public function send_msg(Request $request)
    {
    //  $page_title = "Chat";
     
    //   return $request->all();
     $user = Auth::user();
    //  return $user->id;
     
     $chatHistory = Chat_history::where('sender_id',$user->id)->where('receiver_id',$request->receiver_id)->first();
     
     $chatHistory1 = Chat_history::where('sender_id',$request->receiver_id)->where('receiver_id',$user->id)->first();
     
     if(!empty($chatHistory)){
         $hasChatHistory =  $chatHistory;
         $chatHistory->sender_id   = $user->id;
         $chatHistory->receiver_id = $request->receiver_id;
         $chatHistory->message     = $request->message;
         $chatHistory->is_seen     = 0;
         $chatHistory->save();
         
        $chatroom = new Chat_room;
        $chatroom->chat_history_id = $chatHistory->id;
        $chatroom->sender_id       = $user->id;
        $chatroom->receiver_id     = $request->receiver_id;
        $chatroom->message         = $request->message;
        $chatroom->save(); 
        
     }else if(!empty($chatHistory1)){
         $hasChatHistory =  $chatHistory1;
         $chatHistory1->sender_id   = $user->id;
         $chatHistory1->receiver_id = $request->receiver_id;
         $chatHistory1->message     = $request->message;
         $chatHistory1->is_seen     = 0;
         $chatHistory1->save();
         
        $chatroom = new Chat_room;
        $chatroom->chat_history_id = $chatHistory1->id;
        $chatroom->sender_id       = $user->id;
        $chatroom->receiver_id     = $request->receiver_id;
        $chatroom->message         = $request->message;
        $chatroom->save(); 
        
     }else{
         $chat = new Chat_history;
         $chat->sender_id   = $user->id;
         $chat->receiver_id = $request->receiver_id;
         $chat->message     = $request->message;
         $chat->is_seen     = 0;
         $chat->save(); 
         
         
        $chatroom = new Chat_room;
        $chatroom->chat_history_id = $chat->id;
        $chatroom->sender_id       = $user->id;
        $chatroom->receiver_id     = $request->receiver_id;
        $chatroom->message         = $request->message;
        $chatroom->save(); 
     }
     
     
      
      
    
       $chatroom  = Chat_room::where('sender_id',$user->id)->where('receiver_id',$request->receiver_id)->orwhere('receiver_id',$user->id)->orwhere('sender_id',$request->receiver_id)->orderby('created_at','asc')->get();
     
        $html = '';
        foreach($chatroom as $key => $row){
        
        if(Auth::id() != $row->sender_id){
               $html.= '<div class="msg left-msg">
                <div
                class="msg-img"
                style="background-image: url('. url($row->user->image).')"
                ></div>
                
                <div class="msg-bubble">
                <div class="msg-info">
                <div class="msg-info-name">'.$row->user->first_name .' '. $row->user->last_name.'</div>
                <div class="msg-info-time">'.\Carbon\Carbon::parse($row->created_at)->diffForHumans().'</div>
                </div>
                
                <div class="msg-text">
                '.$row->message.'
                </div>
                </div>
                </div>';
        }else{
        
        
              $html.='<div class="msg right-msg">
                <div
                class="msg-img"
                style="background-image: url('.url(Auth::user()->image).')"
                ></div>
                
                <div class="msg-bubble">
                <div class="msg-info">
                <div class="msg-info-name">'.Auth::user()->first_name.' '.Auth::user()->last_name.'</div>
                <div class="msg-info-time">'. \Carbon\Carbon::parse($row->created_at)->diffForHumans().'</div>
                </div>
                
                <div class="msg-text">
                '.$row->message.'
                </div>
                </div>
                </div>';
        }
        
        }
                 
                                 
         
         echo  $html;
         
         
         
     
     
    // echo "ok";
    //  return view('patient.chat',compact('page_title'));
    }
 
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_msg(Request $request)
    {
        
        $user = Auth::user();
        
        $chatroom  = Chat_room::where('sender_id',$user->id)->where('receiver_id',$request->receiver_id)->orwhere('receiver_id',$user->id)->orwhere('sender_id',$request->receiver_id)->orderby('created_at','asc')->get();
     
        $html = '';
        foreach($chatroom as $key => $row){
        
        if(Auth::id() != $row->sender_id){
               $html.= '<div class="msg left-msg">
                <div
                class="msg-img"
                style="background-image: url('. url($row->user->image).')"
                ></div>
                
                <div class="msg-bubble">
                <div class="msg-info">
                <div class="msg-info-name">'.$row->user->first_name .' '. $row->user->last_name.'</div>
                <div class="msg-info-time">'.\Carbon\Carbon::parse($row->created_at)->diffForHumans().'</div>
                </div>
                
                <div class="msg-text">
                '.$row->message.'
                </div>
                </div>
                </div>';
        }else{
        
        
              $html.='<div class="msg right-msg">
                <div
                class="msg-img"
                style="background-image: url('.url(Auth::user()->image).')"
                ></div>
                
                <div class="msg-bubble">
                <div class="msg-info">
                <div class="msg-info-name">'.Auth::user()->first_name.' '.Auth::user()->last_name.'</div>
                <div class="msg-info-time">'. \Carbon\Carbon::parse($row->created_at)->diffForHumans().'</div>
                </div>
                
                <div class="msg-text">
                '.$row->message.'
                </div>
                </div>
                </div>';
        }
        
        }
                 
                                 
         
         echo  $html;
         
         
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
   
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_seen_status()
    {
        
         $check_seen = Chat_room::where('receiver_id',Auth::id())->where('is_seen',0)->get();
        if(!empty($check_seen) && count($check_seen) >0){
            echo 1;
        }else{
            echo 0;
        }
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
}