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
<body>
    <div class="form-wrapper">
        <div class="container">
            
            @if($page==1)
            <div class="card form-card">
                <div class="logo_heading">
                    <img src="{{ url('public/patient/images/blacklogo.png') }}" alt="">
                    <h5>Forgot Your Password?</h5>
                    <p>Enter The Email Address Associated With Your Account And We’ll
                        Send You A Link To Reset Your Password.</p>
                </div>
              
                  <form action="{{ \Request::fullUrl()}}" method="POST">
                      @csrf
    
            
                <div class="formstart">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                        <p class="text-danger">{{ $errors->first('password')}}</p>
                    </div>
                    
                       <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password">
                        <p class="text-danger">{{ $errors->first('confirm_password')}}</p>
                    </div>


                    <div class="submitwrapper">
                        <input type="submit" class="editbtn" value="Submit" name="submit">
                    </div>

                    <div class="accountwrap forgotwrap">
                       <span><a href="{{ url('login') }}"><i class="fa fa-angle-left"></i></a></span> <p>Back to login
                       <!--<a href="register.html">Register Now</a> -->
                       </p>
                    </div>

                </div>
                
                </form>
            </div>
            
            @endif
            
            
            @if($page==2)
            <h4 class="text-center">Token has expired.</h4>
            @endif
            
            @if($page==3)
           <h4>Your passwod has been updated successfully,  <a href="{{ url('login')}}" class="text-center">click here for login.</a></h4>
            @endif
        </div>
    </div>



<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/patient/js/jquery.min.js') }}"></script>
<script src="{{ url('public/patient/js/bootstrap.min.js') }}"></script>

</body>
</html>