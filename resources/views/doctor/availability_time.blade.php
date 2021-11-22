@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
            @include('doctor.partials.sidebar')


        <div class="side-wrapper">
            <div class="card wrapper-card">
             <iv class="overviewColumnarea">
                    <div class="row ml-3">
                         @if(session()->has('success'))
                                <div class="col-sm-12 alert alert-success">
                                <p class="">{{ session()->get('success')}}</p>
                                </div>
                                @endif
                        <div class="col-md-12">
                            <div class="overview_consult_head">
                                <h5>My availablity</h5>
                                <!--<span>See All</span>-->
                               
                            </div>

                            <div class="card">
                                
                                <form method="POST" action="{{ url('doctor/available-times')}}">
                                @csrf
                                <div class="row"><div class="col-md-12">
                                @if(isset($slots) && count($slots) > 0 )
                                @foreach($slots as $row)
                                   <div class="form-check mr-5">
                                      <input class="form-check-input" type="checkbox" value="{{ $row->name }}" id="time" name="time[]"  {{ in_array($row->name,$dtdata) ?  "checked":"" }}>
                                      <label class="form-check-label" for="flexCheckDefault">
                                       {{ $row->name }}
                                      </label>
                                    </div>
                                @endforeach
                                @endif
                               
                                </div></div>
                                 <p class="text-danger">{{ $errors->first('name') }}</p>
                                 <div class="form-check">
                                      <button type="submit" class="btn" style="background: #a9e530; border-radius: 25px;">Submit</button>
                                    </div>
                               
                                
                                </form>
                                                             

                             

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