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

a {
    text-decoration: none !important;
      color: inherit;
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
            <div class=" wrapper-card">
             <iv class="overviewColumnarea">
                    <div class="row ml-3">
                        <div class="col-md-12">
                            <div class="overview_consult_head">
                                <h5 class="text-center">Inbox</h5>
                                <!--<span>See All</span>-->
                            </div>

                           @if(isset($inbox) && count($inbox) > 0 )
                            @foreach($inbox as $key => $row)
                            
                             <?php 
                             if(Auth::id() == $row->sender_id){
                                $uuid =  $row->receiver_id;
                             }else{
                                  $uuid =  $row->sender_id;
                             }
                             
                             
                             ?>
                            <a href="{{ url('doctor/chat/'.base64_encode($uuid))}}">
                                <div class="card bordered">
                                @if(Auth::id() != $row->sender_id )
                                <h6>{{ $row->sender->first_name}} {{ $row->sender->last_name }} </h6>
                                @else
                                  <h6>{{ $row->receiver->first_name}} {{ $row->receiver->last_name }} </h6>
                                @endif
                              
                                <span class="{{ (($row->receiver_id == Auth::id()) && $row->is_seen==0) ? 'font-weight-bold':'font-weight-normal' }}">{{ $row->message }}</span>
                                <span><small>{{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</small></span>
                                </div>
                            </a>
                            @endforeach
                            @else
                             <p class="text-center text-danger">Your inbox is empty.</p>
                            @endif

                        </div>



                    </div>
                </div>

            </div>


        </div>


    </section>




    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>

    

@endsection