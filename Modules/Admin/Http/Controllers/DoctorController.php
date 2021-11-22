<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DataTables;
use Carbon\Carbon;
use Hash;
use Auth;
use App\User;
use App\Mailing_address;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $page_title = 'Doctors';

        if($request->ajax()){
         
         $data = User::where('role',2)->where('is_deleted',0)->latest()->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                            //  ->addColumn('average_price',function($data){
                            //      $btn=  number_format($data->current_price,2); 
                            //     // $btn=  number_format($data->total_amount/$data->quantity,2); 
                            //     return $btn;
                            // })
                            // ->addColumn('buying_price',function($data){
                            //     $btn=  number_format($data->buying_price,2); 
                            //     return $btn;
                            // })
                            // ->addColumn('total',function($data){
                            //     $btn=  number_format($data->total_amount,2); 
                            //     return $btn;
                            // })
                            //  ->addColumn('date',function($data){
                            //     $btn=  Carbon::parse($data->created_at)->format('d F Y');
                            //     return $btn;
                            // })
                            ->addColumn('action',function($data){
                                // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                $btn='<a href="'.url("admin/doctor/edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/doctor/delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                // $btn.='<a href="javascript:void(0)" class="mr-4 btn btn-warning" id="st-add-quantity" data-pid="'.base64_encode($data->id).'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }


        return view('admin::doctor.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Doctor create';
        return view('admin::doctor.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //

        // return print_r($request->all());
        $request->validate([
         'first_name' =>'required',
         'last_name'  =>'required',
         'email'     =>'required|email',
         'phone'     =>'required|numeric',
         'password'     =>'required|min:6']);

        //  'office_first_name'=>'required',
        //  'office_last_name' =>'required',
        //  'office_email'    =>'required|email',
        //  'office_phone'    =>'required|numeric',
        //  'office_address_1' =>'required',
        //  'office_address_2' =>'required',
        //  'office_city'     =>'required',
        //  'office_zip_code'  =>'required',
        //  'office_country'  =>'required',
        //  'office_state'    =>'required',

        //  'residence_first_name'=>'required',
        //  'residence_last_name' =>'required',
        //  'residence_email'    =>'required|email',
        //  'residence_phone'    =>'required|numeric',
        //  'residence_address_1' =>'required',
        //  'residence_address_2' =>'required',
        //  'residence_city'     =>'required',
        //  'residence_zip_code'  =>'required',
        //  'residence_country'  =>'required',
        //  'residence_state'    =>'required',

        
        // ],[
        //  'office_first_name.required' =>'Please fill firstname.',
        //  'office_last_name.required'  =>'Please fill lastname.',
        //  'office_email.required'     =>'Please fill email.',
        //  'office_phone.required'     =>'Please fill phone',

        //  'office_first_name.required'=>'Please fill firstname',
        //  'office_last_name.required' =>'Please fill lastname',
        //  'office_email.required'    =>'Please fill phone',
        //  'office_phone.required.required'=>'Please fill email',
        //  'office_address_1.required' =>'Please fill address 1',
        //  'office_address_2.required' =>'Please fill address 2',
        //  'office_city.required'     =>'Please fill city',
        //  'office_zip_code.required'  =>'Please fill zipcode',
        //  'office_country.required'  =>'Please fill country',
        //  'office_state.required'    =>'Please fill state',

        //  'residence_first_name.required'=>'Please fill firstname',
        //  'residence_last_name.required' =>'Please fill lastname',
        //  'residence_email.required'    =>'Please fill phone',
        //  'residence_phone.required'    =>'Please fill email',
        //  'residence_address_1.required' =>'Please fill address 1',
        //  'residence_address_2.required' =>'Please fill address 2',
        //  'residence_city.required'     =>'Please fill city',
        //  'residence_zip_code.required'  =>'Please fill zipcode',
        //  'residence_country.required'  =>'Please fill country',
        //  'residence_state.required'    =>'Please fill state',
        // ]);
        
        $checkExist = User::where('email',$request->email)
                                ->where('role',2)
                                ->where('status',1)
                                ->where('is_deleted',0)
                                ->first();

        

        if(!empty($checkExist)) return redirect()
                                                ->back()
                                                ->withInput()
                                                ->with('failed','Email is already exist.');

        $doctor = new User();
        $doctor->first_name    = $request->first_name;
        $doctor->last_name     = $request->last_name;
        $doctor->email         = $request->email;
        $doctor->phone         = $request->phone;
        $doctor->role          = 2;
        $doctor->password      = Hash::make($request->password);
         $doctor->status        = 1;
        $doctor->save();


        // $mailing_address = new Mailing_address;
        // $mailing_address->user_id               =$doctor->id;
        // $mailing_address->office_first_name     =$request->office_first_name;
        // $mailing_address->office_last_name      =$request->office_last_name;
        // $mailing_address->office_email          =$request->office_email;
        // $mailing_address->office_phone          =$request->office_phone;
        // $mailing_address->office_address_1      =$request->office_address_1;
        // $mailing_address->office_address_2      =$request->office_address_2;
        // $mailing_address->office_zip_code       =$request->office_zip_code;
        // $mailing_address->office_city           =$request->office_city;
        // $mailing_address->office_state          =$request->office_state;
        // $mailing_address->office_country        =$request->office_country;
        // $mailing_address->residence_first_name  =$request->residence_first_name;
        // $mailing_address->residence_last_name   =$request->residence_last_name;
        // $mailing_address->residence_email       =$request->residence_email;
        // $mailing_address->residence_phone       =$request->residence_phone;
        // $mailing_address->residence_address_1   =$request->residence_address_1;
        // $mailing_address->residence_address_2   =$request->residence_address_2;
        // $mailing_address->residence_zip_code    =$request->residence_zip_code;
        // $mailing_address->residence_city        =$request->residence_city;
        // $mailing_address->residence_state       =$request->residence_state;
        // $mailing_address->residence_country     =$request->residence_country;
        // $mailing_address->save();
     


        return redirect('admin/doctor')->with('success','Doctor added successfully.');
        
        // return redirect()->back()->with('failed','Product cannot add.');
       

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $page_title = 'Doctor details';
        $doctor = User::find(base64_decode($id));
        return view('admin::doctor.show',compact('page_title','doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page_title = 'Doctor edit';
        $doctor = User::find(base64_decode($id));
        return view('admin::doctor.edit',compact('page_title','doctor'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        //
        // return print_r($request->all());
          $request->validate([
         'first_name' =>'required',
         'last_name'  =>'required',
         'email'     =>'required|email',
         'phone'     =>'required|numeric']);
         // 'password'     =>'required|min:6',

        //  'office_first_name'=>'required',
        //  'office_last_name' =>'required',
        //  'office_email'    =>'required|email',
        //  'office_phone'    =>'required|numeric',
        //  'office_address_1' =>'required',
        //  'office_address_2' =>'required',
        //  'office_city'     =>'required',
        //  'office_zip_code'  =>'required',
        //  'office_country'  =>'required',
        //  'office_state'    =>'required',

        //  'residence_first_name'=>'required',
        //  'residence_last_name' =>'required',
        //  'residence_email'    =>'required|email',
        //  'residence_phone'    =>'required|numeric',
        //  'residence_address_1' =>'required',
        //  'residence_address_2' =>'required',
        //  'residence_city'     =>'required',
        //  'residence_zip_code'  =>'required',
        //  'residence_country'  =>'required',
        //  'residence_state'    =>'required',

        
        // ],[
        //  'office_first_name.required' =>'Please fill firstname.',
        //  'office_last_name.required'  =>'Please fill lastname.',
        //  'office_email.required'     =>'Please fill email.',
        //  'office_phone.required'     =>'Please fill phone',

        //  'office_first_name.required'=>'Please fill firstname',
        //  'office_last_name.required' =>'Please fill lastname',
        //  'office_email.required'    =>'Please fill phone',
        //  'office_phone.required.required'=>'Please fill email',
        //  'office_address_1.required' =>'Please fill address 1',
        //  'office_address_2.required' =>'Please fill address 2',
        //  'office_city.required'     =>'Please fill city',
        //  'office_zip_code.required'  =>'Please fill zipcode',
        //  'office_country.required'  =>'Please fill country',
        //  'office_state.required'    =>'Please fill state',

        //  'residence_first_name.required'=>'Please fill firstname',
        //  'residence_last_name.required' =>'Please fill lastname',
        //  'residence_email.required'    =>'Please fill phone',
        //  'residence_phone.required'    =>'Please fill email',
        //  'residence_address_1.required' =>'Please fill address 1',
        //  'residence_address_2.required' =>'Please fill address 2',
        //  'residence_city.required'     =>'Please fill city',
        //  'residence_zip_code.required'  =>'Please fill zipcode',
        //  'residence_country.required'  =>'Please fill country',
        //  'residence_state.required'    =>'Please fill state',
        // ]);
        
        $checkExist = User::where('email',$request->email)
                                ->where('id','!=',base64_decode($request->user_id))
                                ->where('role',2)
                                ->where('status',1)
                                ->where('is_deleted',0)
                                ->first();

        

        if(!empty($checkExist)) return redirect()
                                                ->back()
                                                ->withInput()
                                                ->with('failed','Email is already exist.');
   
        $doctor =  User::find(base64_decode($request->user_id));
        $doctor->first_name    = $request->first_name;
        $doctor->last_name     = $request->last_name;
        $doctor->email         = $request->email;
        $doctor->phone         = $request->phone;
        $doctor->role          = 2;
        if(!empty($request->password)){ 
        $doctor->password      = Hash::make($request->password);
        }
        $doctor->save();


        // $mailing_address = Mailing_address::where('user_id',base64_decode($request->user_id))->where('is_deleted',0)->first();
        // $mailing_address->user_id               =$doctor->id;
        // $mailing_address->office_first_name     =$request->office_first_name;
        // $mailing_address->office_last_name      =$request->office_last_name;
        // $mailing_address->office_email          =$request->office_email;
        // $mailing_address->office_phone          =$request->office_phone;
        // $mailing_address->office_address_1      =$request->office_address_1;
        // $mailing_address->office_address_2      =$request->office_address_2;
        // $mailing_address->office_zip_code       =$request->office_zip_code;
        // $mailing_address->office_city           =$request->office_city;
        // $mailing_address->office_state          =$request->office_state;
        // $mailing_address->office_country        =$request->office_country;
        // $mailing_address->residence_first_name  =$request->residence_first_name;
        // $mailing_address->residence_last_name   =$request->residence_last_name;
        // $mailing_address->residence_email       =$request->residence_email;
        // $mailing_address->residence_phone       =$request->residence_phone;
        // $mailing_address->residence_address_1   =$request->residence_address_1;
        // $mailing_address->residence_address_2   =$request->residence_address_2;
        // $mailing_address->residence_zip_code    =$request->residence_zip_code;
        // $mailing_address->residence_city        =$request->residence_city;
        // $mailing_address->residence_state       =$request->residence_state;
        // $mailing_address->residence_country     =$request->residence_country;
        // $mailing_address->save();
     


        return redirect('admin/doctor')->with('success','Doctor updated successfully.');
    }

    /**                                                                                                                                                                                                                                                                                                                             
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $doctor =  User::find(base64_decode($id));
        $doctor->is_deleted = 1;
        $doctor->save();

        $mailing_address = Mailing_address::where('user_id',base64_decode($id))->first();
        $mailing_address->is_deleted = 1;
        $mailing_address->save();

        return redirect()->back()->with('failed','Doctor deleted successfully.');


    }


    public function product_quantity(Request $request){
      $product =  Product::find(base64_decode($request->product_id));
      $product->quantity     = $product->quantity+$request->quantity;
      $product->buying_price = $request->buying_price;
      $product->total_amount = ($product->total_amount + ($request->quantity *$request->buying_price));
      if($product->save()){
        return response()->json(['status'=>true]);
      }
      return response()->json(['status'=>false]);


    }
}
