

<link rel="stylesheet" type="text/css" href="{{ url('public/events.css') }}">

@extends('doctor.layouts.default')
@section('content')

<section class="content-wrapper"> 
@include('doctor.partials.sidebar')

      <style>
         /*body {*/
         /*margin-bottom: 40px;*/
         /*margin-top: 40px;*/
         /*text-align: center;*/
         /*font-size: 14px;*/
         /*font-family: 'Roboto', sans-serif;*/
         /*background:url(http://www.digiphotohub.com/wp-content/uploads/2015/09/bigstock-Abstract-Blurred-Background-Of-92820527.jpg);*/
         /*}*/
         #wrap {
            margin: 0 auto;
            width: 100%;
            padding-left: 349px;
            padding-top: 75px;
        }
         #external-events {
         float: left;
         width: 150px;
         padding: 0 10px;
         text-align: left;
         }
         #external-events h4 {
         font-size: 16px;
         margin-top: 0;
         padding-top: 1em;
         }
         .external-event { /* try to mimick the look of a real event */
         margin: 10px 0;
         padding: 2px 4px;
         background: #3366CC;
         color: #fff;
         font-size: .85em;
         cursor: pointer;
         }
         #external-events p {
         margin: 1.5em 0;
         font-size: 11px;
         color: #666;
         }
         #external-events p input {
         margin: 0;
         vertical-align: middle;
         }
         #calendar {
         /* 		float: right; */
         margin: 0 auto;
         width: 100%;
         background-color: #FFFFFF;
         border-radius: 6px;
         box-shadow: 0 1px 2px #C3C3C3;
         -webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
         -moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
         box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
         }
      </style>
      <div id='wrap'>
         <div id='calendar'></div>
         <div style='clear:both'></div>
      </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
     
        
        
      <script>
         $(document).ready(function() {
            var  caobj =  {!! json_encode($caldata) !!};
        //   console.log('tessssssssssssssssssssss',(caobj))
          
            //   $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
                
            // var cdata =[];  
            // $.ajax({
            //          url:"{{ url('doctor/get-my-appointments')}}",
            //          method:'POST',
            //          data:{doctor_id:"{{ Auth::id() }}"},
            //          success:function(response){
            //              console.log(response)
            //              var appdata = JSON.parse(response)
            //              console.log('tttttttttttttttttt',appdata)
            //              cdata.push(JSON.parse(response))
            //          }
            // })
             
             
             
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
     
         
            $('#external-events div.external-event').each(function() {

               var eventObject = {
                  title: $.trim($(this).text())
               };

               $(this).data('eventObject', eventObject);

               $(this).draggable({
                  zIndex: 999,
                  revert: true,
                  revertDuration: 0
               });
               
            });
            
            var calendar =  $('#calendar').fullCalendar({
               header: {
                  left: 'title',
                  center: 'agendaDay,agendaWeek,month',
                  right: 'prev,next today'
               },
               editable: true,
               firstDay: 1, 
               selectable: true,
               defaultView: 'month',
               
               axisFormat: 'h:mm',
               columnFormat: {
                        month: 'ddd', 
                        week: 'ddd d', 
                        day: 'dddd M/d', 
                        agendaDay: 'dddd d'
                    },
                    titleFormat: {
                        month: 'MMMM yyyy',
                        week: "MMMM yyyy", 
                        day: 'MMMM yyyy' 
                    },
               allDaySlot: false,
               selectHelper: true,
            //   select: function(start, end, allDay) {
            //       var title = prompt('Event Title:');
            //       if (title) {
            //          calendar.fullCalendar('renderEvent',
            //             {
            //               title: title,
            //               start: start,
            //               end: end,
            //               allDay: allDay
            //             },
            //             true
            //          );
            //       }
            //       calendar.fullCalendar('unselect');
            //   },
               droppable: true, 
               drop: function(date, allDay) {

                  var originalEventObject = $(this).data('eventObject');

                  var copiedEventObject = $.extend({}, originalEventObject);

                  copiedEventObject.start = date;
                  copiedEventObject.allDay = allDay;

                  $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                  if ($('#drop-remove').is(':checked')) {
                     $(this).remove();
                  }
                  
               },
               
               events: caobj,//[
                      
                //   {
                //      title: 'All Day Event',
                //      start: new Date(y, m, 1)
                //   },
                //   {
                //      id: 999,
                //      title: 'Repeating Event',
                //      start: 'Wed Aug 25 2021',//new Date(y, m, d, 16, 0),
                //      allDay: false,
                //      className: 'info'
                //   },
                //   {
                //      id: 999,
                //      title: 'Repeating Event',
                //      start: new Date(y, m, d+4, 16, 0),
                //      allDay: false,
                //      className: 'info'
                //   },
                //   {
                //      title: 'Meeting',
                //      start: new Date(y, m, d, 10, 30),
                //      allDay: false,
                //      className: 'important'
                //   },
                //   {
                //      title: 'Lunch',
                //      start: new Date(y, m, d, 12, 0),
                //      end: new Date(y, m, d, 14, 0),
                //      allDay: false,
                //      className: 'important'
                //   },
                //   {
                //      title: 'Birthday Party',
                //      start: new Date(y, m, d+1, 19, 0),
                //      end: new Date(y, m, d+1, 22, 30),
                //      allDay: false,
                //   },
                //   {
                //      title: 'Click for Google',
                //      start: new Date(y, m, 28),
                //      end: new Date(y, m, 29),
                //      url: 'https://ccp.cloudaccess.net/aff.php?aff=5188',
                //      className: 'success'
                //   }
               //],       
            });
            
            
         });
         
      </script>

@endsection



