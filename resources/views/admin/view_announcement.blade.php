@section('title', 'View Announcement')
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
                              <h2>View Announcement</h2>                              

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
                        <div class="col-md-1">                           

                            </div>
                        
                        <div class="col-md-10 float-right">
                           <div class="white_shd full margin_bottom_30">
                              
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                     <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                            <div class="profile_contant">
                                             <div class="card">
                                                <div class="card-header">
                                                   <p><h3>{{$announcement->announce_cat->name}} Message</h3></p>
                                                   <p><h5>{{$announcement->title}}</h5></p>
                                                </div>
                                                <div class="card-body">
                                                   <p>{{$announcement->message}}</p>
                                                   <p><img src="{{asset('/storage/'.$announcement->image)}}" alt="" class="img-fluid"></p>
                                                </div>
                                                <div class="card-footer">
                                                  <p>Posted By: <span class="badge badge-primary"> {{$announcement->user->name}}</span>   | Date: {!!date('d-m-Y',strtotime($announcement->created_at))!!}</p>
                                                </div>
                                             </div>                                            
                                          </div>
                                       </div>
                                       <!-- profile contant section -->
                                      
                                       <!-- end user profile section -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1">
                        
                        </div>
                        
                        <!-- end row -->
                     </div>




@endsection