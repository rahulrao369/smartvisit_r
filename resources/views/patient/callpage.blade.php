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

.side-wrapper{
    margin-left:0;
}
.smallwindow{
    position: absolute;
    width: 250px;
    height: 250px;
    right: 22px !important;
    top: 5px !important;
    padding: 0;
    border: 2px solid #fff;
}
@media (max-width: 640px) {
  .player {
    width: 320px;
    height: 240px;
  }
}

.flipcamra {
    position: absolute;
    bottom: 5%;
    z-index: 999;
    left: -130px;
    border-radius: 50%;
    padding: 0;
    width: 44px;
    height: 42px;
    right: 0;
    display: block;
    margin: auto;
}

.flipcamratwo {
    position: absolute;
    bottom: 5%;
    z-index: 999;
    left: -252px;
    border-radius: 50%;
    padding: 0;
    width: 44px;
    height: 42px;
    right: 0;
    display: block;
    margin: auto;
}
.side-wrapper{padding: 0 !important;}
.callingwindow{margin: 0px !important;}
.player {
    width: 99%;
    height: calc(100vh - 0px)!important;
    margin: 0px!important;}
    .smallwindow #local-player {
    width: 100%;
    height: 100% !important;}
</style>

<section class="content-wrapper"> 
            


    <div class="side-wrapper">
        <div class="card wrapper-card callingwindow">
        
        
            <div class="col"  style="padding:0px">
                <div id="remote-playerlist">
                <!--<h5 class="text-center connecting">Connecting.............</h5>-->
                
                </div>
            </div>
            
            <div class="w-100"></div>
            
            <div class="col smallwindow">
                <!--<p id="local-player-name" class="player-name"></p>-->
                <div id="local-player" class="player"></div>
            </div>
            
            
            
         
      
          <button id="leave" type="button" class="btn btn-danger btn-sm" disabled><i class="flaticon-phone"></i></button>
          <!--<button type="button"  class="btn btn-danger btn-sm flipcamratwo"> <img style="width: 22px;" src="{{ url('public/switch-camera.png') }}"  id="mute-video"/> </button>-->
          <button type="button"  class="btn btn-danger btn-sm flipcamra"><img style="width: 22px;" src="{{ url('public/mic.png') }}"  id="mute-audio"/> </button>
      
        </div>
    
    </div>



   <!--<input id="numberbtn" type="hidden"></button-->
  
<input id="patient_id" type="hidden" value="">
<input id="appid" type="hidden" value="{{ env('AGORA_APP_ID') }}">
<input id="token" type="hidden"  value="{{ $call->temp_token}}">
<input id="channel" type="hidden" value="{{ $call->channel }}">
<input id="patient_name" type="hidden" value="">
<input id="call_id" type="hidden">


</section>




    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/AgoraRTC_N-4.5.0.js') }}"></script>

  <script>
    
      $(document).ready(function(){
              
            joincall();   
            //   $.ajaxSetup({
            //      headers: {
            //      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //      }
            //   })
                
          
            //      $.ajax({
            //      url:"{{ url('patient/accept-call')}}",
            //      method:"POST",
            //      data:{call_id:$('#call_id').val()},
            //      success:function(response){
            //         $('#callNotification').modal('hide');
            //         joincall();
            //         //  alert($('#leave').next('div').attr('id'));
            //       $('#makeCall').modal('show');
            //      }
            // })
              
              
     })
        
  </script>
   

    

@endsection