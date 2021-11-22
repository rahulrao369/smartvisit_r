@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

<style>
    
    .avatar-profile-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
  margin-top: 0px;
}
.avatar-profile-upload .avatar-profile-edit {
  position: absolute;
  right: 45px;
  z-index: 1;
  top: 10px;
}
.avatar-profile-upload .avatar-profile-edit input {
  display: none;
}
.avatar-profile-upload .avatar-profile-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-profile-upload .avatar-profile-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-profile-upload .avatar-profile-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 5px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-profile-upload .avatar-profile-preview {
  width: 160px;
  height: 160px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-profile-upload .avatar-profile-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>



  <div class="side-wrapper">
     <div class="overviewCard2">
      <!-- ///// overview first column area ///// -->
      <div class="paisatnt-wap">
      	<div class="row">
      	      @if(session()->has('success'))
                <div class="col-sm-6 alert alert-success">
                    <p class="text-center">{{session()->get('success')}}</p>
                </div>
                @endif
                
      		<div class="dami-content2 text-center">
      		    <p class="text-success message-success"></p>
      		     <p class="text-danger message-failed"></p>
            <ul>
              <li><img src="{{ url('public/patient/images/question.jpeg') }}"></li>
              <li>Edit Profile</li>
              <!--<li><button class="btn btn-default submit_profile">Save</button></li>-->
            </ul>
      		</div>
          <div class="col-md-8">
          
            
            <form id="profileForm"  enctype="multipart/form-data" action="{{ url('patient/profile')}}" method="POST">
                
               
                
                @csrf
                
                
        <div class="profilecardcontent3">
              <div class="profile-wap text-center">
                <!--<img src="{{ url(Auth::user()->image) }}" height="150px" width="150px">-->
                <div class="avatar-profile-upload">
                    <div class="avatar-profile-edit">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image"/>
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-profile-preview">
                        <div id="imagePreview" style="background-image: url({{ url(Auth::user()->image) }});">
                        </div>
                    </div>
                </div>
              </div>
            </div>
            
            
            <div class="user-from">
              <div class="row">
                  
                  <div class="col-md-6">
                       <div class="form-group">
                           <label for="">FIRST NAME</label>
                           <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->first_name }}" name="first_name">
                           <p class="text-danger efirst_name">{{ $errors->first('first_name')}}</p>
                       </div>
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                           <label for="">LAST NAME</label>
                           <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->last_name }}" name="last_name">
                           <p class="text-danger elast_name">{{ $errors->first('last_name')}}</p>
                       </div>
                  </div>
                  <div class="col-md-12">
                       <div class="form-group">
                           <label for="">EMAIL</label>
                           <input type="email" class="form-control" placeholder="" value="{{ Auth::user()->email }}" readonly>

                       </div>
                  </div>
                  <div class="col-md-12">
                       <div class="form-group">
                           <label for="">PHONE</label>
                           <input type="number" class="form-control" placeholder="" value="{{ Auth::user()->phone }}" readonly>
                          
                       </div>
                  </div>
                    <div class="col-md-12">
                       <div class="form-group">
                           <label for="">STREET AND NUMBER</label>
                           <input type="STREET" class="form-control checkaddress" placeholder="" value="{{ Auth::user()->address }}" id="autocomplete" name="address">
                           <input type="hidden" name="lat" id="latitude" class="form-control" value="{{ Auth::user()->lat }}">
                           <input type="hidden" name="lng" id="longitude" class="form-control" value="{{ Auth::user()->lng }}">
                           <input type="hidden" name="postal_code" id="postal_code" class="form-control" value="">
                           <input type="hidden" name="country_code" id="country_code" class="form-control">
                            <p class="text-danger eaddress">{{ $errors->first('address')}}</p>
                       </div>
                   </div>
                   
                   
                   <!--<div class="col-md-12">-->
                   <!--    <div class="form-group">-->
                   <!--        <label for="">CITY</label>-->
                   <!--       <select name="" id="" class="form-control">-->
                   <!--          <option value="" selected="">CA</option>-->
                   <!--      </select>-->
                   <!--    </div>-->
                   <!--</div>-->
                   <!-- <div class="col-md-12">-->
                   <!--    <div class="form-group">-->
                   <!--        <label for="">STATE</label>-->
                   <!--        <input type="CITY" class="form-control" placeholder="">-->
                   <!--    </div>-->
                   <!--</div>-->
                   <!--<div class="col-md-12">-->
                   <!--    <div class="form-group">-->
                   <!--        <label for="">ZIP CODE</label>-->
                   <!--        <input type="ZIP" class="form-control" placeholder="">-->
                   <!--    </div>-->
                   <!--</div>-->
                   <!--<div class="col-md-12">-->
                   <!--    <div class="form-group">-->
                   <!--        <label for="">INSURANCE PROVIDER</label>-->
                   <!--         <input type="text" class="form-control" placeholder="" name="insurance_provider" value="{{ Auth::user()->insurance_provider }}">-->
                         <!-- <select name="insurance_provider" id="" class="form-control">-->
                         <!--    <option value="" selected="">ANTHEM, BL…</option>-->
                         <!--</select>-->
                   <!--    </div>-->
                   <!--     <p class="text-danger einsurance_provider">{{ $errors->first('insurance_provider')}}</p>-->
                   <!--</div>-->
                   <!--<div class="col-md-12">-->
                   <!--    <div class="form-group">-->
                   <!--        <label for="">MEMBER ID</label>-->
                   <!--        <input type="text" class="form-control member" placeholder="" name="member" id="member" value="{{ Auth::user()->member_id }}">-->
                   <!--    </div>-->
                   <!--    <p class="text-danger emember">{{ $errors->first('member')}}</p>-->
                   <!--</div>-->
                   <!--<div class="col-md-12">-->
                   <!--    <div class="form-group">-->
                   <!--        <label for="">RxBIN #</label>-->
                   <!--        <input type="text" class="form-control rxbin" placeholder=""  id="rxbin" name="rxbin" {{ Auth::user()->rxbin }}>-->
                   <!--    </div>-->
                   <!--     <p class="text-danger erxbin">{{ $errors->first('rxbin')}}</p>-->
                   <!--</div>-->
                    <div><button type="submit" class="btn btn-primary submit_profile">Save</button></div>
              </div>
            </div>
            </form>
              
              </div>
            </div>
          </div>
      	</div>
      </div>
     
  </div>
