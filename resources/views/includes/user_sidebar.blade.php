<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                    
                        <div class="user_img"><img class="img-responsive" src="#" alt="#" /></div>
                      
                        <div class="user_info">
                           <h6>{{Auth::User()->name}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     <li><a href="{{route('home')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>                        
                     </li>
                     <li><a href="{{route('user.myprofile', ['id' => Auth::User()->id])}}"><i class="fa fa-table purple_color2"></i> <span>My Profile</span></a></li>                    
                   
                     <li><a href="{{route('annoucement')}}"><i class="fa fa-cog yellow_color"></i> <span>Announcement</span></a></li>
                     <li><a href="{{route('activity')}}"><i class="fa fa-cog yellow_color"></i> <span>Weekly Service Activities</span></a></li>
                    
                     <li><a href="{{route('gallery')}}"><i class="fa fa-cog yellow_color"></i> <span>Media Gallery</span></a></li>
                     <li><a href="{{route('suggestion')}}"><i class="fa fa-cog yellow_color"></i> <span>Suggestion Box</span></a></li>
                  </ul>
               </div>
            </nav>

            <div id="content">