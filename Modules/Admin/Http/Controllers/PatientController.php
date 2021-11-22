<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DataTables;
use Carbon\Carbon;
use Hash;


use App\User;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
   public function index(Request $request)
    {
        $page_title = 'Client';

        if($request->ajax()){
         
         $data = User::where('role',1)->where('is_deleted',0)->latest()->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            ->addColumn('action',function($data){
                                // $btn='<a href="'.url("admin/client/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                $btn='<a href="'.url("admin/patient-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/patient-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                // $btn.='<a href="'.url("admin/product/add-quantity").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }


        return view('admin::patients.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Create patient';
        return view('admin::patients.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
           $request->validate([
             'first_name'=>'required',
              'last_name'=>'required',
             'email'=>'required|email',
             'password'=>'required|min:6',
             'phone'=>'required',
            //  'address'=>'required'
        
        ]);
        
        $checkEmail = User::where('email',$request->email)
                                ->where('status',1)
                                ->where('is_deleted',0)
                                ->first();

        $checkPhone = User::where('phone',$request->phone)
                                ->where('status',1)
                                ->where('is_deleted',0)
                                ->first();
                                
            

        if(!empty($checkEmail)) return redirect()
                                                ->back()
                                                ->with('eemail','Email is already exist.')
                                                ->withInput();


         if(!empty($checkPhone)) return redirect()
                                                ->back()
                                                ->with('ephone','Phone is already exist.')
                                                ->withInput();

        $patient = new User();
        $patient->first_name    = $request->first_name;
        $patient->last_name     = $request->last_name;
        $patient->email         = $request->email;
        $patient->phone         = $request->phone;
        $patient->role          = 1;
        $patient->password      = Hash::make($request->password);
        $patient->status        = 1;
       
        if($patient->save()){
            return redirect('admin/patients')->with('success','Patient added successfully.');
        }
        return redirect()->back()->with('failed','Patient cannot add.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $page_title = 'Client details';
        $client = User::find(base64_decode($id));
        return view('admin::patients.show',compact('page_title','client'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page_title = 'Patient edit';
        $doctor = User::find(base64_decode($id));
        return view('admin::patients.edit',compact('page_title','doctor'));;
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
           
          $checkExist = User::where('email',$request->email)
                                ->where('id','!=',base64_decode($request->user_id))
                                ->where('role',1)
                                // ->where('status',1)
                                ->where('is_deleted',0)
                                ->first();

        

        if(!empty($checkExist)) return redirect()
                                                ->back()
                                                ->withInput()
                                                ->with('failed','Email is already exist.');
                                                
                                                
        $checkphone = User::where('phone',$request->phone)
                                ->where('id','!=',base64_decode($request->user_id))
                                // ->where('role',1)
                                ->where('status',1)
                                ->where('is_deleted',0)
                                ->first();

        

        if(!empty($checkphone)) return redirect()
                                                ->back()
                                                ->withInput()
                                                ->with('failed','Phone is already exist.');
   
        $patient =  User::find(base64_decode($request->user_id));
        $patient->first_name    = $request->first_name;
        $patient->last_name     = $request->last_name;
        $patient->email         = $request->email;
        $patient->phone         = $request->phone;
        $patient->role          = 1;
        if(!empty($request->password)){ 
        $patient->password      = Hash::make($request->password);
        }
        
        if($patient->save()){
            return redirect('admin/patients')->with('success','Patient updated successfully.');
        }
        return redirect()->back()->with('failed','Patient cannot update.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $client = User::find(base64_decode($id));
        $client->is_deleted = 1;
        $client->save();

        return  redirect()->back()->with('success','Patient deleted successfully.');
    }
}
