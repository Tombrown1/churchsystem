
        @section('title', 'Profile')
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
                              <h2>{{ $user->firstname ." ". $user->lastname }} Posting History</h2>                              

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
                    
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card mt-3">
                                <div class="card-body">
                                   <div class="card">
                                       @if($user->passport == null)
                                       @else
                                        <div class="d-flex justify-content-center">
                                            <img  class="rounded-circle" src="{{asset($user->passport)}}" width="180px" alt="">
                                        </div>
                                       @endif
                                       <br> 
                                        <h4 class="text-center"> Name: {{$user->firstname ." ".$user->lastname}}</h4>
                                        <ul class="list-unstyle text-center">
                                            <li>Email: {{$user->email}} </li>
                                            <li>Phone Number: {{$user->work_phone}} </li>
                                        </ul>
                                       <div class="card-body">
                                           <div class="progress_bar">
                                               <span class="badge badge-primary">Camera Subunit</span>
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <strong>Date Posted</strong> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>{{$user->posting->start_date}}</strong> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <strong>End Date</strong> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>{{$user->posting->end_date}}</strong> 
                                                    </div>
                                                </div>
                                           </div>
                                           
                                       </div>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3"></div>
                </div>     
        </div>

                     
                        

        
        
           

@endsection