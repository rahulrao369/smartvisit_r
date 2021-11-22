@extends('patient.layouts.default')
@section('content')

@include('patient.partials.navbar')
        
    
    <div class="row justify-content-center">
        
    <div class="col-sm-5 col-md-5">
        
        <form role="form" action="{{url('patient/payment')}}"  id="payment-form"  method="POST"  class="form-horizontal require-validation">
            @csrf
            <div class="row">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-8 col-sm-8">
            <p style="text-align: center; font-size: 20px; margin-top: 0; margin-bottom: 15px;"> Amount</p>
            <h4 style="text-align: center; font-size: 25px; font-weight: 800; margin-bottom: 20px;"> $ {{ $amount }}</h4>
            <input style="display: block; margin: auto; max-width: 500px;  margin-bottom: 40px;" type="hidden" value="{{$amount}}" name="amount" class="form-control" placeholder="Enter the Amount" readonly required>
            </div>
            <div class="col-md-2 col-sm-2"></div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="round-box form-group">
            <label style="display: block; text-align: left; margin-left: 10px; font-size: 18px !important; color: #565454;">Card : <span>*</span></label>
            <div class="input-group">
            <!--<span class="input-group-addon">-->
            <!--    <i class="fa fa-cc-visa"></i>-->
            <!--    </span>-->
            <input type="text" data-stripe="number" class="form-control card-number" requi#febe42 name="cardnumber" maxlength="16" minlength="16" placeholder="Card number"  value="<?php if(isset($card_detail->cardnumber)){ echo $card_detail->cardnumber; }?>">
            </div>
            </div>
            </div>
            
            <div class="col-md-12">
            <div class="round-box form-group">
            <label style="display: block; text-align: left; margin-left: 10px; font-size: 18px !important; color: #565454;">Expiry - Date : <span>*</span></label>
            <div class="input-group">
            <!--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
            <select class="form-control card-expiry-month round-btn" name="month" data-stripe="exp_month" requi#febe42 >
            <option>Month</option>
            <option value="01" <?php if(isset($card_detail->month) && $card_detail->month=="01"){ echo "selected"; }?> >Jan (01)</option>
            <option value="02" <?php if(isset($card_detail->month) && $card_detail->month=="02"){ echo "selected"; }?>>Feb (02)</option>
            <option value="03" <?php if(isset($card_detail->month) && $card_detail->month=="03"){ echo "selected"; }?>>Mar (03)</option>
            <option value="04" <?php if(isset($card_detail->month) && $card_detail->month=="04"){ echo "selected"; }?>>Apr (04)</option>
            <option value="05" <?php if(isset($card_detail->month) && $card_detail->month=="05"){ echo "selected"; }?>>May (05)</option>
            <option value="06" <?php if(isset($card_detail->month) && $card_detail->month=="06"){ echo "selected"; }?>>June (06)</option>
            <option value="07" <?php if(isset($card_detail->month) && $card_detail->month=="07"){ echo "selected"; }?>>July (07)</option>
            <option value="08" <?php if(isset($card_detail->month) && $card_detail->month=="08"){ echo "selected"; }?>>Aug (08)</option>
            <option value="09" <?php if(isset($card_detail->month) && $card_detail->month=="09"){ echo "selected"; }?>>Sep (09)</option>
            <option value="10" <?php if(isset($card_detail->month) && $card_detail->month=="10"){ echo "selected"; }?>>Oct (10)</option>
            <option value="11" <?php if(isset($card_detail->month) && $card_detail->month=="11"){ echo "selected"; }?>>Nov (11)</option>
            <option value="12" <?php if(isset($card_detail->month) && $card_detail->month=="12"){ echo "selected"; }?>>Dec (12)</option>
            </select>
            </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="round-box form-group">
            <label style="display: block; text-align: left; margin-left: 10px; font-size: 18px !important; color: #565454;">Expiry - year : <span>*</span></label>
            <div class="input-group">
            <!--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
            <select class="form-control card-expiry-year" data-stripe="exp_year" name="year" requi#febe42>
            <option value="">Year</option>
            <option value="20" <?php if(isset($card_detail->year) && $card_detail->year=="20"){ echo "selected"; }?>>2020</option>
            <option value="21" <?php if(isset($card_detail->year) && $card_detail->year=="21"){ echo "selected"; }?>>2021</option>
            <option value="22" <?php if(isset($card_detail->year) && $card_detail->year=="22"){ echo "selected"; }?>>2022</option>
            <option value="23" <?php if(isset($card_detail->year) && $card_detail->year=="23"){ echo "selected"; }?>>2023</option>
            <option value="24" <?php if(isset($card_detail->year) && $card_detail->year=="24"){ echo "selected"; }?>>2024</option>
            <option value="25" <?php if(isset($card_detail->year) && $card_detail->year=="25"){ echo "selected"; }?>>2025</option>
            <option value="26" <?php if(isset($card_detail->year) && $card_detail->year=="26"){ echo "selected"; }?>>2026</option>
            <option value="27" <?php if(isset($card_detail->year) && $card_detail->year=="27"){ echo "selected"; }?>>2027</option>
            <option value="28" <?php if(isset($card_detail->year) && $card_detail->year=="28"){ echo "selected"; }?>>2028</option>
            <option value="29" <?php if(isset($card_detail->year) && $card_detail->year=="29"){ echo "selected"; }?>>2029</option>
            <option value="30" <?php if(isset($card_detail->year) && $card_detail->year=="30"){ echo "selected"; }?>>2030</option>
            </select>
            </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="round-box form-group">
            <label style="display: block; text-align: left; margin-left: 10px; font-size: 18px !important; color: #565454;">CVV: <span>*</span></label>
            <div class="input-group">
            <!--<span class="input-group-addon"><i class="fa fa-puzzle-piece"></i></span>-->
            <input type="text"  requi#febe42 class="form-control card-cvc" maxlength="3" id="inputPassword3" name="cvv" placeholder=" CVV " data-stripe="cvc" required>
            </div>
            </div>
            </div>
            </div>
            <div class="payment-errors" style="color:#febe42;"></div>
            <br>
            <input type="hidden" name="payment" value="payment">
            <input type="hidden" name="ttid"  value="{{ $ttid }}">
            
            <input type="hidden" name="nethod" value="charge">
            <center> <input style="background: #a9e530 !important; font-weight: 400;" class="btn btn-raised btn-info gr cnfrmOrder" name="bookingSubmit" value="Submit" type="submit"> </center>
            </div>
            </div>
            <!--<button type='butt' name="submit" value="pay" class="btn btn-raised btn-info gr">Submit</bitton>-->
            </div>
            <!-- end col -->
            </div>
    </form>
 </div>
 
    </div>
    
