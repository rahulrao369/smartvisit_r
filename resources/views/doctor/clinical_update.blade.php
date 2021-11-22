@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
            @include('doctor.partials.sidebar')

            <div class="side-wrapper">
               <div class="card wrapper-card">
                   <div class="card-body">
                    <div class="overviewColumnarea mt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-heading">
                                    <h5>Clinical Updates <span>(2 New)</span></h5>
                                    
                                </div>
    
                                <div class="card">
                                   
                                   @if(count($clinical_update) > 0)
                                   @foreach($clinical_update as $row)
                                    <div class="overflex" style="align-items: unset;">
                                        <div class="updatepic">
                                            <img src="{{ url('/').$row->image }}" alt="">
                                        </div>
                                        <div class="updatecontent">
                                           <a href="{{ url('doctor/clinical-details/'.base64_encode($row->id))}}"><h5>{{ $row->title }}</h5></a>
                                            <h6>{!! Str::limit($row->description, 300, ' ...') !!} <span>Read More</span></h6> 
                                            <div class="bottomcontent">
                                                <span>
                                                    <img src="{{ url('public/doctor/images/icons/date.png') }}" alt="">  {{ \Carbon\Carbon::parse($row->created_at)->format('d/m/y') }}
                                                </span>
                                                <span>
                                                    <!-- <img src="{{ url('public/doctor/images/icons/edit.png') }}" alt=""> Lauren Spencer -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
    
    
                                   <!--  <div class="overflex" style="align-items: unset;">
                                        <div class="updatepic">
                                            <img src="{{ url('public/doctor/images/overview/doctortwo.jpg') }}" alt="">
                                        </div>
                                        <div class="updatecontent">
                                            <a href="{{ url('doctor/clinical-details')}}"><h5>LDL cholestrol: How low can you (safely) go?.</h5></a>
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
                                    </div> -->
    
    
                                    <!-- <div class="overflex" style="align-items: unset;">
                                        <div class="updatepic">
                                            <img src="{{ url('public/doctor/images/overview/doctorthree.jpg') }}" alt="">
                                        </div>
                                        <div class="updatecontent">
                                            <a href="{{ url('doctor/clinical-details')}}"><h5>LDL cholestrol: How low can you (safely) go?.</h5></a>
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
                                    </div> -->
    
    <!-- 
                                    <div class="overflex" style="align-items: unset;">
                                        <div class="updatepic">
                                            <img src="{{ url('public/doctor/images/overview/doctorone.jpg') }}" alt="">
                                        </div>
                                        <div class="updatecontent">
                                            <a href="{{ url('doctor/clinical-details')}}"><h5>LDL cholestrol: How low can you (safely) go?.</h5></a>
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
                                    </div> -->
    
                                   
    
    
                                </div>
    
                            </div>
    
                        </div>
                    </div>
                   </div>
               </div>

               
            </div>

           
</section>
@endsection