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
             <iv class="overviewColumnarea">
                    <div class="row ml-3">
                        <div class="col-md-12">
                            <div class="overview_consult_head">
                                <h5>Today Consult</h5>
                                <!--<span>See All</span>-->
                            </div>

                            <div class="card">
                                
                               
                               @if(isset($today_consult) && count($today_consult))
                               @foreach($today_consult as $row)
                                <div class="overflex">
                                    <div class="icon">
                                        <img src="{{ url($row->patient->image) }}" alt="">
                                       
                                    </div>
                                    <div class="content">
                                    <input id="patient_id" type="hidden" value="{{ $row->patient->id }}">
                                    <input id="appid" type="hidden">
                                    <input id="token" type="hidden" >
                                    <input id="channel" type="hidden">
                                    <input id="patient_name" type="hidden" value="{{ $row->patient->first_name.' '.$row->patient->last_name}}">
                                       @if($row->type=='Self')
                                        <h5><a href="{{ url('doctor/consult-patient/'.base64_encode($row->patient->id).'/'.base64_encode($row->id)) }}">{{ $row->patient->first_name}} {{ $row->patient->last_name}} </a><i class="flaticon-video-camera numberbtn"></i></h5>
                                       @else
                                         <h5><a href="{{ url('doctor/consult-patient/'.base64_encode($row->getchild->id).'/'.base64_encode($row->id)) }}">{{ $row->getchild->first_name}} {{ $row->getchild->last_name}} </a><i class="flaticon-video-camera numberbtn"></i></h5>
                                       @endif
                                        <span>{{ $row->visit_reason->name }}</span>
                                    </div>
                                    <div class="sidecontent">
                                        <h6>{{ $row->time }}</h6>
                                        <!--<h6>at 2:30 pm</h6>-->
                                    </div>
                                </div>
                                
                                @endforeach
                                @else
                                <p class="text-center text-danger">You have not any appointment.</p>
                                @endif

                             

                            </div>

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