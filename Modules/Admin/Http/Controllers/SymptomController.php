<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use DataTables;
use Carbon\Carbon;


use App\User;
use App\Visit_reason;
use App\Symptom;
use App\Subsymptom;


class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {    
        
         $page_title = "Symptoms";
        
          if($request->ajax()){
         
         $data = Symptom::where('is_deleted',0)->latest()->get();
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
                            ->addColumn('reason',function($data){
                                $btn= $data->visitReason->name; 
                                return $btn;
                            })
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            ->addColumn('action',function($data){
                                // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                $btn='<a href="'.url("admin/symptom-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/symptom-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                // $btn.='<a href="javascript:void(0)" class="mr-4 btn btn-warning" id="st-add-quantity" data-pid="'.base64_encode($data->id).'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin::symptom.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Create symptom';
        $reason = Visit_reason::where('is_deleted',0)->get();
        return view('admin::symptom.create',compact('page_title','reason'));
       
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
              'reason_for_visit'=>'required'
            ]);
        
        $checkvr = Symptom::where('name',$request->name)->where('is_deleted',0)->first();
        if(!empty($checkvr)) return back()->with('name_exist','Name reason already exit.');
        
        
        $vr = new Symptom;
        $vr->name            = $request->name;
        $vr->visit_reason_id = $request->reason_for_visit;
        $vr->save();
        
        return redirect('admin/symptoms');
            
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
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
        $page_title = "Edit symptom";
        $vr =Symptom::find(base64_decode($id));
        $reason = Visit_reason::where('is_deleted',0)->get();
        return view('admin::symptom.edit',compact('vr','page_title','reason'));
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
         $request->validate([
              'name'=>'required',
              'reason_for_visit'=>'required'
            ]);
            
            
         $checkvr = Symptom::where('name',$request->name)->where('visit_reason_id',$request->reason_for_visit)->where('id','!=',$request->id)->where('is_deleted',0)->first();
        if(!empty($checkvr)) return back()->with('name_exist','Name symptom already exit.');
        
        
        $vr =Symptom::find($request->id);
        $vr->name = $request->name;
        $vr->visit_reason_id = $request->reason_for_visit;
        $vr->save();
        
        return redirect('admin/symptoms');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $vr =Symptom::find(base64_decode($id));
        $vr->is_deleted = 1;
        $vr->save();
        
        return back()->with('success','Symptom deleted successfully.');
    }
    
    
    
    
    
