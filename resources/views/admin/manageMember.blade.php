         @section('title', 'Manage Member')
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
                              <h2>Manage Unit Members</h2>
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
                                    <button type="button" class="model_bt btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Make Posting</button>
                           
                                 <!-- <div class="heading1 margin_0">
                                    <h2>Manage Users</h2>                                    
                                 </div> -->
                              </div>
                   
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th><strong>S/N</strong></th>
                                             <th><strong>Firstname</strong></th>
                                             <th><strong>Lastname</strong></th>
                                             <th><strong>Email</strong></th>
                                             <th><strong>Posted By</strong></th>                                  
                                             <th><strong>Posting Status</strong></th> 
                                             <th><strong>Post Count</strong></th> 
                                             <th><strong>Date Joined</strong></th>
                                             <th><strong>Action</strong></th>                                        
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach( $users as $user)
                                          <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td> {{$user->firstname}} </td>
                                                <td>{{$user->lastname}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                   @if($user->posting != null)
                                                   {{App\Models\User::find($user->posting->user_id)->name}}
                                                   @else
                                                      <span class="badge badge-danger">Not Available</span>
                                                   @endif
                                                </td>
                                                <td>
                                                   @if($user->posting != null)
                                                      <span class="badge badge-success">Posted</span>
                                                   @else
                                                      Not Posted
                                                   @endif
                                                </td>
                                                <td>
                                                   @if($user->user == null)

                                                      @elseif($user->user->post_count >=1)

                                                         @if($user->user->post_count == 1)
                                                            <span class="badge badge-warning"><a href="{{route('times.posted', ['id' => $user->id])}}"> once</a></span>
                                                         @else
                                                            <span class="badge badge-warning"><a href="{{route('times.posted', ['id' => $user->id])}}">{{ $user->user->post_count. ' times'}}</a></span>
                                                         @endif

                                                   @else
                                                   <span class="badge badge-info">Not posted yet</span>
                                                   @endif
                                                </td>
                                                <td>{{$user->created_at->isoFormat('ddd D, Y')}}</td>
                                                                                    
                                                <td class="">
                                                      <button class="btn btn-success dropdown-toggle btn-xs" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                      <div class="dropdown-menu arrow">
                                                            <a class="dropdown-item " href="{{route('admin.profile', ['id' => $user->id])}}"> <i class="fa fa-cog mr-1"></i>Profile</a>                            
                                                            <a class="dropdown-item " href="#"> <i class="fa fa-cog mr-1"></i>Suspend</a>                            
                                                            <a class="dropdown-item" href="#">
                                                               <i class="fa fa-calendar-check mr-1"></i> Post Status
                                                            </a>
                                                            
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item  btn btn-danger " > <i class="fa fa-cog mr-1"></i>Delete</a>                            
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
                     <h4 class="modal-title">Make Posting</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                                             <form action="{{route('post.member')}}" method="POST">
                                                @csrf 
                                             <div class="input-group mb-3">                            

                                                   <div class="input-group mb-3">
                                                   <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon3">Name</span>
                                                   </div>
                                                   <!-- <input type="text" name="name" class="form-control" id="basic-url" aria-describedby="basic-addon3" required> -->
                                                   <select name="member_id" id="" class="form-control">
                                                      @foreach($posts as $user)
                                                         <option value="{{$user->id}}">{{$user->name }}</option>
                                                         @endforeach
                                                   </select>
                                                   </div>

                                                   
                                                   <div class="input-group mb-3">
                                                   <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon3">Unit</span>
                                                   </div>
                                                   <select name="subunit_id" id="" class="form-control">
                                                      <option>Select Subunit</option>
                                                      <option value="1">Cable</option>
                                                      <option value="2">Camera</option>
                                                      <option value="3">Console</option>
                                                      <option value="4">Production/Sales</option>
                                                   </select>
                                                   </div>
                                                   
                                                   <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text" id="basic-addon3">Member Status</span>
                                                      </div>
                                                      <select name="posting_status" id="" class="form-control">
                                                         <option>Select Member</option>
                                                         <option value="1">Leader</option>
                                                         <option value="2">Subunit Leader</option>
                                                         <option value="3">Full Member</option>
                                                         <option value="4">Probation</option>
                                                      </select>
                                                     
                                                   </div>

                                                   <div class="input-group mb-3">
                                                   <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon3">Start Date</span>
                                                   </div>
                                                   <input type="date" name="start_date" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                   </div>

                                                   <div class="input-group mb-3">
                                                   <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon3">End Date</span>
                                                   </div>
                                                   <input type="date" name="end_date" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                   </div>

                                                   <!-- <label for="basic-url">Message Description</label>
                                                   <div class="input-group">
                                                   <div class="input-group-prepend">
                                                      <span class="input-group-text">Message Description</span>
                                                   </div>
                                                   <textarea class="form-control" aria-label="With textarea"></textarea>
                                                   </div> -->
                                             </div>                     
                                          <!-- Modal footer -->
                                          <div class="modal-footer">
                                             <button type="submit" class="btn btn-info" >Post</button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                                          </div> 
                                       </form>                     
                                       </div>            
                                       </div>
            </div>
         </div>
                                    <!-- end model popup -->
                 
           

      @endsection