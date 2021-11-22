<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Visit_reason;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     $page_title = "Profile";
     
     return view('patient.edit_profile',compact('page_title'));
    }
    
    public function store(Request $request)
    {
     //print_r($request->all()); die;
     $page_title = "Profile";
     
     $request->validate([
                    'first_name'=>'required',
                    'last_name' =>'required',
                    'address'   =>'required',
                    'lat'       =>'required',
                    'lng'       =>'required',
         ]);
         
     $user = User::find(Auth::id());
     
     if(!empty($request->image)){
        $file     =  $request->image;
        $filename =  time().'.'.$file->getClientOriginalExtension();
        $file->move('public/users/',$filename);
        $user->image      = '/public/users/'.$filename;
     }
    
     $user->first_name = $request->first_name;
     $user->last_name  = $request->last_name;
     $user->address    = $request->address;
     $user->lat        = $request->lat;
     $user->lng        = $request->lng;
     $user->insurance_provider = '';//$request->insurance_provider;
     $user->member_id  = '';//$request->member;
     $user->rxbin = '';//$request->rxbin;
     $user->save();
     
    //  return response()->json(['status'=>true]);
    return  back()->with('success','Profile has updated successfully.');
     
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
    public function destroy()
    {
        //
        Auth::logout();
        return redirect('patient/login');
    }
}