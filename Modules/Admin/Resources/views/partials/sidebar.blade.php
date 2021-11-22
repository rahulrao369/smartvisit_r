 <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="{{ url('admin/dashboard')}}">
                <!-- <img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-dark.svg" alt="HexaBit Logo" class="img-fluid logo"> -->
                <span>SMART VISIT</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <!-- <div class="user_div">
                    <img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/user.png" class="user-photo" alt="User Profile Picture">
                </div> -->
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::guard('admin')->user()->name }}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="{{ url('admin/profile')}}"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="{{ url('admin/change-password')}}"><i class="icon-envelope-open"></i>Change Password</a></li>
                        <!-- <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li> -->
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout')}}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">


                    <li class="{{ isset($page_title) && $page_title=='Dashboard' ? 'active':''}}"><a href="{{ url('admin/dashboard')}}"><i class="icon-home"></i><span>Dashboard</span></a></li>
                   
                    
                    <li class="{{ isset($page_title) && $page_title=='Doctors' || $page_title=='Doctor create' 
                    || $page_title=='Doctor edit' || $page_title=='Doctor details' ? 'active':''}}"><a href="{{ url('admin/doctor')}}"><i class="icon-list"></i><span>Doctors</span></a></li>

                    <li class="{{ isset($page_title) && $page_title=='Client' || $page_title=='Create patient' 
                    || $page_title=='Edit patient' || $page_title=='Client details' ? 'active':''}}"><a href="{{ url('admin/patients')}}"><i class="icon-user"></i><span>Paitent</span></a></li>
                    
                    
                      <li class="{{ isset($page_title) && $page_title=='Reasons' || $page_title=='Create reason' 
                    || $page_title=='Edit reason' || $page_title=='Reason details' ? 'active':''}}"><a href="{{ url('admin/reason')}}"><i class="icon-user"></i><span>Visit Reasons</span></a></li>
                    
                    
                    
                    <li class="{{ isset($page_title) && $page_title=='Symptoms' || $page_title=='Create symptom' 
                    || $page_title=='Edit symptom' || $page_title=='Symptom details' ? 'active':''}}"><a href="{{ url('admin/symptoms')}}"><i class="icon-user"></i><span>Visit Symptoms</span></a></li>
                    
                    
                    <li class="{{ isset($page_title) && $page_title=='Extra symptoms' || $page_title=='Extra category create' 
                    || $page_title=='Extra reason create' || $page_title=='Extra symptoms details' || $page_title =='Extra Symptoms' ? 'active':''}}"><a href="{{ url('admin/sub-symptoms')}}"><i class="icon-user"></i><span>Extra Symptoms</span></a></li>


                     <li class="{{ isset($page_title) && $page_title=='Medical conditions' || $page_title=='Create medical conditions' 
                    || $page_title=='Edit medical conditions' || $page_title=='Client details' ? 'active':''}}"><a href="{{ url('admin/medical-conditions')}}"><i class="icon-user"></i><span>Medical conditions</span></a></li>
                    
                     <li class="{{ isset($page_title) && $page_title=='Slot' || $page_title=='create slot' 
                    || $page_title=='Edit slot' || $page_title=='Slot' ? 'active':''}}"><a href="{{ url('admin/slot')}}"><i class="icon-user"></i><span>Slots</span></a></li>
                    
                 <li class="{{ isset($page_title) && $page_title=='Appointments' || $page_title=='Appointment Details' 
                    || $page_title=='Edit Appointments' || $page_title=='Appointments' ? 'active':''}}"><a href="{{ url('admin/appointments')}}"><i class="icon-user"></i><span>Appointments</span></a></li>
                    
                    
                    
                     <li class="{{ isset($page_title) && $page_title=='Clinical updates' || $page_title=='Create updates' 
                    || $page_title=='Edit Updates' || $page_title=='Client details' ? 'active':''}}"><a href="{{ url('admin/clinical-update')}}"><i class="icon-user"></i><span>Clinical Updates</span></a></li>
                    
                    
                    
                    
                   



                   <li class="{{ isset($page_title) && $page_title=='Transactions' ? 'active':''}}"><a href="{{ url('admin/transactions')}}"><i class="icon-notebook"></i><span>Transactions</span></a></li> 


                   <!--  <li><a href="app-chat.html"><i class="icon-bubbles"></i><span>Chat</span></a></li>
                    <li>
                        <a href="#Maps" class="has-arrow"><i class="icon-map"></i><span>Maps</span></a>
                        <ul>
                            <li><a href="map-google.html">Google Map</a></li>
                            <li><a href="map-jvectormap.html">jVector Map</a></li>
                            <li><a href="map-yandex.html">Yandex Map</a></li>                            
                        </ul>
                    </li> -->
                </ul>
            </nav>     
        </div>
    </div>