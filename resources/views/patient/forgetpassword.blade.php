<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartVisit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('public/patient/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/flaticon.css') }}">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ url('public/patient/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/custom.css') }}">
</head>
<body
    <div class="form-wrapper">
        <div class="container">
            <div class="card form-card">
                <div class="logo_heading">
                    <img src="{{ url('public/patient/images/blacklogo.png') }}" alt="">
                    <h5>Forgot Your Password?</h5>
                    <p>Enter The Email Address Associated With Your Account And We’ll
                        Send You A Link To Reset Your Password.</p>
                </div>
              
                  <form action="{{ url('send-mail-forget-password')}}" method="POST">
                      @csrf
                  <div class="radio-wrapper">
                        <input type="radio" name="role" id="option-1" value="1">
                        <input type="radio" name="role" id="option-2" value="2">
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>Patient</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>Doctor</span>
                            </label>
                           
                    </div>
                     <p class="text-danger">{{ $errors->first('role')}}</p>
                    
                    
                <div class="formstart">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                        <p class="text-danger">{{ $errors->first('email')}}</p>
                    </div>

                    <div class="submitwrapper">
                        <button type="submit" class="editbtn">Send Email</button>
                    </div>

                    <div class="accountwrap forgotwrap">
                       <span><a href="{{ url('login') }}"><i class="fa fa-angle-left"></i></a></span> <p>Back to login
                       <!--<a href="register.html">Register Now</a> -->
                       </p>
                    </div>

                </div>
                
                </form>
            </div>
        </div>
    </div>



<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/patient/js/jquery.min.js') }}"></script>
<script src="{{ url('public/patient/js/bootstrap.min.js') }}"></script>

</body>
</html>