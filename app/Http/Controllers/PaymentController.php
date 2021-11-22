<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Bank_detail;
use App\Transaction;
use App\Find_care;
use Stripe;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title = "Payments";
        $bk = Bank_detail::where('doctor_id',Auth::id())->first();
        return view('doctor.payments',compact('page_title','bk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $page_title = "Payments";
         $bk = Bank_detail::where('doctor_id',Auth::id())->where('is_deleted',0)->first();
         return view('doctor.payments_view',compact('page_title','bk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_bank_details(Request $request)
    {
        $request->validate([
             'bank_name'=>'required',
             'routing'  =>'required',
             'account_number'  =>'required'
            ]);
        
        if(!empty($request->id)){
            
            $bk = Bank_detail::find(base64_decode($request->id));
            $bk->doctor_id      = Auth::id();
            $bk->bank_name      = $request->bank_name;
            $bk->routing        = $request->routing;
            $bk->account_number = $request->account_number;
            $bk->save();
            
        }else{
            
            $bk = new Bank_detail;
            $bk->doctor_id        = Auth::id();
            $bk->bank_name        = $request->bank_name;
            $bk->routing          = $request->routing;
            $bk->account_number   = $request->account_number;
            $bk->save(); 
            
        }
       
        
        return back()->with('success','Bank details updated successfully');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function payment_page(Request $request){
         
        $page_title ="Payments";
        $ttid =  base64_decode($request->ttid);
        $gettid = Transaction::find($ttid);
        
        if(empty($gettid)) {  echo "Invalid access"; }
        $amount = $gettid->amount;
        
       
        return view('patient.payment',compact('page_title','amount','ttid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment_charge(Request $request)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create(array( 
            'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
            'description' => 'test description',        
            'email' => Auth::user()->email, 
            'source'  => $request->stripeToken 
        ));
 
       
        $rslt =  Stripe\Charge::create ([
                'customer' => $customer->id, 
                "amount" => 100*$request->amount,
                "currency" => "usd",
                // "source" => $request->stripeToken,
                "description" => "payment",
                "metadata"=>["transaction_table_id"=>$request->ttid]
        ]);
        
        $gettid = Transaction::find($request->ttid);
        
        if($rslt['status']=="succeeded"){
            
            $gettid->transaction_id = $rslt['id'];
            // $gettid->amount =2;
            $gettid->payment_status =2;
            $gettid->json_response = json_encode($rslt);
            $gettid->save();
            
            $fc = Find_care::find($gettid->find_care_id);
            $fc->payment_status =2;
            $fc->save();
            //   echo "<pre>";
            //   print_r($rslt); die; 
              return redirect('patient/visitfor')->with('success','Appointment has been scheduled successfully.');
        }else{
               $gettid->payment_status =3;
               $gettid->json_response = json_encode($rslt);
               $gettid->save();
               return redirect('patient/visitfor')->with('failed','Payment failed.');
            
        }
        
        
        
        
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
