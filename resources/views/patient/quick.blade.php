@extends('patient.layouts.default') @section('content') @include('patient.partials.navbar')
<style>
#msform {
	text-align: left !important;
}

.paisatnt-wap .row {
	justify-content: start;
	text-align: left;
}

#autoupdate {
	border-bottom: 1px solid #dee2e6;
	margin-bottom: 21px;
	padding-bottom: 5px;
}
</style>
<div class="side-wrapper">
	<div class="overviewCard2">
		<!-- ///// overview first column area ///// -->
		<div class="paisatnt-wap">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="multipal-form">
						<!--@if(session()->has('success'))-->
						<!--<div class="alert alert-success">-->
						<!--    <p class="text-center">Payment has been successfully done</p>-->
						<!--</div>-->
						<!--@endif-->
						<!--  @if(session()->has('failed'))-->
						<!--<div class="alert alert-danger">-->
						<!--    <p class="text-center">Payment has been successfully done</p>-->
						<!--</div>-->
						<!--@endif-->
						<div class="card2 px-0 pt-4 pb-0 mt-3 mb-3">
							<form id="msform" method="POST" enctype="multipart/form-data" action="{{ url('patient/find-care')}}"> @csrf
								<input type="hidden" name="type" value="{{ $type }}" />
								<input type="hidden" name="patient_id" value="{{ $id }}" />
								<fieldset>
									<div class="col-md-12 main-haeding">
										<h1>How can we help you today?</h1> </div>
									<div class="form-card">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>Reason for visit?</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<div class="dropdown">
														<select class="dropdown-select" id="reason_for_vist" name="reason_for_vist" required="">
															<option value="">Select</option> @if(isset($visit_reasons) && count($visit_reasons) > 0 ) @foreach($visit_reasons as $row)
															<option value="{{ $row->id }}">{{ $row->name}}</option> @endforeach @endif </select>
														<p class="text-danger" id="reasonone"></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="right-box">
											<!--<h2 class="steps">1 of 3 steps</h2>--></div>
									</div>
									<input type="button" name="next" class="next action-button" value="Next" /> </fieldset>
								<fieldset>
									<div class="main-haeding">
										<h1>What symptoms are you having?</h1> </div>
									<div class="form-card2">
										<div class="row">
											<div class="col-md-12">
												<div class="Reason-wap2">
													<ul id="sympt"> </ul>
												</div>
												<p class="text-danger esymptoms" style="margin-right: 788px; margin-top: 100px;"></p>
											</div>
											<div class="col-md-12">
												<div class="form-group main">
													<label>Tell us about your symptoms (Optional)</label>
													<textarea name="symptoms_details" id="symptoms_details" rows="5" placeholder=""></textarea>
													<p class="text-danger esymptoms_details"></p>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group main2 mt-3 mb-3">
													<div class="form-group files main2">
														<label>Upload Symptom Photos (Optional) </label>
														<input type="file" class="form-control" multiple="" id="simages" name="simages[]">
														<p class="text-danger esimages"></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input type="button" name="previous" class="previous action-button" value="Previous" id="secprevious" />
									<div class="col-12">
										<div class="right-box">
											<!--<h2 class="steps">2 of 3 steps</h2>--></div>
									</div>
									<input type="button" name="next" class="next action-button" value="Next" id="secnext" />
									<!--<input type="button" name="previous" class="previous action-button-previous" value="Previous" /> -->
								</fieldset>
								<!---->
								<fieldset>
									<div class="col-md-12 main-haeding">
										<h1>Do You Have Any Of These Symptoms</h1> </div>
									<div class="form-field mb-4">
										<div class="sv-symptoms-form">
											<div class=" sv-hp-checkbox"> @if(isset($subsymptoms_main) && count($subsymptoms_main) > 0) @foreach($subsymptoms_main as $row)
												<div class="mb-4 pb-4 border-bottom">
													<h5>{{ $row->name }}</h5>
													<div class="row"> @if(isset($row->subsymptoms_list) && count($row->subsymptoms_list)) @foreach($row->subsymptoms_list as $row)
														<div class="col-lg-6">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" value="{{ $row->id  }}" id="defaultCheck1" name="subsymptoms[]">
																<label class="form-check-label" for="defaultCheck1"> {{ $row->name }} </label>
															</div>
														</div> @endforeach @endif </div>
												</div> @endforeach @endif </div>
										</div>
									</div>
									<input type="button" name="previous" class="previous action-button" value="Previous" id="secprevious" />
									<input type="button" name="next" class="next action-button" value="Next" />
									<!--<input type="button" name="previous" class="previous action-button-previous" value="Previous" />  -->
								</fieldset>
								<fieldset>
									<div class="col-md-12 main-haeding">
										<h1>How Long Have You Felt This Way?</h1> </div>
									<div class="formstart">
										<div class="back-btn">
											<!--<a href="https://cloudwapp.in/smartvisit/insurance"><span><i class="fa fa-chevron-left"></i> Back</span></a>-->
											<!--<h5 class="text-center mb-5">How Long Have You Felt This Way?</h5>--></div>
										<div class="form-field mb-4">
											<div class="sv-form-select">
												<select class="form-select mr-4" aria-label="Default select example" name="how_long_days">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
												</select>
											</div>
											<div class="sv-form-select">
												<select class="form-select" aria-label="Default select example" name="how_long_duration">
													<option value="days" selected>Days</option>
													<option value="weeks">Weeks</option>
													<option value="months">Months</option>
													<option value="years">Years</option>
												</select>
											</div>
										</div>
										<!--<div class="next-btn text-right mt-5">-->
										<!--    <a href="https://cloudwapp.in/smartvisit/health_profile" class="btn btn-submit editbtn">Next</a>-->
										<!--</div>-->
									</div>
									<input type="button" name="previous" class="previous action-button" value="Previous" id="secprevious" />
									<input type="button" name="next" class="next action-button" value="Next" />
									<!--<input type="button" name="previous" class="previous action-button-previous" value="Previous" /> -->
								</fieldset>
								<fieldset>
									<div class="col-md-12 main-haeding">
										<h1>Complete Your Health Profile</h1> </div>
									<div class="formstart">
										<div class="back-btn">
											<!--<a href=""><span><i class="fa fa-chevron-left"></i> Back</span></a>-->
											<!--<h5 class="text-center mb-5">Complete Your Health Profile</h5>--></div>
										<div class="form-field mb-4">
											<div class="sv-health-profile-form">
												<div class="mb-4">
													<h5>Are you currently taking any madications.</h5>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="currently_any_medication" id="flexRadioDefault1" value="No">
														<label class="form-check-label" for="flexRadioDefault1"> No </label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="currently_any_medication" id="flexRadioDefault2" value="Yes">
														<label class="form-check-label" for="flexRadioDefault2"> Yes </label>
													</div>
													<p class="text-danger" id="error_currently_any_medication"></p>
												</div>
												<div id="autoupdate" style="display: none" class="mt-4">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<input type="text" class="form-control" name="medication_name[]" placeholder="Enter medication"> </div>
														</div>
														<div class="col-lg-5">
															<div class="sv-form-select">
																<select class="form-select" aria-label="Default select example" name="medication_how_long[]">
																	<option selected value="">How Long</option>
																	<option value="past week">The past week</option>
																	<option value="past month">The past month</option>
																	<option value="past year">The past year </option>
																	<option value="more than a year">More than a year </option>
																</select>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<input type="text" class="form-control" name="medication_name[]" placeholder="Enter medication"> </div>
														</div>
														<div class="col-lg-5">
															<div class="sv-form-select">
																<select class="form-select" aria-label="Default select example" name="medication_how_long[]">
																	<option selected value="">How Long</option>
																	<option value="past week">The past week</option>
																	<option value="past month">The past month</option>
																	<option value="past year">The past year </option>
																	<option value="more than a year">More than a year </option>
																</select>
															</div>
														</div>
													</div>
													<div class="add-more-block"></div>
													<p class="add-more">+ add another medication</p>
												</div>
												<div class="mb-4 border-bottom pb-4">
													<h5>Do you have any known drug allergies ?.</h5>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="have_allergies" id="flexRadioDefault3" value="No">
														<label class="form-check-label" for="flexRadioDefault3"> No </label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="have_allergies" id="flexRadioDefault4" value="Yes">
														<label class="form-check-label" for="flexRadioDefault4"> Yes </label>
													</div>
													<p class="text-danger" id="error_have_allergies"></p>
													<div id="autoupdate3" style="display: none" class="mt-4">
														<div class="row">
															<div class="col-lg-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="allergy_name[]" placeholder="Enter allergy"> </div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-6">
																<div class="form-group">
																	<input type="text" class="form-control" name="allergy_name[]" placeholder="Enter allergy"> </div>
															</div>
														</div>
														<div class="add-more-block2"> </div>
														<p class="add-more2 mb-0">+ add another medication</p>
													</div>
												</div>
												<div class="mb-4 sv-hp-checkbox">
													<h5>Please update your medical conditions.</h5>
													<div class="row"> @if(isset($medical_condition) && count($medical_condition) > 0 ) @foreach($medical_condition as $row)
														<div class="col-lg-6">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" value="{{ $row->id }}" id="defaultCheck1" name="medical_condition[]">
																<label class="form-check-label" for="defaultCheck1"> {{ $row->name }} </label>
															</div>
														</div> @endforeach @endif </div>
													<div class="add-more-checkblock mt-4"></div>
													<p class="add-more-check">+ add medical condition</p>
												</div>
											</div>
										</div>
										<!--<div class="next-btn text-right mt-5">-->
										<!--    <a href="https://cloudwapp.in/smartvisit/symptoms" class="btn btn-submit editbtn">Next</a>-->
										<!--</div>-->
									</div>
									<input type="button" name="previous" class="previous action-button" value="Previous" id="secprevious" />
									<input type="button" name="next" class="next action-button" value="Next" id="md_profile" />
									<!--<input type="button" name="previous" class="previous action-button-previous" value="Previous" /> -->
								</fieldset>
								<!---->
								<fieldset class="card2 px-0 pt-4 pb-0 mt-3 mb-3">
									<div class="col-md-12 main-haeding">
										<h1>Vital Signs (Optional)</h1> </div>
									<div class="form">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>Temperature</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<input type="text" name="temperature" id="temperature" />
													<p class="text-danger etemperature"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="form">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>Systolic (BP)</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<input type="text" name="systolic" id="systolic" />
													<p class="text-danger esystolic"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="form">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>Diastolic (BP)</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<input type="text" name="diastolic" id="diastolic" />
													<p class="text-danger ediastolic"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="form">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>o2 Saturation</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<input type="text" name="o2_saturation" id="o2_saturation" />
													<p class="text-danger eo2_saturation"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="form">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>Heart Rate</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<input type="text" name="heart_rate" id="heart_rate" />
													<p class="text-danger eheart_rate"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="form">
										<div class="row">
											<div class="col-md-6">
												<div class="Reason-wap">
													<h2>Resp. Ratee</h2> </div>
											</div>
											<div class="col-md-6">
												<div class="Reason-wap">
													<input type="text" name="resp" id="resp" />
													<p class="text-danger eresp"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-check main autoUpdate-check">
											<input type="checkbox" class="form-check-input" id="is_licenced" name="is_licenced" value="1">
											<label class="form-check-label ml-2" for="is_licenced">Are you a licensed medical professional?</label>
										</div>
										<p class="text-danger eisfind-care:780 Uncaught TypeError: Failed to construct 'FormData': parameter 1 is not of type 'HTMLFormElement'._licenced"></p>
									</div>
									<div class="col-md-12">
										<div class="form-group main" id="autoUpdate" style="display: none;">
											<label>LICENSE NUMBER</label>
											<input type="text" name="lc_number" id="lc_number" placeholder="">
											<p class="text-danger elc_number"></p>
										</div>
									</div>
									<input type="button" name="previous" class="previous action-button" value="Previous" id="secprevious" />
									<div class="col-12">
										<div class="right-box">
											<h2 class="steps">3 of 3 steps</h2> </div>
									</div>
									<input type="button" name="next" class="next action-button" value="Submit" /> </fieldset>
								<fieldset>
									<div class="form-card2">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group mb-0">
													<label for="schedule">Choose Date</label>
													<input style="width: auto;" type="input" class="form-control" id="inputDate" name="date" autocomplete="off"> <i style="background: #a9e530; padding: 11px; position: relative; margin-left: -18px; color: #fff; margin-top: -7px; border-radius: 0px 8px 7px 0px;" class="fa fa-calendar"></i>
													<p class="text-danger edate"></p>
												</div>
											</div>
											
											<div class="col-md-7">
												<div class="form-group mb-0 row" style="margin-left: 1px;">
												    <input style="width: auto;" type="radio" class="form-control" id="urgent" name="urgent" value="1">
													<label for="schedule" style="margin-top: 12px;margin-left: 10px;">Is urgent</label>
												
													<p class="text-danger urgent"></p>
												</div>
											</div>
											
											
											<div class="col-md-12">
												<div class="time-shaduale">
													<p class="my-4">Choose a call back time.</p> @if(count($callback_slots) > 0 ) @foreach($callback_slots as $row)
													<div id="ck-button">
														<label>
															<input type="checkbox" class="time" value="{{ $row->id}}" name="time"><span>{{ $row->name}}</span> </label>
													</div> @endforeach @endif
													<p class="text-danger etime"></p>
													<div class="submit-btn">
														<div id="ck-button">
															<label>
																<input type="submit" id="finalsubmit" style="display:none;" />
																<input type="button" id="submit" /><span>Schedule Call Back</span> </label>
														</div>
													</div>
													<!--<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">-->
													<!--                                           Open modal-->
													<!--                                         </a>-->
													<!-- The Modal -->
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
																		<h1>Success!</h1>
																		<p>Visit record created:</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p class="text-success submitdata"></p>
											<!--<div class="dami-content text-center">-->
											<!-- 			<h1>No thanks, I’ll wait</h1>-->
											<!-- 			 <p>(This may take take some time)</p>-->
											<!-- 		</div>-->
										</div>
									</div>
						</div>
					</div>
					</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>
