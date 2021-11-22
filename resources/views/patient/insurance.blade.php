@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')


    <section class="side-wrapper main-form-section visitfor-section">
        <div class="form-wrapper">
            <div class="container">
                <div class="form-card">
                    
                    <form method="post" action="https://cloudwapp.in/smartvisit/login">
     
                        <div class="formstart">
                            
                            <div class="back-btn">
                                <a href="https://cloudwapp.in/smartvisit/addchild"><span><i class="fa fa-chevron-left"></i> Back</span></a>
                                <h5 class="text-center mb-5">Add Insurance Information</h5>
                            </div>
                            <div class="form-field mb-4">
                                <div class="sv-form-head">
                                    <h6 class="font-weight-bold">Lorem ipsum dolor</h6>
                                    <p>Lorem ipsum dolor sit amet, lorem ipsum.</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Member ID</label>
                                    <input type="text" class="form-control" name="fname">
                                </div>
                                <div class="form-group">
                                    <label for="">Group ID</label>
                                    <input type="text" class="form-control" name="mname" >
                                </div>

                            </div>
                            
                            <div class="next-btn text-right mt-5">
                                <a href="https://cloudwapp.in/smartvisit/duration" class="btn btn-skip">Skip Insurance</a>
                                <a href="https://cloudwapp.in/smartvisit/duration" class="btn btn-submit editbtn">Submit</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection