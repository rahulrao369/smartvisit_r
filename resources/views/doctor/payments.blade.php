@extends('doctor.layouts.default')
@section('content')
<section class="content-wrapper"> 
@include('doctor.partials.sidebar')

            <div class="side-wrapper">
               <div class="card wrapper-card">
                   <div class="card-body form-body">
                       <div class="row">
                           <div class="col-md-12">
                                <div class="paymentslist">
                                    <ul class="paymentul">
                                        <li>
                                            <div class="card paymentcard">
                                              <div class="icon" style="color: purple; background-color: #f5b6f530;">
                                                  <i class="fa fa-credit-card" aria-hidden="true"></i>
                                              </div>
                                              <div class="content">
                                                  <p>$ 15,000</p>
                                                  <h5>Paid</h5>
                                              </div>
                                            </div>
                                          </li>
                                        <li>
                                          <div class="card paymentcard">
                                            <div class="icon" style="color: rgb(0, 0, 0); background-color: #c0c0c030;">
                                              <i class="fa fa-database" aria-hidden="true"></i>
                                            </div>
                                            <div class="content">
                                                <p>$ 2,320</p>
                                                <h5>Outstanding</h5>
                                            </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="card paymentcard">
                                            <div class="icon" style="color: rgb(228, 186, 0); background-color: #fcfbcb9e;">
                                              <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="content">
                                                <p>$ 1,200</p>
                                                <h5>DUE MM/DAY</h5>
                                            </div>
                                          </div>
                                      </li>
                                  </ul>
                                </div>
                           </div>
                           <div class="col-md-10 offset-md-1" >
                            <div class="paymenttabarea">
                                <div class="paymenttabbtn prescribetabmenu ">

                                    <ul>
                                        <li class="prescribeactive">
                                            <button type="button" class="prescribebtn" id="payment">
                                                Payments
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="prescribebtn" id="deposit">
                                                Setup direct deposit
                                            </button>
                                        </li>
                                        
                                        <!--<a href="{{ url('doctor/bank-details')}}"><li>-->
                                        <!--    <button type="button" class="prescribebtn" id="bank">-->
                                        <!--        Bank-->
                                        <!--    </button>-->
                                        <!--</li>-->
                                        <!--</a>-->
                                        
                                    </ul>

                                    
                                </div>

                                <div class="paymenttabcontent">
                                    <div class="tabcontentone">
                                        <div class="paginatearea">
                                            <button type="button" class="paginatebtn">
                                                <span>
                                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                </span> April
                                            </button>
                                            <span class="main_month">February 2020</span>
                                            <button type="button" class="paginatebtn">
                                                June <span class="righticon">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="paymentstable">
                                            <table class="table">
                                                <thead class="custom-light">
                                                  <tr>
                                                    <th style="border-radius: 10px 0px 0px 0px;" scope="col"># ID</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Date</th>
                                                    <th style="border-radius: 0px 10px 0px 0px;" scope="col">Invoice</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td scope="row"># 1</td>
                                                    <td>Outstanding</td>
                                                    <td>$150</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 1</td>
                                                    <td>Outstanding</td>
                                                    <td>$150</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 1</td>
                                                    <td>Outstanding</td>
                                                    <td>$150</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 2</td>
                                                    <td style="color: gold;">Due on 02/01/20</td>
                                                    <td>$500</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 2</td>
                                                    <td style="color: gold;">Due on 02/01/20</td>
                                                    <td>$500</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 2</td>
                                                    <td style="color: gold;">Due on 02/01/20</td>
                                                    <td>$500</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 1</td>
                                                    <td>Outstanding</td>
                                                    <td>$150</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 1</td>
                                                    <td>Outstanding</td>
                                                    <td>$150</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 3</td>
                                                    <td style="color: purple;">Paid</td>
                                                    <td>$250</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 3</td>
                                                    <td style="color: purple;">Paid</td>
                                                    <td>$250</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                  <tr>
                                                    <td scope="row"># 3</td>
                                                    <td style="color: purple;">Paid</td>
                                                    <td>$250</td>
                                                    <td>02/01/02</td>
                                                    <td>icon</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>

                                        <div class="paginationlist">
                                            <ul>
                                                <li>
                                                    <button type="button" class="paginatebtn">
                                                        <span>
                                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                        </span> Prev
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="paginatebtn">
                                                        Next <span class="righticon">
                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="tabcontentwo">
                                       <div class="row">
                                           <div class="col-md-8 offset-md-2">
                                            <h5>Setup direct deposit account</h5>
                                            <p>This is the bank where you will receive your earnings.</p>
    
                                            <div class="paymentsform">
                                                <h5>Setup Direct Deposit</h5>
                                                 <form method="POST" action="{{ url('doctor/bank-details')}}" id="bank_details_form">
                                                 @csrf
                                                   <input type="hidden" name="id" value="{{ isset($bk->id) ? base64_encode($bk->id):'' }}"/>
                                                    <div class="row">
                                                       <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Your Name</label>
                                                            <input type="text" class="form-control" name="your_name" id="your_name" required="">
                                                            <p class="text-danger your_name_error"></p>
                                                        </div>
                                                       </div>
    
                                                       <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Bank Name</label>
                                                            <input type="text" class="form-control" value="{{ isset($bk->bank_name) ? $bk->bank_name:'' }}"  name="bank_name" id="bank_name" required="">
                                                             <p class="text-danger bank_name_error"></p>
                                                        </div>
                                                       </div>
    
                                                       <div class="col-md-12">
                                                           <label>Same as Residence Address?</label>
                                                        <div class="form-group radiogroup row">
                                                            <label class="paymentradio col-md-3">Checking
                                                                <input type="radio" checked="checked" name="radio">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="paymentradio col-md-3">Savings
                                                                <input type="radio" name="radio">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                       </div>
    
                                                       <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Routing <span class="character">9 Character</span></label>
                                                            <input type="text" class="form-control checkvalidation"  value="{{ isset($bk->routing) ? $bk->routing:'' }}" name="routing" id="routing" required="">
                                                            <p class="text-danger routing_error"></p>
                                                        </div>
                                                       </div>
    
                                                       <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Account <span class="character">12 Character</span></label>
                                                            <input type="text" name="account_number" value="{{ isset($bk->account_number) ? $bk->account_number:'' }}" class="form-control checkvalidation" id="account_number" required="">
                                                             <p class="text-danger account_error"></p>
                                                        </div>
                                                       </div>
    
    
                                                       <div class="col-md-12">
                                                       <div class="creatbtn">
                                                        <button type="button" class="btn editbtn" id="submitBankInfo">
                                                            Create Account
                                                          </button>
                                                       </div>
                                                       </div>
    
                                                       
    
                                                    </div>
                                                </form>
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

               
            </div>

