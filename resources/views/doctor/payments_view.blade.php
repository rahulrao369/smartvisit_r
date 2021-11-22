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
                                  <!--  <li>-->
                                  <!--      <div class="card paymentcard">-->
                                  <!--        <div class="icon" style="color: purple; background-color: #f5b6f566;">-->
                                  <!--            <i class="fa fa-credit-card" aria-hidden="true"></i>-->
                                  <!--        </div>-->
                                  <!--        <div class="content">-->
                                  <!--            <h5>$15,000</h5>-->
                                  <!--            <p>Paid</p>-->
                                  <!--        </div>-->
                                  <!--      </div>-->
                                  <!--    </li>-->
                                  <!--  <li>-->
                                  <!--    <div class="card paymentcard">-->
                                  <!--      <div class="icon" style="color: rgb(0, 0, 0); background-color: #c0c0c0;">-->
                                  <!--        <i class="fa fa-database" aria-hidden="true"></i>-->
                                  <!--      </div>-->
                                  <!--      <div class="content">-->
                                  <!--          <h5>$2,320</h5>-->
                                  <!--          <p>Outstanding</p>-->
                                  <!--      </div>-->
                                  <!--    </div>-->
                                  <!--</li>-->
                                  <!--<li>-->
                                  <!--    <div class="card paymentcard">-->
                                  <!--      <div class="icon" style="color: rgb(228, 186, 0); background-color: #fcfbcb;">-->
                                  <!--        <i class="fa fa-envelope-o" aria-hidden="true"></i>-->
                                  <!--      </div>-->
                                  <!--      <div class="content">-->
                                  <!--          <h5>$1,200</h5>-->
                                  <!--          <p>DUE MM/DAY</p>-->
                                  <!--      </div>-->
                                  <!--    </div>-->
                                  <!--</li>-->
                                   @if(Session()->has('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ Session()->get('success')}}</p>
                                                </div>
                                                @endif
                              </ul>
                            </div>
                           </div>

                           <div class="col-md-8 offset-md-2">
                            <div class="paymenttabarea">
                                <!--<div class="paymenttabbtn prescribetabmenu">-->
                                <!--    <ul>-->
                                <!--        <li>-->
                                <!--            <button type="button" class="prescribebtn" id="payment">-->
                                <!--                Payments-->
                                <!--            </button>-->
                                <!--        </li>-->
                                <!--        <li class="prescribeactive">-->
                                <!--            <button type="button" class="prescribebtn" id="deposit">-->
                                <!--                Setup direct deposit-->
                                <!--            </button>-->
                                <!--        </li>-->
                                <!--    </ul>-->
                                <!--</div>-->

                                <div class="paymenttabcontent">
                                    <!-- <div class="tabcontentone">

                                    </div> -->
                                    <div class="tabcontentwo">
                                       
                                        <div class="paymentviewflex">
                                            <h5>Your Deposit Account</h5>
                                            <div class="paymentbtnview">
                                                <!--<button type="button" class="paymentbtn removebtn" data-toggle="modal" data-target="#exampleModal">-->
                                                <!--    <i class="fa fa-trash" aria-hidden="true"></i> Remove Bank</button>-->
                                               
                                            </div>
                                        </div>
                                       
                                        <form method="POST" action="{{ url('doctor/bank-details')}}">
                                            @csrf
                                            
                                        <input type="hidden" name="id" value="{{ base64_encode($bk->id) }}"/>
                                        <div class="paymentviewitem">
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <!--<p>Wells Fargo</p>-->
                                                <input name="bank_name" value="{{ $bk->bank_name }}"  class="form-control"/>
                                                <span class="text-danger">{{ $errors->first('bank_name')}}</span>
                                            </div>

                                            <div class="form-group">
                                                <label>Routing</label>
                                                  <input name="routing" value="{{ $bk->routing }}"  class="form-control" id="routing"/>
                                                  <span class="text-danger">{{ $errors->first('routing')}}</span>
                                            </div>

                                            <div class="form-group">
                                                <label>Account</label>
                                                 <input name="account_number"  value="{{ $bk->account_number }}" class="form-control" id="account_number"/>
                                                 <span class="text-danger">{{ $errors->first('account_number')}}</span>
                                            </div>
                                            
                                            <button class="btn btn-success" type="submit">Submit</button>
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

           
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">

         <h5>Do you want to delete this bank account ?</h5>

         <ul>
            <li>
                <button type="button" class="paymentbtn removebtn modalbtn" >Yes, Delete</button>
            </li>
            <li>
                <button type="button" class="paymentbtn removebtn modalbtn" data-dismiss="modal">Cancel</button>
            </li>
         </ul>

        </div>
      </div>
    </div>
  </div>


 <!-- JS, Popper.js, and jQuery -->
    <script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
    <script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/doctor/js/validate.js') }}"></script>
    
    
    
<script>
    $(document).ready(function(){
        var literal = {
            routing:{selector:$('#routing'),from:{value:9,message:'Routing number should be 9 digits'}}
        }
       var result =  $.validate.rules(literal,{mode:'bootstrap'});
         console.log('okkkkkkkkkkk',result);
         
         
    })
</script>

    

@endsection
