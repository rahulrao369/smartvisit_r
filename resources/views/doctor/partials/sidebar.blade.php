<div class="sidemenu">
                <div class="sidenav">

                    <a href="{{ url('doctor/profile')}}">
                    <div class="profilesidebar">
                         <div class="profile-icon">
                             <img src="{{ url('/').Auth::user()->image }}" alt="">
                             <div class="seticon">
                                 <img src="{{ url('public/doctor/images/icons/setting.png') }}" alt="">
                             </div>
                         </div>
                         <div class="settingicon">
                             <div>
                                 <p class="doctor_name">{{ Auth::user()->first_name}}  {{ Auth::user()->last_name}}</p>
                             <h6>Dermatologist</h6>
                             </div>
                         </div>
                     </div>
                    </a>

                   <ul>
                        <li class="{{ isset($page_title) && $page_title=='Dashboard' ? 'sidebar_active':''}}">
                            <a href="{{ url('doctor/dashboard')}}"> <img class="isActive" src="{{ url('public/doctor/img/2.svg') }}" /><img class="notActive" src="{{ url('public/doctor/img/3.svg') }}" /> Overview</a>
                        </li>
                        
                        <!-- <li class="{{ isset($page_title) && $page_title=='Inbox' || $page_title == 'Chat' ? 'sidebar_active':''}}">-->
                        <!--    <a href="{{ url('doctor/inbox')}}"> <img style="width: 18px; margin-right: 13px; margin-left: 5px;" class="isActive" src="{{ url('public/doctor/img/97.svg') }}" /><img style="width: 21px; margin-right: 13px; margin-left: 4px;" class="notActive" src="{{ url('public/doctor/img/98.svg') }}" /> Inbox</a>-->
                        <!--</li>-->
                        
                        
                        <li class="{{ isset($page_title) && ($page_title=='Consult' || $page_title =='Consult-patient' || $page_title=='Prescribe' || $page_title=='Ordertest') ? 'sidebar_active':''}}">
                            <a href="{{ url('doctor/consults')}}"> <img class="isActive" src="{{ url('public/doctor/img/5.svg') }}" /><img class="notActive" src="{{ url('public/doctor/img/6.svg') }}" /> Consults</a>
                        </li>
                        <!--<li class="{{ isset($page_title) && $page_title=='Patients' ? 'sidebar_active':''}}">-->
                        <!--    <a href="{{ url('doctor/patients')}}"> <i class="flaticon-user"></i> Patients</a>-->
                        <!--</li>-->
                        <li class="{{isset($page_title) &&  $page_title=='Clinical Updates' ? 'sidebar_active':''}}">
                            <a href="{{ url('doctor/clinical-update')}}"> <img class="isActive" src="{{ url('public/doctor/img/11.svg') }}" /><img class="notActive" src="{{ url('public/doctor/img/12.svg') }}" /> Clinical Updates +2</a>
                        </li>
                        <li class="{{ isset($page_title) && $page_title=='Calendar' ? 'sidebar_active':''}}">
                            <a href="{{ url('doctor/calendar')}}"> <img class="isActive" src="{{ url('public/doctor/img/30.svg') }}" /><img class="notActive" src="{{ url('public/doctor/img/29.svg') }}" />     Calendar</a>
                        </li>
                        
                        <li class="{{ isset($page_title) && $page_title=='My availability' ? 'sidebar_active':''}}">
                            <a href="{{ url('doctor/availability')}}"> <img class="isActive" src="{{ url('public/doctor/img/15.svg') }}" /><img class="notActive" src="{{ url('public/doctor/img/14.svg') }}" /> My availability</a>
                        </li>
                        
                        
                        <li class="{{isset($page_title) &&  $page_title=='Payments' ? 'sidebar_active':''}}">
                            <a href="{{ url('doctor/payments')}}"> <img class="isActive" src="{{ url('public/doctor/img/16.svg') }}" /><img class="notActive" src="{{ url('public/doctor/img/13.svg') }}" /> Payments</a>
                        </li>
                    </ul>
                </div>
            </div>