@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
    @include('doctor.partials.sidebar')

            <div class="side-wrapper">
               <div class="card wrapper-card">
                  <div class="card-body">
                    <div class="profilecard">
                        <div class="profilecardcontent">
                         <div class="form-group text-center profileset">
                             <label for="photo-upload" class="custom-file-upload fas">
                                 <div class="img-wrap img-upload">
                                     <img for="photo-upload" src="{{ url('/').Auth::user()->image }}">
                                 </div>
                                 <form id="profileImage" method="post" enctype="multipart/form-data">
                                 <div class="p-image"> <i class="flaticon-camera upload-button"></i>
                                     <input class="file-upload" id="photo-upload" type="file" name="image" accept="image/*">
                                 </div>
                                 </form>
                             </label>
                         </div>
                        </div>
                        <h5 class="doctor_name">{{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</h5>
 
                        <div class="tabitem">
                            <ul>
                                <li class="tabactive" id="demographic">
                                    Demographic
                                </li>
                                <li id="notification">
                                     Notification
                                 </li>
                                 <li id="password">
                                     Password
                                 </li>
                            </ul>
                        </div>
                    </div>
                  </div>

                  <div class="tabarea">
                      <div class="firsttabcontent">
                        <div class="card-body form-body">
                             <p class="alert alert-success text-center" style="display: none;" id="servermsg"></p>
                            <form id="basic_info">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btnedit">
                                        <button type="button" class="btn orangebtn savebasic">
                                          <i class="flaticon-write"></i>  Save
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="">First Name</label>
                                                 <input type="text" class="form-control" name="first_name" value="{{ $doctor->first_name }}" id="first_name">
                                                 <p class="text-danger" id="first_name_error"></p>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="">Last Name</label>
                                                 <input type="text" class="form-control" value="{{ $doctor->last_name}}" name="last_name" id="last_name">
                                                   <p class="text-danger" id="last_name_error"></p>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="">Email</label>
                                                 <input type="email" class="form-control" value="{{ $doctor->email}}" name="email" id="email" readonly="">
                                                  <p class="text-danger" id="email_error"></p>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="">Phone</label>
                                                 <input type="number" class="form-control" value="{{ $doctor->phone}}" name="phone" id="phone">
                                                  <p class="text-danger" id="phone_error"></p>
                                             </div>
                                        </div>
                                        
                                        
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" class="form-control checkaddress" name="address" id="autocomplete" autocomplete="off" value="{{ $doctor->address }}">
                                                <input type="hidden" name="latitude" id="latitude" class="form-control" value="{{ $doctor->lat }}">
                                                
                                                <input type="hidden" name="longitude" id="longitude" class="form-control" value="{{ $doctor->lng }}">
                                                
                                                <input type="hidden" name="postal_code" id="postal_code" class="form-control" value="{{ $doctor->postal_code }}">
                                                
                                                <input type="hidden" name="country_code" id="country_code" class="form-control" value="{{ $doctor->country_code }}">
                                             </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-12">
                                            <h5 class="form-title">Mailing Address</h5>
                                       </div>
                                    
                                        <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="">Address 1</label>
                                             <input type="text" class="form-control" name="mailing_address_1" id="mailing_address_1" value="{{ isset($doctor->mailing_address_1) ? $doctor->mailing_address_1:''}}">
                                            <p class="text-danger" id="office_first_name_error"></p>
                                         </div>
                                       </div>
                                    
                                      <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="">Address 2</label>
                                             <input type="text" class="form-control" name="mailing_address_2" id="mailing_address_2" value="{{ isset($doctor->mailing_address_2) ? $doctor->mailing_address_2:''}}">
                                            <p class="text-danger" id="office_first_name_error"></p>
                                         </div>
                                    </div>
                                    
                                    
                                    
                                    <!--   <div class="col-md-12">-->
                                    <!--        <h5 class="form-title">Billing Address</h5>-->
                                    <!--   </div>-->
                                    
                                    <!--    <div class="col-md-12">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Address 1</label>-->
                                    <!--         <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" value="{{ isset($doctor->billing_address_1) ? $doctor->billing_address_1:''}}">-->
                                    <!--        <p class="text-danger" id="office_first_name_error"></p>-->
                                    <!--     </div>-->
                                    <!--   </div>-->
                                    
                                    <!--  <div class="col-md-12">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Address 2</label>-->
                                    <!--         <input type="text" class="form-control" name="billing_address_2" id="billing_address_2" value="{{ isset($doctor->billing_address_2) ? $doctor->billing_address_2:''}}">-->
                                    <!--        <p class="text-danger" id="office_first_name_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->
                                    
                                        
                                        
                                          <div class="col-md-6">
                                             <div class="form-group">
                                              
                                             </div>
                                        </div>
                                        
                                        
                                        

                                    
                                    
                                    </div>
     
                                    <!--<div class="col-md-12">-->
                                    <!--    <div class="col-md-12">-->
                                    <!--        <h5 class="form-title">Mailing Address</h5>-->
                                    <!--   </div>-->
     
                                    <!--<div class="col-md-12">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Address 1</label>-->
                                    <!--         <input type="text" class="form-control" name="address_3" id="address_2" value="{{ isset($doctor->address_3) ? $doctor->doctor_mailing->office_first_name:''}}">-->
                                    <!--        <p class="text-danger" id="office_first_name_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->
                                    
                                    <!--  <div class="col-md-12">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Address 2</label>-->
                                    <!--         <input type="text" class="form-control" name="address_3" id="address_2" value="{{ isset($doctor->address_3) ? $doctor->doctor_mailing->office_first_name:''}}">-->
                                    <!--        <p class="text-danger" id="office_first_name_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Last Name</label>-->
                                    <!--         <input type="text" class="form-control" name="office_last_name" id="office_last_name" value="{{ isset($doctor->doctor_mailing) ?$doctor->doctor_mailing->office_last_name:'' }}">-->
                                    <!--          <p class="text-danger" id="office_last_name_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Email</label>-->
                                    <!--         <input type="email" class="form-control" name="office_email" id="office_email" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->office_email:'' }}">-->
                                    <!--          <p class="text-danger" id="office_email_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Phone</label>-->
                                    <!--         <input type="number" class="form-control" name="office_phone" id="office_phone" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->office_phone:'' }}">-->
                                    <!--          <p class="text-danger" id="office_phone_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->
     
                                    <!-- <div class="col-md-12">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Address 1</label>-->
                                    <!--         <input type="text" class="form-control" name="office_address_1" id="office_address_1" value="{{ isset($doctor->doctor_mailing->office_address_1) ? $doctor->doctor_mailing->office_address_1:''}}">-->
                                    <!--          <p class="text-danger" id="office_address_1_error"></p>-->
                                    <!--     </div>-->
                                    <!-- </div>-->
     
                                    <!-- <div class="col-md-12">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Address 2</label>-->
                                    <!--         <input type="text" class="form-control" name="office_address_2" value="{{ isset($doctor->doctor_mailing->office_address_2) ? $doctor->doctor_mailing->office_address_2:'' }}" id="office_address_2">-->
                                    <!--          <p class="text-danger" id="office_address_2_error"></p>-->
                                    <!--     </div>-->
                                    <!-- </div>-->
     
                                    <!-- <div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Country</label>-->
                                    <!--         <input type="hidden" name="country_added" id="country_added" value="{{ isset($doctor->doctor_mailing->office_country) ? $doctor->doctor_mailing->office_country:''}}">-->
                                    <!--         <select name="office_country" id="office_country" class="form-control">-->
                                    <!--             <option value="" selected disabled>--select--</option>-->
                                    <!--             @if(isset($country) && count($country) > 0 )-->
                                    <!--             @foreach($country as $kye => $row)-->
                                    <!--             @if(isset($doctor->doctor_mailing->office_country))-->
                                    <!--             <option value="{{ $row->id}}"-->
                                    <!--                {{ $doctor->doctor_mailing->office_country == $row->id ? "selected":""}}-->
                                    <!--                >{{ $row->name }}</option>-->
                                    <!--                @else-->
                                    <!--                <option value="{{ $row->id}}"-->
                                    <!--                >{{ $row->name }}</option>-->
                                    <!--            @endif-->
                                    <!--             @endforeach-->
                                    <!--             @endif-->
                                    <!--         </select>-->
                                    <!--          <p class="text-danger" id="office_country_error"></p>-->
                                    <!--     </div>-->
                                    <!--</div>-->

                                    <!--<div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">State</label>-->
                                    <!--         <select name="office_state" id="office_state" class="form-control">-->
                                    <!--             <option value="" selected disabled>--select--</option>-->
                                    <!--         </select>-->
                                    <!--          <p class="text-danger" id="office_state_error"></p>-->
                                    <!--     </div>-->
                                    <!-- </div>-->
                                    <!-- <div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">City/Town</label>-->
                                    <!--           <select name="office_city" id="office_city" class="form-control">-->
                                    <!--             <option value="" selected disabled>--select--</option>-->
                                    <!--         </select>-->
                                    <!--          <p class="text-danger" id="office_city_error"></p>-->
                                          
                                    <!--     </div>-->
                                    <!-- </div>-->
     
                                    <!--<div class="col-md-6">-->
                                    <!--     <div class="form-group">-->
                                    <!--         <label for="">Zipcode</label>-->
                                    <!--          <input type="text" class="form-control" name="office_zip_code" value="{{ isset($doctor->doctor_mailing->office_zip_code) ? $doctor->doctor_mailing->office_zip_code:'' }}" id="office_zip_code">-->
                                    <!--           <p class="text-danger" id="office_zip_code_error"></p>-->
                                           <!--   <select name="" id="" class="form-control">
                                    <!--             <option value="" selected disabled>--select--</option>-->
                                    <!--         </select> -->
                                    <!--     </div>-->
                                    <!-- </div>-->
     
                                     
                                     
                                    <!--</div>-->
     
                                 <!--   <div class="row">-->
                                 <!--    <div class="col-md-12 bottmMRG">-->
                                 <!--         <h5 class="form-title">Mailing Address</h5>-->
                                 <!--         <p class="form_p">Same as Residence Address?</p>-->
                                 <!--         <label for="" class="checkbox-inline">-->
                                 <!--         <input type="checkbox" id="sameAddress" {{ isset($doctor->doctor_mailing->residence_first_name) ? "checked":""}}> if yes, Import The Residence Address-->
                                 <!--        </label>-->
                                 <!--    </div>-->
     
                                 <!--    <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">First Name</label>-->
                                 <!--            <input type="text" class="form-control" id="residence_first_name" name="residence_first_name" value="{{isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_first_name:''}}">-->

                                 <!--        <p class="text-danger" id="residence_first_name_error"></p>-->
                                 <!--        </div>-->
                                 <!--   </div>-->
                                 <!--   <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Last Name</label>-->
                                 <!--            <input type="text" class="form-control" id="residence_last_name" name="residence_last_name" value="{{isset($doctor->doctor_mailing)?  $doctor->doctor_mailing->residence_last_name:''}}">-->
                                 <!--             <p class="text-danger" id="residence_last_name_error"></p>-->
                                 <!--        </div>-->
                                 <!--   </div>-->
                                 <!--   <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Email</label>-->
                                 <!--            <input type="email" class="form-control" id="residence_email" name="residence_email" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_email:''}}">-->
                                 <!--            <p class="text-danger" id="residence_email_error"></p>-->
                                 <!--        </div>-->
                                 <!--   </div>-->
                                 <!--   <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Phone</label>-->
                                 <!--            <input type="number" class="form-control" id="residence_phone" name="residence_phone" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_phone:''}}">-->
                                 <!--            <p class="text-danger" id="residence_phone_error"></p>-->
                                 <!--        </div>-->
                                 <!--   </div>-->
     
                                 <!--    <div class="col-md-12">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Address 1</label>-->
                                 <!--            <input type="text" class="form-control" id="residence_address_1" name="residence_address_1" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_address_1:''}}">-->
                                 <!--            <p class="text-danger" id="residence_address_1_error"></p>-->
                                 <!--        </div>-->
                                 <!--    </div>-->
     
                                 <!--    <div class="col-md-12">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Address 2</label>-->
                                 <!--            <input type="text" class="form-control" id="residence_address_2" name="residence_address_2" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_address_2:''}}">-->
                                 <!--             <p class="text-danger" id="residence_address_2_error"></p>-->
                                 <!--        </div>-->
                                 <!--    </div>-->


                                 <!--     <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Country</label>-->
                                 <!--            <select  class="form-control" id="residence_country" name="residence_country">-->
                                 <!--                <option value="" selected disabled>--select--</option>-->
                                 <!--                 @if(count($country) > 0 )-->
                                 <!--                @foreach($country as $kye => $row)-->
                                 <!--                <option value="{{ $row->id}}">{{ $row->name }}</option>-->
                                 <!--                @endforeach-->
                                 <!--                @endif-->
                                 <!--            </select>-->
                                 <!--            <p class="text-danger" id="residence_country_error"></p>-->
                                 <!--        </div>-->
                                 <!--    </div>-->
     
                                 <!--    <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">State</label>-->
                                 <!--            <select id="residence_state" name="residence_state" class="form-control" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_state:''}}">-->
                                 <!--                <option value="" selected disabled>--select--</option>-->
                                 <!--            </select>-->
                                 <!--             <p class="text-danger" id="residence_state_error"></p>-->
                                 <!--        </div>-->
                                 <!--    </div>-->
     
                                 <!--    <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">City/Town</label>-->
                                 <!--            <select  class="form-control" id="residence_city" name="residence_city">-->
                                 <!--                <option value="" selected disabled>--select--</option>-->
                                 <!--            </select>-->

                                 <!--            <p class="text-danger" id="residence_city_error"></p>-->
                                 <!--        </div>-->
                                 <!--   </div>-->
     
                                 <!--   <div class="col-md-6">-->
                                 <!--        <div class="form-group">-->
                                 <!--            <label for="">Zipcode</label>-->
                                 <!--            <input type="text" class="form-control" name="residence_zip_code" value="{{ isset($doctor->doctor_mailing) ? $doctor->doctor_mailing->residence_zip_code:''}}" id="residence_zip_code">-->
                                 <!--            <p class="text-danger" id="residence_zip_code_error"></p>-->
                                           <!--   <select  class="form-control" id="residence_zip_code" name="residence_zip_code">
                                 <!--                <option value="" selected disabled>--select--</option>-->
                                 <!--            </select> -->
                                 <!--        </div>-->
                                 <!--    </div>-->
     
                                    
     
                                 <!--</div>-->
                           
     
                                </div>
                            </div>
                            </form>
                        </div>
                      </div>

                      <div class="secondtabcontent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 class="notificationHeading">How To Get Notifications?</h5>
                                         <p class="alert alert-success  text-center" style="display: none;" id="servermsgnotifi"></p>
                                        <div class="form-group soapradio">

                                             <div class="designradio {{ $doctor->notification==1 ? 'activeradio':''}}">
                                                <label class="paymentradio notiradio">Mail
                                                    <input type="radio"  name="notification" value="1" id="notification" {{ $doctor->notification==1 ? "checked":""}} >
                                                    <span class="checkmark"></span>
                                                  </label>
                                             </div>

                                             <div class="designradio {{ $doctor->notification==2 ? 'activeradio':''}}">
                                                <label class="paymentradio notiradio">Phone
                                                    <input type="radio" name="notification" value="2" id="notification" {{ $doctor->notification==2 ? "checked":""}} >
                                                    <span class="checkmark"></span>
                                                  </label>
                                             </div>

                                              <div class="designradio {{ $doctor->notification==3 ? 'activeradio':''}}">
                                                <label class="paymentradio notiradio">Both
                                                    <input type="radio" name="notification" value="3" id="notification" {{ $doctor->notification==3 ? "checked":""}} >
                                                    <span class="checkmark"></span>
                                                  </label>
                                              </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="btnedit">
                                        <button type="button" class="btn orangebtn" id="notificationSav">
                                         <i class="flaticon-select"></i>  Save
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="thirdtabcontent">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="passwordfield">
                                        <h5 class="notificationHeading">Change Password</h5>
                                         <p class="alert  text-center" style="display: none;" id="servermsgpassword"></p>
                                        <form id="password_change">
                                        <div class="form-group">
                                           <label for="">Old Password</label>
                                           <input type="password" class="form-control" name="old_password" id="old_password">
                                           <p id="old_password_error" class="text-danger"></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password">
                                            <p id="password_error" class="text-danger password_error"></p>
                                         </div>

                                         <div class="form-group">
                                            <label for="">Repeat New Password</label>
                                            <input type="password" class="form-control" id="repeat_new_password" name="repeat_new_password">
                                            <p id="repeat_new_password_error" class="text-danger repeat_new_password_error"></p>
                                         </div>

                                         <div class="form-group">
                                            <button type="button" class="btn orangebtn" id="passChnage">
                                            Change Password
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                  </div>
               </div>

               
            </div>

           
