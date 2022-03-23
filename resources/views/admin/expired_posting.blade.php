
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
                              <h2>Expired Posted Members</h2>
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
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th><strong>S/N</strong></th>
                                             <th><strong>Posted By</strong></th>
                                             <th><strong>Fullname</strong></th>
                                             <th><strong>Subunit</strong></th>
                                             <th><strong>Start Date</strong></th> 
                                             <th><strong>Expired Date</strong></th>
                                             <th><strong>Duration</strong></th>
                                             <th><strong>Terminated</strong></th>
                                             <th><strong>Reason</strong></th>                                        
                                             <th><strong>Date Terminated</strong></th>                                        
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($exp_posted_member as $exp_member)
                                             <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td>{{App\Models\User::find($exp_member->user_id)->name}}</td>
                                                <td>
                                                   @if($exp_member->user == null)
                                                   @else
                                                   {{$exp_member->user->name}}
                                                   @endif

                                                </td>
                                                <td>{{App\Models\Subunit::find($exp_member->subunit_id)->name}}</td>
                                                <td>{{$exp_member->start_date}}</td>
                                                <td>{{$exp_member->expired_at}}</td>
                                                <td>{{$exp_member->duration}}</td>
                                                <td>{{$exp_member->is_terminated}}</td>
                                                <td>{{$exp_member->reason}}</td>
                                                <td style="color:red">{{$exp_member->date_terminated}}</td>
                                             </tr>
                                             
                                          @endforeach                                          
                                       </tbody>                                      
                                    </table>                                          
                                 </div> 
                                 <div class="container">
                                 @if($exp_posted_member->hasPages())
                                                <div class="pagination-wrapper">
                                                   {{$exp_posted_member->links() }}
                                                </div>
                                          @endif
                                 </div>                                
                              </div>                                         
                           </div>
                        </div>
                        
 <!-- model popup begins here -->
         <!-- The Modal -->
        
         <!-- end model popup -->
           
     
           

@endsection