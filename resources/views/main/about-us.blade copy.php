@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, About Us">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">
   
@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenp-about-banner-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-duration="1500">
                        <div class="">
                            <h1 class="greenp-page-title-main">We make sustainability accessible</h1>
                            <p class="greenp-paragraph-text">We’re here to unlock sustainability for all businesses. We believe that every business has the power to make a difference. Our job is to make sustainability something every business can achieve by simplifying impact, and empowering businesses with easy tools and science backend solutions from climate experts</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-about-banner-img">
                            <img src="{{asset('images/group.png') }}" alt=""> 
                        </div>
                    </div>
                </div>
                <div class="greenp-chart-bar-main" data-aos="fade-up" data-aos-duration="1500">
                   
                    @foreach($statics as $index => $static)
                    <div class="greenp-chart-bar-list-wrapper">
                        <div class="greenp-chart-img">
                            <img src="{{ $static->thumb_image_full_path }}" alt=""> 
                        </div>
                        <div class="greenp-chart-details">
                            <h6>{{ $static->number }} <span>{{ $static->name }}</span></h6>
                            <p>{{ $static->short_description }}</p>
                        </div>
                    </div>
                 @endforeach

                </div>
            </div>
        </section>
        <section class="greenp-partner-employee-wrapper">
            <div class="container">
            @foreach($teams as $index => $team)
                @if($index == '0')
                <div class="row greenp-headline-wrapper">
                    <div class="col-md-5" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-headline-block-img">
                            <img src="{{ $team->thumb_image_full_path }}" alt=""> 
                        </div>
                    </div>
                    <div class="offset-md-1 col-md-5" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-headline-details">
                            <h4>{{ $team->name." / ".$team->profile }}</h4>
                            <p class="greenp-paragraph-text">{{ $team->short_description }}</p> 
                           <ul class="greenp-social-icon">
                                <li><a href="{{ $team->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $team->email }}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @else
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="1500">
                            <div class="greenp-partner-employee-list">
                                <div class="greenp-partner-employee-img">
                                    <img src="{{ $team->thumb_image_full_path }}" alt="">
                                </div>
                                <div class="greenp-partner-employee-details">
                                    <h4>{{ $team->name." / ".$team->profile }}</h4>
                                    <p class="greenp-paragraph-text">{{ $team->short_description }}</p> 
                                <ul class="greenp-social-icon">
                                    <li><a href="{{ $team->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $team->email }}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        <section class="greenp-faqs-block-main">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8" data-aos="fade-up" data-aos-duration="1500">
                        <div class="greenp-faqs-block">
                            <h3 class="greenp-subtitle">Frequently Asked Questions</h3> 
                            <div id="accordion">
                                @foreach($faq as $faqdata)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $faqdata->id }}">
                                        <button class="collapsed" data-toggle="collapse" data-target="#collapse{{ $faqdata->id }}" aria-expanded="false" aria-controls="collapse{{ $faqdata->id }}">
                                           {{ $faqdata->question }}
                                            <span class="close-icon"></span>
                                        </button>
                                    </div>
                                    <div id="collapse{{ $faqdata->id }}" class="collapse" aria-labelledby="heading{{ $faqdata->id }}" data-parent="#accordion">
                                        <div class="card-body">
                                            <p class="greenp-paragraph-text">{{ $faqdata->answer }}</p>  
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection

@push('scripts')

 
@endpush