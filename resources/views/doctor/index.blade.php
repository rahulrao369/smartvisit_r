@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
 @include('doctor.partials.sidebar')

            <div class="side-wrapper">
                <div class="overviewCard">
            
                   <!-- ///// overview first column area ///// -->

                <div class="overviewColumnarea">
                    
                    <div class="dashboard_cards">
                        <ul>
                            <li>
                                <div class="list_card">
                                    <div class="pics_outer">
                                        <img style="max-width: 100%;" src="{{ url('public/doctor/img/ico1.svg') }}" />
                                    </div>
                                    <h3> {{ isset($get_patients) ? $get_patients:0}} </h3>
                                    <p> Patients </p>
                                </div>
                            </li>
                            <li>
                                <div class="list_card">
                                    <div class="pics_outer">
                                        <img src="{{ url('public/doctor/img/ico2.svg') }}" />
                                    </div>
                                    <h3> {{ $doctorHours }} h/w </h3>
                                    <p> Availability </p>
                                </div>
                            </li>
                            <li>
                                <div class="list_card">
                                    <div class="pics_outer">
                                        <img src="{{ url('public/doctor/img/49.svg') }}" />
                                    </div>
                                    <h3> G.P. </h3>
                                    <p> Specialization </p>
                                </div>
                            </li>
                            <li>
                                <div class="list_card">
                                    <div class="pics_outer">
                                        <img src="{{ url('public/doctor/img/50.svg') }}" />
                                    </div>
                                    <?php
                                    $getAddress= explode(",",Auth::user()->address);
                                    // print_r($getAddress);
                                    ?>
                                    <h3>{{ isset($getAddress[1]) ? $getAddress[1]:''}}</h3>
                                    <p> Location </p>
                                </div>
                            </li>
                            <li>
                                <div class="list_card">
                                    <div class="pics_outer">
                                        <img src="{{ url('public/doctor/img/48.svg') }}" />
                                    </div>
                                    <h3> $ 15,000 </h3>
                                    <p> Paid </p>
                                </div>
                            </li>
                            <li>
                                <div class="list_card">
                                    <div class="pics_outer">
                                        <img src="{{ url('public/doctor/img/51.svg') }}" />
                                    </div>
                                    <h3> $ 2,320 </h3>
                                    <p> Outstanding </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="all_listcard">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cols_inside">
                                    <div class="overview_consult_head">
                                        <h5>Today Consult</h5>
                                        <a href="#"><span>See All</span></a>
                                    </div>
        
                                    <div class="card">
                                        
                                       
                                       @if(isset($today_consult) && count($today_consult))
                                       @foreach($today_consult as $row)
                                        <div class="overflex">
                                            <div class="icon">
                                                <img src="{{ url($row->patient->image) }}" alt="">
                                            </div>
                                            <div class="content">
                                                @if($row->type=='Self')
                                                <a target="_blank" href="{{ url('doctor/consult-patient/'.base64_encode($row->patient->id).'/'.base64_encode($row->id)) }}"><h5>{{ $row->patient->first_name}} {{ $row->patient->last_name}} <i class="flaticon-video-camera"></i></h5></a>
                                                @else
                                                 <a target="_blank" href="{{ url('doctor/consult-patient/'.base64_encode($row->getchild->id).'/'.base64_encode($row->id)) }}"><h5>{{ $row->getchild->first_name}} {{ $row->getchild->middle_name}} {{ $row->getchild->last_name}} <i class="flaticon-video-camera"></i></h5></a>
                                                @endif
                                                <span>{{ $row->visit_reason->name }}</span>
                                            </div>
                                            <div class="sidecontent">
                                                <h6>at {{ $row->time }}</h6>
                                                <!--<h6>at 2:30 pm</h6>-->
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                        @else
                                        <p class="text-center mt-3 nodata">You have not any appointment for today.</p>
                                        @endif
        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg') }}" alt="">-->
                                              
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Besis Alexander<i class="flaticon-phone"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6>at 2:00 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
        
        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg')}}" alt="">-->
                                               
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Devight Murphy <i class="flaticon-video-camera"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6>at 2:30 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg')}}" alt="">-->
                                              
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Evan Hanry <i class="flaticon-phone"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6>at 2:30 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="cols_inside">
                                    <div class="overview_consult_head">
                                        <h5>Today Available Urgent Consults</h5>
                                        <a href="#"><span>See All</span></a>
                                    </div>
        
                                    <div class="card">
                                        
                                        
                                        
                                       @if(isset($today_consult_urgent) && count($today_consult_urgent))
                                       @foreach($today_consult_urgent as $row)
                                        <div class="overflex">
                                            <div class="icon requesticon">
                                                <img src="{{ url($row->patient->image) }}" alt="">
                                               
                                            </div>
                                            <div class="content Requestscontent">
                                                @if($row->type=="Self")
                                                <h5>{{ $row->patient->first_name}} {{ $row->patient->last_name}}  </h5>
                                                <span>{{ $row->visit_reason->name }}</span>
                                                @else
                                                 <h5>{{ $row->getchild->first_name}} {{ $row->getchild->middle_name}}  {{ $row->getchild->last_name}} </h5>
                                                 <span>{{ $row->visit_reason->name }}</span>
                                                @endif
                                                 <!--<span>Today, 10:00 Am</span>-->
                                                <!--<h6>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</h6>-->
                                               
                                                    @if($row->date == \Carbon\Carbon::now()->format('Y-m-d'))
                                                      <h6>Today {{ $row->time }}</h6>
                                                    @else
                                                    <h6>{{  \Carbon\Carbon::parse($row->date)->format('d M Y')}} </h6>
                                                    @endif
                                                    
                                            </div>
                                            
                                            <div class="sidecontent iconflex">
                                                <a href="{{ url('doctor/accept-patient/'.base64_encode($row->id).'/1')}}"><span style="background: #f2f9dc; color: #bfe34e;"><i class="flaticon-check"></i></span></a>
                                                <a href="{{ url('doctor/accept-patient/'.base64_encode($row->id).'/0')}}"><span style="background: #f7ced1; color: #d8081a;"><i class="flaticon-close"></i></span></a>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                        @else
                                        <p class="text-center mt-3 nodata">You have not any urgent consult for today.</p>
                                        @endif
                                        
                                        
                                        
                                        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg') }}" alt="">-->
                                              
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Besis Alexander<i class="flaticon-phone"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6>at 2:00 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
        
        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg')}}" alt="">-->
                                               
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Devight Murphy <i class="flaticon-video-camera"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6>at 2:30 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        
                                    </div>
                                </div>
                            </div>
    
    
                            <div class="col-md-6">
                                <div class="cols_inside">
                                    <div class="overview_consult_head">
                                        <!--<h5>Today Available Urgent Consults</h5>-->
                                        <!--<span>See All</span>-->
                                        
                                         <h5>Consult Requests</h5>
                                        <span>See All</span>
                                    </div>
        
                                    <div class="card">
                                          
                                          
                                     @if(isset($patient_request) && count($patient_request))
                                       @foreach($patient_request as $row)
                                        <div class="overflex">
                                            <div class="icon requesticon">
                                                <img src="{{ url($row->patient->image) }}" alt="">
                                               
                                            </div>
                                            <div class="content Requestscontent">
                                                @if($row->type=="Self")
                                                <h5>{{ $row->patient->first_name}} {{ $row->patient->last_name}} <i class="flaticon-video-camera"></i> </h5>
                                                <span>{{ $row->visit_reason->name }}</span>
                                                @else
                                                 <h5>{{ $row->getchild->first_name}} {{ $row->getchild->middle_name}}  {{ $row->getchild->last_name}} <i class="flaticon-video-camera"></i></h5>
                                                 <span>{{ $row->visit_reason->name }}</span>
                                                @endif
                                                 <!--<span>Today, 10:00 Am</span>-->
                                                <!--<h6>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</h6>-->
                                               
                                                    @if($row->date == \Carbon\Carbon::now()->format('Y-m-d'))
                                                      <h6>Today {{ $row->time }}</h6>
                                                    @else
                                                    <h6>{{  \Carbon\Carbon::parse($row->date)->format('d M Y')}} </h6>
                                                    @endif
                                                    
                                            </div>
                                            
                                            <div class="sidecontent iconflex">
                                                <a href="{{ url('doctor/accept-patient/'.base64_encode($row->id).'/1')}}"><span style="background: #f2f9dc; color: #bfe34e;"><i class="flaticon-check"></i></span></a>
                                                <a href="{{ url('doctor/accept-patient/'.base64_encode($row->id).'/0')}}"><span style="background: #f7ced1; color: #d8081a;"><i class="flaticon-close"></i></span></a>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                       <p class="text-center mt-3 nodata">You have not any request.</p>
                                        @endif
                                        
                                        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg')  }}" alt="">-->
                                              
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Beth Mccoy <i class="flaticon-video-camera"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6 style="font-weight: 600;">at 2:30 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                                
                                        <!--        <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">-->
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Besis Alexander<i class="flaticon-phone"></i></h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--    <div class="sidecontent">-->
                                        <!--        <h6 style="font-weight: 600;">at 2:00 pm</h6>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="cols_inside">
                                    <div class="overview_consult_head">
                                        <h5>Recent Consults</h5>
                                    </div>
        
                                    <div class="card">
                                        
                                        
                                    @if(isset($recent_consult) && count($recent_consult))
                                       @foreach($recent_consult as $row)
                                        <div class="overflex">
                                            <div class="icon">
                                                <img src="{{ url($row->patient->image) }}" alt="">
                                            </div>
                                            <div class="content">
                                                @if($row->type=='Self')
                                                <a target="_blank" href="{{ url('doctor/consult-patient/'.base64_encode($row->patient->id).'/'.base64_encode($row->id)) }}"><h5>{{ $row->patient->first_name}} {{ $row->patient->last_name}} </h5></a>
                                                @else
                                                 <a target="_blank" href="{{ url('doctor/consult-patient/'.base64_encode($row->getchild->id).'/'.base64_encode($row->id)) }}"><h5>{{ $row->getchild->first_name}} {{ $row->getchild->middle_name}} {{ $row->getchild->last_name}} </h5></a>
                                                @endif
                                                <span>{{ $row->visit_reason->name }}</span>
                                            </div>
                                            <div class="sidecontent">
                                                <h6>at {{ $row->time }}</h6>
                                                <!--<h6>at 2:30 pm</h6>-->
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                        @else
                                        <p class="text-center mt-3 nodata">You have not any appointment for today.</p>
                                        @endif
                                        
                                        
                                        
                                        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg') }}" alt="">-->
                                              
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Besis Alexander</h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--</div>-->
        
        
        
                                        <!--<div class="overflex">-->
                                        <!--    <div class="icon">-->
                                        <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg')}}" alt="">-->
                                               
                                        <!--    </div>-->
                                        <!--    <div class="content">-->
                                        <!--        <h5>Devight Murphy</h5>-->
                                        <!--        <span>Medical Check Up</span>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>

                <!-- end -->


                <!-- 2nd column area -->

                <!--<div class="overviewColumnarea">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="overview_consult_head">-->
                <!--                <h5>Consult Requests</h5>-->
                <!--                <span>See All</span>-->
                <!--            </div>-->

                <!--            <div class="card requestscroll">-->
                               
                               
                <!--               @if(isset($patient_request) && count($patient_request))-->
                <!--               @foreach($patient_request as $row)-->
                <!--                <div class="overflex">-->
                <!--                    <div class="icon requesticon">-->
                <!--                        <img src="{{ url($row->patient->image) }}" alt="">-->
                                       
                <!--                    </div>-->
                <!--                    <div class="content Requestscontent">-->
                <!--                        <h5>{{ $row->patient->first_name}} {{ $row->patient->last_name}} <i class="flaticon-video-camera"></i></h5>-->
                <!--                        <h6>{{ $row->visit_reason->name }}</h6>-->
                                         <!--<span>Today, 10:00 Am</span>-->
                <!--                        <span>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</span>-->
                <!--                    </div>-->
                                    
                <!--                    <div class="sidecontent iconflex">-->
                <!--                        <a href="{{ url('doctor/accept-patient/'.base64_encode($row->id))}}"><span style="background: #f2f9dc; color: #bfe34e;"><i class="flaticon-check"></i></span></a>-->
                                        <!--<a href="javascript:void(0)"><span style="background: #f7ced1; color: #d8081a;"><i class="flaticon-close"></i></span></a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                @endforeach-->
                <!--                @endif-->

                                <!--<div class="overflex">-->
                                <!--    <div class="icon requesticon">-->
                                <!--        <img src="{{ url('public/doctor/images/overview/profilefour.jpg') }}" alt="">-->
                                <!--    </div>-->
                                <!--    <div class="content Requestscontent">-->
                                <!--        <h5>Devon Cooper <i class="flaticon-video-camera"></i> <span>(Emergency)</span> </h5>-->
                                <!--        <h6>Medical Check Up</h6>-->
                                <!--        <span>Today, 12:00 Am</span>-->
                                <!--    </div>-->
                                <!--    <div class="sidecontent iconflex">-->
                                <!--        <h6 style="background: #f2f9dc; color: #bfe34e;">Accepted</h6>-->
                                <!--    </div>-->
                                <!--</div>-->


                                <!--<div class="overflex">-->
                                <!--    <div class="icon requesticon">-->
                                <!--        <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">-->
                                <!--    </div>-->
                                <!--    <div class="content Requestscontent">-->
                                <!--        <h5>Ana Lopez<i class="flaticon-video-camera"></i><span>(Emergency)</span></h5>-->
                                <!--        <h6>Medical Check Up</h6>-->
                                <!--        <span>Today, 14:00 Pm</span>-->
                                <!--    </div>-->
                                <!--    <div class="sidecontent iconflex">-->
                                <!--        <h6 style="background: #f2f9dc; color: #bfe34e;">Accepted</h6>-->
                                <!--    </div>-->
                                <!--</div>-->


                                <!--<div class="overflex">-->
                                <!--    <div class="icon requesticon">-->
                                <!--        <img src="{{ url('public/doctor/images/overview/profilefive.jpg') }}" alt="">-->
                                <!--    </div>-->
                                <!--    <div class="content Requestscontent">-->
                                <!--        <h5>Edden Azzard<i class="flaticon-video-camera"></i></h5>-->
                                <!--        <h6>Scaling</h6>-->
                                <!--        <span>25 May, 16:00 Pm</span>-->
                                <!--    </div>-->
                                <!--    <div class="sidecontent iconflex">-->
                                <!--        <span style="background: #f2f9dc; color: #bfe34e;"><i class="flaticon-check"></i></span>-->
                                <!--        <span style="background: #f7ced1; color: #d8081a;"><i class="flaticon-close"></i></span>-->
                                <!--    </div>-->
                                <!--</div>-->


                                <!--<div class="overflex">-->
                                <!--    <div class="icon requesticon">-->
                                <!--        <img src="{{ url('public/doctor/images/overview/profilethree.jpg') }}" alt="">-->
                                <!--    </div>-->
                                <!--    <div class="content Requestscontent">-->
                                <!--        <h5>Ricardo Russels <i class="flaticon-video-camera"></i></h5>-->
                                <!--        <h6>Scaling</h6>-->
                                <!--        <span>Today, 10:00 Am</span>-->
                                <!--    </div>-->
                                <!--    <div class="sidecontent iconflex">-->
                                <!--        <span style="background: #f2f9dc; color: #bfe34e;"><i class="flaticon-check"></i></span>-->
                                <!--        <span style="background: #f7ced1; color: #d8081a;"><i class="flaticon-close"></i></span>-->
                                <!--    </div>-->
                                <!--</div>-->


                        <!--    </div>-->

                        <!--</div>-->


                        <!--<div class="col-md-6">-->
                        <!--    <div class="overview_consult_head">-->
                        <!--        <h5>Recent Consults</h5>-->
                        <!--        <span>See All</span>-->
                        <!--    </div>-->

                        <!--    <div class="card">-->

                        <!--        <div class="overflex">-->
                        <!--            <div class="icon">-->
                        <!--                <img src="{{ url('public/doctor/images/overview/profileone.jpeg') }}" alt="">-->
                        <!--            </div>-->
                        <!--            <div class="content">-->
                        <!--                <h5>Olive Mark</h5>-->
                        <!--                <span>Medical Check Up</span>-->
                        <!--            </div>-->
                        <!--        </div>-->

                        <!--        <div class="overflex">-->
                        <!--            <div class="icon">-->
                        <!--                <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">-->
                        <!--            </div>-->
                        <!--            <div class="content">-->
                        <!--                <h5>Rochel Reigns</h5>-->
                        <!--                <span>Medical Check Up</span>-->
                        <!--            </div>-->
                        <!--        </div>-->

                        <!--        <div class="overflex">-->
                        <!--            <div class="icon">-->
                        <!--                <img src="{{ url('public/doctor/images/overview/profilethree.jpg') }}" alt="">-->
                        <!--            </div>-->
                        <!--            <div class="content">-->
                        <!--                <h5>Angelina Watson</h5>-->
                        <!--                <span>Medical Check Up</span>-->
                        <!--            </div>-->
                        <!--        </div>-->

                        <!--        <div class="overflex">-->
                        <!--            <div class="icon">-->
                        <!--                <img src="{{ url('public/doctor/images/overview/profilefour.jpg') }}" alt="">-->
                        <!--            </div>-->
                        <!--            <div class="content">-->
                        <!--                <h5>Besis Alexander</h5>-->
                        <!--                <span>Medical Check Up</span>-->
                        <!--            </div>-->
                        <!--        </div>-->

                        <!--        <div class="overflex">-->
                        <!--            <div class="icon">-->
                        <!--                <img src="{{ url('public/doctor/images/overview/profilefive.jpg') }}" alt="">-->
                        <!--            </div>-->
                        <!--            <div class="content">-->
                        <!--                <h5>Beth Mccoy</h5>-->
                        <!--                <span>Medical Check Up</span>-->
                        <!--            </div>-->
                        <!--        </div>-->

                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    
                <div class="overviewColumnarea">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview_consult_head fullcolumhead">
                                <h5>Clinical Updates</h5>
                                <a href="{{ url('doctor/clinical-update')}}"><span>See All</span></a>
                            </div>

                            <div class="card">
                              
                               @if(count($clinical_update) > 0)
                               @foreach($clinical_update as $row)
                                <div class="overflex" style="align-items: unset;">
                                    <div class="updatepic">
                                        <img src="{{ url('/').$row->image }}" alt="">
                                    </div>
                                    <div class="updatecontent">
                                        <h5>{{ $row->title }}</h5>
                                        <p>{!! \Str::limit($row->description,200) !!} <span>Read More</span></p> 
                                        <div class="bottomcontent">
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/date.png') }}" alt=""> {{ \Carbon\Carbon::parse($row->created_at)->format('d/m/y') }}
                                            </span>
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/edit.png') }}" alt=""> Lauren Spencer
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @endif


                                <!-- <div class="overflex" style="align-items: unset;">
                                    <div class="updatepic">
                                        <img src="{{ url('public/doctor/images/overview/doctortwo.jpg') }}" alt="">
                                    </div>
                                    <div class="updatecontent">
                                        <h5>LDL cholestrol: How low can you (safely) go?.</h5>
                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing eli. Quam odio odit labore recusandae, provident voluptatum tenetur facilis consectetur temporibus veniam ipsum laudantium ut alias sapiente esse a sit nostrum suscipit. <span>Read More</span></h6> 
                                        <div class="bottomcontent">
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/date.png') }}" alt="">  20/03/23
                                            </span>
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/edit.png') }}" alt=""> Lauren Spencer
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="overflex" style="align-items: unset;">
                                    <div class="updatepic">
                                        <img src="{{ url('public/doctor/images/overview/doctorthree.jpg') }}" alt="">
                                    </div>
                                    <div class="updatecontent">
                                        <h5>LDL cholestrol: How low can you (safely) go?.</h5>
                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing eli. Quam odio odit labore recusandae, provident voluptatum tenetur facilis consectetur temporibus veniam ipsum laudantium ut alias sapiente esse a sit nostrum suscipit. <span>Read More</span></h6> 
                                        <div class="bottomcontent">
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/date.png') }}" alt="">  20/03/23
                                            </span>
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/edit.png') }}" alt=""> Lauren Spencer
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="overflex" style="align-items: unset;">
                                    <div class="updatepic">
                                        <img src="{{ url('public/doctor/images/overview/doctorone.jpg') }}" alt="">
                                    </div>
                                    <div class="updatecontent">
                                        <h5>LDL cholestrol: How low can you (safely) go?.</h5>
                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing eli. Quam odio odit labore recusandae, provident voluptatum tenetur facilis consectetur temporibus veniam ipsum laudantium ut alias sapiente esse a sit nostrum suscipit. <span>Read More</span></h6> 
                                        <div class="bottomcontent">
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/date.png') }}" alt="">  20/03/23
                                            </span>
                                            <span>
                                                <img src="{{ url('public/doctor/images/icons/edit.png') }}" alt=""> Lauren Spencer
                                            </span>
                                        </div>
                                    </div>
                                </div>
 -->
                               


                            </div>

                        </div>

                    </div>
                </div>
                    
                </div>

                <!-- end -->


                <!-- 3rd column area -->

                

                <!-- end -->



              </div>

               
            </div>

           
</section>

@endsection






