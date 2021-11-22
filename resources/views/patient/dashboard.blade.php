
@extends('patient.layouts.default')
@section('content')
<section class="content-wrapper"> 
@include('patient.partials.navbar')

  <div class="side-wrapper">
     <div class="overviewCard2">
      <!-- ///// overview first column area ///// -->
      <div class="paisatnt-wap">
      	<div class="row">
      		<div class="dami-content text-center">
      			<h1>Welcome back!</h1>
      			<!--<p>Wednesday, Jan 1, 2020</p>-->
      			<p>{{ \Carbon\Carbon::now()->format('l, F j, Y') }}</p>
      			<!--<button type="button" class="btn editbtn">Finish setting up account</button>-->
      		</div>
      	
      		
      	</div>
      	
      </div>


   
      <div class="overviewColumnarea">
                    <div class="row">
                        <div class="col-md-12">
                            <!--<div class="overview_consult_head">-->
                            <!--    <h5>My Appointments</h5>-->
                                <!--<a href="#"><span>See All</span></a>-->
                            <!--</div>-->

                            <div class="card text-center" style="background: #bfe34e;">
                              <a href="{{ url('patient/visitfor')}}">
                                  <h6>Are you looking for consultation ?  find care.</h6>
                             </a>
                            </div>

                        </div>


                    
                    </div>
                </div>
                
                
    
    
    
                <div class="overviewColumnarea">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview_consult_head">
                                <h5>My Appointments</h5>
                                <!--<a href="#"><span>See All</span></a>-->
                            </div>

                            <div class="card">
                                
                               
                               @if(isset($findcare) && count($findcare))
                               @foreach($findcare as $row)
                                <div class="overflex">
                                     @if(isset($row->doctor))
                                    <div class="icon">
                                        <img src="{{ url($row->doctor->image) }}" alt="">
                                       
                                    </div>
                                     @endif
                                    <div class="content">
                                        @if(isset($row->doctor))
                                        <!--<a href="{{ url('doctor/consult-patient/'.base64_encode($row->doctor->id)) }}">-->
                                            <h5>{{ $row->doctor->first_name}} {{ $row->doctor->last_name}} <i class="flaticon-video-camera"></i></h5>
                                            <!--</a>-->
                                        @endif
                                        <span>{{ $row->visit_reason->name }}</span>
                                    </div>
                                    <div class="sidecontent">
                                        <h6>at {{ $row->time }}&nbsp;&nbsp;&nbsp;{{ \Carbon\Carbon::parse($row->date)->format('m-d-Y') }}</h6>
                                        <!--<h6>at 2:30 pm</h6>-->
                                    </div>
                                </div>
                                
                                @endforeach
                                @else
                                <p class="text-center mt-3">You have not any appointment for today.</p>
                                @endif

                                

                            </div>

                        </div>


                    
                    </div>
                    
                    <div class="row" style="margin-top: 35px;">
                        <div class="col-md-6">
                            <div class="cols_inside">
                                <div class="overview_consult_head">
                                    <h5>Past Consults</h5>
                                    <a href="#"><span>See All</span></a>
                                </div>
    
                                <div class="card">
                                    <div class="overflex">
                                        <div class="icon">
                                            <img src="https://cloudwapp.in/SK/smartvisit/public/doctor/images/overview/profilefour.jpg" alt="">
                                          
                                        </div>
                                        <div class="content">
                                            <h5>Besis Alexander<i class="flaticon-phone"></i></h5>
                                            <span>Medical Check Up</span>
                                        </div>
                                        <div class="sidecontent">
                                            <h6>at 2:00 pm</h6>
                                        </div>
                                    </div>
    
    
    
                                    <div class="overflex">
                                        <div class="icon">
                                            <img src="https://cloudwapp.in/SK/smartvisit/public/doctor/images/overview/profilefour.jpg" alt="">
                                           
                                        </div>
                                        <div class="content">
                                            <h5>Devight Murphy <i class="flaticon-video-camera"></i></h5>
                                            <span>Medical Check Up</span>
                                        </div>
                                        <div class="sidecontent">
                                            <h6>at 2:30 pm</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cols_inside">
                                <div class="overview_consult_head">
                                    <h5>Recent Consults</h5>
                                    <a href="#"><span>See All</span></a>
                                </div>
    
                                <div class="card">
                                    <div class="overflex">
                                        <div class="icon">
                                            <img src="https://cloudwapp.in/SK/smartvisit/public/doctor/images/overview/profilefour.jpg" alt="">
                                          
                                        </div>
                                        <div class="content">
                                            <h5>Besis Alexander<i class="flaticon-phone"></i></h5>
                                            <span>Medical Check Up</span>
                                        </div>
                                        <div class="sidecontent">
                                            <h6>at 2:00 pm</h6>
                                        </div>
                                    </div>
    
    
    
                                    <div class="overflex">
                                        <div class="icon">
                                            <img src="https://cloudwapp.in/SK/smartvisit/public/doctor/images/overview/profilefour.jpg" alt="">
                                           
                                        </div>
                                        <div class="content">
                                            <h5>Devight Murphy <i class="flaticon-video-camera"></i></h5>
                                            <span>Medical Check Up</span>
                                        </div>
                                        <div class="sidecontent">
                                            <h6>at 2:30 pm</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end -->

      
     
  </div>

           
</section>

@endsection






