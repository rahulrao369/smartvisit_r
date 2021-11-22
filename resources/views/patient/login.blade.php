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
            <div class="card form-card">
                <div class="logo_heading">
                    <img src="{{ url('public/patient/images/blacklogo.png') }}" alt="">
                    <!--<h5>Welcome Back</h5>-->
                    
                    <div class="radio-wrapper">
                        <input type="radio" name="select" id="option-1" checked>
                        <input type="radio" name="select" id="option-2">
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>Patient</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>Doctor</span>
                            </label>
                    </div>
                    
                    
                     @if(session()->has('failed'))
                                <div class="alert alert-danger">
                                    <p>{{ session()->get('failed')}}</p>
                                </div>
                                @endif
                                
                                
                                 @if(session()->has('success'))
                                <div class="alert alert-success">
                                    <p>{{ session()->get('success')}}</p>
                                </div>
                                @endif
                </div>
                
                
                <form method="post" action="{{ url('patient/login')}}">
                   @csrf

                <div class="formstart">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="submitwrapper">
                        <a href="{{ url('patient/forgetpassword') }}">Forgot Password?</a>
                        <!--<a href="index.html">-->
                            <button type="submit" class="editbtn">Sign In</button>
                            <!--</a>-->
                    </div>

                    <div class="accountwrap">
                        <p>Don't Have an patient Account? <a href="{{ url('patient/register') }}">Register Now</a> </p>
                    </div>
                    
                     <div class="accountwrap">
                        <p>Don't Have an doctor Account? <a href="{{ url('doctor/register') }}">Register Now</a> </p>
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