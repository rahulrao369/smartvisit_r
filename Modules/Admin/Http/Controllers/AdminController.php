<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use Hash;
use DataTables;
use Carbon\Carbon;
use App\Admin;
use App\User;
use App\Clinical_update;
use App\Find_care;
use App\Transaction;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        // echo Carbon::now()->toDateString(); die;
        $page_title ='Dashboard';

      
       

        // print_r($todaySale); die;
        return view('admin::dashboard',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {  
        $page_title ="Profile";
        $admin = Admin::find(Auth::guard('admin')->id());
        
        return view('admin::profile',compact('admin','page_title'));
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
          'name'=>'required',
          'email'=>'required'
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());
        $admin->name  = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect('admin/dashboard');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function change_password()
    {
        $page_title = "Change password";
        return view('admin::change-password',compact('page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function store_change_password(Request $request)
    {
        $request->validate([
           'new_password'=>'required|min:6',
           'confrim_password'=>'required|min:6|same:new_password'
        ]);
        $admin = Admin::find(Auth::guard('admin')->id());
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->back()->with('success','Password has been changed successfully.');
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
    public function destroy()
    {
        //
        Auth::guard('admin')->logout();

        return redirect('admin');
    }




    public function clinical_update(Request $request)
    {
        //
        $page_title = "Clinical updates";

        if($request->ajax()){
         
         $data = Clinical_update::where('is_deleted',0)->orderby('id','desc')->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                            //  ->addColumn('average_price',function($data){
                            //      $btn=  number_format($data->current_price,2); 
                            //     // $btn=  number_format($data->total_amount/$data->quantity,2); 
                            //     return $btn;
                            // })
                            ->addColumn('image',function($data){
                                $btn= "<img src=".url('/').$data->image." height='60px' width='60px'/>"; 
                                return $btn;
                            })
                            ->addColumn('description',function($data){
                                $btn= \Str::limit( $data->description, 50, ' ...');
                                return $btn;
                            })
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            ->addColumn('action',function($data){
                                // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                $btn='<a href="'.url("admin/clinical-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/clinical-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                // $btn.='<a href="javascript:void(0)" class="mr-4 btn btn-warning" id="st-add-quantity" data-pid="'.base64_encode($data->id).'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                            ->rawColumns(['action','image','description'])
                            ->make(true);
        }
        return view('admin::clinical_update.index',compact('page_title'));
    }


    public function clinical_create(Request $request)
    {
        //
        $page_title ="Create updates";
        return view('admin::clinical_update.create',compact('page_title'));
    }



    public function clinical_store(Request $request)
    {
        //
         $request->validate([
         'title'=>'required',
         'description'=>'required'
         ]);


         $clinicupdate = new Clinical_update;
         if(!empty($request->image)){
         $file = $request->image;
         $filename = time().'.'.$file->getClientOriginalExtension();
         $file->move('public/doctor/images/overview',$filename);
         $clinicupdate->image = '/public/doctor/images/overview/'.$filename; 
         }
         $clinicupdate->title = $request->title;
         $clinicupdate->description = $request->description;
         $clinicupdate->save();
         return redirect('admin/clinical-update')->with('success','Clinical update added successfully.');
    }




    public function clinical_edit($id)
    {
        //
        $page_title ="Edit Updates";
        $clinicupdate = Clinical_update::find(base64_decode($id));
        return view('admin::clinical_update.edit',compact('page_title','clinicupdate'));
    }



    public function clinical_update_post(Request $request)
    {
        //
         $request->validate([
         'title'=>'required',
         'description'=>'required'
         ]);


         $clinicupdate = Clinical_update::find(base64_decode($request->update_id));
         if(!empty($request->image)){
         $file = $request->image;
         $filename = time().'.'.$file->getClientOriginalExtension();
         $file->move('public/doctor/images/overview',$filename);
         $clinicupdate->image = '/public/doctor/images/overview/'.$filename; 
         }
         $clinicupdate->title = $request->title;
         $clinicupdate->description = $request->description;
         $clinicupdate->save();
         return redirect('admin/clinical-update')->with('success','Clinical update updated successfully.');

    }


    public function clinical_delete($id)
    {
        //
        $clinical_update = Clinical_update::find(base64_decode($id));
        $clinical_update->is_deleted = 1;
        $clinical_update->save();

        return back()->with('success','Update deleted successfully.');
    }
    
    
    
     public function appointments(Request $request)
    {
        //
        $page_title = "Appointments";

        if($request->ajax()){
      
          $data = Find_care::where('is_deleted',0)->orderby('id','desc')->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                            //  ->addColumn('average_price',function($data){
                            //      $btn=  number_format($data->current_price,2); 
                            //     // $btn=  number_format($data->total_amount/$data->quantity,2); 
                            //     return $btn;
                            // })
                            // ->addColumn('image',function($data){
                            //     $btn= "<img src=".url('/').$data->image." height='60px' width='60px'/>"; 
                            //     return $btn;
                            // })
                            //  ->addColumn('type',function($data){
                            //     if($data->type=='Self'){
                            //         $btn= 'Self'; 
                            //     }else{
                            //         $btn= 'Child';
                            //     }
                               
                            //     return $btn;
                            // })
                            
                            ->addColumn('name',function($data){
                                if($data->type=='Self'){
                                    $btn= $data->patient->first_name.' '.$data->patient->last_name; 
                                }else{
                                    if($data->getchild->gender==1){
                                     $btn= $data->getchild->first_name.' '.$data->getchild->last_name.' S/O '.$data->patient->first_name.' '.$data->patient->last_name;    
                                    }
                                    
                                    if($data->getchild->gender==2){
                                      $btn= $data->getchild->first_name.' '.$data->getchild->last_name.' D/O '.$data->patient->first_name.' '.$data->patient->last_name;   
                                    }
                                    
                                }
                               
                                return $btn;
                            })
                            ->addColumn('email',function($data){
                                 if($data->type=='Self'){
                                    $btn= $data->patient->email; 
                                }else{
                                    $btn= $data->patient->email; 
                                }
                                return $btn;
                            })
                            ->addColumn('visit_reason',function($data){
                                $btn =  $data->visit_reason->name;
                                return $btn;
                            })
                            ->addColumn('status',function($data){
                                if($data->status==1){
                                    $btn = '<button class="btn btn-danger">Pending</button>';
                                }
                                
                                 if($data->status==2){
                                     $btn = '<button class="btn btn-success">Accepted</button>';
                                }
                                
                                 if($data->status==3){
                                    $btn = '<button class="btn btn-info">Completed</button>';
                                }
                                
                                return $btn;
                            })
                            
                              ->addColumn('doctor',function($data){
                                
                                    $btn = ($data->doctor) ? 'Dr. '.$data->doctor->first_name.' '.$data->doctor->last_name:'';
                                    return $btn;
                            })
                            
                            
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            ->addColumn('action',function($data){
                                // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                // $btn='<a href="'.url("admin/clinical-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                $btn=  '<a href="'.url("admin/appointment-details").'/'.base64_encode($data->id).'" class="mr-4 btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                // $btn.='<a href="javascript:void(0)" class="mr-4 btn btn-warning" id="st-add-quantity" data-pid="'.base64_encode($data->id).'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                            ->rawColumns(['action','name','description','status'])
                            ->make(true);
        }
        return view('admin::appointments.index',compact('page_title'));
    }
    
    
    
    public function appointment_details($id){
        
        $page_title = 'Appointment Details';
        $find_care = Find_care::find(base64_decode($id));
        return view('admin::appointments.show',compact('page_title','find_care'));
        
    }
    
    
    public function transactions(Request $request){
        
         $page_title = "Transactions";

        if($request->ajax()){
      
         $data = Transaction::where('payment_status',2)->orderby('id','desc')->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('transaction_id',function($data){
                                $btn = $data->id;
                                return $btn;
                            })
                            ->addColumn('name',function($data){
                                
                                if($data->findcare->type=='Self'){
                                    $btn= $data->findcare->patient->first_name.' '.$data->findcare->patient->last_name; 
                                }else{
                                    if($data->findcare->getchild->gender==1){
                                     $btn= $data->findcare->getchild->first_name.' '.$data->findcare->getchild->last_name.' S/O '.$data->findcare->patient->first_name.' '.$data->findcare->patient->last_name;    
                                    }
                                    
                                    if($data->findcare->getchild->gender==2){
                                      $btn= $data->findcare->getchild->first_name.' '.$data->findcare->getchild->last_name.' D/O '.$data->findcare->patient->first_name.' '.$data->findcare->patient->last_name;   
                                    }
                                    
                                }
                               
                                return $btn;
                            })
                            ->addColumn('email',function($data){
                                 if($data->findcare->type=='Self'){
                                    $btn= $data->findcare->patient->email; 
                                }else{
                                    $btn= $data->findcare->patient->email; 
                                }
                                return $btn;
                            })
                            ->addColumn('amount',function($data){
                                $btn =  $data->amount;
                                return $btn;
                            })
                            // ->addColumn('status',function($data){
                            //     if($data->status==1){
                            //         $btn = '<button class="btn btn-danger">Pending</button>';
                            //     }
                                
                            //      if($data->status==2){
                            //          $btn = '<button class="btn btn-success">Accepted</button>';
                            //     }
                                
                            //      if($data->status==3){
                            //         $btn = '<button class="btn btn-info">Completed</button>';
                            //     }
                                
                            //     return $btn;
                            // })
                            
                            //   ->addColumn('doctor',function($data){
                                
                            //         $btn = ($data->doctor) ? 'Dr. '.$data->doctor->first_name.' '.$data->doctor->last_name:'';
                            //         return $btn;
                            // })
                            
                            
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            // ->addColumn('action',function($data){
                            //     // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                            //     // $btn='<a href="'.url("admin/clinical-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                            //     $btn=  '<a href="'.url("admin/appointment-details").'/'.base64_encode($data->id).'" class="mr-4 btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                            //     // $btn.='<a href="javascript:void(0)" class="mr-4 btn btn-warning" id="st-add-quantity" data-pid="'.base64_encode($data->id).'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                            //     // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                            //     // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                            //     return $btn;
                            // })
                            ->rawColumns(['action','name','description','status'])
                            ->make(true);
        }
        return view('admin::transactions.index',compact('page_title'));
        
        
    }
    
    



}
