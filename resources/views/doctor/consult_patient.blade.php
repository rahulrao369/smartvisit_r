@extends('doctor.layouts.default')
@section('content')

<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">-->
<style>
    .banner {
  padding: 0;
  background-color: #52575c;
  color: white;
}

.banner-text {
  padding: 8px 20px;
  margin: 0;
}


#join-form {
  margin-top: 10px;
}

.tips {
  font-size: 12px;
  margin-bottom: 2px;
  color: gray;
}

.join-info-text {
  margin-bottom: 2px;
}

input {
  width: 100%;
  margin-bottom: 2px;
}

.player {
  width: 787px;
  height: 444px;
  margin:6px;
}

.player-name {
  margin: 8px 0;
}

#success-alert, #success-alert-with-token {
  display: none;
}

@media (max-width: 640px) {
  .player {
    width: 320px;
    height: 240px;
  }
}
</style>

  <style>
        .response-popup{
            position: fixed;
            left: 0;
            right: 0;
            bottom: -120px;
            width: 320px;
            height: 60px;
            padding: 15px;
            background: #a9e530;
            z-index: 1;
            margin: auto;
            text-align: center;
            box-shadow: 0px 0px 6px 0px #0000009e;
            transition: bottom 0.5s ease;
        }
        .response-popup h5{color: #fff;}
        .showthis{bottom:0}
    </style>
    
<section class="content-wrapper"> 
            @include('doctor.partials.sidebar')


        <div class="side-wrapper">
            <div class="card wrapper-card">
             <div class="card-body">
                <div class="profilecard consultcard">
                    <div class="profilecardcontent">
                        <div class="form-group text-center profileset">
                            <label class="consultdesign">
                                <label for="photo-upload" class="custom-file-upload consultprofile">
                                    <div class="img-wrap img-upload">
                                     
                                        <img for="photo-upload" src="{{ url($patient->image) }}">
                                        
                                    </div>
                                     
                                    <!-- <div class="p-image"> <i class="fa fa-camera upload-button"></i>
                                    <input class="file-upload" id="photo-upload" type="file" name="image" accept="image/*">
                                </div> -->
                                </label>
                            </label>
                        </div>
                    </div>
                   
                    <h5>{{ isset($patient) ? $patient->first_name:'' }} {{ isset($patient) ? $patient->last_name:'' }}</h5>
                    <!--<span>_{{ isset($patient) ? $patient->first_name:'' }}_{{ isset($patient) ? $patient->last_name:'' }}_</span>-->
                     <button class="defaultbtn numberbtn">
                         <a class="defaultbtn" href="{{ url('doctor/chat/'.base64_encode($patient->id))}}">
                         <i class="flaticon-write"></i>Chat
                         </a>
                     </button>
                                
                    <!--<span>{{ isset($patient) ? $patient->age:'' }} Years Old</span>-->

                    <div class="consultsocialitem">
                        <ul>
                            <li>
                                <button class="defaultbtn numberbtn">
                                    <i class="flaticon-phone"></i> {{ isset($patient) ? $patient->phone:'' }}
                                </button>
                            </li>

                            <li>
                                <!--<button class="defaultbtn"  data-toggle="modal" data-target="#exampleModal">-->
                                <!--    <i class="flaticon-video-camera"></i> Video Call-->
                                <!--</button>-->
                                
                                <!--<button class="defaultbtn numberbtn"  id="numberbtn">-->
                                <!-- <i class="flaticon-video-camera"></i> Video Call-->
                                <!-- <input id="patient_id" type="hidden" value="{{ $find_care->patient_id }}">-->
                                <!-- <input id="appid" type="hidden">-->
                                <!-- <input id="token" type="hidden" >-->
                                <!-- <input id="channel" type="hidden">-->
                                <!-- <input id="patient_name" type="hidden" value="{{ $patient->first_name.' '.$patient->last_name}}">-->
                                <!--</button>-->
                                
                                
                                
                                
                                
                            <a href="{{ url('doctor/calling/'.base64_encode($find_care->patient_id))}}" target="_blank"><button class="defaultbtn"  id="">
                                 <i class="flaticon-video-camera"></i> Video Call
                                 <input id="patient_id" type="hidden" value="{{ $find_care->patient_id }}">
                                 <input id="appid" type="hidden">
                                 <input id="token" type="hidden" >
                                 <input id="channel" type="hidden">
                                 <input id="patient_name" type="hidden" value="{{ $patient->first_name.' '.$patient->last_name}}">
                                </button></a>
                                
                                
                            </li>

                            <li>
                                <!--<a href="{{ url('doctor/prescribe') }}">-->
                                <!--    <button class="defaultbtn">-->
                                <!--        <i class="flaticon-prescription"></i> Prescribe-->
                                <!--    </button>-->
                                <!--</a>-->
                                
                                
                                 <a href="https://cli-cert.changehealthcare.com/servlet/DxLogin?userid=sv_wmayfield&PW=Practice00!&hdnBusiness=3004413307&apiLogin=true&target=jsp/lab/person/PatientLookup.jsp&FromOrder=false&actionCommand=Search&FromRx=true&loadPatient=false&link=false&searchaccountId={{$patient->patient_basic_details->chc_id}}">
                                    <button class="defaultbtn">
                                        <i class="flaticon-prescription"></i> Prescribe
                                    </button>
                                </a>
                                
                                
                                
                            </li>

                            <li>
                               <!--<a href="{{ url('doctor/ordertest') }}">-->
                               
                               <?php
                               $gender = $patient->gender==1 ? "M":"F";
                               ?>
                                <a href="https://cli-cert.changehealthcare.com/servlet/DxLogin?userid=sv_wmayfield&apiLogin=true&PW=Practice00!&hdnBusiness=3004413307&target=jsp/lab/order/ESummaryOrder.jsp&actionCommand=EOrderSummary&O_Phyid=13507&P_ACT={{$patient->patient_basic_details->chc_id}}&P_LNM={{$patient->last_name}}&P_FNM={{$patient->first_name}}&P_DOB={{ \Carbon\Carbon::parse($patient->dob)->format('m/d/Y') }}&P_SEX={{$gender}}&P_ADR=901 Franklin Blvd&P_CIT=Nashville&P_STA=TN&P_ZIP=37921&P_PHN={{$patient->phone}}">
                                    <button class="defaultbtn">
                                    <i class="flaticon-blood-test"></i> Order Test
                                </button>
                                <!--</a>-->
                               </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tabitem">
                        <ul>
                            <li class="tabactive" id="patientinfo">
                                Patient Info
                            </li>
                            <li id="visit">
                                Reason For Visit
                            </li>
                            <li id="soap">
                                Soap
                            </li>
                            <li id="summary">
                                Patient Visit Summary
                            </li>
                        </ul>
                    </div>
                </div>
             </div>

                <div class="tabarea">

                    <div class="firsttabcontent">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 text-center" style="padding: 0;">
                                  <div class="patient-info">
                                        <h5>Personal Info</h5>
                                        <table class="table">
                                            <tr>
                                            <td class="text-left" style="border-top: 0;">Date Of Birth:</td>
                                            <td class="text-right" style="border-top: 0;">{{ isset($find_care) ? $find_care->patient->dob:'' }} </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Address:</td>
                                                <td class="text-right">{{ isset($find_care) ? $find_care->patient->address:'' }}</td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td class="text-left">City:</td>-->
                                            <!--    <td class="text-right">Worcester</td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td class="text-left">Zip Code:</td>
                                                <td class="text-right">{{ isset($find_care) ? $find_care->patient->postal_code:'' }}</td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td class="text-left">State:</td>-->
                                            <!--    <td class="text-right">Massachusetts</td>-->
                                            <!--</tr>-->
                                            <!--<tr>-->
                                            <!--    <td class="text-left">Insurance Or Self-Pay:</td>-->
                                            <!--    <td class="text-right">Massachusetts</td>-->
                                            <!--</tr>-->
                                    </table>
                                  </div>

                                    <div class="medical_history">
                                        <h5>Medical History</h5>
                                        <table class="table">
                                            <thead class="custom-thead-dark">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Documents</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--<tr>-->
                                                <!--    <td>Drug or Food Allergy</td>-->
                                                <!--    <td>Penicil Reaction</td>-->
                                                <!--    <td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                <!--</tr>-->
                                                <!--    <tr>-->
                                                <!--        <td>Chronic Medical illnesses</td>-->
                                                <!--        <td>--------------</td>-->
                                                <!--        <td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                <!--    </tr>-->
                                                <!--    <tr>-->
                                                <!--        <td>Previous hospitalization in past 3 months</td>-->
                                                <!--        <td>Document #01: EMR, 01/00/20-->
                                                <!--            Document #01: EMR, 01/00/20-->
                                                <!--        </td>-->
                                                <!--        <td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                <!--    </tr>-->
                                                <!--    <tr>-->
                                                <!--        <td>Medication list</td>-->
                                                <!--        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>-->
                                                <!--        <td></td>-->
                                                <!--    </tr>-->
                                                <!--    <tr>-->
                                                <!--        <td>Social history(alcohol, smoking)</td>-->
                                                <!--        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>-->
                                                <!--        <td></td>-->
                                                <!--    </tr>-->
                                                <!--    <tr>-->
                                                <!--        <td>History of violence or substance abuse</td>-->
                                                <!--        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>-->
                                                <!--        <td></td>-->
                                                <!--    </tr>-->
                                                <!--    <tr>-->
                                                <!--        <td>Immunization (Flu vaccine or shingles vaccines)</td>-->
                                                <!--        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>-->
                                                <!--        <td></td>-->
                                                <!--    </tr>-->
                                                
                                                
                                                
                                                <tr>
                                                    <td>Reason for visit</td>
                                                    <td>{{ isset($find_care->visit_reason) ? $find_care->visit_reason->name:"" }}</td>
                                                    <td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>
                                                </tr>
                                                    <tr>
                                                        <td>Symptoms</td>
                                                        <?php
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
                                                        <td>{{ implode(', ',$symptomsdata) }}</td>
                                                        <td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>
                                                    </tr>
                                                    <!--<tr>-->
                                                    <!--    <td>Symptoms details</td>-->
                                                    <!--    <td>-->
                                                    <!--        {{ isset($find_care->symptoms_details) ? $find_care->symptoms_details: "" }}-->
                                                    <!--    </td>-->
                                                    <!--    <td class="text-center"><img src="{{ url('public/doctor/images/icons/eye.png') }}" alt=""></td>-->
                                                    <!--</tr>-->
                                                    <!--<tr>-->
                                                    <!--    <td>Temprature</td>-->
                                                    <!--    <td>{{ isset($find_care->temprature) ? $find_care->temprature:"" }}</td>-->
                                                    <!--    <td></td>-->
                                                    <!--</tr>-->
                                                    <!--<tr>-->
                                                    <!--    <td>Systolic BP</td>-->
                                                    <!--    <td>{{ isset($find_care->systolic_bp) ? $find_care->systolic_bp:"" }}</td>-->
                                                    <!--    <td></td>-->
                                                    <!--</tr>-->
                                                    <!--<tr>-->
                                                    <!--    <td>Diastolic Bp</td>-->
                                                    <!--    <td>{{ isset($find_care->diastolic_dp) ? $find_care->diastolic_dp:"" }}</td>-->
                                                    <!--    <td></td>-->
                                                    <!--</tr>-->
                                                    <!--<tr>-->
                                                    <!--    <td>Heart rate</td>-->
                                                    <!--    <td>{{ isset($find_care->heart_rate) ? $find_care->heart_rate:"" }}</td>-->
                                                    <!--    <td></td>-->
                                                    <!--</tr>-->
                                                    
                                                    <!-- <tr>-->
                                                    <!--    <td>Respiration rate</td>-->
                                                    <!--    <td>{{ isset($find_care->resp) ? $find_care->resp:"" }}</td>-->
                                                    <!--    <td></td>-->
                                                    <!--</tr>-->
                                            </tbody>
                                    </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="secondtabcontent">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-8 offset-md-2" style="padding: 0;">
                                    <div class="visitImg">
                                        <h5>Reason for visit</h5>
                                        <!--<ul>-->
                                            <!--@if(isset($find_care->symptom_photo) && count($find_care->symptom_photo)> 0)-->
                                            <!--@foreach($find_care->symptom_photo as $row)-->
                                            <!--<li>-->
                                            <!--    <img src="{{ url('/').$row->image }}" alt="">-->
                                            <!--    <span>-->
                                            <!--        <img src="{{ url('public/doctor/images/focus.png') }}" alt="">-->
                                            <!--    </span>-->
                                            <!--</li>-->
                                            <!--@endforeach-->
                                            <!--@endif-->

                                            <!--<li>-->
                                            <!--    <img src="{{ url('public/doctor/images/faceinfection.jpg') }}" alt="">-->
                                            <!--    <span>-->
                                            <!--        <img src="{{ url('public/doctor/images/focus.png') }}" alt="">-->
                                            <!--    </span>-->
                                            <!--</li>-->
                                         <!--</ul>-->
                                         
                                         
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

                    <div class="thirdtabcontent">
                        <div class="card-body form-body">
                           
                              
                                <form id="soap-information" enctype="multipart/form-data" method="POST">
                                   
                                    <input type="hidden" name="find_care_id" value="{{ base64_encode($find_care->id) }}" />
                                    <input type="hidden" name="patient_id" value="{{ base64_encode($find_care->patient_id) }}" />
                                    <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn start-record-btn" id="start-record-btn-subject" onclick="startConverting(this.id,'subjective');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Subjective</label>
                                                <textarea name="subjective" id="subjective" rows="3" class="form-control"></textarea>
                                                <p class="text-danger subjective_error"></p>
                                            </div>
                                        </div>
                                    </div>


                                    
                                     <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon"> 
                                                <button type="button" class="editbtn turnonbtn start-record-btn" id="start-record-btn-object" onclick="startConverting(this.id,'objective');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Objective</label>
                                                <textarea name="objective" id="objective" rows="3" class="form-control"></textarea>
                                                <p class="text-danger objective_error"></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                
                                            
                                            <!--<div class="form-group soap_group">-->
                                            <!--    <label for="">Objective</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->

                                            <div class="maritalstatus">
                                            <h6>Mental Status</h6>
                                             <div class="form-group soapradio">
                                                 <label class="paymentradio">alert oriented
                                                     <input type="radio" checked="checked" name="mental_status" value="1">
                                                     <span class="checkmark"></span>
                                                   </label>
                                                   <label class="paymentradio">confused disoriented
                                                     <input type="radio" name="mental_status" value="2">
                                                     <span class="checkmark"></span>
                                                   </label>
                                             </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6>Vital Signs</h6>
                                                 <div class="form-group soapradio">
                                                     <label class="paymentradio">temparature blood Pressure
                                                         <input type="radio" checked="checked" name="vital_signs" value="1">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <label class="paymentradio">finger sticks if available
                                                         <input type="radio" name="vital_signs" value="2">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                 </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6>Uplaoded Images Or Test Results (If Applicable) Physical Findings:</h6>
                                                <input type="file" name="test_files[]" multiple="" class="from-control"/>
                                            </div>
                                            
                                            </div>
                                            
                                            </div>

                                            <!--<div class="form-group">-->
                                            <!--    <h5 style="font-weight: 600;">Assessment</h5>-->
                                            <!--    <label for="">Description Of Patient Problem List</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                            
                                          <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-assessment" onclick="startConverting(this.id,'assessment');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Assessment</label>
                                                        <textarea name="assessment" id="assessment" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Impression (Differential Diagnosis)</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                            
                                               <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-impression" onclick="startConverting(this.id,'impression');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Impression</label>
                                                        <textarea name="impression" id="impression" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Add Diagnosis</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                            
                                              <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-diagnosis" onclick="startConverting(this.id,'diagnosis');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Add Diagnosis</label>
                                                        <textarea name="diagnosis" id="diagnosis" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Result</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                            
                                              <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-result" onclick="startConverting(this.id,'result');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Result</label>
                                                        <textarea name="result" id="result" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Type Dx Code</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                            
                                            <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-type_dx_code" onclick="startConverting(this.id,'type_dx_code');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Type Dx Code</label>
                                                        <textarea name="type_dx_code" id="type_dx_code" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                            <div class="maritalstatus">
                                                <h6 style="font-weight: 600;">Plan</h6>
                                                <label>Prescription Ordered</label>
                                                 <div class="form-group soapradio">
                                                     <label class="paymentradio">temparature blood Pressure
                                                         <input type="radio" checked="checked" name="prescription_ordered" value="1">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <label class="paymentradio">finger sticks if available
                                                         <input type="radio" name="prescription_ordered" value="2">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                 </div>
                                            </div>
                                            </div>
                                            </div>

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">how many?</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                             <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-how_many" onclick="startConverting(this.id,'how_many');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">how many?</label>
                                                        <textarea name="how_many" id="how_many" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                       
                                            <!--<div class="form-group consultinput">-->
                                            <!--   <div class="row">-->
                                                   <!--<div class="col-md-6">-->
                                                   <!-- <h6 style="font-weight: 600;">Monitoring Parameters</h6>-->

                                                   <!--     <label for="">Education</label>-->
                                                   <!--     <input type="text" class="form-control">-->
                                                   <!--</div>-->
                                                   
                                             <h6 style="font-weight: 600;">Monitoring Parameters</h6>
                                             <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-education" onclick="startConverting(this.id,'education');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Education</label>
                                                         <input type="text" class="form-control" name="education" id="education">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                                   
                                                   
                                         
                                            
                                            
                                            

                                                   <!--<div class="col-md-6">-->
                                                   <!--     <label for="">diet</label>-->
                                                   <!--     <input type="text" class="form-control">-->
                                                   <!--</div>-->
                                                   
                                                   
                                             <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-diet" onclick="startConverting(this.id,'diet');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Diet</label>
                                                         <input type="text" class="form-control" name="diet" id="diet">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            

                                                   <!--<div class="col-md-6">-->
                                                   <!--     <label for="">exercise</label>-->
                                                   <!--     <input type="text" class="form-control">-->
                                                   <!-- </div>-->
                                                   
                                        <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-exercise" onclick="startConverting(this.id,'exercise');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Exercise</label>
                                                         <input type="text" class="form-control" name="exercise" id="exercise">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            

                                                   <!-- <div class="col-md-6">-->
                                                   <!--     <label for="">medication use</label>-->
                                                   <!--     <input type="text" class="form-control">-->
                                                   <!--</div>-->
                                                   
                                                   
                                            <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-medication_use" onclick="startConverting(this.id,'medication_use');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Medication use</label>
                                                         <input type="text" class="form-control" name="medication_use" id="medication_use">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                                   <!--<div class="col-md-6">-->
                                                   <!--     <label for="">symptoms</label>-->
                                                   <!--     <input type="text" class="form-control">-->
                                                   <!-- </div>-->
                                                   
                                                   
                                            <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-symptoms" onclick="startConverting(this.id,'symptoms');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Symptoms</label>
                                                         <input type="text" class="form-control" name="symptoms" id="symptoms">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            

                                                    <!--<div class="col-md-6">-->
                                                    <!--    <label for="">smokings/alcohol</label>-->
                                                    <!--    <input type="text" class="form-control">-->
                                                    <!--</div>-->
                                                    
                                                    
                                             <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-smokings_alcohol" onclick="startConverting(this.id,'smokings_alcohol');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Smokings/Alcohol</label>
                                                         <input type="text" class="form-control" name="smokings_alcohol" id="smokings_alcohol">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            

                                                    <!--<div class="col-md-6">-->
                                                    <!--    <label for="">activity level</label>-->
                                                    <!--    <input type="text" class="form-control">-->
                                                    <!--</div>-->
                                                    
                                          <div class="visitform mt-0">
                                                
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-activity_level" onclick="startConverting(this.id,'activity_level');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Activity level</label>
                                                         <input type="text" class="form-control" name="activity_level" id="activity_level">
                                                        <!--<textarea name="education" id="education" rows="3" class="form-control"></textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            <!--   </div>-->
                                            <!--</div>-->

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Follow up visit</label>-->
                                            <!--    <textarea name="" id="" rows="3" class="form-control"></textarea>-->
                                            <!--</div>-->
                                            
                                            
                                             <div class="visitform mt-0">
                                                <div class="smartnotes">
                                                    <div class="turnon"> 
                                                        <button type="button" class="editbtn turnonbtn start-record-btn" id="btn-follow_up_visit" onclick="startConverting(this.id,'follow_up_visit');">
                                                            <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="chiefcomp">
                                                    <div class="form-group">
                                                        <label for="">Follow up visit</label>
                                                        <textarea name="follow_up_visit" id="follow_up_visit" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            

                                            <div class="form-group">
                                                <button type="button"  class="btn editbtn" id="soapsubmit">
                                                    Submit Soap
                                                </button>
                                            </div>
                                           <!--</div>-->
                                    <!--</div>-->
                                   
                                </form>
                           

                        </div>
                    </div>


                    <div class="fourtabcontent">
                        <div class="card-body form-body">
                           
                                <form id="patient_visit_summery_form">
                                    
                                    <input type="hidden" name="find_care_id" value="{{ base64_encode($find_care->id) }}" />
                                    <input type="hidden" name="patient_id"   value="{{ base64_encode($find_care->patient_id) }}" />
                                    
                                    <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn"  onclick="startConverting(this.id,'plan_of_care_summary');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart
                                                        Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Plan Of Care Summary</label>
                                                <input type="text" class="form-control" name="plan_of_care_summary" id="plan_of_care_summary">
                                                <p class="text-danger plan_of_care_summary_error"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-6 offset-md-3">-->
                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Medications</label>-->
                                            <!--    <input type="text" class="form-control">-->
                                            <!--</div>-->
                                            
                                            
                                    <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn" onclick="startConverting(this.id,'medications');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart
                                                        Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Medications</label>
                                                <input type="text" class="form-control" name="medications" id="medications">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                            
                                            
                                            
                                            
                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Lab Tests</label>-->
                                            <!--    <input type="text" class="form-control">-->
                                            <!--</div>-->
                                            
                                    <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn" onclick="startConverting(this.id,'lab_tests');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart
                                                        Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Lab Tests</label>
                                                <input type="text" class="form-control" name="lab_tests" id="lab_tests">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">What To Monitor For At Home</label>-->
                                            <!--    <input type="text" class="form-control">-->
                                            <!--</div>-->
                                            
                                     <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn" onclick="startConverting(this.id,'what_to_monitor_for_at_home');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart
                                                        Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">What To Monitor For At Home</label>
                                                <input type="text" class="form-control" name="what_to_monitor_for_at_home" id="what_to_monitor_for_at_home">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">When To Seek Emergency Help</label>-->
                                            <!--    <input type="text" class="form-control">-->
                                            <!--</div>-->
                                            
                                            
                                            
                                    <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn" onclick="startConverting(this.id,'when_to_seek_emergency_help');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart
                                                        Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">When To Seek Emergency Help</label>
                                                <input type="text" class="form-control" name="when_to_seek_emergency_help" id="when_to_seek_emergency_help">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    

                                            <!--<div class="form-group">-->
                                            <!--    <label for="">Your Suggested Next Follow Up With PCP Or Telemedicine</label>-->
                                            <!--    <input type="text" class="form-control">-->
                                            <!--</div>-->
                                            
                                            
                                 <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn" onclick="startConverting(this.id,'your_suggested_next_follow_up_with_pcp_or_telemedicine');">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart
                                                        Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Your Suggested Next Follow Up With PCP Or Telemedicine</label>
                                                <input type="text" class="form-control" name="your_suggested_next_follow_up_with_pcp_or_telemedicine" id="your_suggested_next_follow_up_with_pcp_or_telemedicine">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                            <div class="form-group">
                                                <button type="button" class="btn editbtn" id="summerybtn">
                                                    Send Patient Name
                                                </button>
                                            </div>
                                    <!--    </div>-->
                                    <!--</div>-->

                                </form>
                        </div>
                    </div>

                </div>


            </div>


        </div>


    </section>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog video_dialogue" role="document">
      <div class="modal-content">
        <div class="video-body">
            <div class="container">
                <div class="videoprofile">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <div class="videopic">
                                <img src="images/overview/profileone.jpeg" alt="">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h5>Devon Cooper</h5>
                        </div>
                    </div>
                </div>

                <div class="centerrating">
                    <div class="ratequality">
                        <p>Please rate the quality of the call</p>
                        <div class="rating">
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                          </div>
                    </div>

                    <div class="accuracyrate">
                        <p>Please rate the accurancy of the data provided by Lauren Spencer</p>
                        <div class="rating">
                            <input type="radio" id="accuracy5" name="accuracy" value="5" />
                            <label class="star" for="accuracy5" title="Awesome" aria-hidden="true"></label>
                            <input type="radio" id="accuracy4" name="accuracy" value="4" />
                            <label class="star" for="accuracy4" title="Great" aria-hidden="true"></label>
                            <input type="radio" id="accuracy3" name="accuracy" value="3" />
                            <label class="star" for="accuracy3" title="Very good" aria-hidden="true"></label>
                            <input type="radio" id="accuracy2" name="accuracy" value="2" />
                            <label class="star" for="accuracy2" title="Good" aria-hidden="true"></label>
                            <input type="radio" id="accuracy1" name="accuracy" value="1" />
                            <label class="star" for="accuracy1" title="Bad" aria-hidden="true"></label>
                          </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="editbtn" data-dismiss="modal">
                            Send
                        </button>
                    </div>

                </div>

            </div>
        </div>
      </div>
    </div>
  </div>



    <div class="response-popup">
        <h5 id="message"></h5> 
    </div>
     
    <style>
    .main_body{
    height: calc(100vh - 167px);
    }
    </style>


    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>

<script>

  $(document).ready(function(){ 
      

      var $content, $modal, $apnData, $modalCon; 

      $content = $(".min");   


      //To fire modal
      $(".mdlFire").click(function(e){

          e.preventDefault();

          var $id = $(this).attr("data-target"); 

          $($id).modal({backdrop: false, keyboard: false}); 

        }); 
 

      $(".modalMinimize").on("click", function(){

                  $modalCon = $(this).closest(".mymodal").attr("id");  

                  $apnData = $(this).closest(".mymodal");

                  $modal = "#" + $modalCon;

                  $(".modal-backdrop").addClass("display-none");   

                  $($modal).toggleClass("min");  

                    if ( $($modal).hasClass("min") ){ 

                        $(".minmaxCon").append($apnData);  

                        $(this).find("i").toggleClass( 'fa-minus').toggleClass( 'fa-clone');

                      } 
                      else { 

                              $(".container").append($apnData); 

                              $(this).find("i").toggleClass( 'fa-clone').toggleClass( 'fa-minus');

                            };

                  });

        $("button[data-dismiss='modal']").click(function(){   

                $(this).closest(".mymodal").removeClass("min");

                $(".container").removeClass($apnData);   

                $(this).next('.modalMinimize').find("i").removeClass('fa fa-clone').addClass( 'fa fa-minus');

              }); 

  });

</script>

<style type="text/css">
  body { background-color:#fafafa;}
.modal-header .btnGrp {
  position: absolute;
  top: 8px;
  right: 10px;
}

.min {
  width: 250px;
  height: 35px;
  overflow: hidden !important;
  padding: 0px !important;
  margin: 0px;
  float: left;
  position: static !important;
}

.min .modal-dialog, .min .modal-content {
  height: 100%;
  width: 100%;
  margin: 0px !important;
  padding: 0px !important;
}

.min .modal-header {
  height: 100%;
  width: 100%;
  margin: 0px !important;
  padding: 3px 5px !important;
}

.display-none { display: none; }

button .fa {
  font-size: 16px;
  margin-left: 10px;
}

.min .fa { font-size: 14px; }

.min .menuTab { display: none; }

button:focus { outline: none; }

.minmaxCon {
  height: 35px;
  bottom: 1px;
  left: 1px;
  position: fixed;
  right: 1px;
  z-index: 9999;
}
  </style>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>

    <script>
        $(document).ready(function(){
            $('.firsttabcontent').show();
            $('.secondtabcontent').hide();
            $('.thirdtabcontent').hide();
            $('.fourtabcontent').hide();
            $('#patientinfo').click(function(){
                $('.secondtabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.firsttabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            });
            $('#visit').click(function(){
                $('.firsttabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.secondtabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            });
            $('#soap').click(function(){
                $('.firsttabcontent').hide();
                $('.secondtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.thirdtabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            });
            $('#summary').click(function(){
                $('.firsttabcontent').hide();
                $('.secondtabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            })
        })
    </script>
    
    
    
    
    
   <script>
       
	
  
		function startConverting (fieldid,textid) {
		  // alert(fieldid)
		  // 	speechRecognizer.stop();
		  var olddata= document.getElementById(textid).value;
          var result = document.getElementById(textid);
		if('webkitSpeechRecognition' in window) {
			var speechRecognizer = new webkitSpeechRecognition();
			speechRecognizer.continuous = true;
			speechRecognizer.interimResults = true;
			speechRecognizer.lang = 'en-US';
			speechRecognizer.start();

			var finalTranscripts = '';

			speechRecognizer.onresult = function(event) {
				var interimTranscripts = '';
				for(var i = event.resultIndex; i < event.results.length; i++){
					var transcript = event.results[i][0].transcript;
					transcript.replace("\n", "<br>");
					if(event.results[i].isFinal) {
						finalTranscripts += transcript;
					}else{
						interimTranscripts += transcript;
					}
				}
				result.innerHTML = olddata +' '+finalTranscripts + '' + interimTranscripts ;
			};
			speechRecognizer.onerror = function (event) {

			};
			speechRecognizer.onstart = function (event) {
			    
			    const note = document.getElementById(fieldid);
                note.style.backgroundColor = '#2f4858';
                note.style.color = '#ffffff';

			    recognizing = true;
            };
			speechRecognizer.onend = function (event) {
			 //   alert(textid);
			    const note = document.getElementById(fieldid);
                note.style.backgroundColor = '#e6eef5';
                note.style.color = '#000';
                recognizing = false;
            };
		}else {
			result.innerHTML = 'Your browser is not supported. Please download Google chrome or Update your Google chrome!!';
		}	
		}
   </script>
   
   
   <script>
        $(document).ready(function(){     
            
            $('#soapsubmit').click(function(){
                // alert('ok')
                var error=0;
                
                if($('#subjective').val()==''){
                    $('.subjective_error').text('subjective is required.');
                    error++;
                }else{
                    $('.subjective_error').text('');
                }
                
                if($('#objective').val()==''){
                    $('.objective_error').text('objective is required.');
                    error++;
                }else{
                    $('.objective_error').text('');
                }
                
              if(error==0){
                       var form = $('#soap-information')[0]; // You need to use standard javascript object here
                       var formData = new FormData(form);
                        $.ajax({
                               url:"{{ url('doctor/soap-information')}}",
                               type:"POST",
                               data:formData,
                               processData: false,
                               contentType: false,
                               cache: false,
                               success:function(response){
                                   if(response.status==true){
                                       $('#message').text("Soap has been added.");
                                       $('.response-popup').toggleClass('showthis');
                                       
                                       setTimeout(function() {  $('.response-popup').toggleClass('showthis'); }, 2000);
                                   }
                                   
                               }
                        }) 
              }
            })
            
            
            
            // $('.click').click(function() {
            //     $('.response-popup').toggleClass('showthis');
            // });
    }); 
    </script>
    
    
    
    
     <script>
        $(document).ready(function(){     
            
            $('#summerybtn').click(function(){
                //  alert('ok')
                var error=0;
                
                if($('#plan_of_care_summary').val()==''){
                    $('.plan_of_care_summary_error').text('Plan of care summary is required.');
                    error++;
                }else{
                    $('.plan_of_care_summary_error').text('');
                }
                
                // if($('#objective').val()==''){
                //     $('.objective_error').text('objective is required.');
                //     error++;
                // }
                
              if(error==0){
                       var form = $('#patient_visit_summery_form')[0]; // You need to use standard javascript object here
                       var formData = new FormData(form);
                        $.ajax({
                               url:"{{ url('doctor/patient-visit-summery')}}",
                               type:"POST",
                               data:formData,
                               processData: false,
                               contentType: false,
                               cache: false,
                               success:function(response){
                                   if(response.status==true){
                                       $('#message').text("Patient visit summary has added successfully.");
                                       $('.response-popup').toggleClass('showthis');
                                       
                                       setTimeout(function() {  $('.response-popup').toggleClass('showthis'); }, 2000);
                                   }
                                   
                               }
                        }) 
              }
            })
            
            
            
            // $('.click').click(function() {
            //     $('.response-popup').toggleClass('showthis');
            // });
    }); 
    </script>


@endsection