    public function subsymptoms(Request $request)
    {    
        
         $page_title = "Extra symptoms";
        
          if($request->ajax()){
         
         $data = Subsymptom::with(['subsymptoms_list'])->where('type',1)->where('is_deleted',0)->latest()->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('category',function($data){
                                $btn= $data->name; 
                                return $btn;
                            })
                            ->addColumn('substymptoms',function($data){
                                
                                $capsule = [];
                                if(isset($data->subsymptoms_list) && count($data->subsymptoms_list) > 0 ){
                                    
                                    foreach($data->subsymptoms_list as $row){
                                        $capsule[] =[$row->name];
                                    }
                                }
                                $btn= $capsule; 
                                return $btn;
                            })
                            
                             ->addColumn('action_symptoms',function($data){
                              
                                $btn='&nbsp;&nbsp;<a href="'.url("admin/extra-subsymptoms").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>'; 
                                return $btn;
                            })
                            
                          
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            ->addColumn('action',function($data){
                                // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                $btn='<a href="'.url("admin/sub-category-subsymptoms-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/sub-subsymptoms-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                // $btn.='<a href="javascript:void(0)" class="mr-4 btn btn-warning" id="st-add-quantity" data-pid="'.base64_encode($data->id).'"><i class="fa fa-plus" aria-hidden="true"></i></a>';
                                // $btn.= '<a href=" url("admin/stocks/edit/'.base64_encode($data->id).'").'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                // $btn.= '<a href="'.url("admin/stocks/delete/'.base64_encode($data->id).'").'" class="mr-4 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                            ->rawColumns(['action','substymptoms','action_symptoms'])
                            ->make(true);
        }
        return view('admin::subsymptoms.index',compact('page_title'));
    }
    
    
    
    
    
    public function create_subsymptoms_category(){
        
        $page_title = "Extra category create";
        
        return view('admin::subsymptoms.create',compact('page_title'));
    }
    
    
     public function create_subsymptoms_category_store(Request $request){
        
         $request->validate([
                              'name'=>'required'
                           ]);
         
         $subsymptomcheck = Subsymptom::where('name',$request->name)->where('type',1)->where('status',1)->where('is_deleted',0)->first();
         if(!empty($subsymptomcheck)) return back()->with('exist_name','Name is already exist.')->withInput();
            
         $subsymptom = new Subsymptom;
         $subsymptom->type = 1; 
         $subsymptom->name = $request->name;
         $subsymptom->parent_id = 0;
         $subsymptom->save();
         
         return redirect('admin/sub-symptoms');
    }
    
    
    
     public function sub_category_subsymptoms_edit($id){
        $page_title = 'Subsymptoms';
        $subsymptom = Subsymptom::find(base64_decode($id));
        $subsymptom_list = Subsymptom::where('type',1)->where('status',1)->where('is_deleted',0)->get();
        return view('admin::subsymptoms.edit',compact('page_title','subsymptom','subsymptom_list'));
    }
    
    
     public function sub_subsymptoms_update(Request $request){
       
         $request->validate([
                              'name'=>'required'
                           ]);
         
         $subsymptomcheck = Subsymptom::where('id','!=',base64_decode($request->category_id))->where('name',$request->name)->where('type',1)->where('status',1)->where('is_deleted',0)->first();
         if(!empty($subsymptomcheck)) return back()->with('exist_name','Name is already exist.')->withInput();
            
         $subsymptom = Subsymptom::find(base64_decode($request->category_id));
         $subsymptom->name = $request->name;
         $subsymptom->save();
         
         return redirect('admin/sub-symptoms');
    }
    
    
    
      
     public function sub_subsymptoms_delete($id){

        $subsymptom = Subsymptom::find(base64_decode($id));
        $subsymptom->is_deleted =1;
        $subsymptom->save();
        
        Subsymptom::where('parent_id',base64_decode($id))->update(['is_deleted'=>1]);
       
      
        return back()->with('success','Data deleted successfully.');
    }
    
    
    
       
       
       
       
       
       
       
       
    public function extra_subsymptoms(Request $request,$id)
    {    
        // return $id;
         $page_title = "Extra symptoms";
        
          if($request->ajax()){
         
         $data = Subsymptom::where('parent_id',base64_decode($id))->where('type',2)->where('is_deleted',0)->latest()->get();
         return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('name',function($data){
                                $btn= $data->name; 
                                return $btn;
                            })
                            
                             ->addColumn('date',function($data){
                                $btn=  Carbon::parse($data->created_at)->format('d F Y');
                                return $btn;
                            })
                            ->addColumn('action',function($data){


                                $btn='<a href="'.url("admin/sub-symptoms-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/sub-subsymptoms-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        $id = $id;
        return view('admin::subsymptoms.r_index',compact('page_title','id'));
    }
    
    
    
       public function create_subsymptoms($id){
        
        $page_title = "Extra reason create";
        $id = $id;
        $subsymptom = Subsymptom::find(base64_decode($id));
        return view('admin::subsymptoms.r_create',compact('page_title','subsymptom','id'));
      }
      
       public function create_subsymptoms_store(Request $request){
        
         $request->validate([
                              'name'=>'required'
                           ]);
         
         $subsymptomcheck = Subsymptom::where('name',$request->name)->where('type',2)->where('parent_id',$request->category)->where('status',1)->where('is_deleted',0)->first();
         if(!empty($subsymptomcheck)) return back()->with('exist_name','Name is already exist.')->withInput();
          
         $subsymptom = new Subsymptom;
         $subsymptom->type = 2; 
         $subsymptom->parent_id = $request->category;
         $subsymptom->name = $request->name;
         $subsymptom->save();
         
         return redirect('admin/extra-subsymptoms/'.base64_encode($request->category))->with('success','symptoms added successfully.');
    }
    
    
      public function sub_symptoms_edit($id){
        $page_title = 'Extra Symptoms';
        $subsymptom = Subsymptom::find(base64_decode($id));
        $subsymptom_list = Subsymptom::find($subsymptom->parent_id);
        return view('admin::subsymptoms.r_edit',compact('page_title','subsymptom','subsymptom_list'));
      }
    
    
    
         public function sub_symptoms_update(Request $request){
       
         $request->validate([
                              'name'=>'required'
                           ]);
         
         $subsymptomcheck = Subsymptom::where('id','!=',base64_decode($request->id))->where('name',$request->name)->where('type',2)->where('status',1)->where('is_deleted',0)->first();
         if(!empty($subsymptomcheck)) return back()->with('exist_name','Name is already exist.')->withInput();
            
         $subsymptom = Subsymptom::find(base64_decode($request->id));
         $subsymptom->name = $request->name;
         $subsymptom->save();
         
         return redirect('admin/sub-symptoms');
    }
    
   
    
    
    
    
}
