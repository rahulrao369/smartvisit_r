<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>SmartVisit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('public/doctor/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/flaticon.css') }}">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ url('public/doctor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/custom.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/animate.min.css') }}"/>
    

</head>
<body>
    
    <header class="homeheader">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('public/doctor/images/greenlogo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                      
                       <li class="nav-item">
                        <a href="{{ url('login')}}" class="nav-link">
                                Login
                        </a>
                    </li>
                    
                    
                    <!-- <li class="nav-item">-->
                    <!--    <a href="{{ url('doctor/login')}}" class="nav-link">-->
                    <!--            Doctor-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                             About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                                Contact Us
                        </a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
        </div>
    </header>

    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                   <div class="homecontent">

                    <div class="comingsoon">
                        <h1 class="wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">Coming Soon</h1>
                        <p class="wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">We're currently working on creating something fantastic. We'll
                            be here soon, subscribe to be notified.</p>
                        <a href="{{ url('doctor/login')}}" class="wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">
                            <button type="button" class="editbtn">Notify Me</button>
                        </a>
                    </div>

                   </div>
                </div>
            </div>
        </div>
    </section>

    <section class="AboutSec">
       <div class="aboutprovider">
        <div class="container">

            <div class="centerbg">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-heading">
                            <h2>About Us</h2>
                        </div>
                        <div class="centerhead">
                            <div class="round_space">
                                <h5 class="wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">TO BECOME A PROVIDER</h5>
                                <p class="wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">Join the Team of networks of licensed professionals with same goal, improving lives of people
                                    anywhere and anytime.</p>
                            </div>
                            <div class="greenbgimg wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">
                                <img src="{{ url('public/doctor/images/landingimg.png') }}" alt="">
                            </div>

                           <div class="centerheadbottomcont wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">
                            <p>At Smart Visits, telemedicine isn’t just a virtual visit, it’s an experience worth exploring. Our
                                platform is user friendly and tailored to capturing most relevant information using artificial
                                intelligence.</p>

                            <p>We are at forefront of growth and welcome you to apply and join our exciting team!</p>
                           </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="Values">
                <div class="container">
                    <div class="valueheading">
                        <h5>Our Core Values</h5>
                    </div>
                    <div class="valueiconarea">
                        <div class="row">
                            <div class="col-md-3">
                               <div class="valuecol wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                <div class="valueicon">
                                    <img src="{{ url('public/doctor/images/icons/trust.png') }}" alt="">
                                </div>
                                <span>Trust</span>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="valuecol wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">
                                <div class="valueicon">
                                    <img src="{{ url('public/doctor/images/icons/integrity.png') }}" alt="">
                                </div>
                                <span>Integrity</span>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="valuecol wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">
                                <div class="valueicon">
                                    <img src="{{ url('public/doctor/images/icons/empathy.png') }}" alt="">
                                </div>
                                <span>Empathy</span>
                               </div>
                            </div>
                            <div class="col-md-3">
                               <div class="valuecol wow fadeIn" data-wow-duration="8s" data-wow-delay="0.2s">
                                <div class="valueicon">
                                    <img src="{{ url('public/doctor/images/icons/communication.png') }}" alt="">
                                </div>
                                <span>Communication</span>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>

        <!--<div class="aboutform">-->
        <!--    <div class="container">-->
        <!--        <h5>If you are interested to join, please fill in and submit the application below.</h5>-->
                
        <!--        <div class="formview wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">-->
        <!--            <div class="row">-->
        <!--                <div class="col-md-6 offset-md-3">-->
        <!--                <form id="doctor_register" enctype="multipart/form-data">-->
        <!--                        <div class="row">-->
        <!--                         <div class="form-group col-md-6">-->
        <!--                            <label for="">First Name</label>-->
        <!--                            <input type="text" class="form-control checkname" name="first_name" id="first_name">-->
        <!--                            <p class="text-danger efirst_name"></p>-->
        <!--                        </div> -->
        <!--                          <div class="form-group col-md-6">-->
        <!--                            <label for="">Last Name</label>-->
        <!--                            <input type="text" class="form-control checkname" name="last_name" id="last_name">-->
                                    
        <!--                             <p class="text-danger elast_name"></p>-->
        <!--                        </div>-->
                                    
        <!--                        </div>-->
                              
    
                                <!--<div class="form-group">-->
                                <!--    <h6>Address</h6>-->
                                    
                                <!--    <div class="row">-->
                                <!--        <div class="col-md-4">-->
                                <!--            <label for="">States</label>-->
                                <!--            <input type="text" class="form-control" name="state">-->
                                <!--        </div>-->
                                <!--        <div class="col-md-4">-->
                                <!--            <label for="">City</label>-->
                                <!--            <input type="text" class="form-control">-->
                                <!--        </div>-->
                                <!--        <div class="col-md-4">-->
                                <!--            <label for="">Zipcode</label>-->
                                <!--            <input type="text" class="form-control">-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
    
        <!--                        <div class="form-group">-->
        <!--                            <label for="">Street Address</label>-->
        <!--                            <input type="text" class="form-control checkaddress" name="address" id="autocomplete" autocomplete="off">-->
        <!--                            <input type="hidden" name="latitude" id="latitude" class="form-control">-->
        <!--                            <input type="hidden" name="longitude" id="longitude" class="form-control">-->
        <!--                            <input type="hidden" name="postal_code" id="postal_code" class="form-control" value="">-->
        <!--                            <input type="hidden" name="country_code" id="country_code" class="form-control">-->
                                    <!--<input type="text" name="city" id="city" class="form-control">-->
                                    <!--<input type="text" name="state" id="state" class="form-control">-->
                                    <!--<input type="text" name="country" id="country" class="form-control">-->
        <!--                              <p class="text-danger eaddress"></p>-->
                        
        <!--                        </div>-->
    
        <!--                        <div class="form-group">-->
        <!--                            <label for="">Email</label>-->
        <!--                            <input type="text" class="form-control checkemail" name="email" id="email">-->
        <!--                             <p class="text-danger eemail"></p>-->
        <!--                        </div>-->
    
        <!--                        <div class="form-group">-->
        <!--                            <label for="">Phone</label>-->
        <!--                            <input type="number" class="form-control" id="phone" name="phone">-->
        <!--                             <p class="text-danger ephone"></p>-->
        <!--                        </div>-->
                                
        <!--                        <div class="form-group">-->
        <!--                            <label for="">Password</label>-->
        <!--                            <input type="password" class="form-control" id="password" name="password">-->
        <!--                             <p class="text-danger epassword"></p>-->
        <!--                        </div>-->
    
                                <!--<div class="form-group">-->
                                <!--    <label for="">What Position Are You Applying For?</label>-->
                                <!--    <input type="text" class="form-control" id="applyfor">-->
                                <!--</div>-->

        <!--                        <div class="form-group aboutbtn-group">-->
        <!--                            <div class="uploadbtn">-->
        <!--                                <input type="file" id="file" name="doc"/>-->
        <!--                                <label for="file">cv file upload <img src="{{ url('public/doctor/images/icons/upload.png') }}" alt=""> </label>-->
        <!--                                <p class="text-danger efile"></p>-->
        <!--                            </div>-->

        <!--                            <button type="button" class="editbtn" id="editbtn">Submit</button>-->
        <!--                        </div>-->
    
        <!--                    </form>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

        <!--    </div>-->
        <!--</div>-->

    </section>  

    <section class="Contactsec">
        <div class="container">
            <div class="contacthead">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Contact Us</h2>
                    </div>

                    <div class="col-lg-6">
                        <div class="contactsocial">
                            <ul>
                                <li class="wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li class="wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="contactline">
                    <div class="contactcontent">
                        <h5 class="wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">TO BECOME A PROVIDER</h5>
                        <p class="wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">We are at forefront of growth and welcome you to apply <br>
                            and join our exciting team!</p>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="contacticonset wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <div class="icon">
                                        <img src="{{url('public/doctor/images/icons/callwifi.png')}}" alt="">
                                    </div>
                                    <span>+123456789</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="contacticonset wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">
                                    <div class="icon">
                                        <img src="{{url('public/doctor/images/icons/envelop.png') }}" alt="">
                                    </div>
                                    <span>Admin@Smarvisits.Health</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="contactform">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="contactformtitle wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                <h3>Send a message</h3>
                            </div>
                        </div>

                        <div class="col-md-9 wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea name="" id=""  rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group contactgroup">
                                <button type="button" class="editbtn">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <footer class="footersec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="footerlogo wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        <img src="images/greenlogo.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footerlink wow fadeIn" data-wow-duration="4s" data-wow-delay="0.2s">
                       <ul>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Contact Us</a></li>
                       </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="copyright wow fadeIn" data-wow-duration="6s" data-wow-delay="0.2s">
                        <p>Copyrght Smartvisits 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<input type="hidden" id="count_first_name" value="0"/>
<input type="hidden" id="count_last_name" value="0"/>
<input type="hidden" id="count_email" value="0"/>
<input type="hidden" id="count_phone" value="0"/>
<input type="hidden" id="count_exist_email" value="0"/>
<input type="hidden" id="eaddress_count" value="0"/>

<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
<script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/doctor/js/wow.min.js') }}"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyD5brs3O-LBuM4Jna3TP3e2Gi8VyE0FEuc&libraries=places&callback=initAutocomplete" type="text/javascript"></script>


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
                      document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
            
                    }
                    
                    
                    if (place.address_components[i].types[j] == "country") {
                      document.getElementById("country_code").value = place.address_components[i].short_name;
                    } 

                  }
                }
                
           });
       }
</script>
    
    
    
<script>
    new WOW().init();
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
          
          if($('#file').val()==""){
               $('.efile').text("*Please upload your document.");
               error++;
          }else{
            $('.efile').text("");
          }
          
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



</body>
</html>