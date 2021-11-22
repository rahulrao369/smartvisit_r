@extends('doctor.layouts.default')
@section('content')

<section class="content-wrapper"> 
                    @include('doctor.partials.sidebar')

            <div class="side-wrapper">
               <div class="card wrapper-card">
                   <div class="card-body">
                    <div class="overviewColumnarea mt-0">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="main-heading">
                                    <a href="{{ url()->previous()}}">
                                        <div class="back">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8">
                                    <div class="detailone">
                                        <img class="mainpic" src="{{ url('/').$clinical_update->image }}" alt="">
                                        <div class="listingitem">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="bottomcontent">
                                                        <span>
                                                            <img src="{{ url('public/doctor/images/icons/date.png') }}" alt="">  {{ \Carbon\Carbon::parse($clinical_update->created_at)->format('d/m/y')}}
                                                        </span>
                                                        <span>
                                                           <!--  <img src="{{ url('public/doctor/images/icons/edit.png') }}" alt=""> Lauren Spencer -->
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-share"></i> <span> Share</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clone" aria-hidden="true"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="detailtwo">
                                        <h5>{{ $clinical_update->title }}</h5>
                                        {!! $clinical_update->description !!}
                                    </div>
                                    
                                    <div class="detailthree">
                                        <div class="listingitem">
                                        <ul>
                                            <li>
                                                <i class="flaticon-share"></i> <span> Share</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-clone" aria-hidden="true"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>

                            </div>
    
                        </div>
                    </div>
                   </div>
               </div>

               
            </div>

           
</section>

@endsection