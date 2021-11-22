
<input class="baseurl" type="hidden" value="{{ url('public')}}">


<div class="modal fade bd-example-modal-lg mymodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="makeCall" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="callee_name"></h5>
        <button type="button" class="close modalMinimize"> <i class='fa fa-minus'></i> </button>
      </div>
      
      <div class="main_body">
          <div class="container-fluid banner">
        <!--<p class="banner-text">Basic Video Call</p>-->
        <!--<a style="color: rgb(255, 255, 255);fill: rgb(255, 255, 255);fill-rule: evenodd; position: absolute; right: 10px; top: 4px;"-->
        <!--  class="Header-link " href="https://github.com/AgoraIO-Community/AgoraWebSDK-NG/tree/master/Demo">-->
        <!--  <svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>-->
        <!--</a>-->
      </div>
          <!---->
          <div class="row video-group">
              <div class="col">
            <div id="remote-playerlist">
                <!--<h5 class="text-center connecting">Connecting.............</h5>-->
                
            </div>
          </div>
          
          <div class="w-100"></div>
          
          <div class="col smallwindow">
            <!--<p id="local-player-name" class="player-name"></p>-->
            <div id="local-player" class="player"> 
            </div>
          </div>
          </div>
            <!--<button  type="button" id="flipcamra" class="btn btn-danger btn-sm" disabled><img style="width: 22px;" src="{{ url('public/mic.png') }}" id="mute-audio"/></button>-->
            <button id="leave" type="button" class="btn btn-danger btn-sm" disabled><i class="flaticon-phone"></i></button>
            <!--<button type="button" id="flipcamra" class="btn btn-danger btn-sm" disabled> <img style="width: 22px;" src="{{ url('public/switch-camera.png') }}" /> </button>-->
             <button type="button" id="flipcamra" class="btn btn-danger btn-sm"><img style="width: 22px;" src="{{ url('public/mic.png') }}" id="mute-audio" /> </button>
        
          <h5 class="text-center connecting">Connecting.............</h5>
      </div>
      <!---->
    </div>
  </div>
</div>

<div class="minmaxCon"></div>

<style>
.modal-lg, .modal-xl {
    max-width: 77%;
    margin-top: 74px;
    margin-left: auto;
    margin-right: 0;
}
.smallwindow{
    position: absolute;
    width: 250px;
    height: 250px;
    right: 5px;
    top: 69px;
    padding: 0;
    border: 2px solid #fff;
}
.smallwindow #local-player{
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
}
#leave {
    position: absolute;
    bottom: 5%;
    z-index: 999;
    left: 0;
    border-radius: 50%;
    padding: 0;
    width: 44px;
    height: 42px;
    right: 0;
    display: block;
    margin: auto;
}
#leave i{
position: relative;
top: 2px;
}

#flipcamra {
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
#flipcamra i{
position: relative;
top: 2px;
}

.player {
    width: 99%;
    height: 444px;
    margin: 6px;
}
</style>
<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
<script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/AgoraRTC_N-4.5.0.js') }}"></script>
<script src="{{ url('public/indeex.js') }}"></script>

<script src="{{ url('public/events.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script>
    $(document).ready(function(){
        
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });


        // $('#numberbtn').click(function(){
            
        //       $('#callee_name').text($('#patient_name').val());
        //       $('.video-group').css('display','none');
        //       $('#makeCall').modal('show');
        //       $('#makeCall').draggable({
        //         handle: ".modal-header"
        //       });
              
        //       $.ajax({
        //           url:"{{ url('doctor/get-token')}}",
        //           method:'POST',
        //           data:{patient_id:$('#patient_id').val()},
        //           success:function(response){
        //               console.log(response)
        //               $('#appid').val(response.appid);
        //               $('#token').val(response.token);
        //               $('#channel').val(response.channel);
        //               $('.connecting').css('display','none');
        //               $('.video-group').css('display','block');
        //               joincall();
        //           }
        //       })
        // })
        
        
        
        
     
        
        
        
    })
</script>

</body>
</html>
