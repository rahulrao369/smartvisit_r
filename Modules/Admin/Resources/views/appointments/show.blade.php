@extends('admin::layouts.master')
@section('content')
<style type="text/css">
    .caret_green{
    width: 15px;
    height: 15px;
    background: #28a745;
    display: inline-block;
    border-bottom: 8px solid #28a745;
    border-right: 8px solid #fff;
    border-left: 8px solid #fff;
    margin-right: 8px;
}

.caret_red{
    width: 15px;
    height: 15px;
    background: #dc3545;
    display: inline-block;
    border-bottom: 8px solid #dc3545;
    border-right: 8px solid #fff;
    border-left: 8px solid #fff;
    margin-right: 8px;
}
</style>
<body class="theme-orange">

<!-- Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

  @include('admin::partials.navbar')

  @include('admin::partials.sidebar')

    

   
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ isset($page_title) ? $page_title:""}}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <!-- <li class="breadcrumb-item">Table</li> -->
                        <li class="breadcrumb-item active">{{ isset($page_title) ? $page_title:""}}</li>
                    </ul>
                    <!--<a href="{{ url('admin/reason-create')}}" class="btn btn-sm btn-primary" >create</a>-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    @if(Session()->has('success'))
                    <p class="alert alert-success text-center">{{ Session()->get('success')}}</p>
                    @endif

                     @if(Session()->has('failed'))
                    <p class="alert alert-danger text-center">{{ Session()->get('failed')}}</p>
                    @endif
                    <div class="">
                        
                      
                        
                        <div class="body">
                         
                            <div class="table-responsive">
                                
                                
                                
                                
                                
                                <!---->
                <div class="tabarea">

                    <div class="firsttabcontent">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                  <div class="card patient-info">
                                        <h5 class="m-3">Personal Info</h5>
                                        <table class="table">
                                            <tr>
                                             
                                               
                                            <td class="text-left" style="border-top: 0;">Name:</td>
                                            @if($find_care->type=='Self')
                                            <td class="" style="border-top: 0;">{{ isset($find_care) ? $find_care->patient->first_name.' '.$find_care->patient->last_name:'' }} </td>
                                            @else
                                             <td class="" style="border-top: 0;">{{ isset($find_care) ? $find_care->getchild->first_name.' '.$find_care->getchild->last_name:'' }} </td>
                                            @endif
                                            </tr>
                                            
                                            <tr>
                                            <td class="text-left" style="border-top: 0;">Email:</td>
                                             
                                             <td class="" style="border-top: 0;">{{ isset($find_care) ? $find_care->patient->email:'' }} </td>
                                            
                                            </tr>
                                            
                                            
                                            <tr>
                                            <td class="text-left" style="border-top: 0;">Date Of Birth:</td>
                                              @if($find_care->type=='Self')
                                            <td class="" style="border-top: 0;">{{ isset($find_care) ? $find_care->patient->dob:'' }} </td>
                                             @else
                                             <td class="" style="border-top: 0;">{{ isset($find_care) ? $find_care->getchild->dob:'' }} </td>
                                            @endif
                                            
                                            </tr>
                                            <tr>
                                                <td class="text-left">Address:</td>
                                                <td class="">{{ isset($find_care) ? $find_care->patient->address:'' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Zip Code:</td>
                                                <td class="">{{ isset($find_care) ? $find_care->patient->postal_code:'' }}</td>
                                            </tr>
                                            
                                            <!-- <tr>-->
                                            <!--    <td>Transaction ID:</td>-->
                                            <!--    <td>{{ isset($find_care) ? $find_care->transaction->transaction_id:''}}</td>-->
                                            <!--</tr>-->
                                            
                                            <tr>
                                                <td>Paid Amount:</td>
                                                <td>{{ isset($find_care) ? $find_care->transaction->amount:''}}</td>
                                            </tr>
                                            
                                    </table>
                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="secondtabcontent">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="card col-md-10 offset-md-1">
                                    <div class="visitImg">
                                        <h5 class="m-3">Reason for visit</h5>
                                      
                                         
                                          <table class="table">
                                            <thead class="custom-thead-dark">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <!--<th>Documents</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Reason for visit</td>
                                                    <td>{{ $find_care->visit_reason->name }}</td>
                                                    <!--<td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                </tr>
                                                <tr>
                                                        <td>Symptoms Visit</td>
                                                        <td> <?php
                                                        $symptomsdata = [];
                                                        if($find_care->symptoms){
                                                           $arrdata =  explode(',',$find_care->symptoms);
                                                           foreach($arrdata as $row){
                                                             
                                                             $getsymptom = App\Symptom::find($row);
                                                             $symptomsdata[]= $getsymptom->name;
                                                           }
                                                        //   die;
                                                        //   DB::table('symptoms')->where() 
                                                        }
                                                        
                                                        
                                                        
                                                        ?>
                                                      {{ implode(', ',$symptomsdata) }}</td>
                                                        <!--<td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                    </tr>
                                                    <tr>
                                                        <td>About symptoms </td>
                                                        <td>{{ $find_care->symptoms_details }}</td>
                                                        <!--<td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                    </tr>
                                                    <tr>
                                                        <td>Upload Symptom Photos</td>
                                                        <td>
                                                            @if(count($find_care->symptom_photo) > 0 )
                                                            @foreach($find_care->symptom_photo as $row)
                                                            <a href="{{ url($row->image) }}"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></a>&nbsp;&nbsp;&nbsp;
                                                            <!--<img src="{{ url($row->image) }}" alt="">-->
                                                            @endforeach
                                                            @endif
                                                        </td>
                                                        <!--<td></td>-->
                                                    </tr>
                                                    <tr>
                                                        <td>Any Of These Symptoms</td>
                                                        <td>
                                                            <?php 
                                                            if(!empty($find_care->subsymptoms)){
                                                                
                                                                  $g_symptoms = explode(",",$find_care->subsymptoms);
                                                           
                                                                  $get_subsymptom = App\Subsymptom::with(['main_subsystem'])->whereIn('id',$g_symptoms)->groupBy('parent_id')->get();
                                                           
                                                              
                                                                  foreach($get_subsymptom as $key =>$value){
                                                                      
                                                                       echo $value->main_subsystem->name.' - '.$value->name.'<br>';
                                                                       
                                                                  } 
                                                            }
                                                            
                                                            ?>
                                                        </td>
                                                      
                                                    <tr>
                                                        <td>How Long Felt This Way</td>
                                                        <td>{{ $find_care->how_long }}</td>
                                                        <!--<td></td>-->
                                                    </tr>
                                                  
                                                    <tr>
                                                        <td>Taking any madications</td>
                                                        <td>
                                                            @if($find_care->currently_any_medication=='Yes')
                                                              
                                                              @if(count($find_care->find_care_madications) > 0 )
                                                              
                                                               @foreach($find_care->find_care_madications as $row)
                                                                    {{ $row->name.' - ' }} {{ $row->how_long}}<br>
                                                               @endforeach
                                                                   
                                                              @endif
                                                            @else
                                                            
                                                             {{ $find_care->currently_any_medication }}
                                                            @endif
                                                           
                                                        </td>
                                                       
                                                    </tr>
                                                      <tr>
                                                        <td>Drug allergies </td>
                                                        <td>
                                                            @if($find_care->have_allergies=='Yes')
                                                              {{ $find_care->drug_allergies }}
                                                            @else
                                                              {{ $find_care->have_allergies }}
                                                            @endif
                                                            
                                                        </td>
                                                    </tr>
                                                     
                                                     <tr>
                                                         <td>Medical conditions</td>
                                                         <td>
                                                             @if(!empty($find_care->medical_conditions))
                                                             <?php
                                                               $get_conditions = explode(",",$find_care->medical_conditions);
                                                               $all_conditions = App\Medical_condition::find($get_conditions);
                                                            //   print_r($all_conditions); \
                                                                $i=0;
                                                                $count = count($all_conditions);
                                                                foreach($all_conditions as $row){
                                                                    $i++;
                                                                  
                                                                    echo $row->name;
                                                                    if($i != $count){
                                                                        echo ", ";
                                                                    }
                                                                }
                                                              
                                                             ?>
                                                             
                                                             
                                                             @endif
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                        <td>Symptoms details</td>
                                                        <td>
                                                            {{ isset($find_care->symptoms_details) ? $find_care->symptoms_details: "" }}
                                                        </td>
                                                        <!--<td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                    </tr>
                                                    <tr>
                                                        <td>Temprature</td>
                                                        <td>{{ isset($find_care->temprature) ? $find_care->temprature:"" }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Systolic BP</td>
                                                        <td>{{ isset($find_care->systolic_bp) ? $find_care->systolic_bp:"" }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Diastolic Bp</td>
                                                        <td>{{ isset($find_care->diastolic_dp) ? $find_care->diastolic_dp:"" }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Heart rate</td>
                                                        <td>{{ isset($find_care->heart_rate) ? $find_care->heart_rate:"" }}</td>
                                                        <td></td>
                                                    </tr>
                                                    
                                                     <tr>
                                                        <td>Respiration rate</td>
                                                        <td>{{ isset($find_care->resp) ? $find_care->resp:"" }}</td>
                                                        <td></td>
                                                    </tr>
                                                
                                                
                                             
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                            
                                <!--<form action="">-->
                                <!--    <div class="visitform">-->
                                <!--        <div class="smartnotes">-->
                                            <!--<div class="turnon">-->
                                            <!--    <button type="button" class="editbtn turnonbtn" id="">-->
                                            <!--        <i class="flaticon-mic"></i> <span> Turn On Smart Notes-->
                                            <!--        </span>-->
                                            <!--    </button>-->
                                            <!--</div>-->
                                <!--        </div>-->
                                <!--        <div class="chiefcomp">-->
                                <!--            <div class="form-group">-->
                                <!--                <label for="">Chief Complaint</label>-->
                                <!--                <textarea name="" id="" rows="3" class="form-control" readonly="">{{ $find_care->symptoms_details }}</textarea>-->
                                <!--            </div>-->
                                <!--            <div class="form-group">-->
                                                <!--<button type="button" class="btn editbtn">-->
                                                <!--    send-->
                                                <!--</button>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</form>-->
                           

                        </div>
                    </div>

                  


                   

                </div>
                                <!---->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>







@endsection
