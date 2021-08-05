@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Blog">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">
   
@endpush

@section('content')
    <div class="greenplaces-main">
    
        
        <section class="greenp-blog-banner-img">
        @if(isset($sliderBlog) && !empty($sliderBlog))
            <div class="container-fluid">
                <div class="greenp-blog-banner-details" data-aos="fade-up" data-aos-duration="1500">
                    <div class="greenp-blog-banner">
                        <img src="{{ $sliderBlog->thumb_detail_image_full_path }}" alt="">
                    </div>
                    <div class="greenp-denner-details">
                        <h4> {{ $sliderBlog->name }}</h4>
                        @php
                        $string = $sliderBlog->short_description;
                        $truncated = (strlen($string) > 100) ? substr($string, 0, 100) . '...' : $string;
                        @endphp
                        <p class="greenp-paragraph-text">{{ $truncated }}</p>
                        <ul class="greenp-blog-tagtitle">
                           <li class="green-month-title-main">By {{ $sliderBlog->author_name }}</li>
                           <li class="green-month-title-main">{{ $sliderBlog->reading_time }} min read</li>
                           <li class="green-month-title-main">
                                @if($sliderBlog->hashtags->count())
                                    @foreach($sliderBlog->hashtags as $hashtag)
                                        <a href="{{ url('/blog/tag')."/".$hashtag->slug }}">#{{ $hashtag->name}}</a>
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                        <a href="{{ url('/blog')."/".$sliderBlog->slug }}" class="greenp-next-arrow"><img src="{{ asset('images/next-arrow.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        @endif
        </section>
        

        <section class="greenp-block-list-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7 col-lg-8">
                        <div>
                            <h6 class="greenp-blog-title-main" data-aos="fade-up" data-aos-duration="1500">The latest</h6>
                            <div class="scrolling-pagination">
                                <div class="row">
                                    @foreach($latestBlog as $blog)
                                    <div class="col-md-12 col-lg-6" data-aos="fade-up" data-aos-duration="1500">
                                        <div class="greenp-block-wrapper">
                                            <a href="{{ url('/blog')."/".$blog->slug }}" class="greenp-block-img">
                                                <img src="{{ $blog->thumb_image_full_path }}" alt="">
                                            </a>
                                            <div>
                                                <a href="{{ url('/blog')."/".$blog->slug }}" class="greenp-blog-title-main">{{ $blog->name }}</a> 
                                                <p class="greenp-paragraph-text">{{ $blog->short_description }}</p>
                                                <ul class="greenp-blog-tagtitle">
                                                    <li class="green-month-title-main">By {{ $blog->author_name }}</li>
                                                    <li class="green-month-title-main">{{ $blog->reading_time }} min read</li>
                                                    <li class="green-month-title-main">
                                                        @if($blog->hashtags->count())
                                                            @foreach($blog->hashtags as $hashtag)
                                                                <a href="{{ url('/blog/tag')."/".$hashtag->slug }}">#{{ $hashtag->name}}</a>
                                                            @endforeach
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-12 col-lg-12">
                                        {{ $latestBlog->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                            @if( ! $latestBlog->count() ) 
                                <p class="greenp-paragraph-text" >No artical found!</p> 
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="">
                            <h6 class="greenp-blog-title-main" data-aos="fade-up" data-aos-duration="1500">Topics</h6>
                            <div class="greenp-topics-filter" data-aos="fade-up" data-aos-duration="1500">
                                <form class="form-inline" method="get" action="{{ url('/blog') }}">
                                    <input class="form-control" type="search" placeholder="Search" name="search" value="{{ Request::query('search') }}">
                                    <button class="greenplace-theme-btn" type="submit">Search</button>
                                </form>
                                @if(isset($popularHashtags) && !empty($popularHashtags))
                                <ul class="greenp-potics-list">
                                    @foreach($popularHashtags as $hashtag)
                                    <li><a href="{{ url('/blog/tag')."/".$hashtag->slug }}" class="greenp-potics-btns">#{{ $hashtag->name }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            @if( $popularBlog->count() ) 
                                <div class="greenp-popular-articles">
                                    <h6 class="greenp-blog-title-main" data-aos="fade-up" data-aos-duration="1500">Popular articles</h6>
                                    @foreach($popularBlog as $blog)
                                        <div class="greenp-block-wrapper" data-aos="fade-up" data-aos-duration="1500">
                                            <div class="greenp-popular-articles-list"> 
                                                <a class="articles-title" href="{{ url('/blog')."/".$blog->slug }}">{{ $blog->name }}</a>
                                                @php
                                                $string = $blog->short_description;
                                                $truncated = (strlen($string) > 100) ? substr($string, 0, 100) . '...' : $string;
                                                @endphp
                                                <p class="greenp-paragraph-text">{{ $truncated }}</p>
                                                <ul class="greenp-blog-tagtitle">
                                                    <li class="green-month-title-main">By {{ $blog->author_name }}</li>
                                                    <li class="green-month-title-main">{{ $blog->reading_time }} min read</li>
                                                    <li class="green-month-title-main">
                                                        @if($blog->hashtags->count())
                                                            @foreach($blog->hashtags as $hashtag)
                                                                <a href="{{ url('/blog/tag')."/".$hashtag->slug }}">#{{ $hashtag->name}}</a>
                                                            @endforeach
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection

@push('scripts')
<script src="{{ asset('plugins/jscroll/jquery.jscroll.min.js') }}"></script>
<script type="text/javascript">
    
    $(document).ready(function(){                        
        var itemAnimatedCount = true;
        $('ul.pagination').hide();
        $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
            function(event) {   
            if(itemAnimatedCount ) { 
                $(function() {
                    $('.scrolling-pagination').jscroll({
                        loadingHtml: '<div class="text-center mt-2 mb-2"><i class="fa fa-circle-o-notch fa-spin fa-5x fa-fw"></i></div>',
                        autoTrigger: true,
                        padding: 1,
                        nextSelector: '.pagination li.active + li a',
                        contentSelector: 'div.scrolling-pagination',                     
                        callback: function() { 
                            AOS.init();   
                            $('ul.pagination').remove(); 
                        }
                    });
                });
                itemAnimatedCount = false; 
            }
        });                
    });

</script> 
 
@endpush