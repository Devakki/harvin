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
<div class="basic-breadcrumb-area bg-opacity bg-1 ptb-100">
    <div class="container">
        <div class="basic-breadcrumb text-center">
            <h3 class="">Blog 3 column</h3>
            <ol class="breadcrumb text-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li class="active">Blog</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<div class="latest-news-area gray-bg pt-90 pb-60">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-4 col-lg-4">
                <article class="post format-image bg-white">
                    <div class="post-preview">
                        <a href="#"><img src="img/blog/1.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
                        <ul class="post-meta">
                            <li>October 24, 2017</li>
                            <li>By <a href="#">basictheme</a></li>
                        </ul>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <article class="post format-image bg-white">
                    <div class="post-preview">
                        <a href="#"><img src="img/blog/2.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
                        <ul class="post-meta">
                            <li>October 24, 2017</li>
                            <li>By <a href="#">basictheme</a></li>
                        </ul>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <article class="post format-image bg-white">
                    <div class="post-preview">
                        <a href="#"><img src="img/blog/3.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
                        <ul class="post-meta">
                            <li>October 24, 2017</li>
                            <li>By <a href="#">basictheme</a></li>
                        </ul>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <article class="post format-image bg-white">
                    <div class="post-preview">
                        <a href="#"><img src="img/blog/4.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
                        <ul class="post-meta">
                            <li>October 24, 2017</li>
                            <li>By <a href="#">basictheme</a></li>
                        </ul>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <article class="post format-image bg-white">
                    <div class="post-preview">
                        <a href="#"><img src="img/blog/5.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
                        <ul class="post-meta">
                            <li>October 24, 2017</li>
                            <li>By <a href="#">basictheme</a></li>
                        </ul>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <article class="post format-image bg-white">
                    <div class="post-preview">
                        <a href="#"><img src="img/blog/6.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
                        <ul class="post-meta">
                            <li>October 24, 2017</li>
                            <li>By <a href="#">basictheme</a></li>
                        </ul>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        <a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav>
                    <ul class="pagination">
                        <li><a href="#" aria-label="Previous"><i class="ion-ios-arrow-back"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#" aria-label="Next"><i class="ion-ios-arrow-forward"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="clients-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="clients-active owl-carousel">
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-1.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-2.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-3.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-4.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-5.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-6.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-1.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-2.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
