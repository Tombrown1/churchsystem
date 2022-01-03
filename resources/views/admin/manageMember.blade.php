         @section('title', 'Manage Member')
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
                                             <th><strong>Name</strong></th>
                                             <th><strong>Username</strong></th>
                                             <th><strong>Email</strong></th>
                                             <h><strong>Posted By</strong></h>                                  
                                             <th><strong>Posting Status</strong></th> 
                                             <th><strong>Date Joined</strong></th>
                                             <th><strong>Action</strong></th>                                        
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach( $users as $user)
                                          <tr>
                                             <td>{{$loop->index +1}}</td>
                                             <td> {{$user->firstname}} </td>
                                             <td>{{$user->username}}</td>
                                             <td>{{$user->email}}</td>
                                             <td>{{$posted_by->user->name}}</td>
                                             <td>
                                                @if($user->badge == 1)
                                                <span class="badge badge-pill badge-danger">Leader</span>
                                                @elseif($user->badge == 2)
                                                <span class="badge badge-pill badge-warning">Subunit Leader</span>
                                                @elseif($user->badge == 3)
                                                <span class="badge badge-pill badge-success">Member</span>                                                
                                                 @elseif($user->badge == 4)
                                                 <span class="badge badge-pill badge-primary">Probation</span>
                                                  @else

                                                @endif
                                             </td>
                                             <td>{{$user->created_at->isoFormat('dddd D, Y')}}</td>
                                                                                    
                                             <td class="">
                                                   <button class="btn btn-success dropdown-toggle btn-xs" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                      <div class="dropdown-menu arrow">
                                                            <a class="dropdown-item" href="">
                                                               <i class="fa fa-calendar-check mr-1"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item " href="{{route('post')}}"> <i class="fa fa-cog mr-1"></i>Posting</a>                            
                                                            <a class="dropdown-item " href="#"> <i class="fa fa-cog mr-1"></i>Suspend</a>                            
                                                            <a class="dropdown-item" href="#">
                                                               <i class="fa fa-calendar-check mr-1"></i> Block
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
                                                      @foreach($users as $user)
                                                         <option value="{{$user->id}}">{{$user->name}}</option>
                                                         @endforeach
                                                   </select>
                                                   </div>

                                                   <!-- <div class="input-group-append">
                                                      <span class="input-group-text" id="basic-addon2">Phone Number</span>
                                                   </div>
                                                   <input type="text" namae="phone"  class="form-control" aria-label="phone" aria-describedby="basic-addon2" required>
                                                   </div> -->
                                                   
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
                                                   
                                                      @if($user->badge == 1)
                                                         <input type="text" name="posting_status" value="Leader" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                      @elseif($user->badge == 2)
                                                         <input type="text" name="posting_status" value="Subunit Leader" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                         @elseif($user->badge == 3)
                                                         <input type="text" name="posting_status" value="Member" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                         @elseif($user->badge == 4) 
                                                         <input type="text" name="posting_status" value="Probation" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                         @else
                                                      @endif

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
                                    <!-- end model popup -->
                 
           

@include('includes.footer')