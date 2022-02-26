@section('title', 'Console Subunit')  
@extends('layouts.admin_master')

@section('admin')

            <!-- dashboard inner -->
            <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Manage Console Unit Members</h2>
                           </div>
                        </div>
                     </div>

                    <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">                              
                                    <button type="button" class="model_bt btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Create User</button>
                           
                                 <!-- <div class="heading1 margin_0">
                                    <h2>Manage Users</h2>                                    
                                 </div> -->
                              </div>
                   
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <td>#</td>
                                             <th>Fullname</th>                                             
                                             <th>Posted By</th>
                                             <th>Duration</th>
                                             <th>End Date</th>                                          
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($console_posted_member as $console_posted)
                                          <tr>
                                             <td>{{ $loop->index + 1}}</td>
                                             <td>{{App\Models\User::find($console_posted->member_id)->name}}</td>
                                             <td>{{App\Models\User::find($console_posted->user_id)->name}}</td>
                                             <td>{{$console_posted->created_at->diffForHumans()}}</td>
                                             <td>{{$console_posted->end_date}}</td>
                                                                             
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
                                <span class="input-group-text" id="basic-addon3">Name</span>
                            </div>
                            <input type="text" name="name" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                            </div>

                            <!-- <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Phone Number</span>
                            </div>
                            <input type="text" namae="phone"  class="form-control" aria-label="phone" aria-describedby="basic-addon2" required>
                            </div> -->

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Email</span>
                            </div>
                            <input type="email" name="email" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                            </div>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Email</span>
                            </div>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
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