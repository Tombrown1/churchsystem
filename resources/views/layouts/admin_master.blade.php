<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>TCU APP - @yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset('backend/assets/images/favicon.ico')}}" type="icon" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('backend/assets/style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('backend/assets/css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('backend/assets/css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('backend/assets/css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
           @include('includes.sidebar')

            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="{{asset('backend/assets/logos/main_logo2.jpg ')}}" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                             
                              <ul class="user_profile_dd">
                                 <li>
                                   
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="#" alt="#" /><span class="name_user">{{Auth::User()->name}}</span></a>
                           
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="{{route('admin.profile', ['id'=> Auth::User()->id])}}">My Profile</a>
                                       <form action="{{route('logout')}}" method="POST">
                                           @csrf
                                           <button class="btn btn-primary dropdown-item" type="submit">LogOut</button>
                                       </form>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  @yield('admin')
                  
                  <div class="container-fluid ">
                        <div class="footer">
                            <p>Copyright © 2022 | Technical Crew Unit D/Line Port Harcourt. All rights reserved.<br><br>
                            Designed By: <a href="#">tombrowngodwin</a>
                            </p>
                        </div>
                    </div>
                 </div>
               <!-- end dashboard inner -->
                </div>
            </div>
         </div>
     </div>
    
      <!-- jQuery -->
      <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
      <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{asset('backend/assets/js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{asset('backend/assets/js/bootstrap-select.js')}}"></script>
      <!-- owl carousel -->
      <script src="{{asset('backend/assets/js/owl.carousel.js')}}"></script> 
      <!-- chart js -->
      <script src="{{asset('backend/assets/js/Chart.min.js')}}"></script>
      <script src="{{asset('backend/assets/js/Chart.bundle.min.js')}}"></script>
      <script src="{{asset('backend/assets/js/utils.js')}}"></script>
      <script src="{{asset('backend/assets/js/analyser.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('backend/assets/js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('backend/assets/js/custom.js')}}"></script>
      <script src="{{asset('backend/assets/js/chart_custom_style1.js')}}"></script>
   </body>
</html>