@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

    <section class="side-wrapper main-form-section visitfor-section">
        <div class="form-wrapper">
            <div class="container">
                <div class="form-card">
                    
                    <form method="post" action="{{ url('patient/addchild')}}">
                       
                       @csrf
                        <div class="formstart">
                            
                            <div class="back-btn">
                                <a href="{{ url('patient/visitfor')}}"><span><i class="fa fa-chevron-left"></i> Back</span></a>
                                <h5 class="text-center mb-5">Add Your Child</h5>
                            </div>
                            <div class="form-field mb-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Your child’s first name" value="{{ old('first_name') }}">
                                    <p class="text-danger">{{ $errors->first('first_name')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" placeholder="Your child’s middle name (optional)" value="{{ old('middle_name') }}">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Your child’s last name" value="{{ old('last_name') }}">
                                     <p class="text-danger">{{ $errors->first('last_name')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Suffix</label>
                                    <input type="text" class="form-control" name="suffix" placeholder="e.g. Jr, Sr. (optional)" value="{{ old('suffix') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Date Of Birth</label>
                                    <input type="date" class="form-control" name="dob" placeholder="Date Of Birth">
                                     <p class="text-danger">{{ $errors->first('dob')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="" class="float-left">Sex</label>
                                    <div class="sv-radio " >
                                        <div class="form-check pl-0">
                                        <input class="form-check-input mt-0 mb-0" type="radio" name="gender" id="flexRadioDefault1" value="1" {{ old('gender') ==1 ? "checked":''}}>
                                        <label class="form-check-label pl-4" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check pl-0" >
                                        <input class="form-check-input mt-0 mb-0" type="radio" name="gender" id="flexRadioDefault2" checked value="2" {{ old('gender') ==2 ? 'checked':''}}>
                                        <label class="form-check-label pl-5"  for="flexRadioDefault2"/>
                                            Female
                                        </label>
                                    </div>
                                    </div>
                                     <p class="text-danger">{{ $errors->first('gender')}}</p>
                                </div>
                                
                            </div>
                            
                            <div class="next-btn text-right mt-5">
                                <button class="btn btn-submit editbtn" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection