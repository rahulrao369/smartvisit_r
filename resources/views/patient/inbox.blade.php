@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

<style>
a {
    text-decoration: none !important;
      color: inherit;
}

</style>


     <div class="side-wrapper">
            <div class=" wrapper-card">
             <iv class="overviewColumnarea">
                    <div class="row ml-3">
                        <div class="col-md-12">
                            <div class="overview_consult_head">
                                <h5 class="text-center">Inbox</h5>
                                <!--<span>See All</span>-->
                            </div>
                            
                            @if(isset($inbox) && count($inbox) > 0 )
                            @foreach($inbox as $key => $row)
                            
                             <?php 
                             if(Auth::id() == $row->sender_id){
                                $uuid =  $row->receiver_id;
                             }else{
                                  $uuid =  $row->sender_id;
                             }
                            //  echo $uuid;
                            
                             ?>
                            <a href="{{ url('patient/chat/'.base64_encode($uuid))}}">
                                <div class="card bordered">
                                @if(Auth::id() != $row->sender_id )
                                <h6>{{ $row->sender->first_name}} {{ $row->sender->last_name }} </h6>
                                @else
                                  <h6>{{ $row->receiver->first_name}} {{ $row->receiver->last_name }} </h6>
                                @endif
                                
                                 
                                  
                                <span class="{{ (($row->receiver_id == Auth::id()) && $row->is_seen==0) ? 'font-weight-bold':'font-weight-normal' }}">{{ $row->message }}</span>
                                <span><small>{{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</small></span>
                                </div>
                            </a>
                            @endforeach
                            @else
                            <p class="text-center text-danger">Your inbox is empty.</p>
                            @endif
                            

                        </div>



                    </div>
                </div>

            </div>

           
</section>


@endsection



                