@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')

  <div class="side-wrapper">
     <div class="overviewCard2">
      <!-- ///// overview first column area ///// -->
      <div class="paisatnt-wap">
      	<div class="row">
      		<div class="dami-content text-center">
      			<h1>Welcome back!</h1>
      			<p>Wednesday, Jan 1, 2020 Carbon  
      			<?php 
      			$dt = \Carbon\Carbon::now();
      		echo 	\Carbon\Carbon::parse($dt)->format('d F Y');
      			?>
      			</p>
      			<button type="button" class="btn editbtn">Quick Care</button>
      		</div>
      		<div class="col-md-10">
      			<div class="pasaint-imag">
      				<img src="{{ url('public/patient/images/landingimg.png') }}">
      			</div>
      		</div>
      		<div class="col-md-5">
      			<div class="pasaint-imag">
      				<img src="{{ url('public/patient/images/profile.jpg') }}">
      			</div>
      		</div>
      		<div class="col-md-5">
      			<div class="pasaint-imag">
      				<img src="{{ url('public/patient/images/profile.jpg') }}">
      			</div>
      		</div>
      		
      	</div>
      	
      </div>

      
     
  </div>

           
</section>


@endsection