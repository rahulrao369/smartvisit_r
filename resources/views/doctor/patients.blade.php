@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
            @include('doctor.partials.sidebar')

            <div class="side-wrapper">
               <div class="card wrapper-card patient-wrapper">

                <div class="main-heading">
                        <div class="row">
                            <div class="col-md-9">
                                <h5>Patients <span>(28 People)</span> </h5>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Search Name">
                                <span class="searchicon"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                        </div>
                 </div>

                   <div class="card-body form-body">
                        <div class="patientlist">
                            <ul>

                                @if(count($today_consult) > 0)
                                @foreach($today_consult as $row)
                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('/').'/'.$row->patient->image }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            @if($row->type=='Self')
                                            <a href="{{ url('doctor/patient-detail/'.base64_encode($row->id))}}"> <h5>{{ $row->patient->first_name}}  {{ $row->patient->last_name}}</h5> </a>
                                            @else
                                            <a href="{{ url('doctor/patient-detail/'.base64_encode($row->id))}}"> <h5>{{ $row->getchild->first_name}}  {{ $row->getchild->middle_name}}  {{ $row->getchild->last_name}}</h5> </a>
                                            @endif
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> {{ $row->patient->phone}}</p>
                                   
                                            <!--<p>_{{ $row->patient->first_name }}_{{ $row->patient->last_name}}_</p>-->
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p style="font-weight: 400;">Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p style="font-weight: 600;">
                                                        {{ \Carbon\Carbon::parse($row->patient->dob)->diff(\Carbon\Carbon::now())->format('%y')}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>{{ $row->visit_reason->name }}</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                  {{ $today_consult->links('vendor.pagination.custom') }}
                                @else
                                <p class="text-danger text-center">Currently you have paitents</p>
                                @endif

                              <!--   <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profilethree.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profileone.jpeg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p style="font-weight: 400;">Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p style="font-weight: 600;">22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profilethree.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profileone.jpeg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p style="font-weight: 400;">Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p style="font-weight: 600;">22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profilethree.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profileone.jpeg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p style="font-weight: 400;">Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p style="font-weight: 600;">22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profiletwo.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div class="patientcard">
                                        <div class="patientimg">
                                            <img src="{{ url('public/doctor/images/overview/profilethree.jpg') }}" alt="">
                                        </div>
                                        <div class="patientprofile">
                                            <a href="{{ url('doctor/patient-detail')}}"> <h5>Ricardo Russell</h5> </a>
                                            <p><img src="{{ url('public/doctor/images/icons/calling.png') }}" alt=""> +123456789</p>
                                            <p>_Ricardo_Russell</p>
                                        </div>
                                        <div class="patientdetail">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p>Age</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>22</p>
                                                </div>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Chief Complaint</h6>
                                                <p>Migraine</p>
                                            </div>
                                            <div class="bottomdetail">
                                                <h6>Allergies</h6>
                                                <p>Penicillin</p>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->

                            </ul>
                        </div>

                        <!-- <div class="paginationlist patient-pagination">
                            <ul>
                                <li>
                                    <button type="button" class="paginatebtn">
                                        <span>
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </li>
                                <li>
                                    <span>1</span>
                                </li>
                                <li>
                                    <span>2</span>
                                </li>
                                <li>
                                    <span>3</span>
                                </li>
                                <li>
                                    <button type="button" class="paginatebtn">
                                       <span class="righticon">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </li>
                            </ul>
                        </div> -->

                   </div>
               </div>

               
            </div>

           
</section>


<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js')}}"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->

<script>
    $(document).ready(function(){
        $('.tabcontentwo').hide();
        $('#payment').click(function(){
            $('.tabcontentone').show();
            $('.tabcontentwo').hide();
            $(this).parent().addClass('paymentactivebtn').siblings().removeClass("paymentactivebtn");
        });
        $('#deposit').click(function(){
            $('.tabcontentwo').show();
            $('.tabcontentone').hide();
            $(this).parent().addClass('paymentactivebtn').siblings().removeClass("paymentactivebtn");
        })
    })
</script>

@endsection