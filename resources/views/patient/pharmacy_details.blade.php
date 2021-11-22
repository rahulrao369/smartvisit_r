@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

  <div class="side-wrapper">
     <div class="overviewCard2">
      <!-- ///// overview first column area ///// -->
      <div class="paisatnt-wap p-3">
          <h5 class="text-center">Pharmacy</h5>
    
        <div id="map" style="width:1090px; height:500px;">

       </div>
       
       <div class="">
           <table class="table table-bordered">
               <tr>
                   <th>Name:</th>
                   <th>Phone:</th>
                   <!--<th>Email:</th>-->
                   <th>Address:</th>
               </tr>
               <tr>
                   <td>{{ $pharmacy->biz_name  }}</td>
                   <td>{{ $pharmacy->biz_phone }}</td>
                   <!--<td>{{ $pharmacy->biz_email }}</td>-->
                   <td>{{ $pharmacy->e_address.', '.$pharmacy->e_city.', '.$pharmacy->e_country }}</td>
               </tr>
           </table>
       </div>
      </div>

      
     
  </div>
<input type="hidden" value="{{$pharmacy->loc_LAT_poly}}" id="lat">   
<input type="hidden" value="{{$pharmacy->loc_LONG_poly}}" id="lng"> 
<input type="hidden" value="{{$pharmacy->biz_name}}" id="name">  
</section>


<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&callback=initialize"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    var myMap;
    var myLatlng = new google.maps.LatLng($('#lat').val(),$('#lng').val());
    function initialize() {
        var mapOptions = {
            zoom: 15,
            center: myLatlng,
            // mapTypeId: google.maps.MapTypeId.ROADMAP  ,
            scrollwheel: true
        }
        myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
        console.log(myMap)
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: myMap,
            title: '{{ $pharmacy->biz_name}}',
            icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>



@endsection