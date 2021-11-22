@extends('patient.layouts.default')
@section('content')
@include('patient.partials.navbar')


 <section class="side-wrapper main-form-section visitfor-section">
        <div class="form-wrapper">
            <div class="container">
                <div class="form-card">
                    
                    <form method="post" action="https://cloudwapp.in/smartvisit/login">
     
                        <div class="formstart">
                            
                            <div class="back-btn">
                                <a href="https://cloudwapp.in/smartvisit/duration"><span><i class="fa fa-chevron-left"></i> Back</span></a>
                                <h5 class="text-center mb-5">Complete Your Health Profile</h5>
                            </div>
                            <div class="form-field mb-4">
                                <div class="sv-health-profile-form">
                                    <div class="mb-4">
                                        <h5>Are you currently taking any madications.</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                No
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Yes
                                            </label>
                                        </div>
                                    </div>
                                        <div id="autoupdate" style="display: none" class="mt-4">
                                             <div class="row">
                                                 <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <input type="text" class="form-control" name="fname" placeholder="Enter medication">
                                                    </div>
                                                 </div>
                                                 <div class="col-lg-5">
                                                     <div class="sv-form-select">
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <input type="text" class="form-control" name="fname" placeholder="Enter medication">
                                                    </div>
                                                 </div>
                                                 <div class="col-lg-5">
                                                     <div class="sv-form-select">
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                 </div>
                                             </div>

                                             
                                            <div class="add-more-block"></div>
                                    
                                                 
                                            <p class="add-more">+ add another medication</p>
                                        
                                    </div>
                                    <div class="mb-4 border-bottom pb-4">
                                        <h5>Are you currently taking any madications.</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault3">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                No
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault4">
                                            <label class="form-check-label" for="flexRadioDefault4">
                                                Yes
                                            </label>
                                        </div>
                                        
                                        <div id="autoupdate3" style="display: none" class="mt-4">
                                             <div class="row">
                                                 <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <input type="text" class="form-control" name="fname" placeholder="Enter medication">
                                                    </div>
                                                 </div>
                                                 <div class="col-lg-5">
                                                     <div class="sv-form-select">
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <input type="text" class="form-control" name="fname" placeholder="Enter medication">
                                                    </div>
                                                 </div>
                                                 <div class="col-lg-5">
                                                     <div class="sv-form-select">
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                 </div>
                                             </div>
                                             
                                            <div class="add-more-block2">
                                            </div>
                                          
                                            <p class="add-more2 mb-0">+ add another medication</p>
                                        
                                    </div>
                                        
                                    </div>
                                    <div class="mb-4 sv-hp-checkbox">
                                        <h5>Are you currently taking any madications.</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    Default checkbox
                                                  </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                    <label class="form-check-label" for="defaultCheck2">
                                                        Default checkbox
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                                    <label class="form-check-label" for="defaultCheck3">
                                                    Default checkbox
                                                  </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                                    <label class="form-check-label" for="defaultCheck4">
                                                        Default checkbox
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="add-more-checkblock mt-4"></div>
                                            
                                        <p class="add-more-check">+ add medical condition</p>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="next-btn text-right mt-5">
    
                                <a href="https://cloudwapp.in/smartvisit/symptoms" class="btn btn-submit editbtn">Next</a>
                            </div>
                            


                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
<!--     <div id="Content">-->
<!--  <button id="Add" />-->
<!--</div>-->
        
    </section>
    
<script src="https://cloudwapp.in/smartvisit/public/patient/js/jquery.min.js"></script>


    <script>
         $(document).ready(function(){
           $("input[name='flexRadioDefault']").click(function() {
             if ($("#flexRadioDefault2").is(":checked")) {
               $("#autoupdate").show();
             } else {
               $("#autoupdate").hide();
             }
           });
         });
         
         $(document).ready(function(){
           $("input[name='flexRadioDefault1']").click(function() {
             if ($("#flexRadioDefault4").is(":checked")) {
               $("#autoupdate3").show();
             } else {
               $("#autoupdate3").hide();
             }
           });
         });
    </script>

<script>
   $(document).ready(function() {
   
          $(".add-more").click(function(){
            $(".add-more-block").append('<div id="autoupdate1"><div class="row"><div class="col-lg-6"><div class="form-group"> <input type="text" class="form-control" name="fname" placeholder="Enter medication"></div></div><div class="col-lg-5"><div class="sv-form-select"> <select class="form-select" aria-label="Default select example"><option selected>Open this select menu</option><option value="1">One</option><option value="2">Two</option><option value="3">Three</option> </select></div></div></div>');
          });
          
          $(".add-more2").click(function(){
              alert('ok')
            $(".add-more-block2").append('<div id="autoupdate4"><div class="row"><div class="col-lg-6"><div class="form-group"> <input type="text" class="form-control" name="fname" placeholder="Enter medication"></div></div><div class="col-lg-5"><div class="sv-form-select"> <select class="form-select" aria-label="Default select example"><option selected>Open this select menu</option><option value="1">One</option><option value="2">Two</option><option value="3">Three</option> </select></div></div></div>');
          });
          
          $(".add-more-check").click(function(){
            $(".add-more-checkblock").append('<div id="check"><div class="row"><div class="col-lg-6"><div class="form-group"> <input type="text" class="form-control" name="fname" placeholder="Enter condition"></div></div></div></div>');
          });
       
    });
</script>


@endsection