@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
            @include('doctor.partials.sidebar')


            <div class="side-wrapper">
               <div class="card wrapper-card prescribecard">

                <div class="prescribehead">
                   <div class="backarrow">
                        <img src="images/icons/arrowleft.png" alt=""> 
                   </div>
                    <span>Order Lab Test</span>
                </div>

              


                  <div class="ordertab">
                     
                      <div class="ordertabcontentone">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="orderhead">
                                        <h5>Search By Test Name</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                             <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Type the test you are looking for">
                                                <button type="button" class="addbtn">Add</button>
                                             </div>
                                       
                                             <div class="form-group readonlypara">
                                                 <label for="">Selected Test</label>
                                                 <div class="customflex">
                                                    <p>lorem ipsum</p>
                                                 <span>
                                                     <img src="images/icons/date.png" alt="">
                                                 </span>
                                                 </div>
                                             </div>
                                      
                                            <div class="selecttest">
                                                <h6>
                                                    <img src="images/icons/delete.png" alt="">
                                                </h6>
                                                <p> <span>or</span> Select Individual Tests </p>
                                            </div>

                                            <!-- ////// Standard /////// -->
                                            
                                            <div class="maritalstatus orderstatus">
                                             <div class="form-group">
                                                <h6 style="font-weight: 600;">Standard</h6>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">CBC w/differential
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">CMP+
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">BMP
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">Lipid Panel
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">Alc+
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">PT INR
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">TSH
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">T4
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">Procalcitonin
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>
                                                  
                                             </div>
                                            </div>


                                            <!-- ///////// culture section ////////// -->


                                            <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Culture</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Throat Culture
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Strep Group A Rapid Screen with Culture Reflex
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <label class="customcheck">Culture Respiratory with Gram Stain
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <!-- <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div> -->
                                                   </div>
                                                     
                                                </div>
                                               </div>


                                               <!-- ////// Inflamation ////// -->

                                               <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Inflamation</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Hs-CRP
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Sedimentation Rate by ESR
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <label class="customcheck">ANA Screen w/ reflex to Titer and Pattern, IFA
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
                                                     
                                                </div>
                                               </div>


                                               <!-- /////Diseses ///// -->

                                               <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Bowel Disease</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Calprotectin, Stool
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Lactoferrin, Quantitative, Stool
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <label class="customcheck">ANCA screen w/reflex to Titer
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
                                                     
                                                </div>
                                               </div>

                                               <!-- ////////// Pancrease /////////// -->

                                               <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Pancreas</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Amylase
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Lipase
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
                                                     
                                                </div>
                                               </div>

                                               <!-- ////////std//// -->

                                               <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Std</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">N Gonorrhea by RNA
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Chlamydia by RNA
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>

                                                   <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">HSV 1/2 IgM
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">HIV 1/2 Antigen/Ab Reflex
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>
                                                     
                                                </div>
                                               </div>

                                               <!-- //// Tick Bite ////// -->

                                               <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Tick Bite</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Lyme Disease Ab IgG IgM Serum with Reflex
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>
   
                                                </div>
                                               </div>

                                               <!-- //// Urinary //// -->

                                               <div class="maritalstatus orderstatus">
                                                <div class="form-group">
                                                   <h6 style="font-weight: 600;">Tick Bite</h6>
   
                                                   <div class="row">
                                                       <div class="col-md-9">
                                                           <label class="customcheck">Urinalysis reflex to microscopic (no culture)
                                                              <input type="checkbox">
                                                              <span class="checkmark"></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                       </div>
                                                   </div>

                                                   <div class="row">
                                                    <div class="col-md-9">
                                                        <label class="customcheck">Urine Testing for Infection (aka Urinalysis) with reflex to culture
                                                           <input type="checkbox">
                                                           <span class="checkmark"></span>
                                                         </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="orderdateimg"><img src="images/icons/date.png" alt=""></span>
                                                    </div>
                                                </div>
   
                                                </div>
                                               </div>


                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600;">6. Note To Lab<span style="color: #bbb; font-size: 14px;"> (Optional)</span></h6>
                                                   
                                                            <div class="form-group">
                                                                <label for="">Write a message</label>
                                                                <textarea name="" id="" rows="3" class="form-control"></textarea>
                                                            </div>
                                                       
                                                </div>
                                            </div>

                                           
                                               <div class="testlist">
                                                <div class="form-group">
                                                   <div class="adddrugsarea">
                                                        <h5>Test List</h5>
                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            HSV 1/2 IgM
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            CMP +
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            Lower Respiratory Sputum culture
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            Urinalysis
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            Calprotectin, Stool
                                                        </p>
                                                   </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="button" class="btn editbtn">
                                                    Next
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
               </div>

               
            </div>

           
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">

            <div class="maritalstatus  m-0">
               <div class="prescribecontent">
                    <h5>RX Order</h5>
                    <p>Rx Order Azithromycin 300 Mg 6 Unit, Take Every Day</p>
                    <p>Rx Order Azithromycin 300 Mg 6 Unit, Take Every Day</p>
                    <p>Rx Order Azithromycin 300 Mg 6 Unit, Take Every Day</p>
               </div>
            </div>

            <div class="maritalstatus">
                <div class="prescribecontent">
                    <label class="customcheck">Check the box to certify your prescription
                        order information is accurate
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                </div>
             </div>

             <ul>
                <li>
                    <button type="button" class="editbtn" >Send</button>
                </li>
                <li>
                    <button type="button" class="editbtn modalbtnpres" data-dismiss="modal">Cancel</button>
                </li>
             </ul>
    

        </div>
      </div>
    </div>
  </div>


@endsection