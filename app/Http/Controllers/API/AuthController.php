<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Str;
use App\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // / patient register
    public function index(Request $request)
    {
        //
         
        if(empty($request->first_name)) return response()->json(['status'=>false,'message'=>'Firstname is required.']);
        if(empty($request->last_name)) return response()->json(['status'=>false,'message'=>'Lastname is required.']);
        if(empty($request->email)) return response()->json(['status'=>false,'message'=>'Email is required.']);
        if(empty($request->phone)) return response()->json(['status'=>false,'message'=>'Phone is required.']);
        if(empty($request->password)) return response()->json(['status'=>false,'message'=>'Password is required.']);

        $checkEmail = User::where('email',$request->email)->where('status',1)->where('is_deleted',0)->first();
        if(!empty($checkEmail)) return response()->json(['status'=>false,'message'=>'Email already exist.']);

        $checkPhone = User::where('phone',$request->phone)->where('status',1)->where('is_deleted',0)->first();
        if(!empty($checkPhone)) return response()->json(['status'=>false,'message'=>'Phone already exist.']);
        

        $user = new User;
        $user->image      = "/public/patient/images/default.png";
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->password   = Hash::make($request->password);
        $user->role       = 1;
        $user->token      = Str::random(52);
        $user->save();
        
        $data['status'] = true;
        $data['data']   = ['token'=>$user->token];
        $data['message'] = 'Registration successfully.';

        return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // patient login
    public function create(Request $request)
    {
        //
        
        if(empty($request->email)) return response()->json(['status'=>false,'message'=>'Email is required.']);
        if(empty($request->password)) return response()->json(['status'=>false,'message'=>'Password is required.']);

        $user = User::where('email',$request->email)->where('status',1)->where('is_deleted',0)->first();
        if(empty($user)) return respnose()->json(['status'=>false,'message'=>'Account not found.']);
        if(!Hash::check($request->password,$user->password)) return response()->json(['status'=>false,'message'=>'Please check your password.']);

        $user->token = Str::random(52);
        $user->save();
        
        $data['status'] = true;
        $data['data']   = ['token'=>$user->token];
        $data['message'] = 'Login successfully.';
        return response()->json($data);





         
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
