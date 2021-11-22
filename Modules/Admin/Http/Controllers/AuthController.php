<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Hash;
use Auth;
use App\Admin;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect('admin/dashboard');
        }
        return view('admin::login');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
       $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6'
       ]);

       $credential = $request->only('email','password');
       if(Auth::guard('admin')->attempt($credential)){
         return redirect('admin/dashboard');
       }else{
         return redirect()->back()->with('failed','Please check email or password.')->withInput();
       }

        // return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */

    //forgeg password
    public function store(Request $request)
    {
        //
        $admin = Admin::where('email',$request->email)->where('is_deleted',0)->get();

        if(empyt($admin)) return redirect()->back()->with('failed','Account not found.');

            $randNum = mt_rand(100000,999999); 
            $to = $admin->email;
            $subject = "Forget Password";

            $message = '
            <html>
            <head>
            <title>GDL GLOBAL</title>
            </head>
            <body>
            <p>Verification!</p>
            <a href="'.url("admin/verification").'?token='.base64_encode($request->email).'&RDN='.$randNum.'">Click to verify</a>
             </body>
            </html>
            ';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to,$subject,$message,$headers);


        return view('admin::forgot-password');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {

        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
