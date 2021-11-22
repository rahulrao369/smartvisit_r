@extends('admin::layouts.master') @section('content')

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
    <div id="wrapper">@include('admin::partials.navbar') @include('admin::partials.sidebar')
        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>{{ isset($page_title) ? $page_title:""}}</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i></a>
                            </li>
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
                        <div class="">
                            <div class="header">
                                <h2></h2>
                            </div>
                            <div class="col-sm-12">@if(Session()->has('failed'))
                                <p class="alert alert-danger text-center">{{ Session()->get('failed')}}</p>@endif</div>
                            <div class="body">
                                <form id="basic-form" method="post" action="{{ url('admin/doctor/store')}}" novalidate>@csrf

                                    <div class="card p-3">
                                    <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}">@if($errors->has('first_name'))
                                            <p class="text-danger">{{ $errors->first('first_name') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}">@if($errors->has('last_name'))
                                            <p class="text-danger">{{ $errors->first('last_name') }}</p>@endif</div>

                                            <div class="form-group col-sm-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ old('email')}}" id="email">@if($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>@endif</div>
                                    </div>
                                    <div class="row col-sm-12">
                                        
                                        <div class="form-group col-sm-4">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" name="phone" value="{{ old('phone')}}" id="phone">@if($errors->has('phone'))
                                            <p class="text-danger">{{ $errors->first('phone') }}</p>@endif</div>


                                            <div class="form-group col-sm-4">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password')}}" id="password">@if($errors->has('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>@endif</div>
                                    </div>

                                </div>


                           <!--      <div class="card p-3">
                                  <div class="form-group col-sm-4">
                                   <h6>Mailing address</h6>
                                  </div>

                                   <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" name="office_first_name" value="{{ old('office_first_name')}}" id="office_first_name">@if($errors->has('office_first_name'))
                                            <p class="text-danger">{{ $errors->first('office_first_name') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" name="office_last_name" value="{{ old('office_last_name')}}" id="office_last_name">@if($errors->has('office_last_name'))
                                            <p class="text-danger">{{ $errors->first('office_last_name') }}</p>@endif</div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="office_email" value="{{ old('office_email')}}" id="office_email">@if($errors->has('office_email'))
                                            <p class="text-danger">{{ $errors->first('office_email') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" name="office_phone" value="{{ old('office_phone')}}" id="office_phone">@if($errors->has('office_phone'))
                                            <p class="text-danger">{{ $errors->first('office_phone') }}</p>@endif</div>
                                    </div>

                                     <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Address 1</label>
                                            <input type="text" class="form-control" name="office_address_1" value="{{ old('office_address_1')}}" id="office_address_1">@if($errors->has('office_address_1'))
                                            <p class="text-danger">{{ $errors->first('office_address_1') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" name="office_address_2" value="{{ old('office_address_2')}}" id="office_address_2">@if($errors->has('office_address_2'))
                                            <p class="text-danger">{{ $errors->first('office_address_2') }}</p>@endif</div>
                                    </div>

                                     <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="office_city" value="{{ old('office_city')}}" id="office_city">@if($errors->has('office_city'))
                                            <p class="text-danger">{{ $errors->first('office_city') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Zipcode</label>
                                            <input type="text" class="form-control" name="office_zip_code" value="{{ old('office_zip_code')}}" id="office_zip_code">@if($errors->has('office_zip_code'))
                                            <p class="text-danger">{{ $errors->first('office_zip_code') }}</p>@endif</div>
                                    </div>


                                     <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="office_country" value="{{ old('office_country')}}" id="office_country">@if($errors->has('office_country'))
                                            <p class="text-danger">{{ $errors->first('office_country') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="office_state" value="{{ old('office_state')}}" id="office_state">@if($errors->has('office_state'))
                                            <p class="text-danger">{{ $errors->first('office_state') }}</p>@endif</div>
                                    </div>

                                </div>
 -->







                                <!--   <div class="card p-3">
                                  <div class="form-group col-sm-4">
                                   <h6>Mailing address</h6>
                                  

                                   <label class="checkbox-inline">
                                      <input type="checkbox" value="" id="sameAddress">&nbsp;Same as Residence Address
                                    </label>

                                  </div>

                                   <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" name="residence_first_name" value="{{ old('residence_first_name')}}" id="residence_first_name">@if($errors->has('residence_first_name'))
                                            <p class="text-danger">{{ $errors->first('residence_first_name') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" name="residence_last_name" value="{{ old('residence_last_name')}}" id="residence_last_name">@if($errors->has('residence_last_name'))
                                            <p class="text-danger">{{ $errors->first('residence_last_name') }}</p>@endif</div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="residence_email" value="{{ old('residence_email')}}" id="residence_email">@if($errors->has('residence_email'))
                                            <p class="text-danger">{{ $errors->first('residence_email') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" name="residence_phone" value="{{ old('residence_phone')}}" id="residence_phone">@if($errors->has('residence_phone'))
                                            <p class="text-danger">{{ $errors->first('residence_phone') }}</p>@endif</div>
                                    </div>

                                     <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Address 1</label>
                                            <input type="text" class="form-control" name="residence_address_1" value="{{ old('residence_address_1')}}" id="residence_address_1">@if($errors->has('residence_address_1'))
                                            <p class="text-danger">{{ $errors->first('residence_address_1') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control" name="residence_address_2" value="{{ old('residence_address_2')}}" id="residence_address_2">@if($errors->has('residence_address_2'))
                                            <p class="text-danger">{{ $errors->first('residence_address_2') }}</p>@endif</div>
                                    </div>

                                     <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="residence_city" value="{{ old('residence_city')}}" id="residence_city">@if($errors->has('residence_city'))
                                            <p class="text-danger">{{ $errors->first('residence_city') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>Zipcode</label>
                                            <input type="number" class="form-control" name="residence_zip_code" value="{{ old('residence_zip_code')}}" id="residence_zip_code">@if($errors->has('residence_zip_code'))
                                            <p class="text-danger">{{ $errors->first('residence_zip_code') }}</p>@endif</div>
                                    </div>


                                     <div class="row col-sm-12">
                                        <div class="form-group col-sm-4">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="residence_country" value="{{ old('residence_country')}}" id="residence_country">@if($errors->has('residence_country'))
                                            <p class="text-danger">{{ $errors->first('residence_country') }}</p>@endif</div>
                                        <div class="form-group col-sm-4">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="residence_state" value="{{ old('residence_state')}}" id="residence_state">@if($errors->has('residence_state'))
                                            <p class="text-danger">{{ $errors->first('residence_state') }}</p>@endif</div>
                                    </div>
                                </div> -->
                                    <br>
                                    <button type="submit" class="btn btn-primary ml-3">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>@endsection
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