</section>


<input type="hidden" value="0" id="eaddress_count" />

<script src="{{ url('public/patient/js/jquery.min.js') }}"></script>
<!--<script src="{{ url('public/patient/js/bootstrap.min.js') }}"></script>-->

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBMGJ_qzoxakfd3cymFgEAUcQfMA-k1a5k&libraries=places&callback=initAutocomplete" type="text/javascript"></script>


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

<script>
//     $(document).ready(function(){
        
//       $(".checkaddress").on("blur", function () {
//         //   alert($(this).val())
//          var address =$(this).val();
//         //  alert(address)
//           if(address){
//              $.ajax({
//                   url:"{{ url('validate-address')}}",
//                   method:"POST",
//                   data:{address:address},
//                   success:function(response){
//                       console.log(response)
//                       var obj = JSON.parse(response);
//                       if(obj.IsCASS==true){
                          
//                           $('.eaddress').text("");
//                           $('#eaddress_count').val(0);
                          
//                       }else{
                         
//                           $('.eaddress').text("*Invalid address .");
//                           $('#eaddress_count').val(1);
//                       }
                     
                          
                      
//                   }
//              })
//           }
//          });
         
         
         
//     });
 </script>

<!--submit form-->
<!--<script>-->
<!--    $(document).ready(function(){-->
        
<!--        $.ajaxSetup({-->
<!--        headers: {-->
<!--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')-->
<!--        }-->
<!--        });-->


        
<!--       $(".submit_profile").on("click", function () {-->
       
<!--         var error = 0;-->
         
<!--         if($('#first_name').val()==''){-->
<!--             $('.efirst_name').text('first name is required.');-->
<!--             error++;-->
<!--         }else{-->
<!--             $('.efirst_name').text('');-->
<!--         }-->
         
         
<!--          if($('#last_name').val()==''){-->
<!--             $('.elast_name').text('last name is required.');-->
<!--             error++;-->
<!--         }else{-->
<!--             $('.efirst_name').text('');-->
<!--         }-->
         
         
<!--          if($('#autocomplete').val()==''){-->
<!--             $('.eaddress').text('address is required.');-->
<!--             error++;-->
<!--         }else{-->
<!--             $('.eaddress').text('');-->
<!--         }-->
         
         
         
<!--        //   if($('#insurance_provider').val()==''){-->
<!--        //      $('.einsurance_provider').text('insurance provider is required.');-->
<!--        //      error++;-->
<!--        //  }else{-->
<!--        //      $('.einsurance_provider').text('');-->
<!--        //  }-->
         
         
         
<!--        //   if($('#member').val()==''){-->
<!--        //      $('.emember').text('member is required.');-->
<!--        //      error++;-->
<!--        //  }else{-->
<!--        //      $('.emember').text('');-->
<!--        //  }-->
         
         
         
<!--        //   if($('#rxbin').val()==''){-->
<!--        //      $('.erxbin').text('rxbin is required.');-->
<!--        //      error++;-->
<!--        //  }else{-->
<!--        //      $('.erxbin').text('');-->
<!--        //  }-->
         
<!--          console.log(error)-->
<!--          if(error==0){-->
             
<!--            //  var form = $('#profileForm')[0];-->
<!--            //  var formData = new FormData(form);-->
              
<!--             $.ajax({-->
<!--                  url:"{{ url('patient/profile')}}",-->
<!--                  method:"POST",-->
<!--                  data: $('#profileForm').serialize(),-->
<!--                  success:function(response){-->
<!--                    if(response.status==true){-->
<!--                     $('.message-success').text('Profile updated successfully');   -->
<!--                    }else{-->
<!--                        $('.message-failed').text('Profile cannot update this time.');  -->
<!--                    }-->
                   
                  
                     
                          
                      
<!--                  }-->
<!--             })-->
<!--          }-->
<!--         });-->
         
         
         
<!--    });-->
<!--</script>-->

<script>
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>

@endsection
