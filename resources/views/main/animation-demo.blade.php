@extends('layouts.app')

@push('meta-tags')

    <title>Why Certify | {{ env('APP_NAME') }}</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Why Certify">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Why Certify | {{ env('APP_NAME') }}" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo01.svg') }}" />
    <meta property="og:image:type"   content="image/png">
   
@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenplaces-banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-6">
                        <div class="greenp-banner-details">
                            <h1 class="greenp-page-title-main">A strong value prop goes here</h1>
                            <p class="greenp-paragraph-text">The job of this section is to quickly communicate how Green Places provides value and how it’s different. The job o ection is to quickly communicate how Green Places provides value.</p>
                            <div class="greenp-calculate-block">
                                <button type="button" class="greenplace-theme-btn" data-toggle="modal" data-target="#exampleModalCenter">Calculate your Carbon Footprint</button>
                                <p class="greenp-paragraph-text">Takes less than a minute!</p>
                            </div>
                        </div>
                    </div>
                    <div class="greenp-banner-img-cover">
                        <div class="greenp-banner-img">
                            <img src="{{ asset('images/Banner-image.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="green-carbonzero-wrapper-main animation-demo-section">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div class="green-carbonzero-details">
                            <div class="">
                                <h3 class="greenp-subtitle">Zero to <span>Carbon Zero</span> in less than a minute</h3>
                            </div>
                        </div>
                        <div class="greenp-steps-animation-block">
                            <div class="green-carbonzero-produces">
                                <div class="green-carbonzero-text step_1">
                                    <h5 class="greenp-subtitle-small">1. Your company produces carbon emissions</h5>
                                    <p class="greenp-paragraph-text">Emissions can come from unexpected places including your daily commute, electric lighting, data servers, and air travel.</p>
                                </div>
                                <div class="green-carbonzero-text step_2">
                                    <h5 class="greenp-subtitle-small">2. Your company produces carbon emissions</h5>
                                    <p class="greenp-paragraph-text">Emissions can come from unexpected places including your daily commute, electric lighting, data servers, and air travel.</p>
                                </div>
                            </div>
                            <div class="greenp-steps-icons-wrapper">
                                <div class="greenp-steps-icons-list">
                                    <div class="greenp-steps-one-and-two">
                                        <img src="{{asset('images/number-icon-01.svg') }}" alt=""> 
                                    </div>
                                    <div class="greenp-steps-icons-list-wrapper">
                                        <div class="greenp-steps-icons car-icon">
                                            <img src="{{asset('images/car-icon-ani.svg') }}" alt=""> 
                                        </div>
                                        <div class="greenp-steps-icons idea-icon">
                                            <img src="{{asset('images/idea-icon.svg') }}" alt=""> 
                                        </div>
                                        <div class="greenp-steps-icons box-icon">
                                            <img src="{{asset('images/box-icons.svg') }}" alt=""> 
                                        </div>
                                        <div class="greenp-steps-icons plane-icon">
                                            <img src="{{asset('images/plane-icon.svg') }}" alt=""> 
                                        </div>
                                    </div>
                                </div>
                                <div class="greenp-steps-icons-list greenp-steps-two-block">
                                    <div class="greenp-steps-number-two">
                                        <img src="{{asset('images/number-icon-02.svg') }}" alt=""> 
                                    </div>
                                    <div class="greenp-steps-icons-list-wrapper">
                                        <div class="greenp-steps-icons tree-icon">
                                            <img src="{{asset('images/tree-icon.svg') }}" alt=""> 
                                        </div>
                                        <div class="greenp-steps-icons windmill-icon">
                                            <img src="{{asset('images/Windmill-icon.svg') }}" alt=""> 
                                        </div>
                                        <div class="greenp-steps-icons solar-panel-icon">
                                            <img src="{{asset('images/solar-panel-icon.svg') }}" alt=""> 
                                        </div>
                                        <div class="greenp-steps-icons electricity-icon">
                                            <img src="{{asset('images/electricity-icon.svg') }}" alt=""> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grennp-border-line-img">
                                <img src="{{asset('images/border-line-icon-main.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenplaces-banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-6">
                        <div class="greenp-banner-details">
                            <h1 class="greenp-page-title-main">A strong value prop goes here</h1>
                            <p class="greenp-paragraph-text">The job of this section is to quickly communicate how Green Places provides value and how it’s different. The job o ection is to quickly communicate how Green Places provides value.</p>
                            <div class="greenp-calculate-block">
                                <button type="button" class="greenplace-theme-btn" data-toggle="modal" data-target="#exampleModalCenter">Calculate your Carbon Footprint</button>
                                <p class="greenp-paragraph-text">Takes less than a minute!</p>
                            </div>
                        </div>
                    </div>
                    <div class="greenp-banner-img-cover">
                        <div class="greenp-banner-img">
                            <img src="{{ asset('images/Banner-image.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection

@push('scripts')

<script>
//  $('.step_2').hide();
    $(window).scroll(function() {
       var scroll = $(window).scrollTop();
        if (scroll >= 500) {
            $('.greenp-steps-animation-block').addClass("greenp-steps-active");
        //     setTimeout(function(){
        //    $('.step_2').show();
        //    $('.step_1').hide();
        //     }, 3000);
        } else {
            $('.greenp-steps-animation-block').removeClass("greenp-steps-active");
        }
    });
</script>
 
@endpush