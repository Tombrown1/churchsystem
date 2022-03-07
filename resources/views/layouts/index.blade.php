@extends('layouts.admin_master')


@section('admin')
<div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>              
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$count_camera}}</p>
                                    <p class="head_couter">Camera Unit</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$count_cable}}</p>
                                    <p class="head_couter">Console</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$count_console}}</p>
                                    <p class="head_couter">Console Unit</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{$count_prosale}}</p>
                                    <p class="head_couter">Sales and Production</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row column1 social_media_section">
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons fb margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-facebook"></i> -->
                                <a href="{{ route('camera')}}"> <span>Camera</span></a>
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong>{{$count_camera}}</strong></span>
                                       <span>Members</span>
                                    </li>
                                    <li>
                                       <span><strong>50</strong></span>
                                       <span>Probation</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons tw margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-twitter"></i> -->
                                <a href="{{ route('cable')}}"><span>Cable</span></a> 
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong>{{$count_cable}}</strong></span>
                                       <span>Member</span>
                                    </li>
                                    <li>
                                       <span><strong>30</strong></span>
                                       <span>Probation</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons linked margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-linkedin"></i> -->
                                 <a href="{{ route('console')}}"><span>Console</span></a> 
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong>{{$count_console}}</strong></span>
                                       <span>Members</span>
                                    </li>
                                    <li>
                                       <span><strong>20</strong></span>
                                       <span>Probation</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons google_p margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-google-plus"></i> -->
                                 <a href="{{ route('prosale')}}"><span>Prosales</span></a>
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong>{{$count_prosale}}</strong></span>
                                       <span>Members</span>
                                    </li>
                                    <li>
                                       <span><strong>20</strong></span>
                                       <span>Probation</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
@endsection