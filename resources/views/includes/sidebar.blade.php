 <!-- Sidebar  -->
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
                     <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>                        
                     </li>
                     <li><a href="{{route('manage.user')}}"><i class="fa fa-clock-o orange_color"></i> <span>Add New Member</span></a></li>
                     <li><a href="{{route('members')}}"><i class="fa fa-table purple_color2"></i> <span>Manage Posting</span></a></li>
                     <li>
                     <li><a href="{{route('post')}}"><i class="fa fa-table purple_color2"></i> <span>Posted Members</span></a></li>
                     <li>
                        <a href="#subunits" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Subunits</span></a>
                        <ul class="collapse list-unstyled" id="subunits">
                           <li><a href="{{route('cable')}}"> <span>Cable Network</span></a></li>
                           <li><a href="{{route('camera')}}"> <span>Camera</span></a></li>
                           <li><a href="{{route('console')}}"> <span>Console</span></a></li>
                           <li><a href="{{route('prosale')}}"> <span>Production/Sales</span></a></li>
                        </ul>
                     </li>
                     
                     
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>News/Events</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="{{route('announce')}}"> <span>Announcement</span></a></li>
                           <li><a href="#"> <span>Service Activities</span></a></li>
                           <li><a href="{{route('photo.gallery')}}"> <span>Media Gallery</span></a></li>
                           <li><a href="{{route('slider')}}"> <span>Image Slider</span></a></li>
                        </ul>
                     </li>
                   
                   
                     <!-- <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li> -->
                  </ul>
               </div>
            </nav>