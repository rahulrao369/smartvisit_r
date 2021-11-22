@extends('doctor.layouts.default')
@section('content')
<section class="content-wrapper"> 
@include('doctor.partials.sidebar')

            <div class="side-wrapper">
               <div class="card wrapper-card">
                  
                    <div class="card-body">
                        <div class="main-heading">
                            <h5>My Availability</h5>
                        </div>
                        <div class="availability_pagination">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="paginationlist patient-pagination">
                                    <ul>
                                        <li>
                                            <button type="button" class="paginatebtn">
                                                <span>
                                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                </span>
                                               
                                            {{ Carbon\Carbon::now()->subMonth()->format('F')}}
                                            </button>
                                        </li>
                                        <li>
                                            <span class="middlepaginate">  {{ Carbon\Carbon::now()->format('F Y')}}</span>
                                        </li>
                                        <li>
                                            <button type="button" class="paginatebtn">
                                                 {{ Carbon\Carbon::now()->addMonth()->format('F')}}
                                               <span class="righticon">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group rightgroup">
                                   <a href="{{ url('doctor/availability')}}">
                                    <button type="button" class="orangebtn">
                                        <i class="flaticon-select"></i> Save
                                    </button>
                                   </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>


                    <div class="Availability_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                     @if(count($slots))
                                    @foreach($slots as $row)
                                     <th>{{ $row->name }}</th>
                                    @endforeach
                                    @endif
                                   <!--  <th>10 am - 12 am</th>
                                    <th>12 am - 2 pm</th>
                                    <th>2 pm - 4 pm</th>
                                    <th>4 pm - 6 pm</th>
                                    <th>6 pm - 8 pm</th>
                                    <th>8 am - 10 pm</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td width="18%">
                                       <input type="checkbox" id="firsttd"> <span class="tableday">Fri</span>  <span class="daynum">1 st</span>
                                    </td>
                                    <td><input type="checkbox" id="othertd" ></td>
                                    <td><input type="checkbox" id="othertd" ></td>
                                    <td><input type="checkbox" id="othertd" ></td>
                                    <td  class="greytd rightclick">
                                        <input type="checkbox" id="othertd" >
                                    </td>
                                    <td class="greytd rightclick">
                                        <input type="checkbox" id="othertd" >
                                    </td>
                                    <td>  <input type="checkbox" id="othertd" ></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">   <span class="tableday"> Sat</span>  <span class="daynum">2 nd</span>
                                    </td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="greytd"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="greytd"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="greytd"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday"> Sun </span> <span class="daynum">3 rd</span>
                                    </td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="greytd"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Mon </span> <span class="daynum">4 th</span>
                                    </td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td class="dayactive">
                                        <input type="checkbox" id="firsttd"> <span class="tableday"> Tue </span> <span class="daynum">5 th</span>
                                    </td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday"> Wed </span> <span class="daynum">6 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Thu </span> <span class="daynum">7 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday">  Fri </span> <span class="daynum">8 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Sat </span> <span class="daynum">9 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Sun </span> <span class="daynum">10 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Mon </span> <span class="daynum">11 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Tue </span>  <span class="daynum">12 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>


                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Wed </span> <span class="daynum">13 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Thu </span> <span class="daynum">14 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                    <td><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Fri </span> <span class="daynum">15 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Sat </span> <span class="daynum">16 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Sun </span> <span class="daynum">17 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Mon </span> <span class="daynum">18 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>


                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Tue </span> <span class="daynum">19 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Wed </span> <span class="daynum">20 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Thu </span> <span class="daynum">21 st</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Fri </span> <span class="daynum">22 nd</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Sat </span> <span class="daynum">23 rd</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Sun </span> <span class="daynum">24 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>


                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Mon </span> <span class="daynum">25 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday">  Tue </span> <span class="daynum">26 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday">  Wed </span> <span class="daynum">27 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd">  <span class="tableday"> Thu </span> <span class="daynum">28 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday"> Fri </span> <span class="daynum">29 th</span>
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" id="firsttd"> <span class="tableday">  Sat </span> <span class="daynum">30 th</span>
                                    </td>
                                    <td class="removebgbr">
                                        <input type="checkbox" id="othertd">
                                    </td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                    <td class="removebgbr"><input type="checkbox" id="othertd"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                   
               </div>

               
            </div>

           
</section>


<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->

<script>
$('.table td #firsttd').change(function(){
    if($(this).is(":checked")) {
        $(this).parent().addClass("dayactive");
    } else {
        $(this).parent().removeClass("dayactive");
    }
});
</script>
<script>
    $('.table td #othertd').change(function(){
    if($(this).is(":checked")) {
        $(this).parent().toggleClass("activeright");
    } else {
        $(this).parent().removeClass("activeright");
    }
});

// $('.table td #othertd:checkbox').change(function() {
//     if($('input.rightcheck').prop('checked', $(this).is(':checked'))){
//         $(this).parent().toggleClass('activeright');
//     }
   
// });
</script>

@endsection
