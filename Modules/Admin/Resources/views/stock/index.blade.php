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
                        <!-- <li class="breadcrumb-item">Table</li> -->
                        <li class="breadcrumb-item active">{{ isset($page_title) ? $page_title:""}}</li>
                    </ul>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" title="" data-toggle="modal" data-target="#addStockToClient">Add Stock</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    @if(Session()->has('success'))
                    <p class="alert alert-success text-center">{{ Session()->get('success')}}</p>
                    @endif

                     @if(Session()->has('failed'))
                    <p class="alert alert-danger text-center">{{ Session()->get('failed')}}</p>
                    @endif
                    <div class="card">
                        <!-- <div class="header">
                            <h2>Add Row</h2>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>                       
                        </div> -->
                        <div class="body">
                           <!--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                                <i class="icon wb-plus" aria-hidden="true"></i> Add row
                            </button> -->
                            <div class="table-responsive">
                                <table class="table table-bordered data-table-stock">
                                        <thead>
                                                <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Client name</th>
                                                <th>Stock item</th>
                                                <th>Quantity</th>
                                                <th>Average Buying price</th>
                                                <th>Invested amount</th>
                                                <th>Current price</th>
                                                <th>Current value</th>
                                                <!--<th>Sell price (Avg)</th>-->
                                                <!--<th>Sell value</th>-->
                                                <th>Profit</th>
                                                <th>Profit(%)</th>
                                                <th>Trade end date</th>
                                                <th>Action</th>
                                                <!--<th>Total</th>-->
                                                <!--<th>Profit</th>-->
                                                <!--<th>Actual Profit(%)</th>-->
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>


<!-- Modal -->
<div class="modal fade" id="addStockToClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
        <button type="button" class="close addStockClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  -->


         <div class="row col-sm-12">

           <div class="form-group col-sm-12">
           <label>Select Client</label>
            <select class="form-control" name="client" id="client">
              <option value=""  selected="">-select-</option>
              @if(count($clients))
              @foreach($clients as $row)
               <option value="{{ $row->id }}">{{ $row->name}}</option>
              @endforeach
              @endif
            </select>
           <p class="text-danger client-error"></p>
          </div>

          <div class="form-group col-sm-6">
          <label>Date</label>
          <input type="text"  class="form-control" name="date" id="st-date">
          <p class="text-danger st-date-error"></p>
          </div>



          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Trade end date</label>-->
          <!-- <input type="text"   class="form-control" name="trade-end-date" id="st-trade-end" >-->
          <!-- <p class="text-danger st-end-error"></p>-->
          <!--</div>-->

          <div class="form-group col-sm-6">
          <label>Stock item</label>
          <select class="form-control" name="stock_item" id="stock_item">
              <option value="" selected="">-select-</option>
              @if(count($stocks))
              @foreach($stocks as $row)
               <option value="{{ $row->id }}">{{ $row->name}}</option>
              @endforeach
              @endif
          </select>
          <p class="text-danger stock_item-error"></p>
          </div>

          
          <div class="form-group col-sm-6">
           <label>Quantity</label>
           <input type="number"   class="form-control getValue" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="st-quantity">
           <p class="text-danger quantity-error"></p>
          </div>
          
          
          <div class="form-group col-sm-6">
          <label>Buying price</label>
          <input type="number" step="1" min="1" class="form-control getValue"
           name="buying_price" id="buying_price">
          <p class="text-danger buying_price-error"></p>
          </div>
          

          


            <div class="form-group col-sm-6">
           <label>Current price</label>
           <input type="number"   class="form-control" name="quantity" step="2" id="current_price" readonly=""> 
           <!--<p class="text-danger selling_price-error"></p>-->
          </div>
          

       
        <!--<div class="form-group col-sm-6">-->
        <!--   <label>Current price</label>-->
        <!--   <input type="number"   class="form-control" name="current_price" step="2" id="current_price"> -->
        <!--   <p class="text-danger current_price_error"></p>-->
        <!--  </div>-->
          
          
           <div class="form-group col-sm-6">
           <label>Invested amount</label>
           <input type="number"   class="form-control" name="invested_amount" step="2" id="invested_amount" readonly=""> 
           <p class="text-danger invested_amount_error"></p>
          </div>

          <!--<div class="form-group col-sm-6">-->
          <!-- <label>Selling price</label>-->
          <!-- <input type="number"   class="form-control" name="quantity" step="2" id="selling_price"> -->
          <!-- <p class="text-danger selling_price-error"></p>-->
          <!--</div>-->
          
          

          <!--<div class="form-group col-sm-6" style="margin-right:auto; margin-left:auto;">-->
          <!--<label  style="margin-right:auto; margin-left:auto;">Total amount</label>-->
          <!--<input type="number" step="1" min="1" class="form-control" name="total" readonly="" id="st_total_amount">-->
          <!--<p class="text-danger"></p>-->
          <!--</div>-->




          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Profit Amount</label>-->
          <!-- <input type="number"   class="form-control" name="profit" step="2" id="stprofit" readonly=""> -->
           <!-- <p class="text-danger selling_price-error"></p> -->
          <!--</div>-->


          <!-- <div class="form-group col-sm-6">-->
          <!-- <label>Profit(%)</label>-->
          <!-- <input type="number"   class="form-control" name="profit" step="2" id="stprofitper" readonly=""> -->
           <!-- <p class="text-danger selling_price-error"></p> -->
          <!--</div>-->


          <!-- <div class="form-group col-sm-6">
          <label>Total amount</label>
          <input type="number" step="1" min="1" class="form-control" name="total" readonly="" id="st_total_amount">
          <p class="text-danger"></p>
          </div> -->



          


             
        </div>
        <!--  -->

      </div>
      <div class="modal-footer">
         <p class="mr-3 text-danger font-weight-bold server-error"> </p>
        <button type="button" class="btn btn-secondary addStockClose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-stock-to-client">Add</button>
      </div>
    </div>
  </div>
</div>
<!--end Model for add quantity  -->




@endsection
