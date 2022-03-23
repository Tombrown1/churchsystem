@section('title', 'Manage User')  
@extends('layouts.admin_master')

@section('admin')

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
                              <h2>Manage Users</h2>
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

                    <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head"> 
                              <button type="button" class="model_bt btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Add New Member</button>                             
                                                        
                                 <!-- <div class="heading1 margin_0">
                                    <h2>Manage Users</h2>                                    
                                 </div> -->
                              </div>
                   
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th><strong>S/N</strong></th>
                                             <th><strong>Full Name</strong></th>
                                             <th><strong>Date Joined</strong></th>
                                             <th><strong>Role</strong></th>
                                             <th><strong>Gender</strong></th>
                                             <!-- <th><strong>Posting Status</strong></th> -->
                                             <th><strong>Action</strong></th>                                           
                                          </tr>
                                       </thead>
                                       <tbody>
                                    @foreach($users as $user)
                                          <tr>
                                             <td>{{$loop->index +1}}</td>
                                             <td>{{$user->firstname. ' '. $user->lastname}}</td>
                                             <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                                             <td>
                                                
                                             @if($user->user == null)
                                                   <span class="badge badge-primary">No Role</span>
                                                   @elseif($user->user->role == 0)
                                                   <span class="badge badge-success">Member</span>
                                                   @elseif($user->user->role == 1)
                                                   <span class="badge badge-success">Admin</span>
                                                   @else
                                                   <span class="badge badge-warning">Probation</span>
                                                   @endif                                               
                                             </td>
                                             <td>{{$user->gender}}</td>
                                                                              
                                             
                                                <td class="">
                                                   <button class="btn btn-info dropdown-toggle btn-xs" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                      <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(912px, 198px, 0px);">
                                                            <a class="dropdown-item modal_activity" href="{{ route('admin.profile', ['id' => $user->user_id]) }}">
                                                               <i class="fa fa-calendar-check mr-1"></i> Profile
                                                            </a>
                                                            <a class="dropdown-item " href="?page=all-users&amp;type=approve&amp;act=51&amp;state=1"> <i class="fa fa-cog mr-1"></i>Suspend</a>                            
                                                                                         
                                                            <a class="dropdown-item modal_activity" href="#" data-toggle="modal" url="?page=new-loan" activity_name="Add New Loan to Tombrown Godwin" activity_name_set="modal_title" property_a="51" property_b="" property_c="" property_d="" property_e="" progress_name="modal_result" progress_image="<div align=&quot;center&quot; class=&quot;ball-rotate loader-danger&quot;><div></div></div>" data-target="#rollIn" result="modal_result">
                                                               <i class="fa fa-calendar-check mr-1"></i> Block
                                                            </a>
                                                            
                                                            <div class="dropdown-divider"></div>
                                                            <!-- <a class="dropdown-item  btn btn-danger " > <i class="fa fa-cog mr-1"></i>Delete</a>                             -->
                                                            <form method="POST" action="{{route('user.delete', ['id'=>$user->id])}}">
                                                               @csrf
                                                               <input type="hidden" name="_method" value="DELETE">
                                                               <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Are you sure, you want to delete?')">
                                                                  <i data-feather="delete">Delete</i>
                                                               </button>
                                                               </form>
                                                      </div>
                                                </td>  
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        

        <!-- model popup begins here -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Create User</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <form action="{{route('create.user')}}" method="POST">
                           @csrf 
                           <div class="input-group mb-3">                            

                                 <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon3">Surname</span>
                                       </div>
                                    <input type="text" name="surname" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                 </div>
                                 <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon3">Firstname</span>
                                       </div>
                                    <input type="text" name="fname" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                 </div>
                                 <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon3">Other Names</span>
                                       </div>
                                    <input type="text" name="lname" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                 </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text" id="basic-addon3">Email</span>
                                    </div>
                                    <input type="email" name="email" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                 </div> 
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
                                       <span class="input-group-text" id="basic-addon3">Role</span>
                                    </div>
                                    <select name="role" id="" class="form-control">
                                       <option>Select Role</option>
                                       <option value="2">Super Admin</option>
                                       <option value="3">Admin</option>
                                       <option value="4">User</option>
                                    </select>
                                 </div>
                           </div>                     
                        <!-- Modal footer -->
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-info" >Add User</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                           </div> 
                      </form>                     
                  </div>            
                </div>
            </div>
         </div>
         <!-- end model popup -->

         
      
           

@endsection