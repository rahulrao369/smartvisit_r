@extends('admin::layouts.master')
@section('content')
<style type="text/css">
  .field-icon {
/*  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;*/
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
                               <!--  <a href="javascript:void(0);" class="btn btn-sm btn-primary pull-right" title=""  data-toggle="modal" data-target="#exampleModal">Add Stock</a> -->
                        </div>

                        <div class="col-sm-12">
                             @if(Session()->has('failed'))
    	                     <p class="alert alert-danger text-center">{{ Session()->get('failed')}}</p>
    	                     @endif
                        </div>


                        <div class="body">
                         
                           <div class="col-sm-12 d-flex justify-content-center">
                               <table class="table table-striped border col-sm-4">
                                   <tr>
                                       <th>Client Name</th>
                                       <td>{{ $client->name }}</td>
                                      
                                   </tr>
                                   <tr>
                                       <th>Client Email</th>
                                       <td>{{ $client->email }}</td>
                                  </tr>
                                   <tr>
                                       <th>Client Phone</th>
                                       <td>{{ $client->phone }}</td>
                                  </tr>

                                   <tr>
                                       <th>Client Address</th>
                                       <td>{{ $client->address }}</td>
                                  </tr>
                                  
                                  @if($client->random_password !=null)
                                  <tr>
                                       <th>Password</th>
                                       <td><input type="password" name="" value="{{ base64_decode($client->random_password) }}" readonly="" style="
                                       border: none; 
                                       outline: none; 
                                       background: transparent;
                                        cursor: pointer;
                                       /*cursor: not-allowed;*/
                                       /*pointer-events: all !important;" */
                                        id="clientPassword">
                                     <input type="checkbox" onclick="myFunction();">Show Password</span></td>
                                  </tr>
                                  @endif
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  -->


         <div class="row col-sm-12">

           <div class="form-group col-sm-6">
           <label>Select Client</label>
           <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
           <p class="text-danger"></p>
          </div>

          <div class="form-group col-sm-6">
          <label>Buying price</label>
          <input type="number" step="1" min="1" class="form-control" name="buying_price">
          <p class="text-danger"></p>
          </div>



           <div class="form-group col-sm-6">
           <label>Quantity</label>
           <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
           <p class="text-danger"></p>
          </div>

          <div class="form-group col-sm-6">
          <label>Buying price</label>
          <input type="number" step="1" min="1" class="form-control" name="buying_price">
          <p class="text-danger"></p>
          </div>



           <div class="form-group col-sm-6">
           <label>Quantity</label>
           <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
           <p class="text-danger"></p>
          </div>

          <div class="form-group col-sm-6">
          <label>Buying price</label>
          <input type="number" step="1" min="1" class="form-control" name="buying_price">
          <p class="text-danger"></p>
          </div>



           <div class="form-group col-sm-6">
           <label>Quantity</label>
           <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
           <p class="text-danger"></p>
          </div>

          <div class="form-group col-sm-6">
          <label>Buying price</label>
          <input type="number" step="1" min="1" class="form-control" name="buying_price">
          <p class="text-danger"></p>
          </div>



           <div class="form-group col-sm-6">
           <label>Quantity</label>
           <input type="number"   class="form-control" name="quantity"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
           <p class="text-danger"></p>
          </div>

          <div class="form-group col-sm-6">
          <label>Buying price</label>
          <input type="number" step="1" min="1" class="form-control" name="buying_price">
          <p class="text-danger"></p>
          </div>


             
        </div>
        <!--  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
<!--end Model for add quantity  -->






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