<style>
.form-horizontal{
    background: #fff;
    padding: 35px 40px;
    margin: 80px 0px;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- TO DO : Place below JS code in js file and include that JS file -->
<script type="text/javascript">
   Stripe.setPublishableKey("{{ env('STRIPE_KEY')}}");
     
   $(function() {
   //	alert("fdesw");
   	var $form = $('#payment-form');
   	
   	$form.submit(function(event) {
   		// Disable the submit button to prevent repeated clicks:
   		$form.find('.submit').prop('disabled', true);
   
   		// Request a token from Stripe:
   		Stripe.card.createToken($form, stripeResponseHandler);
              
   		// Prevent the form from being submitted:
   		return false;
   	});
   });
   
   function stripeResponseHandler(status, response) {
   	// Grab the form:
   	var $form = $('#payment-form');
   
   	if (response.error) { // Problem!
              //alert(response.error.message);
   		// Show the errors on the form:
   		$form.find('.payment-errors').text(response.error.message);
   		$form.find('.submit').prop('disabled', false); // Re-enable submission
   
   	} else { // Token was created!
   
   		// Get the token ID:
   		var token = response.id;
              
   		// Insert the token ID into the form so it gets submitted to the server:
   		$form.append($('<input type="hidden" name="stripeToken">').val(token));
             // alert($form.get(0));
   		// Submit the form:
   		//$('#payment-form').submit();
   		$form.get(0).submit();
   		
   		//return false ;
   	}
   };
</script> 
<script>
   $("label").click(function(){
   $(this).parent().find("label").css({"background-color": "rgb(160, 164, 165)"});
   $(this).css({"background-color": "#febe42"});
   $(this).nextAll().css({"background-color": "#febe42"});
   });
   $(".star label").click(function(){
   $(this).parent().find("label").css({"color": "rgb(160, 164, 165)"});
   $(this).css({"color": "#febe42"});
   $(this).nextAll().css({"color": "#febe42"});
   $(this).css({"background-color": "transparent"});
   $(this).nextAll().css({"background-color": "transparent"});
   });



   
</script>
         
<!--    </body>-->
<!--</html>-->

@endsection


