
         @section('title', 'Posting')
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
                              <h2>Posted Members</h2>
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
                                    <a href="{{route('posting.expired')}}" class="btn btn-primary">Track Posted Member</a>
                                       <a href="{{route('members')}}" class="btn btn-success float-right" >Repost</a>
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
                                             <th><strong>Fullname</strong></th>
                                             <th><strong>Subunit</strong></th>
                                             <th><strong>Member Status</strong></th>
                                             <th><strong>Posted By</strong></th> 
                                             <th><strong>Date Posted</strong></th>
                                             <th><strong>Duration</strong></th>
                                             <th><strong>Post Count Down</strong></th>
                                             <th><strong>Action</strong></th>                                        
                                          </tr>
                                       </thead>
                                       <tbody>
                                           @foreach($members_posted as $member_posted)
                                           <tr>
                                               <td>{{$loop->index +1}}</td>
                                                <td>
                                                      @if($member_posted->user != null)
                                                         {{App\Models\User::find($member_posted->member_id)->name}}
                                                      @else
                                                      @endif
                                                </td>  
                                                <td>
                                                   @if($member_posted->subunit != null )
                                                   {{App\Models\Subunit::find($member_posted->subunit_id)->name}}
                                                      @else
                                                   @endif
                                                </td>
                                                <td>
                                                      @if($member_posted->posting_status == 4)
                                                         <span class="badge badge-primary">Probation</span>
                                                      @else
                                                         <span class="badge badge-success">Full Member</span>
                                                      @endif
                                                </td>
                                                   <td>
                                                         @if($member_posted->user != null)
                                                         {{App\Models\User::find($member_posted->user_id)->name}}
                                                         @else
                                                         @endif
                                                   </td>
                                                   <td>{!! date('d/M/Y', strtotime($member_posted->start_date)) !!}</td>
                                                   <td>{{$member_posted->duration}}</td>
                                                  <?php
                                                      // $end_date = new DateTime($member_posted->end_date);
                                                      // $remain = $end_date->diff(new DateTime());
                                                      $end_date = strtotime($member_posted->end_date);
                                                      $remain = $end_date - time();
                                                      
                                                      $days_remaining = floor($remain/86400);
                                                      $hours_remaining = floor($remain % 86400)/3600;
                                                      $hours =  (int)$hours_remaining;
                                                   ?>
                                                   <td>
                                                      {!! "$days_remaining days and $hours hours left" !!}
                                                   </td>

                                                   <?php
                                                      // $str_date = $member_posted->check_duration;                                                       $cont_date = date('d-m-Y', $str_date);
                                                      //   $cont_date = Covert('d-m-Y', $str_date,Date());
                                                      //     $expiring_date = Date($cont_date);
                                                         // {!! date('d-m-Y', "$str_date") !!}
                                                   ?>
                                                   <td class="">
                                                      <button type="button" class="model_bt btn btn-danger float-right btn-xs" data-toggle="modal" data-target="#myModal{{$member_posted->member_id}}" href="#">Terminate</button>  
                                                         
                                                   </td> 
                                          </tr>
                                                  <!-- model popup begins here -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal{{$member_posted->member_id}}">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Terminate Posting {{ $member_posted->member_id}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                
                     <!-- Modal body -->
                           <div class="modal-body">
                                 <form action="{{route('terminate.member', ['id' =>$member_posted->member_id ])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="member_id" value="{{$member_posted->member_id}}">
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text">Name</span>
                                       </div>
                                       <input type="text" name="member_name" value="{{App\Models\User::find($member_posted->member_id)->name}}" class="form-control">
                                    </div>
                                      
                                       <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text">Subunit</span>
                                       </div>
                                       <select name="subunit_id" class="form-control">
                                          <option value="{{$member_posted->subunit_id}}">{{App\Models\Subunit::find($member_posted->subunit_id)->name}}</option>
                                       </select>
                                       
                                       </div>
                                       <div class="input-group mb-3">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Action</span>
                                             </div>
                                             
                                             <select name="is_terminated" id="" class="form-control">
                                                <option value="">Select Action</option>
                                                <option value="1">Repost</option>
                                                <option value="2">Transfer</option>
                                                <option value="3">Suspend</option>
                                                <option value="4">Terminate</option>
                                             </select>
                                       </div>
                                       <div class="input-group mb-3">                                      
                                          <textarea name="reason" placeholder="State Reason" class="form-control" cols="10" rows="4"></textarea>
                                       </div>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon3"> Date Terminated</span>
                                          </div>
                                          <input type="date" name="date_terminated" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                       </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer"> 
                                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> 
                                             <button type="submit" class="btn btn-danger" >Terminate</button>
                                                                
                                       </div> 
                                       
                                 </form>         
                           </div>  
                               
                  </div>
            </div>
        </div>
               <!-- end model popup -->

                                           @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        

                 
           
     
           

@endsection