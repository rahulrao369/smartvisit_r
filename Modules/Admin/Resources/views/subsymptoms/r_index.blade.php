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
                    <!--<a href="{{ url('admin/create-subsymptoms-category')}}" class="btn btn-sm btn-primary" >Create symptoms category</a>-->
                    
                    <a href="{{ url('admin/create-subsymptoms/'.$id)}}" class="btn btn-sm btn-primary" >Create symptoms</a>
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
                                <table class="table table-bordered data-table-extra-symptoms">
                                        <thead>
                                                <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                              
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- extra reason -->
<script type="text/javascript">
  $(document).ready(function(){

   $.ajaxSetup({
         headers:{
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
   });

  //initalize table

  var table = $('.data-table-extra-symptoms').DataTable({
    processing:true,
    serverSide:true,
    ajax:"{{ url('admin/extra-subsymptoms/'.$id)}}",
    columns:[
           {data:'DT_RowIndex',name:'DT_RowIndex'},
           {data:'name',name:"name"},
           {data:'date',name:'date'},
           {data:'action',name:'action',orderable: true,searchable: true}

    ]
  });
  
  });
  
  </script>
  






@endsection
