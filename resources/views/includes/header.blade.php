@if(Request::is('greenplaces-work/*'))
<header class="greenp-header-bar-wrapper company-profile-header">
@else
<header class="greenp-header-bar-wrapper">
@endif
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
             @if(Request::is('greenplaces-work/*'))
            <a class="greenp-Company-profile" target="_blank" href="{{ $company->weblink }}">
                <img src="{{ $company->thumb_image_full_path }}" alt="">
            </a>
            @else
            <a class="greenp-logo-wrapper" href="{{ url('/') }}">
                <img src="{{ asset('images/green_places_logo.svg') }}" alt="">
            </a>
            @endif
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" id="header-collapse-btn">
                <span class="toggler-iconsnemu"></span>
                <span class="toggler-iconsnemu"></span>
                <span class="toggler-iconsnemu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            @if(Request::is('greenplaces-work/*'))
                <div class="greenp-company-header">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{ $company->weblink }}">Our website</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#our_green_pledge">Sustainable Strategies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#work_with_us">Careers</a>
                        </li>
                    </ul>
                    <a class="greenp-logo-wrapper" href="{{ url('/') }}">
                        <img src="{{ asset('images/green_places_logo-black.svg') }}" alt="">
                    </a>
                </div>
                @else
                <ul class="navbar-nav ">
                    <li class="nav-item {{ (Request::is("why-certify") || Request::is('why-certify/*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/why-certify') }}">Why Certify?</a>
                    </li>
                    <li class="nav-item {{ (Request::is("greenplaces-work") || Request::is('greenplaces-work/*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/greenplaces-work') }}">Green Places to Work</a>
                    </li>
                    <li class="nav-item  {{ (Request::is("about-us") || Request::is('about-us/*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ (Request::is('blog') || Request::is('blog/*') || Request::is('pledge') || Request::is('pledge/*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item green-get-started-btn">
                        <a href="javascript:void(0);" class="greenplace-theme-btn" data-toggle="modal" data-target="#exampleModalCenter">Get Started</a>
                    </li>
                </ul>
               @endif
            </div>
        </nav>
    </div>
</header>

@push('scripts')    

@endpush