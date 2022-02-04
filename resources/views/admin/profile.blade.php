
        @section('title', 'Profile')
        @include('includes.header')
        @include('includes.sidebar')        
        @include('includes.navbar')

         <!-- Display Error Message When not created -->

         @if($errors->any())
         <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
            @endforeach
            </ul>
         </div>
         @endif

            <!-- dashboard inner -->
            <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>{{ $user->name }} Profile</h2>                              

                           </div>
                           <div class="float-right mb-5">
                        <button type="button" class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal">Complete User Registeration</button> 
                        <a type="button" class="model_bt btn btn-info" href="{{route('edit.personal.detail', ['id' =>$user->id])}}">Edit User</a> 
                            </div>
                        </div>
                     </div>
               
                      <!-- Display Success Message after created -->
                    @if(Session::has('message'))
                    <div class="alert alert-success {{ Session::get('alert-class', 'alert-success')}} alert-dismissible fade show">
                            {{ Session::get('message') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hiddden="true">&times;</span>
                            </button>
                    </div>               
                    @endif

                     <div class="row column1">
                        <div class="col-md-2">                           

                            </div>
                        
                        <div class="col-md-8 float-right">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Personal Information</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                           
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                           @if($user->details == NULL)
                                                No passport
                                            @else
                                          <div class="profile_img"><img width="180" class="rounded-circle" src="{{asset('/storage/'.$user->details->passport)}}" alt="User Passport"></div>
                                            @endif
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3>{{ $user->name }}</h3>
                                                <p><strong>About: </strong>Frontend Developer</p>
                                                <ul class="list-unstyled">
                                                   <li><i class="fa fa-envelope-o"></i> : {{ $user->email }}</li>
                                                   <li><i class="fa fa-phone"></i> : 987 654 3210</li>
                                                </ul>
                                             </div>
                                             <div class="user_progress_bar">
                                                <div class="progress_bar">
                                                   <!-- Skill Bars -->
                                                   <span class="skill" style="width:85%;">Camera Performance<span class="info_valume">85%</span></span>                   
                                                   <div class="progress skill-bar ">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                      </div>
                                                   </div>
                                                   <span class="skill" style="width:78%;">Cable Performance <span class="info_valume">78%</span></span>   
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                      </div>
                                                   </div>
                                                   <span class="skill" style="width:47%;">Console Performance<span class="info_valume">47%</span></span>
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;">
                                                      </div>
                                                   </div>
                                                   <span class="skill" style="width:65%;">Production &amp; Sales Performance <span class="info_valume">65%</span></span>
                                                   <div class="progress skill-bar">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- profile contant section -->
                                       <div class="full inner_elements margin_top_30">
                                          <div class="tab_style2">
                                             <div class="tabbar">
                                                <nav>
                                                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="false">Next of Kin Info</a>
                                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Work and Profession</a>
                                                      <a class="nav-item nav-link active show" id="nav-contact-tab" data-toggle="tab" href="#profile_section" role="tab" aria-selected="true">Church  Info</a>
                                                   </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">   
                                                   <div class="tab-pane fade" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                      <div class="msg_list_main">
                                                         <ul class="msg_list">
                                                            <li>
                                                               <span><img src="images/layout_img/msg2.png" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Taison Jack</span>
                                                               <span class="msg_user">Sed ut perspiciatis unde omnis.</span>
                                                               <span class="time_ago">12 min ago</span>
                                                               </span>
                                                            </li>
                                                            <li>
                                                               <span><img src="images/layout_img/msg3.png" class="img-responsive" alt="#"></span>
                                                               <span>
                                                               <span class="name_user">Mike John</span>
                                                               <span class="msg_user">On the other hand, we denounce.</span>
                                                               <span class="time_ago">12 min ago</span>
                                                               </span>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et 
                                                         quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
                                                         qui ratione voluptatem sequi nesciunt.
                                                      </p>
                                                   </div>
                                                   <div class="tab-pane fade active show" id="profile_section" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et 
                                                         quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
                                                         qui ratione voluptatem sequi nesciunt.
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end user profile section -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                        
                        </div>
                        
                        <!-- end row -->
                     </div>

                     
                        

        <!-- model popup begins here -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Member Info</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                  <div class="col-md">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Member Details</h2>
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Info</a>
                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Next of Kin Info</a>
                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Work Profession</a>
                                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Church Membership</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                   <form action="{{route('personal.detail')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf 
                                                        <div class="input-group mb-3">  
                                                                                          
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <!-- <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">First Name</span>
                                                                </div> -->
                                                                <input type="hidden" name="firstname" value="{{ $user->name }}" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                <!-- </div> -->

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Last Name</span>
                                                                </div>
                                                                <input type="text" name="lastname" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <!-- <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Email</span>
                                                                </div> -->
                                                                <input type="hidden" name="email" value="{{ $user->email }}" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                <!-- </div> -->

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Gender</span>
                                                                </div>
                                                                <select name="gender" id="" class="form-control">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Work Phone Number</span>
                                                                </div>
                                                                <input type="text" name="work_phone" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>
                                                                
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Home Phone Number</span>
                                                                </div>
                                                                <input type="text" name="home_phone" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Date of Birth</span>
                                                                </div>
                                                                <input type="date" name="dob" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Place of Birth</span>
                                                                </div>
                                                                <input type="text" name="pob" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Marital Status</span>
                                                                </div>
                                                                <select name="marital_status" id="" class="form-control">
                                                                    <option value="">Select Marital Status</option>
                                                                    <option value="single">Single</option>
                                                                    <option value="married">Married</option>
                                                                    <option value="divorced">Divorced</option>
                                                                    <option value="widowed">Widowed</option>
                                                                </select>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Passport</span>
                                                                </div>
                                                                <input type="file" name="passport" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>
                                                            </div>                     
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info" >Save</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                                                                </div> 
                                                    </form>  
                                                </div>
                                                <!-- Form to complete member Next of Kin Info -->
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                    @if($user->details == NULL)
                                                        User detail not Available
                                                        @else
                                                    <form action="{{route('nextofkin.detail', ['id' => $user->details->id])}}" method="POST">
                                                        @csrf
                                                        @endif
                                                        
                                                        <div class="input-group mb-3">                            

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">First Name</span>
                                                                </div>
                                                                <input type="text" name="fname_next_of_kin" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Last Name</span>
                                                                </div>
                                                                <input type="text" name="lname_next_of_kin" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>                                       

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Gender</span>
                                                                </div>
                                                                <select name="gender_next_of_kin" id="" class="form-control">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Phone Number</span>
                                                                </div>
                                                                <input type="text" name="phone_next_of_kin" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>
                                                                
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Relationship</span>
                                                                </div>
                                                                <input type="text" name="relate_next_of_kin" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                 
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Next of Kin Address</span>
                                                                </div>
                                                                <textarea class="form-control" name="address_next_of_kin" aria-label="With textarea"></textarea>
                                                                </div>

                                                                </div>                     
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info" >Save</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                                                                                    
                                                                </div> 
                                                    </form>
                                                </div>
                                                    <!-- Form to Complete Member Work Profession -->
                                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                    @if($user->details == NULL)
                                                    
                                                    @else
                                                <form action="{{route('workpro.detail', ['id' => $user->details->id])}}" method="POST">
                                                    @endif
                                                        @csrf 
                                                        <div class="input-group mb-3"> 

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Employment Status</span>
                                                                </div>
                                                                <input type="text" name="employment_status" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Profession</span>
                                                                </div>
                                                                <input type="text" name="profession" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Area of Specialization</span>
                                                                </div>
                                                                <input type="email" name="area_of_specialization" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>                                                                

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Nationality</span>
                                                                </div>
                                                                <input type="text" name="nationality" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>
                                                                
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">State of Origin</span>
                                                                </div>
                                                                <input type="text" name="state_origin" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">L G A</span>
                                                                </div>
                                                                <input type="text" name="lga" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Home Town</span>
                                                                </div>
                                                                <input type="text" name="town" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>                                                                

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Maiden Name</span>
                                                                </div>
                                                                <input type="text" name="maiden_name" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Residential Address</span>
                                                                </div>
                                                                <textarea class="form-control" name="resident_address" aria-label="With textarea"></textarea>
                                                                </div>
                                                                    </div>                     
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info" >Save</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                                                                </div> 
                                                    </form>
                                                </div>
                                                    <!-- Form that Complete Church Membership Record -->
                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                    @if($user->details == NULL)

                                                    @else
                                                <form action="{{route('churchmember.detail', ['id' => $user->details->id])}}" method="POST">
                                                    @endif 
                                                    @csrf 
                                                        <div class="input-group mb-3">                            

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Are You Born Again</span>
                                                                </div>
                                                                <input type="text" name="born_again" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Church Membership Date</span>
                                                                </div>
                                                                <input type="date" name="church_join_date" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Unit Join Date</span>
                                                                </div>
                                                                <input type="date" name="unit_join_date" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>
                                                               
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Membership Class</span>
                                                                </div>
                                                                <input type="text" name="membership_class" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>
                                                                
                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Water Baptism</span>
                                                                </div>
                                                                <input type="text" name="water_baptism" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Holy Ghost Baptism</span>
                                                                </div>
                                                                <input type="text" name="holyghost_baptism" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Are you a Tither</span>
                                                                </div>
                                                                <input type="text" name="tither" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">WOFBI CLASS</span>
                                                                </div>
                                                                <select name="wofbi_id" id="" class="form-control">
                                                                    <option value="">Select WOFBI</option>
                                                                    <option value="1">BCC</option>
                                                                    <option value="2">LCC</option>
                                                                    <option value="3">LDC</option>
                                                                </select>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon3">Homecell</span>
                                                                </div>
                                                                <input type="text" name="homecell_id" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                </div>

                                                                
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"> Hobbies</span>
                                                                </div>
                                                                <textarea class="form-control" name="hobbies" aria-label="With textarea"></textarea>
                                                                </div>
                                                                    </div>                     
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info" >Save</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                                                                </div> 
                                                    </form>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </div> 
               </div>            
            </div>
         </div>
         <!-- end model popup -->
           

@include('includes.footer')