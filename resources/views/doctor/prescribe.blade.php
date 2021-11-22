@extends('doctor.layouts.default')
@section('content')


<section class="content-wrapper"> 
            @include('doctor.partials.sidebar')


            <div class="side-wrapper">
               <div class="card wrapper-card prescribecard">

                <div class="prescribehead">
                   <a href="{{ url()->previous()}}"><div class="back">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                   </div></a>
                    <span>Prescribe A Medication</span>
                </div>

                <div class="prescribetabmenu">
                   <div class="row">
                       <div class="col-md-6 offset-md-3">
                        <div class="prescribetabmenucontent">
                            <h6>1. Select Medication Class</h6>
                            <p>What kind of medication is this?</p>
                        </div>
    
                        <ul>
                            <li class="prescribeactive" id="class">
                                <button type="button" class="prescribebtn">
                                    Search By Class
                                </button>
                            </li>
                            <li id="name">
                                <button type="button" class="prescribebtn">
                                    Search By Name
                                </button>
                            </li>
                            <li id="favorites">
                                <button type="button" class="prescribebtn">
                                    Favorites
                                </button>
                            </li>
                        </ul>
                       </div>
                   </div>
                </div>


                  <div class="prescribetab">
                      <div class="prescribetabcontentone">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="innertabmenu">
                                                <ul>
                                                    <li class="inneractive">
                                                        Antibiotics
                                                    </li>
                                                    <li>
                                                        Antifungals
                                                    </li>
                                                    <li>
                                                        Antivirals
                                                    </li>
                                                    <li>
                                                        Pain
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="">Antibiotics</label>
                                                 <select name="" id="" class="form-control">
                                                     <option value="" selected disabled>--select--</option>
                                                     <option value="">lorem ipsum</option>
                                                 </select>
                                             </div>
                                       
                                             <div class="form-group readonlypara">
                                                 <label for="">Selected Drug</label>
                                                 <p>lorem ipsum</p>
                                             </div>
                                      
                                            <div class="maritalstatus">
                                                <h6>
                                                    <img src="images/icons/delete.png" alt="">
                                                </h6>
                                            </div>
                                            
                                            <div class="maritalstatus">
                                             <div class="form-group">
                                                 <h6 style="font-weight: 600;">2. Select Drug Form</h6>
                                                 <label for="">Drug Form</label>
                                                 <select name="" id="" class="form-control">
                                                    <option value="" selected disabled>--select--</option>
                                                    <option value="">lorem ipsum</option>
                                                </select>
                                             </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6 style="font-weight: 600;">3. Select Version</h6>
                                                 <div class="form-group soapradio">
                                                     <label class="paymentradio">Generic
                                                         <input type="radio" checked="checked" name="radio">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <label class="paymentradio">Brand
                                                         <input type="radio" name="radio">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                 </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600;">4. Instructions</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Instructions</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Take</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label for="">Quantity</label>
                                                                 <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Qty</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label for="">Unit</label>
                                                                 <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Take</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label for="">Froqumy</label>
                                                                 <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Directions</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <textarea style="font-size: 14px;" type="text" class="form-control" rows="2" placeholder="Enter any additional instructions"></textarea>
                                                </div>

                                            </div>


                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600; font-size: 14px">4. Choose Refills <span style="color: #bbb;">(Optional)</span></h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Refills</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>1</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600;">4. Message For Pharmacy<span style="color: #bbb; font-size: 14px;"> (Optional)</span></h6>
                                                   
                                                            <div class="form-group">
                                                                <label for="">Write a message</label>
                                                                <textarea name="" id="" rows="3" class="form-control"></textarea>
                                                            </div>
                                                       
                                                </div>
                                            </div>


                                          
                                               <div class="bgradio">
                                                    <h6> <i class="fa fa-star-o" aria-hidden="true"></i> Add This Drug To Your Rx Favorites?</h6>
                                                    <div class="form-group">
                                                        <label class="paymentradio">Yes
                                                            <input type="radio" checked="checked" name="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="paymentradio">none
                                                            <input type="radio" name="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                               </div>
                                               
                                           
                                               <div class="maritalstatus">
                                                <div class="form-group">
                                                   <div class="adddrugsarea">
                                                        <button class="addarea">
                                                            <span>
                                                                <i class="flaticon-plus"></i>
                                                            </span>
                                                            Add drug
                                                        </button>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
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

                      <div class="prescribetabcontenttwo">
                        <div class="card-body form-body">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="">Antibiotics</label>
                                                <input type="text" class="form-control" placeholder="lorem ipsum">
                                                <button type="button" class="addbtn">Add</button>
                                             </div>
                                       
                                             <div class="form-group readonlypara">
                                                 <label for="">Selected Drug</label>
                                                 <p>lorem ipsum</p>
                                             </div>
                                      
                                            <div class="maritalstatus">
                                                <h6>
                                                    <img src="images/icons/delete.png" alt="">
                                                </h6>
                                            </div>
                                            
                                            <div class="maritalstatus">
                                             <div class="form-group">
                                                 <h6 style="font-weight: 600;">2. Select Drug Form</h6>
                                                 <label for="">Drug Form</label>
                                                 <select name="" id="" class="form-control">
                                                    <option value="" selected disabled>--select--</option>
                                                    <option value="">lorem ipsum</option>
                                                </select>
                                             </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <h6 style="font-weight: 600;">3. Select Version</h6>
                                                 <div class="form-group soapradio">
                                                     <label class="paymentradio">Generic
                                                         <input type="radio" checked="checked" name="radio">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                       <label class="paymentradio">Brand
                                                         <input type="radio" name="radio">
                                                         <span class="checkmark"></span>
                                                       </label>
                                                 </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600;">4. Instructions</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Instructions</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Take</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label for="">Quantity</label>
                                                                 <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Qty</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label for="">Unit</label>
                                                                 <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Take</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label for="">Froqumy</label>
                                                                 <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>Directions</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <textarea style="font-size: 14px;" type="text" class="form-control" rows="2" placeholder="Enter any additional instructions"></textarea>
                                                </div>

                                            </div>


                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600; font-size: 14px">4. Choose Refills <span style="color: #bbb;">(Optional)</span></h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Refills</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="" selected disabled>1</option>
                                                                    <option value="">lorem ipsum</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="maritalstatus">
                                                <div class="form-group">
                                                    <h6 style="font-weight: 600;">4. Message For Pharmacy<span style="color: #bbb; font-size: 14px;"> (Optional)</span></h6>
                                                   
                                                            <div class="form-group">
                                                                <label for="">Write a message</label>
                                                                <textarea name="" id="" rows="3" class="form-control"></textarea>
                                                            </div>
                                                       
                                                </div>
                                            </div>


                                          
                                               <div class="bgradio">
                                                    <h6> <i class="fa fa-star-o" aria-hidden="true"></i> Add This Drug To Your Rx Favorites?</h6>
                                                    <div class="form-group">
                                                        <label class="paymentradio">Yes
                                                            <input type="radio" checked="checked" name="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="paymentradio">none
                                                            <input type="radio" name="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                               </div>
                                               
                                           
                                               <div class="maritalstatus">
                                                <div class="form-group">
                                                   <div class="adddrugsarea">
                                                        <button class="addarea">
                                                            <span>
                                                                <i class="flaticon-plus"></i>
                                                            </span>
                                                            Add drug
                                                        </button>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                        </p>

                                                        <p>
                                                            <span><img src="images/icons/delete.png" alt=""></span>
                                                            <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
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


                    <div class="prescribetabcontentthree">
                        <div class="card-body form-body">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Choose a drug</label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="" selected disabled>Azithromycin, 300 mg oral tablets, 6 tablets, <span style="color: rgb(101, 218, 116);">Take 2 rablests, every
                                                                day</span></option>
                                                           
                                                        </select>
                                                    </div>
                                               
                                                     <div class="form-group readonlypara">
                                                         <label for="">Selected Drug</label>
                                                         <p style="background-color: #f9f9f9;">Azithromycin, 300 mg oral tablets, 6 tablets, <span style="color: rgb(101, 218, 116);">Take 2 rablests, every
                                                            day</span> </p>
                                                     </div>
                                              
                                                    <div class="maritalstatus">
                                                        <h6>
                                                            <img src="images/icons/delete.png" alt="">
                                                        </h6>
                                                    </div>
                                                    
                                                    <div class="maritalstatus">
                                                     <div class="form-group">
                                                         <h6 style="font-weight: 600;">2. Select Drug Form</h6>
                                                         <label for="">Drug Form</label>
                                                         <select name="" id="" class="form-control">
                                                            <option value="" selected disabled>--select--</option>
                                                            <option value="">lorem ipsum</option>
                                                        </select>
                                                     </div>
                                                    </div>
        
                                                    <div class="maritalstatus">
                                                        <h6 style="font-weight: 600;">3. Select Version</h6>
                                                         <div class="form-group soapradio">
                                                             <label class="paymentradio">Generic
                                                                 <input type="radio" checked="checked" name="radio">
                                                                 <span class="checkmark"></span>
                                                               </label>
                                                               <label class="paymentradio">Brand
                                                                 <input type="radio" name="radio">
                                                                 <span class="checkmark"></span>
                                                               </label>
                                                         </div>
                                                    </div>
        
                                                    <div class="maritalstatus">
                                                        <div class="form-group">
                                                            <h6 style="font-weight: 600;">4. Instructions</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Instructions</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Take</option>
                                                                            <option value="">lorem ipsum</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="">Quantity</label>
                                                                         <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Qty</option>
                                                                            <option value="">lorem ipsum</option>
                                                                        </select>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="">Unit</label>
                                                                         <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Take</option>
                                                                            <option value="">lorem ipsum</option>
                                                                        </select>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="">Froqumy</label>
                                                                         <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>Directions</option>
                                                                            <option value="">lorem ipsum</option>
                                                                        </select>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                        <div class="form-group">
                                                            <textarea style="font-size: 14px;" type="text" class="form-control" rows="2" placeholder="Enter any additional instructions"></textarea>
                                                        </div>
        
                                                    </div>
        
        
                                                    <div class="maritalstatus">
                                                        <div class="form-group">
                                                            <h6 style="font-weight: 600; font-size: 14px">4. Choose Refills <span style="color: #bbb;">(Optional)</span></h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Refills</label>
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="" selected disabled>1</option>
                                                                            <option value="">lorem ipsum</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    <div class="maritalstatus">
                                                        <div class="form-group">
                                                            <h6 style="font-weight: 600;">4. Message For Pharmacy<span style="color: #bbb; font-size: 14px;"> (Optional)</span></h6>
                                                           
                                                                    <div class="form-group">
                                                                        <label for="">Write a message</label>
                                                                        <textarea name="" id="" rows="3" class="form-control"></textarea>
                                                                    </div>
                                                               
                                                        </div>
                                                    </div>
        
        
                                                  
                                                       <div class="bgradio">
                                                            <h6> <i class="fa fa-star-o" aria-hidden="true"></i> Add This Drug To Your Rx Favorites?</h6>
                                                            <div class="form-group">
                                                                <label class="paymentradio">Yes
                                                                    <input type="radio" checked="checked" name="radio">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <label class="paymentradio">none
                                                                    <input type="radio" name="radio">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                       </div>
                                                       
                                                   
                                                       <div class="maritalstatus">
                                                        <div class="form-group">
                                                           <div class="adddrugsarea">
                                                                <button class="addarea">
                                                                    <span>
                                                                        <i class="flaticon-plus"></i>
                                                                    </span>
                                                                    Add drug
                                                                </button>
        
                                                                <p>
                                                                    <span><img src="images/icons/delete.png" alt=""></span>
                                                                    <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                                </p>
        
                                                                <p>
                                                                    <span><img src="images/icons/delete.png" alt=""></span>
                                                                    <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                                </p>
        
                                                                <p>
                                                                    <span><img src="images/icons/delete.png" alt=""></span>
                                                                    <strong>Rx Order </strong> Azithromycin 300 Mg 6 Unit, Take Every Day
                                                                </p>
                                                           </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="button" class="btn editbtn" data-toggle="modal" data-target="#exampleModal">
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



    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.prescribetabcontentone').show();
        $('.prescribetabcontenttwo').hide();
        $('.prescribetabcontentthree').hide();
        $('#class').click(function(){
        $('.prescribetabcontentone').show();
        $('.prescribetabcontenttwo').hide();
        $('.prescribetabcontentthree').hide();
            $(this).addClass('prescribeactive').siblings().removeClass("prescribeactive");
        });
        $('#name').click(function(){
            $('.prescribetabcontentone').hide();
            $('.prescribetabcontenttwo').show();
            $('.prescribetabcontentthree').hide();
            $(this).addClass('prescribeactive').siblings().removeClass("prescribeactive");
        });
        $('#favorites').click(function(){
            $('.prescribetabcontentone').hide();
            $('.prescribetabcontenttwo').hide();
            $('.prescribetabcontentthree').show();
            $(this).addClass('prescribeactive').siblings().removeClass("prescribeactive");
        })
    })
</script>
@endsection
