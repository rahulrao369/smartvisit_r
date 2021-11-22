@extends('admin::layouts.master')
@section('content')
<style type="text/css">
    .caret_green{
    width: 15px;
    height: 15px;
    background: #28a745;
    display: inline-block;
    border-bottom: 8px solid #28a745;
    border-right: 8px solid #fff;
    border-left: 8px solid #fff;
    margin-right: 8px;
}

.caret_red{
    width: 15px;
    height: 15px;
    background: #dc3545;
    display: inline-block;
    border-bottom: 8px solid #dc3545;
    border-right: 8px solid #fff;
    border-left: 8px solid #fff;
    margin-right: 8px;
}
</style>
<body class="theme-orange">

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-light.svg" width="48" height="48" alt="HexaBit"></div>
        <p>Please wait...</p>        
    </div>
</div> -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">
@include('admin::partials.navbar')
@include('admin::partials.sidebar')
    

    

    

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ isset($page_title) ? $page_title:""}}</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a></li>
                        <!-- <li class="breadcrumb-item">Forms</li> -->
                        <li class="breadcrumb-item active">{{ isset($page_title) ? $page_title:""}}</li>
                    </ul>
                <!--     <a href="javascript:void(0);" class="btn btn-sm btn-primary" title=""  data-toggle="modal" data-target="#exampleModal">Create New</a> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-12">

                    <div class="card">
                        <div class="header">
                            <h2></h2>
                                <!--<a href="javascript:void(0);" class="btn btn-sm btn-primary pull-right" title=""  data-toggle="modal" data-target="#exampleModal">Add Stock</a>-->
                        </div>

                        <div class="col-sm-12">
                             @if(Session()->has('failed'))
    	                     <p class="alert alert-danger text-center">{{ Session()->get('failed')}}</p>
    	                     @endif
                        </div>


                        <div class="body">
                            
                          <h6 class="ml-3 b">User Information</h6>
                           <div class="col-sm-12 d-flex justify-content-center">
                               <table class="table table-striped border col-sm-12">
                                   <tr>
                                       <th>Client Name</th>
                                       <td>{{ $client->name }}</td>
                                      
                                   <!--</tr>-->
                                   <!--<tr>-->
                                       <th>Client Email</th>
                                       <td>{{ $client->email }}</td>
                                  <!--</tr>-->
                                  <!-- <tr>-->
                                       <th>Client Phone</th>
                                       <td>{{ $client->phone }}</td>
                                  <!--</tr>-->

                                  <!-- <tr>-->
                                       <th>Client Address</th>
                                       <td>{{ $client->address }}</td>
                                  </tr>
                               </table>
                           </div>
                           
                           
                           
                           <div class="col-sm-12">
                               <h6 class="b">Stock Information</h6>
                               <table class="table table-striped border col-sm-12">
                                   <input type="hidden" value="{{ base64_encode($stock->product->id) }}" id="s_product_id"/>
                                   <input type="hidden" value="{{ base64_encode($stock->id) }}" id="stock_id"/>
                                   
                                   <!--if status is closed-->
                                   @if($stock->status==2)
                                   
                                      <tr>
                                       <th>Stock item</th>
                                       <td>{{ $stock->product->name }}</td>
                                      
                                   <!--</tr>-->
                                   <!--<tr>-->
                                       <th>Quantity</th>
                                       <?php
                                       
                                            $quantity =0;
                                          
                                            foreach($buying_data as $row){
                                                $quantity+= $row->quantity;
                                              
                                            }
                                            
                                       ?>
                                       <td>{{ $quantity }}</td>
                                  <!--</tr>-->
                                  <!-- <tr>-->
                                  
                                       <th>Average Buying price</th>
                                       <?php 
                                       
                                        //  $avg_price =  ( $stock_history->first()->quantity) ?  $stock_history->first()->invested_amount/ $stock_history->first()->quantity :0;
                                        
                                            $quantity =0;
                                            $totalInvestedAmount = 0;
                                            foreach($buying_data as $row){
                                                $quantity+= $row->quantity;
                                                $totalInvestedAmount+= $row->invested_amount;
                                            }
                                            
                                            
                                            $avgBuyPrice = $totalInvestedAmount/$quantity;
                                            
        
                                       ?>
                                       <td>{{ number_format($avgBuyPrice,2) }}</td>
                                       
                                       
                                       
                                       
                                   
                                       <th>Invested amount</th>
                                         
                                         
                                       <?php
                                       
                                            $totalInvestedAmount =0;
                                          
                                            foreach($buying_data as $row){
                                                $totalInvestedAmount+= $row->buying_price*$row->quantity;
                                              
                                            }
                                            
                                       ?>
                                       
                                       
                                        <td>{{ number_format( $totalInvestedAmount,2) }}</td>
                                  </tr>
                                  
                                  
                                  
                                   <tr>
                                     
                                     
                                       <!--<th>Sell value</th>-->
                                       <!--<td>{{ number_format($selling_value,2 )  }}</td>-->
                                  <!--</tr>-->

                                  <!-- <tr>-->
                                       <th>Profit</th>
                                       <?php
                                        // $current_value       = $stock->product->current_price * $stock->quantity;
                                        // $totalInvestedAmount = $stock->buying_price * $stock->quantity;
                                        
                                        // $profitAmount = $current_value - $totalInvestedAmount;
                                        
                                        // $profitPercentage = ($profitAmount) ? $profitAmount / $current_value*100:0;
                                        
                                       $profileAmount =  $selling_value - $stock_history->first()->invested_amount;
                                       
                                       $netProfile = $profileAmount/$selling_value*100;
                                        
                                       ?>
                                       <td>{{ 
                                         number_format($profileAmount,2)
                                       }}</td>
                                       
                                       
                                        <th>Profit(%)</th>
                                       <?php
                                        // $current_value       = $stock->product->current_price * $stock->quantity;
                                        // $totalInvestedAmount = $stock->buying_price * $stock->quantity;
                                        
                                        // $profitAmount = $current_value - $totalInvestedAmount;
                                        
                                        // $profitPercentage = ($profitAmount) ? $profitAmount / $current_value*100:0;
                                        
                                       ?>
                                       <td>{{number_format($netProfile,2)}}%</td>
                                       
                                       <th>Status</th>
                                        <td><button  class="btn btn-warning btn-sm">Closed</button></td>
                                        
                                        
                                        
                                         <th></th>
                                        <td  class=""></td>
                                        
                                        
                                        
                                       
                                  </tr>
                                  
                                  
                               
                                  <!-- <tr>-->
                                       <!-- @if($stock->quantity != 0)-->
                                       <!--<td colspan="10" class="text-center"><a href="javascript:void(0)" class="btn btn-info mr-2" id="buy_stock">Buy</a>-->
                                       <!--<td>{{ number_format($stock->product->current_price * $stock->quantity,2) }}</td>-->
                                      
                                  
                                       <!--<a href="javascript:void(0)" class="btn btn-warning ml-2" id="sell_stock">Sell</a></td>-->
                                       <!--<td>{{ ($stock->sell_price!=0) ? number_format($stock->sell_price,2):'-' }}</td>-->
                                       <!--@else-->
                                  <!--     <td colspan="10" class="text-center"><p class="btn btn-warning ml-2">Closed</p></td>-->
                                       <!--@endif-->
                                 
                                  <!--</tr>-->
                                  
                                  
                                   @else
                                   <tr>
                                       <th>Stock item</th>
                                       <td>{{ $stock->product->name }}</td>
                                      
                                   <!--</tr>-->
                                   <!--<tr>-->
                                       <th>Quantity</th>
                                       <td>{{ $stock->quantity }}</td>
                                  <!--</tr>-->
                                  <!-- <tr>-->
                                  
                                       <th>Buying Average price</th>
                                       <?php 
                                       
                                         $avg_price =  ($stock->quantity) ? $stock->invested_amount/$stock->quantity :0;
                                       ?>
                                       <td>{{ number_format($avg_price,2) }}</td>
                                       
                                       
                                       <th>Current price</th>
                                       <td>{{ number_format($stock->product->current_price,2) }}</td>
                                       
                                       
                                      
                                  <!--</tr>-->

                                  <!-- <tr>-->
                                       <th>Invested amount</th>
                                       <!--<td>{{ number_format($stock->buying_price * $stock->quantity,2) }}</td>-->
                                        <td>{{ number_format($stock->invested_amount,2) }}</td>
                                  </tr>
                                  
                                  
                                  
                                   <tr>
                                       <th>Current value</th>
                                       <td>{{ number_format($stock->product->current_price * $stock->quantity,2) }}</td>
                                      
                                   <!--</tr>-->
                                   <!--<tr>-->
                                       <th>Sell price</th>
                                       <td>{{ ($stock->sell_price!=0) ? number_format($stock->sell_price,2):'-' }}</td>
                                  <!--</tr>-->
                                  <!-- <tr>-->
                                       <th>Sell value</th>
                                       <td>{{ ($stock->sell_price!=0) ? number_format($stock->sell_price * $stock->quantity,2):'-' }}</td>
                                  <!--</tr>-->

                                  <!-- <tr>-->
                                       <th>Profit</th>
                                       <?php
                                        $current_value       = $stock->product->current_price * $stock->quantity;
                                        $totalInvestedAmount = $stock->buying_price * $stock->quantity;
                                        
                                        $profitAmount = $current_value - $totalInvestedAmount;
                                        
                                        $profitPercentage = ($profitAmount) ? $profitAmount / $current_value*100:0;
                                        
                                       ?>
                                       <td>{{ 
                                         number_format($profitAmount,2)
                                       }}</td>
                                       
                                       
                                        <th>Profit(%)</th>
                                       <?php
                                        $current_value       = $stock->product->current_price * $stock->quantity;
                                        $totalInvestedAmount = $stock->buying_price * $stock->quantity;
                                        
                                        $profitAmount = $current_value - $totalInvestedAmount;
                                        
                                        $profitPercentage = ($profitAmount) ? $profitAmount / $current_value*100:0;
                                        
                                       ?>
                                       <td>{{ number_format($profitPercentage,2) }}%</td>
                                       
                                  </tr>
                                  
                                  
                               
                                   <tr>
                                        @if($stock->quantity != 0)
                                       <td colspan="10" class="text-center"><a href="javascript:void(0)" class="btn btn-info mr-2" id="buy_stock">Buy</a>
                                       <!--<td>{{ number_format($stock->product->current_price * $stock->quantity,2) }}</td>-->
                                      
                                  
                                       <a href="javascript:void(0)" class="btn btn-warning ml-2" id="sell_stock">Sell</a></td>
                                       <!--<td>{{ ($stock->sell_price!=0) ? number_format($stock->sell_price,2):'-' }}</td>-->
                                       @else
                                       <td colspan="10" class="text-center"><p class="btn btn-warning ml-2">Closed</p></td>
                                       @endif
                                 
                                  </tr>
                                  
                                  
                                  
                                  @endif
                               </table>
                           </div>
                           
                           
                           
                           <!--table-->
                           
                            <div class="table-responsive" style="margin-top:40px;"> 
                                <table class="table table-bordered data-table-stock-detais">
                                        <thead>
                                                <tr>
                                                <th>No</th>
                                                <!--<th>Date</th>-->
                                                <th>Stock item</th>
                                                <th>Quantity</th>
                                                <th>Buy price</th>
                                                <th>Invested amount</th>
                                                <th>Current value</th>
                                                <th>Sell price</th>
                                                <th>Sell value</th>
                                                <th>Profit</th>
                                                <th>Action</th>
                                                <!--<th>Profit(%)</th>-->
                                                <!--<th>Trade end date</th>-->
                                                <!--<th>Status</th>-->
                                                <!--<th>Total</th>-->
                                                <!--<th>Profit</th>-->
                                                <!--<th>Actual Profit(%)</th>-->
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            </div>
                           
                           
                           <!--table-->



                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>






