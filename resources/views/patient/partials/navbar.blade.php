  <div class="sidemenu">
      <div class="sidenav">
         <a href="{{ url('patient/profile') }}">
          <div class="profilesidebar">
               <div class="profile-icon">
                   <img src="{{ url(Auth::user()->image) }}" alt="">
                   <div class="seticon">
                       <img src="{{ url('public/patient/images/icons/setting.png') }}" alt="">
                   </div>
               </div>
               <div class="settingicon">
                   <div>
                       <p>{{ Auth::user()->first_name }}</p>
                       <!--<h6>Dermatologist</h6>-->
                   </div>
               </div>
           </div>
          </a>

         <ul>
              <li class="{{ $page_title =='Patients'  ? 'sidebar_active':''}}">
                  <a href="{{ url('patient/dashboard') }}"> <img class="isActive" src="{{ url('public/patient/img/2.svg') }}"> <img class="notActive" src="{{ url('public/patient/img/3.svg') }}"> Home</a>
              </li>
               <li class="{{ $page_title =='Inbox' || $page_title =='Chat' ? 'sidebar_active':''}}">
                  <a href="{{ url('patient/inbox') }}"> <img style="width: 18px; margin-right: 13px; margin-left: 5px;" class="isActive" src="{{ url('public/patient/img/97.svg') }}"> <img style="width: 21px; margin-right: 13px; margin-left: 4px;" class="notActive" src="{{ url('public/patient/img/98.svg') }}"> Inbox</a>
              </li>
              
              <!--<li class="{{ $page_title =='Find care' ? 'sidebar_active':''}}">-->
              <!--    <a href="{{ url('patient/find-care') }}"> <i class="flaticon-phone-with-message"></i> Find Care</a>-->
                  
              <!--</li>-->
              
              
              <li class="{{ $page_title =='Find care' || $page_title =='Payments' ? 'sidebar_active':''}}">
                  <a href="{{ url('patient/visitfor') }}"> <img class="isActive" src="{{ url('public/patient/img/5.svg') }}"> <img class="notActive" src="{{ url('public/patient/img/6.svg') }}"> Find Care</a>
                  
              </li>
              
              
              
              <li class="{{ $page_title =='Pharmacy' ? 'sidebar_active':''}}">
                  <a href="{{ url('patient/pharmacy') }}"> <img class="isActive" src="{{ url('public/patient/img/2.svg') }}"> <img class="notActive" src="{{ url('public/patient/img/3.svg') }}"> Pharmacy</a>
                    <!--<a href="#"> <i class="flaticon-user"></i> Pharmacy</a>-->
              </li>
              
              <li class="{{ $page_title =='My lab' ? 'sidebar_active':''}}">
                  <!--<a href="{{ url('patient/my_lab') }}"> <i class="flaticon-document"></i> My Lab</a>-->
                   <a href="#"> <img class="isActive" src="{{ url('public/patient/img/fill_unfill/85.svg') }}"> <img class="notActive" src="{{ url('public/patient/img/fill_unfill/84.svg') }}"> My Lab</a>
              </li>
              
              <li class="{{ $page_title =='Alerts' ? 'sidebar_active':''}}">
                  <!--<a href="{{ url('patient/alerts') }}"> <i class="flaticon-select"></i> Alerts</a>-->
                    <a href="#"> <img style="width: 17px; margin-left: 7px; margin-right: 12px;" class="isActive" src="{{ url('public/patient/img/46.svg') }}"> <img style="width: 16px; margin-left: 8px; margin-right: 14px;" class="notActive" src="{{ url('public/patient/img/99.svg') }}"> Alerts</a>
              </li>
          </ul>
      </div>
  </div>