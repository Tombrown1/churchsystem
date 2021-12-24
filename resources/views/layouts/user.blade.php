@include('includes.header')
        @include('includes.user_sidebar')
        
        @include('includes.navbar')
        <!-- dashboard inner -->
        <div class="midde_cont">
            <div class="container-fluid">
                <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                </div>
             @include('includes.user_content')
            
            @yield('content')

           

@include('includes.footer')