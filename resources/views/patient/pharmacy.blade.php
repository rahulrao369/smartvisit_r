@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

<style>
    a {
    text-decoration: none ;
}

a:hover {
    color:white;
    text-decoration:none;
    cursor:pointer;
}
</style>
  <div class="side-wrapper">
     <div class="overviewCard2">
      <!-- ///// overview first column area ///// -->
      <div class="paisatnt-wap p-3">
          <h5 class="text-center"></h5>
          <div>
              <!--<p>No medicines listed</p>-->
              <form method="POST" action="{{ url('patient/search-pharmacy')}}">
              @csrf
              <div class="row col-sm-12">
                  
                 <div class="col-sm-6">
                  <input type="text" name="search" class="form-control" value="{{ ($old) ? $old:'' }}" placeholder="Enter zip code"/>
                 </div>
                 
                 <div class="col-sm-2">
                  <button class="btn btn-primary" type="submit">Search</button>
                 </div>
                 
              </div>
               </form>
          </div>
          
          
          @if(isset($old) && !empty($old))
          <div class="m-4">
            <h6>{{ count($pharmacy) }} pharmacy's near ZIP code: {{ ($old) ? $old:'' }}</h6>
          </div>
          @endif
        
        
       
          <div class="row">
        @if(isset($pharmacy) && count($pharmacy) > 0 )
         
         @foreach($pharmacy as $key => $row)
      	
      	 <div class="col-md-3 p-3 border m-3 blockdata">
      	     
      	  
      	   <!--<input type="checkbox"  class="" name="pharmacy[]" value="{{$row->id}}" style="margin-left:217px"/>-->
      	  
      	    
         <h6>{{ $row->biz_name }}</h6>
         <p style="color:gray;">{{ $row->e_address }},{{ $row->e_city }}, {{ $row->e_state }} {{ $row->e_postal }}</p>
         <p style="color:gray;">{{ $row->biz_phone }}</p>
         <p style="color:gray;">{{ (round($row->distance *0.621371,2) > 1) ? round($row->distance *0.621371,2).' miles':round($row->distance *0.621371,2).' mile'}} </p>
           <a href="{{ url('patient/pharmacy-details/'.base64_encode($row->id))}}" class="btn btn-primary">Select</a>
      	</div>
     
      	@endforeach
      	
      	@else
      	<p class="text-danger text-center mt-5">No Data</p>
      	@endif
      	</div>
      
      	
      
      	
      </div>

      
     
  </div>

           
</section>


@endsection