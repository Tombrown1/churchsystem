<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">   

      <div class="logo">
        <!-- <h1><a href="index.html"><span>Technical </span>Unit</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="{{asset('assets2/logos/tcu_winners_logo.png')}}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('index')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Subunit</a></li>          
          <li><a class="nav-link scrollto" href="#team">Leader</a></li>
          <li><a class="nav-link scrollto" href="{{url('gallery')}}">Gallery</a></li>
          <li><a class="nav-link scrollto" href="{{ route('login')}}">Login</a></li>        
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header>