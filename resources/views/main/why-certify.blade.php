@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Why Certify">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">

@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenp-why-certity-page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="greenp-why-certity-details" data-aos="fade-up" data-aos-duration="1500">
                            <h1 class="greenp-page-title-main">Good for the planet, and good for business</h1>
                            <p class="greenp-paragraph-text">research shows that sustainable businesses outperform their competition, recruit the strongest candidates, and have higher employee retention.</p>
                        </div>
                    </div>
                </div>
                <div class="greenp-compelling-img" data-aos="fade-up" data-aos-duration="1500">
                    <img src="{{ asset('images/why-certify-img.svg') }}" alt="">
                </div>
            </div>
        </section>
        @if( $pledges->count() )
        <section class="greenp-technology-wrapper">
            <div class="container">
                <div class="greenp-technology-slider" data-aos="fade-up" data-aos-duration="1500">
                    <div class="swiper-container" id="greenplaces-technology">
                        <div class="swiper-wrapper">
                        @foreach($pledges as $index => $pledge)
                           <div class="swiper-slide">
                                <a  href="{{ url('/blog')."/".$pledge->slug }}" class="greenp-technology-details">
                                    <div class="greenp-technology-img">
                                        <img src="{{ $pledge->thumb_image_full_path }}" alt="">
                                    </div>
                                    <div class="greenp-technology-data">
                                        <h4 class="greenp-subtitle-small">{{ $pledge->name }}</h4>
                                        <p class="greenp-paragraph-text">{{ $pledge->short_description }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="greenp-swiper-errow-block-main" id="greenplaces-technology">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <section class="greenp-hundreds-wrapper">
            <div class="container">
                <div class="greenp-hundreds-title" data-aos="fade-up" data-aos-duration="1500">
                    <h3 class="greenp-subtitle">Thousands of small businesses can fuel major change</h3>
                </div>
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="greenp-hundreds-list-block">
                            <div class="row" data-aos="fade-up" data-aos-duration="1500">
                                <div class="col-md-6">
                                    <div class="greenp-hundreds-img">
                                        <img src="{{ asset('images/changeishard-01.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="greenp-hundreds-details">
                                        <h4 class="greenp-subtitle-small">Change is hard</h4>
                                        <p class="greenp-paragraph-text">Working by yourself to fix a problem on the scale of global climate change can seem like a daunting task. That’s because it is. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" data-aos="fade-up" data-aos-duration="1500">
                                <div class="col-md-6">
                                    <div class="greenp-hundreds-details">
                                        <h4 class="greenp-subtitle-small">We make it easier, together</h4>
                                        <p class="greenp-paragraph-text">We help you to pool your resources with hundreds of other small businesses to make a big impact together. Through Green Places, your efforts toward combating climate change become much more effective than any single company could ever be alone.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="greenp-hundreds-img">
                                        <img src="{{ asset('images/together-02.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenp-way-easier-wrapper-main">
            <div class="container">
                <div class="greenp-way-easier-title" data-aos="fade-up" data-aos-duration="1500">
                    <h3 class="greenp-subtitle">We calculate your carbon footprint in under a minute</h3>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-easier-projects-details">
                            <div class="greenp-easier-product-img">
                                <img src="{{ asset('images/product-icon-01.svg') }}" alt="">
                            </div>
                            <div class="greenp-easier-product-details">
                                <h4 class="greenp-subtitle-small">We calculate your carbon footprint in under 5 minutes.</h4>
                                <a href="javascript:void(0);" class="greenp-readmore-btn" data-toggle="modal" data-target="#exampleModalCenter">Calculating your footprint<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-easier-projects-details">
                            <div class="greenp-easier-product-img">
                                <img src="{{ asset('images/product-icon-02.svg') }}" alt="">
                            </div>
                            <div class="greenp-easier-product-details">
                                <h4 class="greenp-subtitle-small">We fund projects that offset your footprint.</h4>
                                <a href="{{ url('/blog') }}" class="greenp-readmore-btn">See our projects<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-easier-projects-details">
                            <div class="greenp-easier-product-img">
                                <img src="{{ asset('images/product-icon-03.svg') }}" alt="">
                            </div>
                            <div class="greenp-easier-product-details">
                                <h4 class="greenp-subtitle-small">You get all the credit, and we promote you to the world</h4>
                                <a href="{{ url('/greenplaces-work') }}" class="greenp-readmore-btn">See the list<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($testimonial) && !empty($testimonial))
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greend-customer-wrapper">
                            <p class="greenp-paragraph-text">{{ $testimonial->testimonial }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </div>
@endsection

@push('scripts')

<script>
    var swiper = new Swiper("#greenplaces-technology", {
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
                slidesPerView: 2.5,
            },
            992: {
                slidesPerView: 3,
            },
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: "#greenplaces-technology .swiper-button-next",
            prevEl: "#greenplaces-technology .swiper-button-prev",
        }
    });
</script>
@endpush
