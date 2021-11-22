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
                                <a href="https://cloudwapp.in/smartvisit/insurance"><span><i class="fa fa-chevron-left"></i> Back</span></a>
                                <h5 class="text-center mb-5">How Long Have You Felt This Way?</h5>
                            </div>
                            <div class="form-field mb-4">
                                <div class="sv-form-select">
                                    <select class="form-select mr-4" aria-label="Default select example">
                                        <option selected>1</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="sv-form-select">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Days</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>                           
                                </div>
                            </div>
                            
                            <div class="next-btn text-right mt-5">
    
                                <a href="https://cloudwapp.in/smartvisit/health_profile" class="btn btn-submit editbtn">Next</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection