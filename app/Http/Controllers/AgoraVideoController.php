<?php

namespace App\Http\Controllers;

use App\User;
use App\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;

class AgoraVideoController extends Controller
{
    public function index(Request $request)
    {
        // fetch all users apart from the authenticated user
        $users = User::where('id', '<>', Auth::id())->get();
        return view('agora-chat', ['users' => $users]);
    }

    protected function token(Request $request)
    {
       
        $appID ="b251038bb6c545c68c36efd134fa745f"; // env('AGORA_APP_ID'); 
        $appCertificate ="0aad3d65e8b04565ad93cf2d013912f4"; // env('AGORA_APP_CERTIFICATE');
        $getpatient = User::find($request->patient_id);
        
        $channelName = $getpatient->first_name.'-'.Auth::user()->first_name;
        $user = Auth::user()->name;
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);
        
        $call = new Call;
        $call->patient_id = $request->patient_id;
        $call->doctor_id  = Auth::user()->id;
        // $call->appid      = $appID; 
        $call->channel    = $channelName;
        $call->temp_token = $token;
        $call->is_calling = 1;
        $call->save();
        
        return response()->json(['token'=>$token,'appid'=>$appID,'channel'=>$channelName]); 
    }

    public function callUser(Request $request)
    {

        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = Auth::id();

        broadcast(new MakeAgoraCall($data))->toOthers();
    }
}
