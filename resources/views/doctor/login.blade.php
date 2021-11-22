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
                <div class="logo_heading">
                    <img src="images/blacklogo.png" alt="">
                    <h5>Welcome Back</h5>
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

               <form method="POST" action="{{ url('doctor/login')}}">
                    @csrf
                    <div class="formstart">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                        <p class="text-danger">{{ $errors->first('email')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password">
                         <p class="text-danger">{{ $errors->first('password')}}</p>
                    </div>

                    <div class="submitwrapper">
                        <a href="{{ url('doctor/forget-password')}}">Forgot Password?</a>
                        <!-- <a href="{{ url('doctor/dashboard')}}"> -->
                            <button type="submit" class="editbtn">Login</button>
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