<!-- JS, Popper.js, and jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!--<script src="js/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script>
$('#inputDate').datepicker({
	format: 'yyyy-mm-dd',
	startDate: new Date(),
	autoclose: true,
}).datepicker('setDate', 'now');
</script>
<script>
$(document).ready(function() {
	$('#secnext').click(function() {
		$(this).removeClass('next');
	})
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;
	setProgressBar(current);
	$(".next").click(function() {
		//  alert($(this).attr('id'))
		if($('#reason_for_vist').val() == "") {
			$('#reasonone').text("Please select reason.");
		} else if($('#reason_for_vist').val() != "" && $(this).attr('id') == 'secnext') {
			// alert($('input[name="symptomss[]"]:checked').length)
			var error1 = 0;
			if($('input[name="symptomss[]"]:checked').length == 0) {
				$('.esymptoms').text("Select symptoms.");
				error1++;
			} else {
				$('.esymptoms').text("");
			}
			if(error1 == 0) {
				current_fs = $(this).parent();
				next_fs = $(this).parent().next();
			}
		} else if($('input[name="symptomss[]"]:checked').length > 0 && $(this).attr('id') == 'md_profile') {
			var error1 = 0;
			if($('input[name="currently_any_medication"]:checked').length == 0) {
				$('#error_currently_any_medication').text('Please select current medication');
				error1++;
			} else {
				$('#error_currently_any_medication').text('');
			}
			if($('input[name="have_allergies"]:checked').length == 0) {
				$('#error_have_allergies').text('Please select allergies');
				error1++;
			} else {
				$('#error_have_allergies').text('');
			}
			if(error1 == 0) {
				current_fs = $(this).parent();
				next_fs = $(this).parent().next();
			}
		} else if($('input[name="symptomss[]"]:checked').length > 0) {
			//alert('ok')
			var error1 = 0;
			if($('input[name="is_licenced"]:checked').length == 1) {
				if($('#lc_number').val() == '') {
					$('.elc_number').text("licence number is requrired.");
					error1++;
				} else if($('input[name="is_licenced"]:checked').length == 0) {
					$('.eis_licenced').text("check licence is requrired.");
					error1++;
				} else {
					$('.elc_number').text("");
					$('.eis_licenced').text("");
				}
			}
			if(error1 == 0) {
				current_fs = $(this).parent();
				next_fs = $(this).parent().next();
			}
		} else {
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
		}
		// if($(this).attr('id')=='md_profile'){
		//      var error1 =0;
		//     if($('input[name="currently_any_medication"]:checked').length ==0){
		//         $('#error_currently_any_medication').text('Please select current medication');
		//          error1++; 
		//     }else{
		//         $('#error_currently_any_medication').text('');
		//     }
		//     if($('input[name="have_allergies"]:checked').length ==0){
		//         $('#error_have_allergies').text('Please select allergies');
		//          error1++; 
		//     }else{
		//         $('#error_have_allergies').text('');
		//     }
		// }
		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now) {
				// for making fielset appear animation
				opacity = 1 - now;
				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				next_fs.css({
					'opacity': opacity
				});
			},
			duration: 500
		});
		setProgressBar(++current);
	});
	$(".previous").click(function() {
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		//show the previous fieldset
		previous_fs.show();
		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now) {
				// for making fielset appear animation
				opacity = 1 - now;
				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				previous_fs.css({
					'opacity': opacity
				});
			},
			duration: 500
		});
		setProgressBar(--current);
	});

	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar").css("width", percent + "%")
	}
	$(".submit").click(function() {
		return false;
	})
});
</script>
<script type="text/javascript">
$('.dropdown-menu li').on('click', function() {
	var getValue = $(this).text();
	$('.dropdown-select').text(getValue);
});
</script>
<script type="text/javascript">
function readURL(input) {
	if(input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
			$('#imagePreview').hide();
			$('#imagePreview').fadeIn(650);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#imageUpload").change(function() {
	readURL(this);
});
</script>
<!---->
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
<script>
$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#reason_for_vist").on("change", function() {
		//   alert($(this).val())
		if($(this).val() != '') {
			$.ajax({
				url: "{{ url('get-symtoms')}}",
				method: "POST",
				data: {
					id: $(this).val()
				},
				success: function(response) {
					$('#sympt').html(response)
				}
			})
		}
	});
})
</script>
<script>
$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#submit").on("click", function() {
		//   alert()
		//   var form =$('#msform')[0];
		//   var formData = new FormData(form);
		var error = 0;
		if($(".time:checked").length < 1) {
			//  alert('ck')
			$('.etime').text("Please select time.");
			error++
		} else {
			$('.etime').text("");
		}
		if($('#inputDate').val() == '') {
			$('.edate').text("Please select date.");
			error++
		} else {
			$('.edate').text("");
		}
		//   alert(error)
		if(error == 0) {
			//   alert("ok")
			$('#finalsubmit').click();
			//   $("#msform").submit()
			//   alert("ok")
			//  $.ajax({
			//       url:"{{ url('patient/find-care')}}",
			//       method:"POST",
			//       data:formData,
			//       processData: false,
			//       contentType: false,
			//       success:function(response){
			//           console.log(response)
			//          $('#myModal').modal('show');
			//          $('.submitdata').text("Your request has been submitted successfully.")
			//       }
			//  })
		}
	});
})
</script>
<script>
$(document).ready(function() {
	$('#is_licenced').change(function() {
		if(!this.checked)
		//  ^
			$('#autoUpdate').fadeOut('fast');
		else $('#autoUpdate').fadeIn('fast');
	});
	$('.close').click(function() {
		window.location.reload();
	})
});
</script>
<script>
$(document).ready(function() {
	$("input[name='currently_any_medication']").click(function() {
		if($("#flexRadioDefault2").is(":checked")) {
			$("#autoupdate").show();
		} else {
			$("#autoupdate").hide();
		}
	});
});
$(document).ready(function() {
	$("input[name='have_allergies']").click(function() {
		if($("#flexRadioDefault4").is(":checked")) {
			$("#autoupdate3").show();
		} else {
			$("#autoupdate3").hide();
		}
	});
});
</script>
<script>
$(document).ready(function() {
	$(".add-more").click(function() {
		$(".add-more-block").append('<div id="autoupdate1"><div class="row"><div class="col-lg-6"><div class="form-group"> <input type="text" class="form-control" name="medication_name[]" placeholder="Enter medication"></div></div><div class="col-lg-5"><div class="sv-form-select"> <select class="form-select" aria-label="Default select example" name="medication_how_long[]"><option selected value="">How Long</option><option value="past week">The past week</option><option value="past month">The past month</option><option value="past year">The past year </option><option value="more than a year">More than a year </option> </select></div></div></div>');
	});
	$(".add-more2").click(function() {
		$(".add-more-block2").append('<div id="autoupdate4"><div class="row"><div class="col-lg-6"><div class="form-group"> <input type="text" class="form-control" name="allergy_name[]" placeholder="Enter medication"></div></div></div>');
	});
	$(".add-more-check").click(function() {
		$(".add-more-checkblock").append('<div id="check"><div class="row"><div class="col-lg-6"><div class="form-group"> <input type="text" class="form-control" name="medical_other_conditions[]" placeholder="Enter condition"></div></div></div></div>');
	});
});
</script> @endsection