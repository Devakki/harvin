@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Home">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">

@endpush

@push('styles')
<link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet"> 

@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenplaces-banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-6">
                        <div class="greenp-banner-details">
                            <div class="">
                                <h1 class="greenp-page-title-main">Erase your company footprint. Fast.</h1>
                                <p class="greenp-paragraph-text">Reducing your carbon footprint isn't just good for the planet; it's good for business. We make it simple to become a Green Place to Work. Get started by calculating your footprint.</p>
                            </div>
                            <div class="greenp-calculate-block">
                                <button type="button" class="greenplace-theme-btn" data-toggle="modal" data-target="#exampleModalCenter">Calculate your Carbon Footprint</button>
                                <p class="greenp-paragraph-text">Takes less than a minute!</p>
                            </div>
                        </div>
                    </div>
                    <div class="greenp-banner-img-cover">
                        <div class="greenp-banner-img">
                            <img src="{{ asset('images/sapling-optimized.gif') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenn-brand-section-main">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="text-center">
                            <h4 class="greenp-subtitle-small">Carbon credits verified by:</h4> 
                        </div>
                        <div class="greenn-brand-wrapppe" data-aos="fade-up" data-aos-duration="1500">
                            @foreach($credibility_brands as $index => $credibility_brand )
                            <div class="greenn-brand-box">
                                <img src="{{ $credibility_brand->thumb_image_full_path }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="green-carbonzero-wrapper-main">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div class="green-carbonzero-details">
                            <div class="env-three">
                                <div class="" data-aos="fade-up" data-aos-duration="1500">
                                    <h3 class="greenp-subtitle">Zero to <span>Carbon Zero</span> in less than a minute</h3>
                                </div>
                            </div>
                            <div id="lottie-three"></div>
                            <div class="greenp-carbon-zero-mobile-view">
                                <div class="greenp-carbon-zero-details" data-aos="fade-up" data-aos-duration="1500">
                                    <h4>1. Your company produces carbon emissions</h4>
                                    <ul>
                                        <li><img src="{{asset('images/car-icon-ani.svg') }}" alt=""></li>
                                        <li><img src="{{asset('images/idea-icon.svg') }}" alt=""></li>
                                        <li><img src="{{asset('images/box-icons.svg') }}" alt=""></li>
                                        <li><img src="{{asset('images/plane-icon.svg') }}" alt=""></li>
                                    </ul>
                                    <p>Emissions can come from unexpected places including your daily commute, electric lighting, data servers, and air travel.</p>
                                </div>
                                <div class="greenp-carbon-zero-details" data-aos="fade-up" data-aos-duration="1500">
                                    <h4>2. We invest in carbon negative projects on your behalf</h4>
                                    <ul>
                                        <li><img src="{{asset('images/tree-icon.svg') }}" alt=""></li>
                                        <li><img src="{{asset('images/Windmill-icon.svg') }}" alt=""></li>
                                        <li><img src="{{asset('images/solar-panel-icon.svg') }}" alt=""></li>
                                        <li><img src="{{asset('images/electricity-icon.svg') }}" alt=""></li>
                                    </ul>
                                    <p>Planting trees, wind and solar farms, renewable energy—These projects all help remove carbon from our atmosphere.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenp-invest-section">
            <div class="container">
                <div class="row">
                    <div class="offset-md-2 col-md-8">
                        <div class="greenp-invest-text" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="greenp-subtitle">We invest in green projects for a sustainable future</h3>
                        </div>
                    </div>
                </div>
                <div class="green-projects-details-wrapper">
                    <ul class="nav" id="myTab" role="tablist" data-aos="fade-up" data-aos-duration="1500">
                        @foreach($blog_sustainables as $index => $blog_sustainable )
                        <li class="nav-item">
                            <a class="nav-link {{ $index== 0 ? 'active' : '' }}" id="{{ $blog_sustainable->slug }}-tab" data-toggle="tab" href="#{{ $blog_sustainable->slug }}" role="tab" aria-controls="{{ $blog_sustainable->slug }}" aria-selected="true">{{ $blog_sustainable->name }}</a>
                        </li>
                        @endforeach 
                    </ul>
                    <div class="tab-content" id="myTabContent" data-aos="fade-up" data-aos-duration="1500">
                    @foreach($blog_sustainables as $index => $blog_sustainable) 
                        <div class="tab-pane fade show {{ $index== 0 ? 'active' : '' }}" id="{{ $blog_sustainable->slug }}" role="tabpanel" aria-labelledby="{{ $blog_sustainable->slug }}-tab">
                            <div class="green-projects-step-list">
                                <div class="green-projects-step-img">
                                    <img src="{{ $blog_sustainable->thumb_image_full_path }}">
                                </div>
                                <div class="green-projects-step-details">
                                    <h4 class="greenp-subtitle-small">{{ $blog_sustainable->name }}</h4>
                                    <p class="greenp-paragraph-text">{{ $blog_sustainable->short_description }} </p>
                                    <a href="{{ url('/blog')."/".$blog_sustainable->slug }}" class="greenp-readmore-btn">Read More <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                      
                    </div>
                </div>
            </div>
        </section>
        <section class="greenp-benefits-section">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div class="greenp-benefits-title" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="greenp-subtitle">Read how these leaders have made sustainability a priority</h3>
                        </div>
                    </div>
                </div>
                <div class="greenp-benefits-details-list" data-aos="fade-up" data-aos-duration="1500">
                    <div class="swiper-container" id="client-story-slider">
                        <div class="swiper-wrapper">
                            @foreach($blog_clients as $index => $blog_client) 
                                <div class="swiper-slide">
                                    <div class="greenp-benefits-details">
                                        <a href="{{ url('/blog')."/".$blog_client->slug }}" class="greenp-benefits-images-box">
                                            <div class="greenp-client-img">
                                                <img src="{{ $blog_client->thumb_image_full_path }}">
                                            </div>
                                            <div class="green-place-image-logo">
                                                <img src="images/green-place-image.svg">
                                            </div>
                                        </a>
                                        <div class="greenp-client-details">
                                            <a href="{{ url('/blog')."/".$blog_client->slug }}" class="greenp-subtitle-small">{{ $blog_client->name }}</a>
                                            <p class="greenp-paragraph-text">{{ $blog_client->short_description }} <a href="{{ url('/blog')."/".$blog_client->slug }}" class="greenp-readmore-btn">Read More <i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
                                        </div>
                                    </div>
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
        <section class="greenp-client-logos-wrapper">
            <div class="container">
                <div class="greenp-client-logos-list" data-aos="fade-up" data-aos-duration="1500">
                @foreach($organizations as $index => $organization) 
                    <div class="greenp-client-logos">
                        <img src="{{ $organization->thumb_image_full_path }}">
                    </div>
                @endforeach
                </div>
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div class="greenp-directory-wrapper" data-aos="fade-up" data-aos-duration="1500">
                            <h4 class="greenp-subtitle-small">Explore Green Places to Work </h4>
                            <a href="{{ url('/greenplaces-work') }}" class="greenp-readmore-btn">See the list<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 


@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js"></script>

<script>
    
        var animData = {
    container: document.getElementById('lottie-three'),
    path: 'https://assets10.lottiefiles.com/packages/lf20_977jxew7.json',
    renderer: 'svg',
    loop: false,
    autoplay: false,
    name: "animScroll",
    }, animScroll, tl;


var animScroll = bodymovin.loadAnimation(animData)


animScroll.addEventListener('DOMLoaded', function () {
  tl = new TimelineMax({repeat: 0})
  tl.to({frame: 0}, 1, {
    frame: animScroll.totalFrames-1,
    onUpdate: function() {
      animScroll.goToAndStop(Math.round(this.target.frame), true)
    },
    Ease:Linear.easeNone
  })
  
  var controller = new ScrollMagic.Controller();

var scene = new ScrollMagic.Scene({
  triggerElement: ".env-three",
  offset: 300,
  duration: 1500 }).setTween(tl).setPin("#lottie-three").addTo(controller);

});
var ourLideSwiper = new Swiper("#client-story-slider", {
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
