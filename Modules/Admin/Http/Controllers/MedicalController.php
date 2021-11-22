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
use App\Medical_condition;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {    
        
         $page_title = "Medical conditions";
        
          if($request->ajax()){
         
         $data = Medical_condition::where('status',1)->where('is_deleted',0)->latest()->get();
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
                                // $btn='<a href="'.url("admin/doctor/show").'/'.base64_encode($data->id).'" class="mr-4 btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>';

                                $btn='<a href="'.url("admin/medical-conditions-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/medical-conditions-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin::medical.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Create medical conditions';
        return view('admin::medical.create',compact('page_title'));
       
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
              'name'=>'required'
            ]);
        
        $checkvr = Medical_condition::where('name',$request->name)->where('is_deleted',0)->first();
        if(!empty($checkvr)) return back()->with('name_exist','Name reason already exit.');
        
        
        $vr = new Medical_condition;
        $vr->name = $request->name;
        $vr->save();
        
        return redirect('admin/medical-conditions');
            
        
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
        $page_title = "Edit medical conditions";
        $vr =Medical_condition::find(base64_decode($id));
        return view('admin::medical.edit',compact('vr','page_title'));
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
              'name'=>'required'
            ]);
            
            
       $checkvr = Medical_condition::where('name',$request->name)->where('id','!=',$request->id)->where('is_deleted',0)->first();
        if(!empty($checkvr)) return back()->with('name_exist','Name reason already exit.');
        
        
        $vr =Medical_condition::find($request->id);
        $vr->name = $request->name;
        $vr->save();
        
        return redirect('admin/medical-conditions');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $vr =Medical_condition::find(base64_decode($id));
        $vr->is_deleted = 1;
        $vr->save();
        
        return back()->with('success','Medical deleted successfully.');
    }
}
