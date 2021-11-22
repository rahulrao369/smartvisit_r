@extends('doctor.layouts.default')
@section('content')

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
    <section class="content-wrapper">
     @include('doctor.partials.sidebar')

        <div class="side-wrapper">
            <div class="card wrapper-card">
               <div class="card-body">
                <div class="profilecard consultcard">
                    <div class="profilecardcontent">
                        <div class="form-group text-center profileset">
                            
                                <label for="photo-upload" class="custom-file-upload consultprofile">
                                    <div class="img-wrap img-upload">
                                        <img for="photo-upload" src="{{ url('/').'/'.$fc->patient->image }}">
                                    </div>
                                </label>
                            
                        </div>
                    </div>
                    <h5>{{ $fc->patient->first_name }} {{ $fc->patient->last_name}}</h5>
                    <!--<span>_{{ $fc->patient->first_name }}_{{ $fc->patient->last_name}}_</span>-->
                    <span>{{ \Carbon\Carbon::parse($fc->patient->dob)->diff(\Carbon\Carbon::now())->format('%y')}} Years Old</span>

                    <div class="consultsocialitem">
                        <ul>
                            <li>
                                <!--<form id="join-form">-->
                                <button class="defaultbtn numberbtn" id="numberbtn">
                                    <i class="flaticon-phone"></i> {{ $fc->patient->phone}}
                                </button>
                                 <input id="patient_id" type="hidden" value="{{ $fc->patient->id }}">
                                 <input id="appid" type="hidden">
                                 <input id="token" type="hidden" >
                                 <input id="channel" type="hidden">
                                 <input id="patient_name" type="hidden" value="{{ $fc->patient->first_name.' '.$fc->patient->last_name}}">
                                <!--</form>-->
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
                                <div class="col-md-8 offset-md-2 text-center">
                                  <div class="patient-info">
                                        <h5>Personal Info</h5>
                                        <table class="table">
                                            <tr>
                                            <td class="text-left" style="border-top: 0;">Date Of Birth:</td>
                                            <td class="text-right" style="border-top: 0;">{{ $fc->patient->dob }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Address:</td>
                                                <td class="text-right">{{ $fc->patient->address }}</td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td class="text-left">City:</td>-->
                                            <!--    <td class="text-right">Indore</td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td class="text-left">Zip Code:</td>
                                                <td class="text-right">{{ $fc->patient->postal_code }}</td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td class="text-left">State:</td>-->
                                            <!--    <td class="text-right">MP</td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td class="text-left">Insurance Or Self-Pay:</td>
                                                <td class="text-right">Massachusetts</td>
                                            </tr>
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
                                                <tr>
                                                    <td>Drug or Food Allergy</td>
                                                    <td>Penicil Reaction</td>
                                                    <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                </tr>
                                                    <tr>
                                                        <td>Chronic Medical illnesses</td>
                                                        <td>--------------</td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Previous hospitalization in past 3 months</td>
                                                        <td>Document #01: EMR, 01/00/20
                                                            Document #01: EMR, 01/00/20
                                                        </td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medication list</td>
                                                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Social history(alcohol, smoking)</td>
                                                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>History of violence or substance abuse</td>
                                                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Immunization (Flu vaccine or shingles vaccines)</td>
                                                        <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
                                                        <td></td>
                                                    </tr>
                                            </tbody>
                                    </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="secondtabcontent">
                        <div class="card-body form-body">
                            <div class="visitdetailarea">
                                <div class="row">
                                    <div class="col-md-5">
                                       <div class="detailvisit">
                                           <ul>
                                               @foreach($symptoms as $row)
                                               <li>
                                               <span> Symptom - {{ $row->name  }}</span>
                                               </li>
                                               @endforeach
                                               <!--<li>-->
                                               <!-- <span>Symptom - Fever</span>-->
                                               <!--</li>-->
                                               <!--<li>-->
                                               <!-- <span>Reguest Refill</span>-->
                                               <!-- </li>-->
                                               <!-- <li>-->
                                               <!--     <span>Need Referral</span>-->
                                               <!-- </li>-->
                                               <!-- <li>-->
                                               <!--     <span>Symptom - Rash</span>-->
                                               <!-- </li>-->
                                           </ul>
                                       </div>
                                    </div>
                                    <div class="col-md-7">
                                            <div class="patient-info detail-info">
                                                <table class="table">
                                                    <tr>
                                                        <td>20,3.7</td>
                                                        <td>12:00 Am</td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>20,3.7</td>
                                                        <td>2:00 Pm</td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>20,3.7</td>
                                                        <td>12:00 Am</td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>20,3.7</td>
                                                        <td>6:00 Am</td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>20,3.7</td>
                                                        <td>12:00 Am</td>
                                                        <td class="text-center"><img src="images/icons/eye.png" alt=""></td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="thirdtabcontent">
                        <div class="card-body form-body">
                                       @if(session()->has('success'))
                                          <div class="alert alert-success">
                                           <p class="text-center">{{ session()->get('success')}}</p>         
                                         </div>
                                        @endif
                                <form action="{{ url('doctor/soap')}}">
                                    <input type="hidden" value="{{ $fc->patient->id }}" name="patient_id"/>
                                    <div class="visitform mt-0">
                                       
                                        
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn">
                                                   <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Subjective</label>
                                                <textarea name="subjective" id="" rows="3" class="form-control"></textarea>
                                                 <p class="text-danger">{{ $errors->first('subjective')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group soap_group">
                                                <label for="">Objective</label>
                                                <textarea name="objective" id="" rows="3" class="form-control"></textarea>
                                                 <p class="text-danger">{{ $errors->first('objective')}}</p>
                                            </div>

                                            <div class="maritalstatus">
                                            <h6>Mental Status</h6>
                                             <div class="form-group soapradio">
                                                 <label class="paymentradio">alert oriented
                                                     <input type="radio" checked="checked" name="mental_status" value="alert oriented">
                                                     <span class="checkmark"></span>
                                                   </label>
                                                   <label class="paymentradio">confused disoriented
                                                     <input type="radio" name="mental_status" value="confused disoriented">
                                                     <span class="checkmark"></span>
                                                   </label>
                                                   
                                                    <p class="text-danger">{{ $errors->first('alert_oriented')}}</p>
                                             </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6>Vital Signs</h6>
                                                 <div class="form-group soapradio">
                                                     <label class="paymentradio">temparature blood Pressure
                                                         <input type="radio" checked="checked" name="vital_signs" value="temparature blood Pressure">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <label class="paymentradio">finger sticks if available
                                                         <input type="radio" name="vital_signs" value="finger sticks if available">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       
                                                        <p class="text-danger">{{ $errors->first('vital_signs')}}</p>
                                                 </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6>Uplaoded Images Or Test Results (If Applicable) Physical Findings:</h6>
                                                <input type="file" name="images[]" id="images" multiple>
                                            </div>

                                            <div class="form-group">
                                                <h5 style="font-weight: 600;">Assessment</h5>
                                                <label for="">Description Of Patient Problem List</label>
                                                <textarea name="assessment" id="" rows="3" class="form-control"></textarea>
                                                 <p class="text-danger">{{ $errors->first('assessment')}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Impression (Differential Diagnosis)</label>
                                                <textarea name="impression" id="" rows="3" class="form-control"></textarea>
                                                 <p class="text-danger">{{ $errors->first('impression')}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Add Diagnosis</label>
                                                <textarea name="diagnosis" id="" rows="3" class="form-control"></textarea>
                                                <p class="text-danger">{{ $errors->first('diagnosis')}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Result</label>
                                                <textarea name="result" id="" rows="3" class="form-control"></textarea>
                                                <p class="text-danger">{{ $errors->first('result')}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Type Dx Code</label>
                                                <textarea name="type_dx_code" id="" rows="3" class="form-control"></textarea>
                                                 <p class="text-danger">{{ $errors->first('type_dx_code')}}</p>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6 style="font-weight: 600;">Plan</h6>
                                                <label>Prescription Ordered</label>
                                                 <div class="form-group soapradio">
                                                     <label class="paymentradio">temparature blood Pressure
                                                         <input type="radio" checked="checked" name="prescription_ordered">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <label class="paymentradio">finger sticks if available
                                                         <input type="radio" name="prescription_ordered">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <p class="text-danger">{{ $errors->first('prescription_ordered')}}</p>
                                                 </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">how many?</label>
                                                <textarea name="how_many" id="" rows="3" class="form-control"></textarea>
                                                <p class="text-danger">{{ $errors->first('how_many')}}</p>
                                            </div>

                                            <div class="form-group consultinput">
                                               <div class="row">
                                                   <div class="col-md-6">
                                                    <h6 style="font-weight: 600;">Monitoring Parameters</h6>

                                                        <label for="">Education</label>
                                                        <input type="text" class="form-control" name="education">
                                                        <p class="text-danger">{{ $errors->first('education')}}</p>
                                                   </div>

                                                   <div class="col-md-6">
                                                        <label for="">diet</label>
                                                        <input type="text" class="form-control" name="diet">
                                                        <p class="text-danger">{{ $errors->first('diet')}}</p>
                                                   </div>

                                                   <div class="col-md-6">
                                                        <label for="">exercise</label>
                                                        <input type="text" class="form-control" name="exercise">
                                                         <p class="text-danger">{{ $errors->first('exercise')}}</p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">medication use</label>
                                                        <input type="text" class="form-control" name="medication_use">
                                                         <p class="text-danger">{{ $errors->first('medication_use')}}</p>
                                                   </div>

                                                   <div class="col-md-6">
                                                        <label for="">symptoms</label>
                                                        <input type="text" class="form-control" name="symptoms">
                                                         <p class="text-danger">{{ $errors->first('symptoms')}}</p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">smokings/alcohol</label>
                                                        <input type="text" class="form-control" name="smokings_alcohol">
                                                         <p class="text-danger">{{ $errors->first('smokings_alcohol')}}</p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">activity level</label>
                                                        <input type="text" class="form-control" name="activity_level">
                                                        <p class="text-danger">{{ $errors->first('activity_level')}}</p>
                                                    </div>
                                               </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Follow up visit</label>
                                                <textarea name="follow_up_visit" id="" rows="3" class="form-control"></textarea>
                                                <p class="text-danger">{{ $errors->first('follow_up_visit')}}</p>
                                            </div>
                                            

                                            <div class="form-group">
                                                <button type="submit" class="btn editbtn">
                                                    Submit Soap
                                                </button>
                                            </div>
                                           </div>
                                    </div>
                                   
                                </form>
                           

                        </div>
                    </div>


                    <div class="fourtabcontent">
                        <div class="card-body form-body">
                           
                                <form action="">
                                    <div class="visitform mt-0">
                                        <div class="smartnotes">
                                            <div class="turnon">
                                                <button type="button" class="editbtn turnonbtn">
                                                    <i class="flaticon-mic"></i> <span> Turn On Smart Notes
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="chiefcomp">
                                            <div class="form-group">
                                                <label for="">Plan Of Care Summary</label>
                                                <input type="text" class="form-control" name="plan_of_care_summary">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label for="">Medications</label>
                                                <input type="text" class="form-control" name="medications">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="">Lab Tests</label>
                                                <input type="text" class="form-control" name="lab_tests">
                                            </div>

                                            <div class="form-group">
                                                <label for="">What To Monitor For At Home</label>
                                                <input type="text" class="form-control" name="what_to_monitor_for_at_home">
                                            </div>

                                            <div class="form-group">
                                                <label for="">When To Seek Emergency Help</label>
                                                <input type="text" class="form-control" name="when_to_seek_emergency_help">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Your Suggested Next Follow Up With PCP Or Telemedicine</label>
                                                <input type="text" class="form-control" name="telemedicine">
                                            </div>

                                            <div class="form-group">
                                                <button type="button" class="btn editbtn">
                                                    Send Patient Name
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                        </div>
                    </div>

                </div>


            </div>


        </div>


    </section>





    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
   
    <script>
        $(document).ready(function(){
            $('.firsttabcontent').show();
            $('.secondtabcontent').hide();
            $('.thirdtabcontent').hide();
            $('.fourtabcontent').hide();
            $('#patientinfo').click(function(){
                
                localStorage.setItem("tab","patientinfo");
                $('.secondtabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.firsttabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            });
            $('#visit').click(function(){
                
                localStorage.setItem("tab","visit");
                $('.firsttabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.secondtabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            });
            $('#soap').click(function(){
                
                localStorage.setItem("tab","soap");
                $('.firsttabcontent').hide();
                $('.secondtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.thirdtabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            });
            $('#summary').click(function(){
                
                localStorage.setItem("tab","summary");
                $('.firsttabcontent').hide();
                $('.secondtabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').show();
                $(this).addClass('tabactive').siblings().removeClass("tabactive");
            })
        })
    </script>
    
    
    
    <!--soap-->
    
    <script>
        $(document).ready(function(){
           
           if( localStorage.getItem("tab")=="summary"){
               
                $('.firsttabcontent').hide();
                $('.secondtabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').show();
                $('#summary').addClass('tabactive').siblings().removeClass("tabactive");
           }
           
          if( localStorage.getItem("tab")=="soap"){
              
                $('.firsttabcontent').hide();
                $('.secondtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.thirdtabcontent').show();
                $('#soap').addClass('tabactive').siblings().removeClass("tabactive");
           }
           
           
          if( localStorage.getItem("tab")=="visit"){
              
                $('.firsttabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.secondtabcontent').show();
                $('#visit').addClass('tabactive').siblings().removeClass("tabactive");
           }
           
           
          if( localStorage.getItem("tab")=="patientinfo"){
              
                $('.secondtabcontent').hide();
                $('.thirdtabcontent').hide();
                $('.fourtabcontent').hide();
                $('.firsttabcontent').show();
                $('#patientinfo').addClass('tabactive').siblings().removeClass("tabactive");
           }
            
        });
    </script>
@endsection