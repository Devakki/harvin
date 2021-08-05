<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:type"         content="website" />
    <meta property="og:image:width"  content="1024">
    <meta property="og:image:height" content="1024">

    @stack("meta-tags")

    <!-- Styles -->
    <link href="{{asset("fonts/stylesheet.css")}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') . "?v=". env("APP_CSS_VERSION", 1) }} " rel="stylesheet">

    <!-- favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- favicon icon -->
    <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/aos/aos.css') }}" rel="stylesheet"> 
    

    <link href="{{ asset('plugins/datatables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> 

    @stack("styles")
</head>
<body>
    <div id="app" class="greenplaces-main-body">
        @include("includes.header")
        <main>
            @yield('content')
        </main>
        @include("includes.footer")
    </div>
    <script src="{{ asset('js/app.js')."?version=". env("APP_JS_VERSION", 1) }}"></script>
    <script src="{{ asset('plugins/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/aos/aos.js') }}"></script> 
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('dukesurgery.recaptcha.sitekey') }}"></script>
    
    <script src="{{ asset('plugins/swiper/swiper-bundle.min.js')}}"></script>   
    
    <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script> 
    <!-- Start of HubSpot Embed Code --> <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/20203299.js"></script> <!-- End of HubSpot Embed Code -->
    @if(Request::is('blog/*') || Request::is('blog') || Request::is('pledge/*') || Request::is('pledge'))
        <script type="text/javascript">
            var header = $(".greenp-header-bar-wrapper");
                document.addEventListener("DOMContentLoaded", function(){

                el_autohide = $(".greenp-header-bar-wrapper");
                
                if(el_autohide){
                    var last_scroll_top = 0;
                    window.addEventListener('scroll', function() {
                        let scroll_top = window.scrollY;
                        if(scroll_top < last_scroll_top) {
                            header.addClass("th-scroll-header");
                        }
                        else {
                            header.removeClass("th-scroll-header");
                        }
                        last_scroll_top = scroll_top;
                    }); 
                }
            }); 
        </script>
    @else
        <script type="text/javascript">
            $(document).ready(function(){
                var header = $(".greenp-header-bar-wrapper");
                $(this).scrollTop(0);
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 40) {
                        header.addClass("th-scroll-header");
                    } else {
                        header.removeClass("th-scroll-header");
                    }
                });
            });
        </script>
    @endif
    
    @stack("scripts")
    <script type="text/javascript">                
        AOS.init({once:'true'}); 

        $(document).ready(function(){
            // var header = $(".greenp-header-bar-wrapper");
            // $(this).scrollTop(0);
            // $(window).scroll(function() {
            //     var scroll = $(window).scrollTop();
            //     if (scroll >= 40) {
            //         header.addClass("th-scroll-header");
            //     } else {
            //         header.removeClass("th-scroll-header");
            //     }
            // });
            $(".navbar-toggler").click(function(){
                var nav_button = $(this).attr('aria-expanded')
                
                    if(nav_button == "true") {
                    
                        document.body.classList.remove("openMenu")
                        
                    } else {
                        document.body.classList.add("openMenu")
                    }
		    });
        });

        function getRecapcha() {
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('dukesurgery.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                    if (token) {
                      document.getElementById('recaptcha_token').value = token;
                    }
                });
            });
        }

    </script>
    @include('admin.includes.custom')
</body>
</html>