</section>





<!-- JS, Popper.js, and jQuery -->
<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBMGJ_qzoxakfd3cymFgEAUcQfMA-k1a5k&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
<!-- <script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script> -->


<script>
    $(document).ready(function(){
        $('.firsttabcontent').show();
        $('.secondtabcontent').hide();
        $('.thirdtabcontent').hide();
        $('#demographic').click(function(){
            $('.firsttabcontent').show();
            $('.secondtabcontent').hide();
            $('.thirdtabcontent').hide();
            $(this).addClass('tabactive').siblings().removeClass("tabactive");
        });
        $('#notification').click(function(){
            $('.firsttabcontent').hide();
            $('.secondtabcontent').show();
            $('.thirdtabcontent').hide();
            $(this).addClass('tabactive').siblings().removeClass("tabactive");
        });
        $('#password').click(function(){
            $('.firsttabcontent').hide();
            $('.secondtabcontent').hide();
            $('.thirdtabcontent').show();
            $(this).addClass('tabactive').siblings().removeClass("tabactive");
        })
    })
</script>

<script>
    $(document).ready(function() {
    $('.notiradio input').click(function () {
        $('input:not(:checked)').parent().parent().removeClass("activeradio");
        $('input:checked').parent().parent().addClass("activeradio");
    });    
    });