<!-- buyModel -->
<div class="modal fade" id="buyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buy Stock</h5>
        <button type="button" class="close close_buysell" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  -->


         <div class="row col-sm-12">

          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Select Client</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->


          
          <div class="form-group col-sm-8">
          <label>Buy price</label>
          <input type="number" step="1" min="1" class="form-control s_current_price" name="s_current_price" id="buy_price">
          <p class="text-danger buy_price_error"></p>
          </div>
          
          
           <div class="form-group col-sm-8">
           <label>Quantity</label>
           <input type="number"   class="form-control" name="s_quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="b_quantity" >
           <p class="text-danger"></p>
          </div>
          
           <div class="form-group col-sm-8">
           <label>Total</label>
           <input type="number"   class="form-control" name="s_quantity"   id="buy_value"  readonly="">
           <p class="text-danger"></p>
          </div>

        



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Quantity</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Quantity</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Quantity</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->


             
        </div>
        <!--  -->
      </div>
      <div class="modal-footer">
            <p class="text-danger buy_server_error"></p>
        <button type="button" class="btn btn-secondary close_buysell" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="buy_stock_button">Buy</button>
      </div>
    </div>
  </div>
</div>
<!--end buyModel   -->





<!-- sellModel -->
<div class="modal fade" id="sellModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sell Stock</h5>
        <button type="button" class="close close_buysell" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  -->


         <div class="row col-sm-12">

          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Select Client</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->



          

          <div class="form-group col-sm-8">
          <label>Sell price</label>
          <input type="number" step="1" min="1" class="form-control s_current_price" name="s_current_price" id="sell_price">
          <p class="text-danger sell_price_error"></p>
          </div>
          
          
           <div class="form-group col-sm-8">
           <label>Quantity</label>
           <input type="number"   class="form-control" name="s_quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="s_quantity">
           <p class="text-danger s_quantity_error"></p>
          </div>
          
          
           <div class="form-group col-sm-8">
           <label>Total</label>
           <input type="number"   class="form-control" name="s_quantity"   id="sell_value" readonly="" >
           <p class="text-danger"></p>
          </div>



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Quantity</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Quantity</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Quantity</label>-->
          <!-- <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >-->
          <!-- <p class="text-danger"></p>-->
          <!--</div>-->

          <!--<div class="form-group col-sm-6">-->
          <!--<label>Buying price</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="buying_price">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->


             
        </div>
        <!--  -->
      </div>
      <div class="modal-footer">
          <p class="text-danger sell_server_error"></p>
        <button type="button" class="btn btn-secondary close_buysell" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sell_stock_button">Sell</button>
      </div>
    </div>
  </div>
</div>
<!--end sellModel   -->



@endsection
<!-- <script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/parsleyjs/js/parsley.min.js"></script>
    
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
</body>

</html>
 -->