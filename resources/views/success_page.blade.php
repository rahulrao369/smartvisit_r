<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartVisit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('public/doctor/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/flaticon.css') }}">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ url('public/doctor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/doctor/css/custom.css') }}">
</head>
<body>
    
    <div class="form-wrapper">
        <div class="container">
            <div class="card form-card">
                
                
                <h5 class="alert alert-danger" style="font-size:16px;">We have sent verfication code on your phone number, please check and enter here.</h5>
                
                
                <div class="logo_heading">
                    <img src="images/blacklogo.png" alt="">
                    <h5>Welcome Back</h5>
                    @if(session()->has('failed'))
                    <h5 class="alert alert-danger text-danger">{{ session()->get('failed') }}</h5>
                    @endif
                </div>

               <form method="POST" action="{{ url('verify-email')}}">
                    @csrf
                    <div class="formstart">
                        <input type="hidden" value="{{ isset($_GET['email']) ? base64_encode($_GET['email']):'' }}" name="eem_code"/>
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" class="form-control" name="code" value="{{ old('code')}}">
                        <p class="text-danger">{{ $errors->first('code')}}</p>
                    </div>

                    <!--<div class="form-group">-->
                    <!--    <label for="">Password</label>-->
                    <!--    <input type="password" class="form-control" name="password">-->
                    <!--     <p class="text-danger">{{ $errors->first('password')}}</p>-->
                    <!--</div>-->

                    <div class="submitwrapper">
                        <!--<a href="{{ url('doctor/forget-password')}}">Forgot Password?</a>-->
                        <!-- <a href="{{ url('doctor/dashboard')}}"> -->
                            <button type="submit" class="editbtn">Verify</button>
                        <!-- </a> -->
                    </div>

                    <div class="accountwrap">
                        <!-- <p>Don't Have an Account? <a href="register.html">Register Now</a> </p> -->
                    </div>

                   </div>
               </form>


            </div>
        </div>
    </div>


<!-- JS, Popper.js, and jQuery -->
<script src="{{ url('public/doctor/js/jquery.min.js') }}"></script>
<script src="{{ url('public/doctor/js/bootstrap.min.js') }}"></script>

</body>
</html>