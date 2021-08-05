@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Company">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">
   
@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenp-directory-banner-wrapper">
            <div class="container-fluid">
                <div class="swiper-container" id="greenplaces-directory">
                    <div class="swiper-wrapper">
                    @foreach($testimonials as $index => $testimonial) 
                        <div class="swiper-slide">
                            <div class="greenp-directory-details-wrapper">
                                <div class="greenp-directory-banner-img">
                                    <img src="{{ $testimonial->image_full_path }}">
                                </div>
                                <div class="greenp-testimonial-details">
                                    <h3 class="greenp-subtitle">{{ $testimonial->title }}</h3>
                                    <div class="greenp-testimonial-and-logo">
                                        <div class="greenp-testimonial-text">
                                            <img src="{{ asset('images/testimonial-border-img.svg') }}">
                                            <div class="greenp-customer-text">
                                                <p class="greenp-paragraph-text">{{ $testimonial->testimonial }}</p>
                                            </div>
                                        </div>
                                        <div class="green-place-directory">
                                            <img src="{{ asset('images/green-place-image.svg') }}">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="greenp-swiper-errow-block-main"> 
                    <div id="swiper-directory-button-next" class="swiper-button-next"></div>
                    <div id="swiper-directory-button-prev" class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <section class="greenp-carbon-offset-wrapper">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="greenp-carbon-offset-details">
                            <div class="greenp-carbon-img-block">
                                <img src="{{ asset('images/carbon-icon.svg') }}">
                            </div>
                            <div class="greenp-carbon-offset-tost-details">
                                <h4 ><span class="count">{{ $company->tone_offset }}</span> metric tons</h4>
                                <h5>of carbon offset since 2021.</h5>
                            </div>
                            <div class="greenp-taking-block">
                                <h6>That’s like taking <span>{{ $company->car_compair }} cars</span> off the road, <p> permanently.</p></h6>
                                <div class="greenp-car-img">
                                    <img src="{{ asset('images/car-icon.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenp-our-green-wrapper" id="our_green_pledge">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div class="greenp-our-green-block">
                            <h3 class="greenp-subtitle">Our sustainable initiatives</h3>
                            <p class="greenp-paragraph-text">{{ $company->sustainable }}</p> 
                        </div>
                    </div>
                </div>
                <div class="greenp-technology-slider">
                    <div class="swiper-container" id="ourgreenpledgeslide">
                        <div class="swiper-wrapper">
                            @foreach($pledges as $pledge)
                            <div class="swiper-slide">
                                <a  href="{{ url('/pledge')."/".$pledge->slug }}" class="greenp-technology-details">
                                    <div class="greenp-technology-img">
                                        <img src="{{ $pledge->thumb_image_full_path }}">
                                    </div>
                                    <div class="greenp-technology-data">
                                        <h4 class="greenp-subtitle-small">{{ $pledge->title }}</h4>
                                        <p class="greenp-paragraph-text">{{ $pledge->short_description }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="greenp-swiper-errow-block-main"> 
                        <div id="swiper-lide-button-next" class="swiper-button-next"></div>
                        <div id="swiper-lide-button-prev" class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenp-workwith-wrapper" id="work_with_us">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="greenp-workwith-block">
                            <h3 class="greenp-subtitle">Come work with us!</h3>
                            <p class="greenp-paragraph-text">{{ $company->summery }}</p> 
                            <a href="{{ $company->careerlink }}" target="_blank" class="greenplace-theme-btn">See our open positions</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection

@push('scripts')

<script>
    $(document).ready(function() {

        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
    var swiperDirectory = new Swiper("#greenplaces-directory", {
        spaceBetween: 15,
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: "#swiper-directory-button-next",
            prevEl: "#swiper-directory-button-prev",
        },
    });
    var ourLideSwiper = new Swiper("#ourgreenpledgeslide", {
        spaceBetween: 15,
        loop: true,
        breakpoints: {
            480: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1.5,
            },
            767: {
                slidesPerView: 2.1,
            },
            991: {
                slidesPerView: 3,
            },
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: "#swiper-lide-button-next",
            prevEl: "#swiper-lide-button-prev",
        }
    });
</script>
@endpush