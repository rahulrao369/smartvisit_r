@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

    <section class="side-wrapper main-form-section visitfor-section">
        <div class="form-wrapper">
            <div class="container">
                <div class="form-card">

                    <!--@if(session()->has('success'))-->
                    <!--      			    <div class="alert alert-success">-->
                    <!--      			        <p class="text-center">Payment has been successfully done</p>-->
                    <!--      			    </div>-->
                    <!--@endif-->
                          			    
                    <!--      			      @if(session()->has('failed'))-->
                    <!--      			    <div class="alert alert-danger">-->
                    <!--      			        <p class="text-center">Payment has been successfully done</p>-->
                    <!--      			    </div>-->
                    <!--@endif-->
      			    
                    <form method="post" action="https://cloudwapp.in/smartvisit/login">
     
                        <div class="formstart sv-first-form">
                            
                            <div class="back-btn">
                                <!--<span><i class="fa fa-chevron-left"></i> Back</span>-->
                                <h5 class="text-center mb-4">Who is this visit for?</h5>
                            </div>
                            <div class="form-field text-center mb-4">
                                <div class="button-field">
                                     <div class="row">
                                    <a href="{{ url('patient/find-care/'.base64_encode(Auth::id()))}}" class="btn select-btn">
                                         <span class="sv-card-circle"><i class="fa fa-plus fa-letter"></i></span> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </a>
                                     </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-field text-center mb-4">
                                <div class="button-field">
                                     <div class="row">
                                    <a href="{{ url('patient/addchild') }}" class="btn select-btn">
                                        <span class="sv-card-circle"><i class="fa fa-plus"></i></span> Add Child
                                    </a>
                                    </div>
                                </div>
                            </div>
                            
                            
                            @if(isset($childerns) && count($childerns))
                            @foreach($childerns as $value)
                            
                            
                             <div class="form-field text-center mb-4">
                                <div class="button-field">
                                    <div class="row">
                                    <a href="{{ url('patient/find-care/'.base64_encode($value->id))}}" class="btn select-btn">
                                        <span class="sv-card-circle"><i class="fa fa-plus fa-letter"></i></span>{{ $value->first_name }} {{ ($value->middle_name) ? $value->middle_name:'' }} {{ $value->last_name }}
                                     
                                    </a>
                                      <a href="{{ url('patient/delete-child/'.base64_encode($value->id))}}" class="m-3"><i class="fa fa-trash" style="color:red;  margin-left:31px"></i></a>
                                   </div>
                                </div>

                            </div>
                            
                             
                            @endforeach
                            @endif
                        </div>
                    </form>
                    
                    
                      <div class="modal" id="myModal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="dami-content text-center">
        				      			<h1 id="heading">Success!</h1>
        				      			 <p id="msg">Visit record created:</p>
        				      		</div>
                                </div>
                                
                             
                                
                              </div>
                            </div>
                        </div>
                                                      
                                                      
                                                      
                                                      
                </div>
            </div>
        </div>
    </section>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@if(session()->has('success'))
<script>
    $('#heading').text('Success!');
    $('#msg').text('Visit record created:');
    $('.close').addClass('successBtn');
    $('#myModal').show();
    
   
    
</script>

@endif

<script>
    $(document).ready(function(){
         $('.successBtn').click(function(){
             $('#myModal').hide();
             window.location.href="{{ url('patient/dashboard')}}"
         })
         
          $('.failedBtn').click(function(){
                 $('#myModal').hide();
             window.location.href="{{ url('patient/dashboard')}}"
         })
    })
</script>


@if(session()->has('failed'))
<script>
    $('#heading').text('Failed!');
    $('#msg').text('Visit record created:');
    $('.close').addClass('failedBtn');
    $('#myModal').show();
    
</script>

@endif
@endsection