</script>


<script>
    $(document).ready(function() {

        $.ajaxSetup({
               headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
        })
       
       //already filled form

     
           var country_id = "{{ isset($doctor->doctor_mailing->office_country) ? $doctor->doctor_mailing->office_country:'' }}";
           var state_id   ="{{  isset($doctor->doctor_mailing->office_state) ? $doctor->doctor_mailing->office_state:'' }}";
           var city_id    = "{{  isset($doctor->doctor_mailing->office_city) ? $doctor->doctor_mailing->office_city:'' }}";

           var rcountry_id = "{{  isset($doctor->doctor_mailing->residence_country) ? $doctor->doctor_mailing->residence_country:'' }}";
           var rstate_id   ="{{  isset($doctor->doctor_mailing->residence_state) ? $doctor->doctor_mailing->residence_state:'' }}";
           var rcity_id    = "{{  isset($doctor->doctor_mailing->residence_city) ? $doctor->doctor_mailing->residence_city:'' }}";
           // alert(country)
           if(country_id  != '' && state_id != ''  &&  city_id != ''){
              // $('#office_state').html('<option value="" selected disabled>--select--</option>');
              // $('#office_city').html('<option value="" selected disabled>--select--</option>');
              $.ajax({
                    url:"{{ url('doctor/form-load-data')}}",
                    type:"POST",
                    data:{
                        country_id:country_id,
                        state_id:state_id,
                        city_id:city_id,
                        rcountry_id:rcountry_id,
                        rstate_id:rstate_id,
                        rcity_id:rcity_id
                    },
                    success:function(response){
                        $('#office_city').html(response.office_city);
                        $('#office_state').html(response.office_state);
                        $('#office_country').html(response.office_country);


                        $('#residence_city').html(response.residence_city);
                        $('#residence_state').html(response.residence_state);
                        $('#residence_country').html(response.residence_country);
                    }

              })
           }
     


       //get office country
        $('#office_country').change(function(){
           var country_id = $(this).val();
           // alert(country)
           if(country_id  != ''){
              $('#office_state').html('<option value="" selected disabled>--select--</option>');
              $('#office_city').html('<option value="" selected disabled>--select--</option>');
              $.ajax({
                    url:"{{ url('doctor/get-state')}}",
                    type:"POST",
                    data:{country_id:country_id},
                    success:function(response){
                        $('#office_state').html(response);
                    }

              })
           }
        });



        //get office city
         $('#office_state').change(function(){
           var state_id = $(this).val();
           // alert(country)
           if(state_id  != ''){

              $.ajax({
                    url:"{{ url('doctor/get-city')}}",
                    type:"POST",
                    async:false,
                    data:{state_id:state_id},
                    success:function(response){
                        $('#office_city').html(response);
                    }

              })
           }
        });







           
        

           //get residence country
        $('#residence_country').change(function(){
           var country_id = $(this).val();
           // alert(country)
            if(country_id  != ''){
              $('#residence_state').html('<option value="" selected disabled>--select--</option>');
              $('#residence_city').html('<option value="" selected disabled>--select--</option>');
              $.ajax({
                    url:"{{ url('doctor/get-state')}}",
                    type:"POST",
                    data:{country_id:country_id},
                    success:function(response){
                        $('#residence_state').html(response);
                    }

              })
           }
        });



        //get  residence city
         $('#residence_state').change(function(){
           var state_id = $(this).val();
           // alert(country)
           if(state_id  != ''){

              $.ajax({
                    url:"{{ url('doctor/get-city')}}",
                    type:"POST",
                    async:false,
                    data:{state_id:state_id},
                    success:function(response){
                        $('#residence_city').html(response);
                    }

              })
           }
        });








      $('#sameAddress').click(function(){
        // alert($('#office_first_name').val())

      if($(this).is(':checked')){
      
        // if($('#office_country').is(':checked') && $('#office_state').is(':checked') !='' && $('#office_city').is(':checked') !=''){
            // alert()
        $.ajax({
            url:"{{ url('doctor/form-load-data')}}",
            type:"POST",
            data:{
                country_id:$('#office_country').val(),
                state_id:$('#office_state').val(),
                city_id: $('#office_city').val()
            },
            success:function(response){
                $('#residence_city').html(response.office_city);
                $('#residence_city').prop('readonly', true);
                $('#residence_state').html(response.office_state);
                $('#residence_state').prop('readonly', true);
                $('#residence_country').html(response.office_country);
                $('#residence_country').prop('readonly', true);
            }

        })
    // }


      $('#residence_first_name').val($('#office_first_name').val());
      $('#residence_first_name').prop('readonly', true);

      $('#residence_last_name').val($('#office_last_name').val());
      $('#residence_last_name').prop('readonly', true);

      $('#residence_email').val($('#office_email').val());
       $('#residence_email').prop('readonly', true);

      $('#residence_phone').val($('#office_phone').val());
       $('#residence_phone').prop('readonly', true);

      $('#residence_address_1').val($('#office_address_1').val());
       $('#residence_address_1').prop('readonly', true);

      $('#residence_address_2').val($('#office_address_2').val());
       $('#residence_address_2').prop('readonly', true);

      $('#residence_zip_code').val($('#office_zip_code').val());
       $('#residence_zip_code').prop('readonly', true);
      // $('#residence_city').html($('#office_city').html());
      // $('#residence_state').html($('#office_state').html());
      // $('#residence_country').html($('#office_country').html());

      }else{
      $('#residence_first_name').val('');
      $('#residence_first_name').prop('readonly', false);

      $('#residence_last_name').val('');
      $('#residence_last_name').prop('readonly', false);


      $('#residence_email').val('');
      $('#residence_email').prop('readonly', false);

      $('#residence_phone').val('');
       $('#residence_phone').prop('readonly', false);

      $('#residence_address_1').val('');
       $('#residence_address_1').prop('readonly', false);

      $('#residence_address_2').val('');
       $('#residence_address_2').prop('readonly', false);

      $('#residence_zip_code').val('');
       $('#residence_zip_code').prop('readonly', false);

      $('#residence_city').html('<option value="" selected disabled>--select--</option>');
       $('#residence_city').prop('readonly', false);

      $('#residence_state').html('<option value="" selected disabled>--select--</option>');
       $('#residence_state').prop('readonly', false);

       $('#residence_country').val('');
       $('#residence_country').prop('readonly', false);
      }




      
   })





// 

   $('.savebasic').click(function(){

     var error = 0;


     if($('#first_name').val() == ''){
       $('#first_name_error').text('Firstname is required.');
       error++;
     }else{
        $('#first_name_error').text('');
     }

    if($('#last_name').val() == ''){
       $('#last_name_error').text('Lastname is required.');
       error++;
     }else{
         $('#last_name_error').text('');
     }

    if($('#phone').val() == ''){
       $('#phone_error').text('Phone is required.');
       error++;
     }else{
       $('#phone_error').text('');
     }

    // if($('#email').val() == ''){
    //    $('#email_error').text('Email is required.');
    //    error++;
    //  }else{
    //    $('#email_error').text('');
    //  }




   // mailing office

    // if($('#office_first_name').val() == ''){
    //   $('#office_first_name_error').text('Firstname is required.');
    //   error++;
    //  }else{
    //     $('#office_first_name_error').text('');
    //  }

    // if($('#office_last_name').val() == ''){
    //   $('#office_last_name_error').text('Lastname is required.');
    //   error++;
    //  }else{
    //   $('#office_last_name_error').text('');
    //  }

    // if($('#office_phone').val() == ''){
    //   $('#office_phone_error').text('Phone is required.');
    //   error++;
    //  }else{
    //   $('#office_phone_error').text('');
    //  }

    // if($('#office_email').val() == ''){
    //   $('#office_email_error').text('Email is required.');
    //   error++;
    //  }else{
    //   $('#office_email_error').text('');
    //  }


    // if($('#office_address_1').val() == ''){
    //   $('#office_address_1_error').text('Address 1 is required.');
    //   error++;
    //  }else{
    //   $('#office_address_1_error').text('');
    //  }

    // if($('#office_address_2').val() == ''){
    //   $('#office_address_2_error').text('Address 2 is required.');
    //   error++;
    //  }else{
    //   $('#office_address_2_error').text('');
    //  }

    // if($('#office_city option:selected').val() == ''){
    //   $('#office_city_error').text('City is required.');
    //   error++;
    //  }else{
    //   $('#office_city_error').text('');
    //  }

    // if($('#office_country option:selected').val() == ''){
    //   $('#office_country_error').text('Country is required.');
    //   error++;
    //  }else{
    //   $('#office_country_error').text('');
    //  }

    // if($('#office_state option:selected').val() == ''){
    //   $('#office_state_error').text('State is required.');
    //   error++;
    //  }else{
    //   $('#office_state_error').text('');
    //  }

    // if($('#office_zip_code').val() == ''){
    //   $('#office_zip_code_error').text('Firstname is required.');
    //   error++;
    //  }else{
    //   $('#office_zip_code_error').text('');
    //  }









     // residence
     //  office

    // if($('#residence_first_name').val() == ''){
    //   $('#residence_first_name_error').text('Firstname is required.');
    //   error++;
    //  }else{
    //     $('#residence_first_name_error').text('');
    //  }

    // if($('#residence_last_name').val() == ''){
    //   $('#residence_last_name_error').text('Lastname is required.');
    //   error++;
    //  }else{
    //   $('#residence_last_name_error').text('');
    //  }

    // if($('#residence_phone').val() == ''){
    //   $('#residence_phone_error').text('Phone is required.');
    //   error++;
    //  }else{
    //   $('#residence_phone_error').text('');
    //  }

    // if($('#residence_email').val() == ''){
    //   $('#residence_email_error').text('Email is required.');
    //   error++;
    //  }else{
    //   $('#residence_email_error').text('');
    //  }


    // if($('#residence_address_1').val() == ''){
    //   $('#residence_address_1_error').text('Address 1 is required.');
    //   error++;
    //  }else{
    //   $('#residence_address_1_error').text('');
    //  }

    // if($('#residence_address_2').val() == ''){
    //   $('#residence_address_2_error').text('Address 2 is required.');
    //   error++;
    //  }else{
    //   $('#residence_address_2_error').text('');
    //  }

    // if($('#residence_city option:selected').val() == ''){
    //   $('#residence_city_error').text('City is required.');
    //   error++;
    //  }else{
    //   $('#residence_city_error').text('');
    //  }

    // if($('#residence_country option:selected').val() == ''){
    //   $('#residence_country_error').text('Country is required.');
    //   error++;
    //  }else{
    //   $('#residence_country_error').text('');
    //  }

    // if($('#residence_state option:selected').val() == ''){
    //   $('#residence_state_error').text('State is required.');
    //   error++;
    //  }else{
    //   $('#residence_state_error').text('');
    //  }

    // if($('#residence_zip_code').val() == ''){
    //   $('#residence_zip_code_error').text('Firstname is required.');
    //   error++;
    //  }else{
    //   $('#residence_zip_code_error').text('');
    //  }

    // alert(error)
     if(error ==0){
  
          $.ajax({
                  url:"{{ url('doctor/add-doctor-information')}}",
                  type:"POST",
                  data:$('#basic_info').serialize(),
                  success:function(response){
                    $('#servermsg').text(response.message);
                    $('#servermsg').css("display", "block");
                    $('.doctor_name').text($('#first_name').val()+' '+$('#last_name').val());
                  console.log(response);
                  }
          });
     }
     


   });


})
</script>