<input type="hidden" value="0" id="yournameerror"/> 
<input type="hidden" value="0" id="banknameerror"/>  
<input type="hidden" value="0" id="routingerror"/>  
<input type="hidden" value="0" id="accounterror"/>  
</section>


<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="{{ url('public/doctor/js/validate.js') }}"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->

    
<script>
    $(document).ready(function () {
       
        // var literal = {
        //     routing:{selector:$('#routing'),length:{value:9,message:'Routing number should be 9 digits'}}
        // }
        //   var result = $.validate.rules(literal,{mode:'bootstrap'});
        //     console.log('okkkkkkkkkkk',result);
       
       
       
    //   $('.your_name').on('input',function(){
          
    //          if($(this).val().length==""){
               
    //             $('.your_name_error').text("Your name is required."); 
    //              $('#yournameerror').val(1)
    //          }else{
    //             $('.routing_error').text("");  
    //             $('#yournameerror').val(0)
    //          }
             
       
         
         
       
    //     $('.bank_name').on('input',function(){
          
    //     //   alert($(this).attr("name"))
       
    //          if($(this).val().length==""){
               
    //             $('.bank_name_error').text("Bank name is required."); 
    //              $('#banknameerror').val(1)
    //          }else{
    //             $('.routing_error').text("");  
    //             $('#banknameerror').val(0)
    //          }
             
    //      }
         
         
       
      $('.checkvalidation').on('input',function(){
          
        //   alert($(this).attr("name"))
         if($(this).attr("name") =="routing"){
             if($(this).val().length==0 || $(this).val().length < 9  || $(this).val().length > 9){
               
                $('.routing_error').text("Routing length should be 9."); 
                 $('#routingerror').val(1)
             }else{
                $('.routing_error').text("");  
                $('#routingerror').val(0)
             }
             
         }
         
         if($(this).attr("name") =="account_number"){
             
               if($(this).val().length==0 || $(this).val().length < 12 || $(this).val().length > 12 ){
             
               $('.account_error').text("Routing length should be 12.");
                $('#accounterror').val(1)
              
             }else{
               $('.account_error').text("");
               $('#accounterror').val(0)
             }
             
         }
          
      })
      
      
      $('#submitBankInfo').click(function(){
        //   alert($('#routingerror').val())
        //      alert($('#accounterror').val())
        if($('#routingerror').val()==0 && $('#accounterror').val() ==0){
           
            $('#bank_details_form').submit();
        }
         
      })
      
      
      
   })
</script>



<script>
    $(document).ready(function(){
        $('.tabcontentwo').hide();
        $('#payment').click(function(){
            $('.tabcontentone').show();
            $('.tabcontentwo').hide();
            $(this).parent().addClass('prescribeactive').siblings().removeClass("prescribeactive");
        });
        $('#deposit').click(function(){
            $('.tabcontentwo').show();
            $('.tabcontentone').hide();
            $(this).parent().addClass('prescribeactive').siblings().removeClass("prescribeactive");
        })
    })
</script>

<@endsection