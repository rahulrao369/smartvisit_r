<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>SmartVisit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('public/patient/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/flaticon.css') }}">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ url('public/patient/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/custom.css') }}">
</head>
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
-webkit-appearance: none; 
margin: 0; 
}
.form-wrapper{
    background-attachment: fixed !important;
}
.list-unstyled li{
    font-size: 14px;
}
</style>
<body>

    
    <div class="form-wrapper">
        <div class="container">
            <div class="card form-card">
                <div class="logo_heading registerhead">
                    <img src="{{ url('public/patient/images/blacklogo.png') }}" alt="">
                </div>
                
                  @if(session()->has('failed'))
                    <h5 class="alert alert-danger text-danger">{{ session()->get('failed') }}</h5>
                    @endif
               
               <form  id="doctor_register">
                   @csrf
                <div class="formstart">
                    <p class="text-danger text-center error_name"></p>
                    <div class="form-group">
                        <label for="">First name</label>
                        <input type="text" class="form-control checkname" name="first_name" id="first_name">
                        <p class="text-danger efirst_name">{{ $errors->first('first_name')}}</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control checkname" name="last_name" id="last_name">
                         <p class="text-danger elast_name">{{ $errors->first('last_name')}}</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Street Address</label>
                        <!--<input type="number" class="form-control" name="address" id="phone">-->
                           <input type="text" class="form-control checkaddress" name="address" id="autocomplete" autocomplete="off">
                                    <input type="hidden" name="latitude" id="latitude" class="form-control">
                                    <input type="hidden" name="longitude" id="longitude" class="form-control">
                                    <input type="hidden" name="postal_code" id="postal_code" class="form-control" value="">
                                    <input type="hidden" name="country_code" id="country_code" class="form-control">
                         <p class="text-danger address">{{ $errors->first('address')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control checkemail" name="email" id="email">
                         <p class="text-danger eemail">{{ $errors->first('email')}}</p>
                    </div>
                    
                     <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone">
                         <p class="text-danger ephone">{{ $errors->first('phone')}}</p>
                    </div>
                    
                    <!--<div class="form-group soapradio">-->
                    <!--     <label for="">Gender</label>-->
                    <!--     <div class="designradio activeradio">-->
                    <!--        <label class="paymentradio notiradio">Male-->
                    <!--            <input type="radio" name="gender" value="1" id="gender">-->
                    <!--            <span class="checkmark"></span>-->
                    <!--          </label>-->
                    <!--     </div>-->

                    <!--     <div class="designradio">-->
                    <!--        <label class="paymentradio notiradio">Female-->
                    <!--            <input type="radio" name="gender" value="2" id="gender">-->
                    <!--            <span class="checkmark"></span>-->
                    <!--          </label>-->
                    <!--     </div>-->

                    <!--   <p class="egender text-danger"></p>-->
                    <!-- </div>-->
                    
                     

                    
                     
                    <!--  <div class="form-group">-->
                    <!--    <label for="">DOB</label>-->
                    <!--   <input type="date" id="dob" name="dob" class="form-control">-->
                    <!--     <p class="text-danger edob">{{ $errors->first('dob')}}</p>-->
                    <!--</div>-->
                    
                    <div class="form-group">
                        <label for="">Password</label>
                        <!--<input type="password" class="form-control" name="password" id="password">-->
                        <div class="col-md-12" style="padding: 0px;">
                            <input type="password" class="form-control" name="password" id="password">
                            <!--<input id="password" class="form-control input-md"-->
                            <!--name="password" type="password" -->
                            <!--placeholder="Enter your password" >-->
                            <span class="show-pass" onclick="toggle()">
                                <i class="fa fa-eye" onclick="myFunction(this)"></i>
                            </span>
                            <div id="popover-password">
                                <p><span id="result"></span></p>
                                <div class="progress">
                                    <div id="password-strength" 
                                        class="progress-bar" 
                                        role="progressbar" 
                                        aria-valuenow="40" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100" 
                                        style="width:0%">
                                    </div>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="">
                                        <span class="low-upper-case">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            &nbsp;Lowercase &amp; Uppercase
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="one-number">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            &nbsp;Number (0-9)
                                        </span> 
                                    </li>
                                    <li class="">
                                        <span class="one-special-char">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            &nbsp;Special Character (!@#$%^&*)
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="eight-character">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            &nbsp;Atleast 8 Character
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <p class="text-danger epassword">{{ $errors->first('password')}}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <!--<input type="password" class="form-control" name="confirm_password" id="confirm_password">-->
                        <!-- <p class="text-danger ecpassword">{{ $errors->first('confirm_password')}}</p>-->
                        <!--<div class="form-group">-->
                          <div class="form-label-group" style="position: relative;">
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Confirm Password" > <label for="confirm_password"></label>
                            <span class="show-pass" onclick="toggle2()">
                                <i class="fa fa-eye" onclick="myFunction2(this)"></i>
                            </span>
                            <span id="confirm_password_msg"></span>
                          </div>
                        <!--</div>-->
                    </div>
                    <div class="form-group">
                        <p style="margin: 0; font-size: 14px; font-weight: 500; color: #444; text-align: left;"> <label for="checkboxs"> <input id="checkboxs" style="position: relative; top: 2px; margin-right: 5px;" type="checkbox" /> I Agree to the Doctor <a href="#">Terms of Service</a> and <a href="#">Privacy Statement</a> </label> </p>
                        <p class="text-danger checkboxs-error"></p>
                    </div>
                    <!--<div class="form-group">-->
                    <!--    <label for="">Confirm Password</label>-->
                    <!--    <input type="password" class="form-control" name="confirm_password" id="confirm_password">-->
                    <!--     <p class="text-danger ecpassword">{{ $errors->first('confirm_password')}}</p>-->
                    <!--</div>-->

                    <!--<div class="submitwrapper">-->
                        <!--<a href="index.html">-->
                    <!--        <button type="button" class="editbtn patient_register">Create</button>-->
                        <!--</a>-->
                    <!--</div>-->
                    <div class="form-group aboutbtn-group">
                        <div class="uploadbtn mt-3">
                            <input type="file" id="file" name="doc"/>
                            <label for="file">Upload CV <img src="{{ url('public/doctor/images/icons/upload.png') }}" alt=""> </label>
                            <p class="text-danger efile"></p>
                        </div>
    
                        <button type="button" class="editbtn" id="editbtn">Continue</button>
                    </div>

                    <div class="accountwrap registerwrap">
                        <p>You Have an Account? <a href="{{ url('login') }}">Login</a> </p>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
<input type="hidden" id="count_first_name" value="0"/>
<input type="hidden" id="count_last_name" value="0"/>
<input type="hidden" id="count_email" value="0"/>
<input type="hidden" id="count_phone" value="0"/>
<input type="hidden" id="count_exist_email" value="0"/>


<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/patient/js/jquery.min.js') }}"></script>
<script src="{{ url('public/patient/js/bootstrap.min.js') }}"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBMGJ_qzoxakfd3cymFgEAUcQfMA-k1a5k&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

<style>
input{
    color:#022255 !important;
}
input[type=email]:focus,
input[type=password]:focus,
input[type=text]:focus{
    box-shadow: 0 0 5px rgba(246, 8, 110,0.8);
    border: 1px solid rgba(246, 8, 110,0.8);
}
/*.container{*/
/*    width: 100%;*/
/*    height: 100vh;*/
/*    display: flex;*/
/*    justify-content: center;*/
/*    align-items: center;*/
/*}*/
.form-horizontal {
    width: 320px;
    background-color: #ffffff;
    padding: 25px 38px;
    border-radius: 12px;
    box-shadow: 2px 2px 15px rgba(0,0,0,0.5);
}
.control-label {
    text-align: left !important;
    padding-bottom: 4px;
}
.progress {
    height: 3px !important;
}
.form-group {
    margin-bottom: 10px;
}
.show-pass{
    position: absolute;
    top:5%;
    right: 8%;
}
.progress-bar-danger {
    background-color: #e90f10;
}
.progress-bar-warning{
    background-color: #ffad00;
}
.progress-bar-success{
    background-color: #02b502;
}
.login-btn{
    width: 180px !important;
    background-image: linear-gradient(to right, #f6086e , #ff133a) !important;
    font-size: 18px;
    color: #fff;
    margin: 0 auto 5px;
    padding: 8px 0; 
}
.login-btn:hover{
    background-image: linear-gradient(to right, rgba(255, 0, 111, 0.8) , rgba(247, 2, 43, 0.8)) !important;
    color: #fff !important;
}
.fa-eye{
    color: #022255;
    cursor: pointer;
}
.ex-account p a{
    color: #f6086e;
    text-decoration: underline;
}
.fa-circle{
    font-size: 6px;  
}
.fa-check{
    color: #02b502;
}
.registerhead {
    padding: 0;
}
.formstart {
    margin: 0;
}
</style>

<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/patient/js/jquery.min.js') }}"></script>
<script src="{{ url('public/patient/js/bootstrap.min.js') }}"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBMGJ_qzoxakfd3cymFgEAUcQfMA-k1a5k&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

<script>
$(document).ready(function(){
  
  $("#confirm_password").bind('keyup change', function(){

    check_Password( $("#password").val(), $("#confirm_password").val() )
    
    
  })

  $("#sign_in_btn").click(function(){

    check_Password( $("#password").val(), $("#confirm_password").val() )

  })
})

function check_Password( Pass, Con_Pass){

  if(Pass === ""){

    

  }else if( Pass === Con_Pass){

    $("#sign_in_btn").removeAttr("onclick")
    $('#confirm_password_msg').show()
    $("#confirm_password_msg").html('<div class="alert alert-success">Password matched</div>')

    setTimeout(function() {
        $('#confirm_password_msg').fadeOut('slow');
    }, 3000);

  }else{
    $("#confirm_password").focus()
    $('#confirm_password_msg').show()
    $("#confirm_password_msg").html('<div class="alert alert-danger">Password didnot matched</div>')

    setTimeout(function() {
        $('#confirm_password_msg').fadeOut('slow');
    }, 3000);

  }

}
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

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>


<!--validation for first and lastname-->
<script>
    $(document).ready(function(){
         
        
    })
</script>

<!--validation for email-->
<script>
    $(document).ready(function(){
        
        
        
        
       
    })
</script>


<!--register-->
<script>
    // $(document).ready(function(){
         
         
        
        // first and lastname verification (working)
        //   $(".checkname").on("blur", function () {
        //  //  alert($(this).val())
        //   if($('#first_name').val() !='' && $('#last_name').val() !=''){
        //      $.ajax({
        //           url:"{{ url('validate-name')}}",
        //           method:"POST",
        //           data:{name:$('#first_name').val()+' '+$('#last_name').val()},
        //           success:function(response){
        //               var obj = JSON.parse(response);
        //             //   console.log(obj.NameInfoV2.IsNameGood)
        //             if(obj in response){
        //               if(obj.NameInfoV2.IsNameGood==true){
        //                   $('.efirst_name').text("");
        //                   $('.elast_name').text("");
        //               }else{
        //                   if(obj.NameInfoV2.FirstNameFound==false){
        //                       $('.efirst_name').text("*Invalid first name.");
        //                       $('#count_first_name').val(1);
        //                   }else{
        //                       $('.efirst_name').text("");
        //                         $('#count_first_name').val(0);
        //                   }
                           
        //                     if(obj.NameInfoV2.LastNameFound==false){
        //                       $('.elast_name').text("*Invalid last name.");
        //                       $('#count_last_name').val(1);
                             
        //                   }else{
        //                         $('.elast_name').text("");
        //                         $('#count_last_name').val(0);
        //                   }
                           
        //               }
                      
        //             }
        //           }
        //      })
        //   }
        //  });
         
         
         
         
         
         
         
         
         
        //  email verification(working)
        
        //  $(".checkemail").on("blur", function () {
        //  //  alert($(this).val())
        //  var email =$(this).val();
        //   if(email !=''){
        //      $.ajax({
        //           url:"{{ url('validate-email')}}",
        //           method:"POST",
        //           data:{email:email},
        //           success:function(response){
        //              if ('email' in response) {
        //                   // your code here
        //                 //   console.log("okkkkkkkkkkkkk")
        //                 $('.eemail').text("Email already exist.");
        //                 }else{
        //                 var obj = JSON.parse(response);
                        
        //                       if(obj.ValidateEmailInfo.Score !==4){
        //                           $.ajax({
        //                                   url:"{{ url('check-patient-email')}}",
        //                                   method:"POST",
        //                                   data:{email:email},
        //                                   success:function(response){
        //                                      if(response.status ===true){
        //                                         $('.eemail').text("");
        //                                         $('#count_email').val(0);
                                            
        //                                       }else{
        //                                      $('.eemail').text("email already exist");
        //                                         $('#count_email').val(1);
        //                                       }
                                          
                    
        //                                   }
        //                              })
                    
                              
        //                       }else{
        //                           $('.eemail').text("*In valid email.");
        //                           $('#count_email').val(1);
                                 
                                   
                                   
        //                       }
                      
                      
        //                 }
                     
                     
                    
        //           }
        //      })
        //   }
        //  });
         
         
          //  check if email exist
        //  $(".checkemail").on("keyup", function () {
          
        //   function check_email_exist(email){
             
        //          $.ajax({
        //               url:"{{ url('check-patient-email')}}",
        //               method:"POST",
        //               data:{email:email},
        //               success:function(response){
                          
        //                   if(response.status ==true){
        //                     //   $('.eemail').text("");
        //                     //   $('#count_exist_email').val(0);
        //                     return true;
        //                   }else{
        //                     //   alert()
        //                     //   $('.eemail').text(response.message);
        //                     //   $('#count_exist_email').val(1);
        //                     return false;
        //                   }
        //               }
        //          })

          
         // }
        //  });
         
         
         
         
          //  check if phone exist(working)
        //  $("#phone").on("input", function () {
        //  //  alert($(this).val())
        //   if($(this).val() !=''){
        //      $.ajax({
        //           url:"{{ url('check-patient-phone')}}",
        //           method:"POST",
        //           data:{phone:$(this).val()},
        //           success:function(response){
                     
        //               if(response.status ==true){
        //                   $('.ephone').text("");
        //                   $('#count_phone').val(0);
        //               }else{
        //                   $('.ephone').text(response.message);
        //                   $('#count_phone').val(1);
        //               }
        //           }
        //      })
        //   }
        //  });
         
         
         
        //  submit form
         
        //  $(".patient_register").on("click", function () {
          
        //   var error =0;
           
        //   if($('#first_name').val()==""){
        //     $('.efirst_name').text("*first name is required.");
        //     error++;
        //   }else{
        //     $('.efirst_name').text("");
        //   }
          
        //   if($('#last_name').val()==""){
        //     $('.elast_name').text("*last name is required.");
        //     error++;
        //   }else{
        //     $('.elast_name').text("");
        //   }
          
          
          
        //   if($('#email').val()==""){
        //     $('.eemail').text("*email is required.");
        //     error++;
        //   }else{
        //     $('.eemail').text("");
        //   }
          
          
          
          
        //   if($('#phone').val()==""){
        //     $('.ephone').text("*phone is required.");
        //     error++;
        //   }else{
        //     $('.ephone').text("");
        //   }
          
          
        //   if($('#dob').val()==""){
        //     $('.edob').text("*dob is required.");
        //     error++;
        //   }else{
        //     $('.edob').text("");
        //   }
          
          
          
        //   if($('#password').val()==""){
        //     $('.epassword').text("*password is required.");
        //     error++;
        //   }else{
        //     $('.epassword').text("");
        //   }
          
          
        //   if($('#confirm_password').val()==""){
        //     $('.ecpassword').text("*confrim password is required.");
        //     error++;
        //   }else{
        //     $('.ecpassword').text("");
        //   }
        //   alert($("input[name='gender']:checked").length)
           
        //   if($("input[name='gender']:checked").length ==0){
        //     //   alert()
        //     $('.egender').text("*gender is required.");
        //     error++;
        //   }else{
        //     $('.egender').text("");
        //   }
          
          
        //  if($('#password').val()!=""  && $('#confirm_password').val() !=""){
             
        //         if($('#password').val() != $('#confirm_password').val() !=""){
        //              $('.ecpassword').text("*Password not matched.");
        //              error++;
        //         }else{
        //             $('.ecpassword').text("");
        //         }
            
        //   }
          
          
          
        //   console.log('errr',error)
        //   alert($('#count_last_name').val())
        //   if(error==0 && $('#count_last_name').val()==0 && $('#count_last_name').val()==0 && $('#count_email').val()==0 && $('#count_phone').val()==0){
    //       if(error==0){
             
    //          $.ajax({
    //               url:"{{ url('patient/register')}}",
    //               method:"POST",
    //               data:$('#register_form').serialize(),
    //               success:function(response){
    //                   if(response.status==true){
    //                         window.location ="{{ url('success-page')}}?email="+$('#email').val()
                       
    //                   }else{
                        
                         
    //                   }
    //               }
    //          })
    //       }
    //      })
    // })
</script>




<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>



<!--register-->
<script>
    $(document).ready(function(){
         
         
        
        // first and lastname verification (working)
        //   $(".checkname").on("blur", function () {
        //  //  alert($(this).val())
        //   if($('#first_name').val() !='' && $('#last_name').val() !=''){
        //      $.ajax({
        //           url:"{{ url('validate-name')}}",
        //           method:"POST",
        //           data:{name:$('#first_name').val()+' '+$('#last_name').val()},
        //           success:function(response){
        //               var obj = JSON.parse(response);
        //               console.log(obj.NameInfoV2.IsNameGood)
        //               if(obj.NameInfoV2.IsNameGood==true){
        //                   $('.efirst_name').text("");
        //                   $('.elast_name').text("");
        //               }else{
        //                   if(obj.NameInfoV2.FirstNameFound==false){
        //                       $('.efirst_name').text("*Invalid first name.");
        //                       $('#count_first_name').val(1);
        //                   }else{
        //                       $('.efirst_name').text("");
        //                         $('#count_first_name').val(0);
        //                   }
                           
        //                     if(obj.NameInfoV2.LastNameFound==false){
        //                       $('.elast_name').text("*Invalid last name.");
        //                       $('#count_last_name').val(1);
                             
        //                   }else{
        //                         $('.elast_name').text("");
        //                         $('#count_last_name').val(0);
        //                   }
                           
        //               }
        //           }
        //      })
        //   }
        //  });
         
         
         
         
         
         
         
         
         
        //  email verification working
        
        //  $(".checkemail").on("blur", function () {
        //  //  alert($(this).val())
        //  var email =$(this).val();
        //   if(email !=''){
        //      $.ajax({
        //           url:"{{ url('validate-email')}}",
        //           method:"POST",
        //           data:{email:email},
        //           success:function(response){
        //               var obj = JSON.parse(response);
                     
        //               if(obj.ValidateEmailInfo.Score !==4){
                          
                         
        //                          $.ajax({
        //                               url:"{{ url('check-patient-email')}}",
        //                               method:"POST",
        //                               data:{email:email},
        //                               success:function(response){
        //                                  if(response.status ===true){
        //                                     $('.eemail').text("");
        //                                     $('#count_email').val(0);
                                        
        //                                   }else{
        //                                  $('.eemail').text("email already exist");
        //                                     $('#count_email').val(1);
        //                                   }
                                      
                
        //                               }
        //                          })
                
                          
        //               }else{
        //                   $('.eemail').text("*In valid email.");
        //                   $('#count_email').val(1);
                         
                           
                           
        //               }
        //           }
        //      })
        //   }
        //  });
         
         
         
         //  validate address(working)
        
        //  $(".checkaddress").on("blur", function () {
        //  //  alert($(this).val())
        //  var address =$(this).val();
        // //  alert(address)
        //   if(address){
        //      $.ajax({
        //           url:"{{ url('validate-address')}}",
        //           method:"POST",
        //           data:{address:address},
        //           success:function(response){
        //               console.log(response)
        //               var obj = JSON.parse(response);
        //               if(obj.IsCASS==true){
                          
        //                   $('.eaddress').text("");
        //                   $('#eaddress_count').val(0);
                          
        //               }else{
                         
        //                   $('.eaddress').text("*Invalid address .");
        //                   $('#eaddress_count').val(1);
        //               }
                     
                          
                      
        //           }
        //      })
        //   }
        //  });
         
         
         
         
          //  check if email exist
        //  $(".checkemail").on("keyup", function () {
          
        //   function check_email_exist(email){
             
        //          $.ajax({
        //               url:"{{ url('check-patient-email')}}",
        //               method:"POST",
        //               data:{email:email},
        //               success:function(response){
                          
        //                   if(response.status ==true){
        //                     //   $('.eemail').text("");
        //                     //   $('#count_exist_email').val(0);
        //                     return true;
        //                   }else{
        //                     //   alert()
        //                     //   $('.eemail').text(response.message);
        //                     //   $('#count_exist_email').val(1);
        //                     return false;
        //                   }
        //               }
        //          })

          
         // }
        //  });
         
         
         
         
          //  check if phone exist(working)
        //  $("#phone").on("input", function () {
        //  //  alert($(this).val())
        //   if($(this).val() !=''){
        //      $.ajax({
        //           url:"{{ url('check-patient-phone')}}",
        //           method:"POST",
        //           data:{phone:$(this).val()},
        //           success:function(response){
                     
        //               if(response.status ==true){
        //                   $('.ephone').text("");
        //                   $('#count_phone').val(0);
        //               }else{
        //                   $('.ephone').text(response.message);
        //                   $('#count_phone').val(1);
        //               }
        //           }
        //      })
        //   }
        //  });
         
         
         
        //  submit form
         
         $("#editbtn").on("click", function () {
          
          var error =0;
           
          if($('#first_name').val()==""){
            $('.efirst_name').text("*first name is required.");
            error++;
          }else{
            $('.efirst_name').text("");
          }
          
           if($('#last_name').val()==""){
            $('.elast_name').text("*last name is required.");
            error++;
          }else{
            $('.elast_name').text("");
          }
          
          
          
           if($('#email').val()==""){
            $('.eemail').text("*email is required.");
            error++;
          }else{
            $('.eemail').text("");
          }
          
          
        if($('#autocomplete').val()==""){
            $('.eaddress').text("*address is required.");
            error++;
          }else{
            $('.eaddress').text("");
          }
          
          
          
           if($('#phone').val()==""){
            $('.ephone').text("*phone is required.");
            error++;
          }else{
            $('.ephone').text("");
          }
          
          if($('#password').val()==""){
            $('.epassword').text("*password is required.");
            error++;
          }else{
            $('.epassword').text("");
          }
          
          
         if(!$("#checkboxs").is(":checked")){
             $(".checkboxs-error").text("Please accept terms and condition.");
         }else{
             $(".checkboxs-error").text("");
         }
          
        //   if($('#file').val()==""){
        //       $('.efile').text("*Please upload your document.");
        //       error++;
        //   }else{
        //     $('.efile').text("");
        //   }
          
        //   if($('#confirm_password').val()==""){
        //     $('.ecpassword').text("*confrim password is required.");
        //     error++;
        //   }else{
        //     $('.ecpassword').text("");
        //   }
          
          
        //  if($('#password').val()!=""  && $('#confirm_password').val() !=""){
             
        //         if($('#password').val() != $('#confirm_password').val() !=""){
        //              $('.ecpassword').text("*Password not matched.");
        //              error++;
        //         }else{
        //             $('.ecpassword').text("");
        //         }
            
        //   }
          
          
          
          console.log('errr',error)
        //   alert($('#count_last_name').val())
        //   if(error==0 && $('#count_last_name').val()==0 && $('#count_last_name').val()==0 && $('#count_email').val()==0 && $('#count_phone').val()==0 && $('#eaddress_count').val()==0){
         if(error==0){
                var form = $('#doctor_register')[0];
                var formData = new FormData(form);


             $.ajax({
                  url:"{{ url('doctor/register')}}",
                  method:"POST",
                  data:formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success:function(response){
                       if(response.status==true){
                            window.location ="{{ url('success-page')}}?email="+$('#email').val()
                       
                       }else{
                        
                         
                      }
                  }
             })
          }
         })
    })
</script>


<script>
let state = false;
let estate = false;
let password = document.getElementById("password");
let ConFpassword = document.getElementById("confirm_password");
let passwordStrength = document.getElementById("password-strength");
let lowUpperCase = document.querySelector(".low-upper-case i");
let number = document.querySelector(".one-number i");
let specialChar = document.querySelector(".one-special-char i");
let eightChar = document.querySelector(".eight-character i");

password.addEventListener("keyup", function(){
    let pass = document.getElementById("password").value;
    checkStrength(pass);
});

ConFpassword.addEventListener("keyup", function(){
    let Confpass = document.getElementById("confirm_password").value;
    checkStrength(Confpass);
});

function toggle(){
    if(state){
        document.getElementById("password").setAttribute("type","password");
        state = false;
    }else{
        document.getElementById("password").setAttribute("type","text")
        state = true;
    }
}
function toggle2(){
    if(estate){
        document.getElementById("confirm_password").setAttribute("type","password");
        estate = false;
    }else{
        document.getElementById("confirm_password").setAttribute("type","text")
        estate = true;
    }
}

function myFunction(show){
    show.classList.toggle("fa-eye-slash");
}
function myFunction2(show){
    show.classList.toggle2("fa-eye-slash");
}

function checkStrength(password) {
    let strength = 0;

    //If password contains both lower and uppercase characters
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
        lowUpperCase.classList.remove('fa-circle');
        lowUpperCase.classList.add('fa-check');
    } else {
        lowUpperCase.classList.add('fa-circle');
        lowUpperCase.classList.remove('fa-check');
    }
    //If it has numbers and characters
    if (password.match(/([0-9])/)) {
        strength += 1;
        number.classList.remove('fa-circle');
        number.classList.add('fa-check');
    } else {
        number.classList.add('fa-circle');
        number.classList.remove('fa-check');
    }
    //If it has one special character
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
        specialChar.classList.remove('fa-circle');
        specialChar.classList.add('fa-check');
    } else {
        specialChar.classList.add('fa-circle');
        specialChar.classList.remove('fa-check');
    }
    //If password is greater than 7
    if (password.length > 7) {
        strength += 1;
        eightChar.classList.remove('fa-circle');
        eightChar.classList.add('fa-check');
    } else {
        eightChar.classList.add('fa-circle');
        eightChar.classList.remove('fa-check');   
    }

    // If value is less than 2
    if (strength < 2) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-danger');
        passwordStrength.style = 'width: 10%';
    } else if (strength == 3) {
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-warning');
        passwordStrength.style = 'width: 60%';
    } else if (strength == 4) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-success');
        passwordStrength.style = 'width: 100%';
    }
}
</script>

<script>
$(document).ready(function(){
    $('#male').click(function(){
        $('.designradio').removeClass('activeradio');
        $(this).parent().parent().addClass('activeradio');
    });
    $('#female').click(function(){
        $('.designradio').removeClass('activeradio');
        $(this).parent().parent().addClass('activeradio');
    });
});
</script>


</body>
</html>