<!-- profile upload -->

<script type="text/javascript">
  $(document).ready(function(){
           $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });


      $('#photo-upload').on('change',function(){
        var formData = new FormData($("#profileImage")[0]);
          $.ajax({
                  url:"{{ url('doctor/profile-image')}}",
                  type:"POST",
                  contentType: false,
                  processData: false,
                  data: formData,
                  success:function(response){
                    // $('#servermsg').text(response.message);
                    // $('#servermsg').css("display", "block");
                    window.location.reload()
                  console.log(response);
                  }
          });

      })

  })
</script>



<!-- Notification -->

<script type="text/javascript">
  $(document).ready(function(){
           $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });


      $('#notificationSav').on('click',function(){
        var type = $('input[name="notification"]:checked').val();
          $.ajax({
                  url:"{{ url('doctor/notification-setting')}}",
                  type:"POST",
                  // contentType: false,
                  // processData: false,
                  data: {type:type},
                  success:function(response){
                    $('#servermsgnotifi').text(response.message);
                    $('#servermsgnotifi').css("display", "block");
                    // window.location.reload()
                  console.log(response);
                  }
          });

      })

  })
</script>


<!-- change password -->

<script type="text/javascript">
  $(document).ready(function(){
           $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });


      $('#passChnage').on('click',function(){

        var old_password        = $('#old_password').val();
        var password            = $('#new_password').val();
        var repeat_new_password = $('#repeat_new_password').val();
        
        var error = 0;

        if(old_password ==''){
           $('#old_password_error').text('Old password is required.');
           error++;
        }else{
            $('#old_password_error').text('');  
        }
        if(password ==''){
             $('.password_error').text('New password is required.');
             error++;
        }else{
            $('.password_error').text('');  
        }

      
       if(repeat_new_password ==''){
            $('#repeat_new_password_error').text('Repeat new password not is required.');  
            error++;
        }else{
            $('#repeat_new_password_error').text('');  
        }
        
         if(repeat_new_password != password){
            $('#repeat_new_password_error').text('Password not matched.');  
            error++;
        }else{
            $('#repeat_new_password_error').text('');  
        }


        //  if(password !='' && password.length < 6){
        //     $('#password_error').text('Password should be greater than 6 digits.');
        //      error++;
        // }else{
        //     $('#password_error').text('');  
        // }


        // if(repeat_new_password != password){
        //    $('#repeat_new_password_error').text('Password not matched.'); 
        //    error++;
        // }else{
        //     $('#repeat_new_password_error').text('');  
        // }

          if(error==0){
              $.ajax({
                      url:"{{ url('doctor/change-password')}}",
                      type:"POST",
                      // contentType: false,
                      // processData: false,
                      data: $('#password_change').serialize(),
                      success:function(response){
                         $('#servermsgpassword').text(response.message);
                       
                        if(response.status==true){
                         $('#servermsgpassword').addClass("alert-success");
                        }else{
                         $('#servermsgpassword').addClass("alert-danger");
                        }
                        $('#servermsgpassword').css("display", "block");
                        // window.location.reload()
                      console.log(response);
                      }
              });
          }

      })

  })
</script>




<script>
       google.maps.event.addDomListener(window, 'load', initialize);

       function initialize() {
           var input = document.getElementById('autocomplete');
           var autocomplete = new google.maps.places.Autocomplete(input);
             autocomplete.setComponentRestrictions({'country': ['us']});
           autocomplete.addListener('place_changed', function() {
               var place = autocomplete.getPlace();
               console.log(place)
               $('#latitude').val(place.geometry['location'].lat());
               $('#longitude').val(place.geometry['location'].lng());

            // --------- show lat and long ---------------
               $("#lat_area").removeClass("d-none");
               $("#long_area").removeClass("d-none");
               
                 var place = autocomplete.getPlace();
                for (var i = 0; i < place.address_components.length; i++) {
                  for (var j = 0; j < place.address_components[i].types.length; j++) {
                    if (place.address_components[i].types[j] == "postal_code") {
                      document.getElementById('postal_code').value = place.address_components[i].long_name;
            
                    }
                    
                    
                    if (place.address_components[i].types[j] == "country") {
                      document.getElementById("country_code").value = place.address_components[i].short_name;
                    } 

                  }
                }
                
           });
       }
</script>

@endsection