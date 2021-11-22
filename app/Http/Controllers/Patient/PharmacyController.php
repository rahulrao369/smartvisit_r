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
use App\Pharmacy;

class PharmacyController extends Controller
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
     return view('patient.dashboard',compact('page_title'));
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pharmacy(Request $request)
    {
        //
        $page_title ='Pharmacy';
        $patient = User::find(Auth::id());
        $pharmacy = Pharmacy::select(\DB::raw('*, ( 6367 * acos( cos( radians('.$patient->lat.') ) * cos( radians( loc_LAT_centroid ) ) * cos( radians( loc_LONG_centroid ) - radians('.$patient->lng.') ) + sin( radians('.$patient->lat.') ) * sin( radians( loc_LAT_centroid ) ) ) ) AS distance'))
                                            ->having('distance', '<', 50)
                                            ->orderBy('distance');
       $old = $request->search;
        if($request->search){
           $pharmacy->where('e_postal','like','%'.$request->search.'%'); 
        }
        
        $pharmacy = $pharmacy->where('status',1)->where('is_deleted',0)->get();
            
        return view('patient.pharmacy',compact('page_title','pharmacy','old'));
    }

   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pharmacy_details($id)
    {
        //
        $page_title ='Pharmacy';
        $pharmacy = Pharmacy::find(base64_decode($id));
        return view('patient.pharmacy_details',compact('page_title','pharmacy'));
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