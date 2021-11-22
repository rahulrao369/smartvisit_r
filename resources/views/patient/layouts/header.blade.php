<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{ url('public/patient/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ url('public/patient/css/flaticon.css') }}">
<!-- CSS only -->
<link rel="stylesheet" href="{{ url('public/patient/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('public/patient/css/style.css') }}">
<link rel="stylesheet" href="{{ url('public/patient/css/main.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

</head>
<body>

<header class="header">
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <img src="{{ url('public/patient/images/blacklogo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="" class="nav-link">
                        <img src="{{ url('public/patient/images/icons/call.png') }}" alt=""> +0123456789
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="" class="nav-link">
                        <img src="{{ url('public/patient/images/icons/bell.png') }}" alt="">
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ url('patient/logout')}}" class="nav-link">
                        <img src="{{ url('public/patient/images/icons/logout.png') }}" alt="">
                    </a>
                </li>
              </ul>
              
            </div>
          </nav>
    </div>
</header>
