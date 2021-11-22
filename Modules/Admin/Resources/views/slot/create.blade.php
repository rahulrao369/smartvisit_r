@extends('admin::layouts.master')
@section('content')
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
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
                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-12">

                    <div class="card">
                        <div class="header">
                            <h2></h2>
                        </div>

                        <div class="col-sm-12">
                             @if(Session()->has('failed'))
    	                     <p class="alert alert-danger text-center">{{ Session()->get('failed')}}</p>
    	                     @endif
    	                     
    	                     @if(Session()->has('name_exist'))
    	                     <p class="alert alert-danger text-center">{{ Session()->get('name_exist')}}</p>
    	                     @endif
    	                     
    	                     
                        </div>


                        <div class="body">
                            <form id="basic-form" method="post" action="{{ url('admin/slot-store')}}" novalidate>
                               @csrf


                                <div class="row col-sm-12">

                                    <div class="form-group col-sm-3">
                                        <label>Start time</label>
                                        <!--<input type="number" class="form-control" name="name" value="{{ old('name')}}" autocomplete="off">-->
                                        <select class="form-control" name="start_time">
                                                <option value="1">01:00</option>
                                                <option value="2">02:00</option>
                                                <option value="3">03:00</option>
                                                <option value="4">04:00</option>
                                                <option value="5">05:00</option>
                                                <option value="6">06:00</option>
                                                <option value="7">07:00</option>
                                                <option value="8">08:00</option>
                                                <option value="9">09:00</option>
                                                <option value="10">10:00</option>
                                                <option value="11">11:00</option>
                                                <option value="12">12:00</option>
                                        </select>
                                        
                                        @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                        @endif
                                    </div>
                                    
                                    
                                     <div class="form-group col-sm-3">
                                        <label>AM/PM</label>
                                        <!--<input type="text" class="form-control" name="name" value="{{ old('name')}}">-->
                                          <select class="form-control" name="start_am_pm">
                                            <option value="am">am</option>
                                            <option value="pm">pm</option>
                                        </select>
                                        @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    
                                    
                                     <div class="form-group col-sm-3">
                                        <label>End time</label>
                                        <!--<input type="number" class="form-control" name="name" value="{{ old('name')}}" autocomplete="off">-->
                                               <select class="form-control" name="end_time">
                                               <option value="1">01:00</option>
                                                <option value="2">02:00</option>
                                                <option value="3">03:00</option>
                                                <option value="4">04:00</option>
                                                <option value="5">05:00</option>
                                                <option value="6">06:00</option>
                                                <option value="7">07:00</option>
                                                <option value="8">08:00</option>
                                                <option value="9">09:00</option>
                                                <option value="10">10:00</option>
                                                <option value="11">11:00</option>
                                                <option value="12">12:00</option>
                                                </select>
                                        @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                        @endif
                                    </div>
                                    
                                    
                                    
                                     <div class="form-group col-sm-3">
                                        <label>AM/PM</label>
                                        <select class="form-control" name="end_am_pm">
                                            <option value="am">am</option>
                                            <option value="pm">pm</option>
                                        </select>
                                        @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('end_am_pm') }}</p>
                                        @endif
                                    </div>


                                    <!--<div class="form-group col-sm-6">-->
                                    <!--    <label>Email</label>-->
                                    <!--    <input type="text" class="form-control" name="email" value="{{ old('email')}}">-->
                                    <!--    @if($errors->has('email'))-->
                                    <!--    <p class="text-danger">{{ $errors->first('email') }}</p>-->
                                    <!--    @endif-->
                                    <!--</div>-->


                                    

                                </div>




                               

                                
                                

                               
                               
                              
                               
                               
                                <br>

                                <button type="submit" class="btn btn-primary ml-3">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

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