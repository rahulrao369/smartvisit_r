<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\Stock;
use App\Stock_history;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $page_title = "Dashboard";
       
        return view('dashboard',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_title ="Profile";
        $user = User::find(Auth::id());
        
        return view('profile',compact('user','page_title'));
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
          //
        $request->validate([
          'name'=>'required',
          'phone'=>'required',
          'address'=>'required'
        ]);

        $user = User::find(Auth::id());
        $user->name  = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect('dashboard');
    }



    public function change_password()
    {
        $page_title = "Change password";
        return view('change-password',compact('page_title'));
    }



     public function store_change_password(Request $request)
    {


        $request->validate([
           'new_password'=>'required|min:6',
           'confrim_password'=>'required|min:6|same:new_password'
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->random_password = base64_encode($request->new_password);
        $user->save();

        return redirect()->back()->with('success','Password has been changed successfully.');
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
    public function destroy()
    {
        //
        Auth::logout();
        return redirect('/');
    }
}
