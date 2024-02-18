<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @if(!empty($meta_title))
                {{$meta_title}}
            @else
                Ye Mun Website
            @endif
        </title>
        @if(!empty($meta_description))
        <meta name="description" content="{{$meta_description}}">
        @endif
        @if(!empty($meta_keywords))
        <meta name="viewport" content="{{$meta_keywords}}">
        @endif
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ url('front/css/assets/bootstrap.min.css') }}">

		<!-- Fontawesome Icon -->
        <link rel="stylesheet" href="{{ url('front/css/assets/font-awesome.min.css') }}">

		<!-- Animate Css -->
        <link rel="stylesheet" href="{{ url('front/css/assets/animate.css') }}">

        <!-- Owl Slider -->
        <link rel="stylesheet" href="{{ url('front/css/assets/owl.carousel.min.css') }}">

        <!-- Custom Style -->
        <link rel="stylesheet" href="{{ url('front/css/assets/normalize.css') }}">
        <link rel="stylesheet" href="{{ url('front/css/style.css') }}">
        <link rel="stylesheet" href="{{ url('front/css/assets/responsive.css') }}">
        <link rel="stylesheet" href="{{ url('front/css/custom.css') }}">
        <link rel="stylesheet" href="{{ url('front/css/easyzoom.css') }}">
    </head>
    <body>

        <!-- Preloader -->
        <div class="preloader">
            <div class="load-list">
                <div class="load"></div>
                <div class="load load2"></div>
            </div>
        </div>
        <!-- End Preloader -->

        <div class="loader">
            <img src="{{ asset('front/images/load-png.gif')}}" alt="laoding..." />
        </div>

        @include('front.layout.header')

        @yield('content')

        @include('front.layout.footer')

        
        <script src="{{ url('front/js/assets/vendor/jquery-1.12.4.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ url('front/js/assets/popper.min.js') }}"></script>
        <script src="{{ url('front/js/assets/bootstrap.min.js') }}"></script>

        <!-- Owl Slider -->
        <script src="{{ url('front/js/assets/owl.carousel.min.js') }}"></script>

        <!-- Wow Animation -->
        <script src="{{ url('front/js/assets/wow.min.js') }}"></script>

        <!-- Price Filter -->
        <script src="{{ url('front/js/assets/price-filter.js') }}"></script>

        <!-- Mean Menu -->
        <script src="{{ url('front/js/assets/jquery.meanmenu.min.js') }}"></script>

        <!-- Custom JS -->
        <script src="{{ url('front/js/plugins.js') }}"></script>
        <script src="{{ url('front/js/custom.js') }}"></script>
        <script src="{{ url('front/js/easyzoom.js') }}"></script>
        <script>
            // Instantiate EasyZoom instances
            var $easyzoom = $('.easyzoom').easyZoom();
    
            // Setup thumbnails example
            var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
    
            $('.thumbnails').on('click', 'a', function(e) {
                var $this = $(this);
    
                e.preventDefault();
    
                // Use EasyZoom's `swap` method
                api1.swap($this.data('standard'), $this.attr('href'));
            });
    
            // Setup toggles example
            var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');
    
            $('.toggle').on('click', function() {
                var $this = $(this);
    
                if ($this.data("active") === true) {
                    $this.text("Switch on").data("active", false);
                    api2.teardown();
                } else {
                    $this.text("Switch off").data("active", true);
                    api2._init();
                }
            });
        </script>
        @include('front.layout.scripts')

    </body>
</html>
