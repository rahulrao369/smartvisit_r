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
                                <a href="https://cloudwapp.in/smartvisit/health_profile"><span><i class="fa fa-chevron-left"></i> Back</span></a>
                                <div class="mb-5 text-center">
                                    <h5 class="text-center">Confirm Visit</h5>
                                </div>
                            </div>
                            <div class="form-field mb-4">
                                <div class="sv-confirm-visit-form">
                                   <div class="row">

                                        <table class="table mb-0">
                                          <tbody>
                                            <tr>
                                              <td>Provider</td>
                                              <td>Provider Name</td>
                                            </tr>
                                            <tr>
                                              <td>Duration</td>
                                              <td>15 minutes</td>
                                            </tr>
                                            <tr>
                                              <td>Reminders</td>
                                              <td>saif@mailinator <span class="btn edit p-0"><a href="javascript:;">Edit</a></span> <br> 11111111</td>
                                            </tr>
                                            <tr>
                                              <td>Payment Method</td>
                                              <td>visa 1111 Exp, 04/2024 <span class="btn edit p-0"><a href="javascript:;">Edit</a></span></td>
                                            </tr>
                                            <tr>
                                              <td>Coupon</td>
                                              <td><span class="btn add p-0"><a href="javascript:;">Add</span></a></td>
                                            </tr>
                                            <tr>
                                              <td>Your Price</td>
                                              <td>$10</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="next-btn text-right mt-5">
    
                                <a href="javascript:;" class="btn btn-submit editbtn">Purchase</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection