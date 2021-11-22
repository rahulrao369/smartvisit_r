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
use App\Slot;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {    
        
         $page_title = "Slot";
        
          if($request->ajax()){
         
         $data = Slot::where('status',1)->where('is_deleted',0)->latest()->get();
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

                                $btn='<a href="'.url("admin/slot-edit").'/'.base64_encode($data->id).'" class="mr-4 btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                                $btn.=  '<a href="'.url("admin/slot-delete").'/'.base64_encode($data->id).'" class="mr-4 btn btn-danger" onclick="return confirm(`Are you sure you want to delete this item`)"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin::slot.index',compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'Create slot';
        return view('admin::slot.create',compact('page_title'));
       
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        $request->validate([
              'start_time'=>'required',
              'end_time'=>'required',
              'start_am_pm'=>'required',
              'end_am_pm'=>'required'
            ]);
        
        $checkvr = Slot::where('name',$request->start_time.' '.$request->start_am_pm.' - '.$request->end_time.' '.$request->end_am_pm)->where('is_deleted',0)->first();
        if(!empty($checkvr)) return back()->with('name_exist','Time already exit.');
        
        
        $vr = new Slot;
        $vr->name = $request->start_time.' '.$request->start_am_pm.' - '.$request->end_time.' '.$request->end_am_pm;
        $vr->save();
        
        return redirect('admin/slot');
            
        
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
        $page_title = "Edit slot";
        $vr =Slot::find(base64_decode($id));
        return view('admin::slot.edit',compact('vr','page_title'));
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
            
            
       $checkvr = Slot::where('name',$request->start_time.' '.$request->start_am_pm.' - '.$request->end_time.' '.$request->end_am_pm)->where('id','!=',$request->id)->where('is_deleted',0)->first();
        if(!empty($checkvr)) return back()->with('name_exist','Time already exit.');
        
        
        $vr =Slot::find($request->id);
        $vr->name = $request->start_time.' '.$request->start_am_pm.' - '.$request->end_time.' '.$request->end_am_pm;
        $vr->save();
        
        return redirect('admin/slot')->with('success','Slot has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $vr =Slot::find(base64_decode($id));
        $vr->is_deleted = 1;
        $vr->save();
        
        return back()->with('success','Slot deleted successfully.');
    }
}
