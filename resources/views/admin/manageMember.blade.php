
@include('includes.header')
        @include('includes.sidebar')
        
        @include('includes.navbar')

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
                                             <th><strong>Member Status</strong></th>
                                             <th><strong>Email</strong></th>
                                             <th><strong>Posted By</strong></th>
                                             <th><strong>Date Posted</strong></th>                                         
                                             <th><strong>Subunit</strong></th>                                         
                                             <th><strong>Posting Status</strong></th>
                                             <th><strong>Action</strong></th>                                        
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>1</td>
                                             <td>Anna</td>
                                             <td>Pitt</td>
                                             <td>35</td>
                                             <td>New York</td>
                                             <td>USA</td>
                                             <td>Female</td>                                             
                                             <td>Female</td>                                             
                                             <td>Female</td>                                             
                                             <td class="">
                                                   <button class="btn btn-success dropdown-toggle btn-xs" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                      <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(912px, 198px, 0px);">
                                                            <a class="dropdown-item modal_activity" href="#" data-toggle="modal" url="?page=edit-user-profile" activity_name="Edit Tombrown Godwin Account" activity_name_set="modal_title" property_a="51" property_b="" property_c="" property_d="" property_e="" progress_name="modal_result" progress_image="<div align=&quot;center&quot; class=&quot;ball-rotate loader-danger&quot;><div></div></div>" data-target="#rollIn" result="modal_result">
                                                               <i class="fa fa-calendar-check mr-1"></i> Profile
                                                            </a>
                                                            <a class="dropdown-item " href="?page=all-users&amp;type=approve&amp;act=51&amp;state=1"> <i class="fa fa-cog mr-1"></i>Suspend</a>                            
                                                            <a class="dropdown-item modal_activity" href="#" data-toggle="modal" url="?page=new-loan" activity_name="Add New Loan to Tombrown Godwin" activity_name_set="modal_title" property_a="51" property_b="" property_c="" property_d="" property_e="" progress_name="modal_result" progress_image="<div align=&quot;center&quot; class=&quot;ball-rotate loader-danger&quot;><div></div></div>" data-target="#rollIn" result="modal_result">
                                                               <i class="fa fa-calendar-check mr-1"></i> Block
                                                            </a>
                                                            
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item  btn btn-danger " > <i class="fa fa-cog mr-1"></i>Delete</a>                            
                                                      </div>
                                                </td>                                             
                                             
                                          </tr>
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
                                <span class="input-group-text" id="basic-addon3">Unit</span>
                            </div>
                            <select name="subunit" id="" class="form-control">
                                <option value="">Select Subunit</option>
                                <option value="cable">Cable</option>
                                <option value="camera">Camera</option>
                                <option value="console">Console</option>
                                <option value="prosale">Production/Sales</option>
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
         <!-- end model popup -->
           

@include('includes.footer')