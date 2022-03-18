@php
$sliders = DB::table('sliders')->get();

@endphp


       <!-- ======= hero Section ======= -->
       <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          @foreach($sliders as $key => $slider)

          <div class="carousel-item {{ $key == 0 ? 'active' : '' }} " style="background-image: url({{asset($slider->image)}})">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">{{$slider->title}}</h2>
                <p class="animate__animated animate__fadeInUp">{{$slider->description}}</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- <div class="carousel-item" style="background-image: url(assets2/img/hero-carousel/tcu2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">We are Professionala </h2>
                <p class="animate__animated animate__fadeInUp">We deliver only the best and exceeds  service expectation </p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets2/img/hero-carousel/tcu3.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">The Best Studio Visual</h2>
                <p class="animate__animated animate__fadeInUp">We are the colour and beauty of the church and present them to the world</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div> -->

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->   