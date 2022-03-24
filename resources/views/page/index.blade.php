@extends('page.page_master')

@section('content')


@include('page.body.slider')
    <br><br>
    <!--Announcement-->
    <div id="about" class="about-area area-padding">
      <div class="container">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Unit Announcement</h2>
            </div>
          </div>
          <div class="slider owl-carousel">
              @foreach($announcement as $announce)
                <div class="card">
                    <div class="img">
                      <img src="{{asset('/storage/'.$announce->image)}}" width="100px" height="100px" alt="">
                    </div>
                    <div class="content">
                      <!-- <div class="title">
                          Briana Tozour
                      </div> -->
                      <div class="sub-title">
                      {{$announce->title}}
                      </div>
                      <p>
                      {{$announce->message}}
                          <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit modi dolorem quis quae animi nihil minus sed unde voluptas cumque. -->
                      </p>
                      <div class="btn">
                        <button><a href="{{route('announce.page', ['id'=>$announce->id])}}">view</a> </button>
                          <!-- <button>Read more</button> -->
                      </div>
                    </div>
                </div>
               @endforeach
          </div>
      </div>
    </div>
    
     <!-- ======= About Section ======= -->
     <div id="about" class="about-area area-padding">
      <div class="container">        
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>About Technical Crew Unit</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">                  
                  <img src="{{asset('frontend/assets/images/group_photo.jpg')}}" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">We are the Eye of the Church</h4>
                </a>
                <p>
                  Technical crew unit is the arm of the church that is responsible for the sounds and the visual organization of the church. The Unit is a big unit is subdivided into various subunit where her work processes is been broken down into different chunks for excellent work delivery.They are categories into four various subunits. <br>
                    <h5>Subunits Includes</h5>
                </p>
                <ul>
                  <li>
                    <i class="bi bi-check"></i>Camera Subunit
                  </li>
                  <li>
                    <i class="bi bi-check"></i>Cable Subunit
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Console Subunit
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Sales and Production Subunit
                  </li>                  
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Our Subunits</h2>
            </div>
            <p>The Subunits of Technical Crew Unit of Living Faith Church D/Line branch is where the various work done by the unit is been carries out and it also help us as a unit to categories our members base on their area of specialization so as to get the best result at every service.</p>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-briefcase"></i>
                  </a>
                  <h4>Camera Subunit</h4>
                  <p style="text-align:justify">
                   The Camera Subunit is an arm of the Technical Crew Unit that is responsible for keeping visual record of service and as well sending visual signal to the control room for live service broadcast. The Unit is one of the most sensitive arm of the unit which add colours and beauty to church service. It is fondly called the eye of the church.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                <div class="well-left">
                  <div class="single-well">
                    <a href="#">
                     
                      <img src="{{asset('frontend/assets/img/subunit/1.jpg')}}" alt="">
                    </a>
                  </div>
                </div>
              </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="{{asset('frontend/assets/img/subunit/7.jpg')}}" alt="">
                </a>
              </div>
            </div>                  
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-binoculars"></i>
                  </a>
                  <h4>Cable Subunit</h4>
                  <p style="text-align:justify">
                    The Cable subunit is an arm of the Technical Crew Unit, whose work role is making sure that all connection ranging from sound appliances, speakers, microphones, television and various devices are in good state so as to experiience uninterrupted service either in the main auditorium or any of the various overflow.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-briefcase"></i>
                  </a>
                  <h4>Console Subunit</h4>
                  <p style="text-align:justify">
                    Console Subunit is an arm of the Technical Crew Unit which is also known as the Unit control room where all Production is closely monitored and conducted. The unit function is to basically facilitate procesess like recording, mixing, mastering, making adjustment giving out the final output to the general audience.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="{{asset('frontend/assets/img/subunit/3.jpg')}}" alt="">
                </a>
              </div>
            </div>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="{{asset('frontend/assets/img/subunit/6.jpg')}}" alt="">
                </a>
              </div>
            </div>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          
          <!-- Footer Begins Here -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-binoculars"></i>
                  </a>
                  <h4>Sales and Production Subunit</h4>
                  <p style="text-align:justify">
                  Production and Sales are both subunit of the Technical Unit that was merge together for efficient work delivery. The Production as an arm makes mass production of every recorded message pass to them by the control room officials, replicating both audio, mp3 and DVD messages and are well package and send to the bookshop for sell. <br>
                  The sales Unit officials then go to bookshop and sign out some copies and reach out to members that might be in need of it so as to bless their life.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->         
        </div>
      </div>
    </div><!-- End Services Section -->
     <!-- Team Area Begins Here -->
     <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our Winning Leaders</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="{{asset('frontend/assets/images/omotosho.jpg')}}" alt="">
                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Bro Omotosho Samuel</h4>
                <p>Unit Leader</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="{{asset('frontend/assets/images/davis.jpg')}}" alt="">

                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Bro Davis Obeleye</h4>
                <p>Unit Assistant Leader</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="{{asset('frontend/assets/images/victor2.jpg')}}" alt="">

                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Bro Victor Ngah</h4>
                <p>Unit Secretary</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="{{asset('frontend/assets/images/pst_david.jpg')}}" alt="">

                </a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
                        <i class="bi bi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="bi bi-instagram"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Pst David Durotiwon</h4>
                <p>Unit Pastor</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div>
  




@endsection