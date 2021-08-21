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

<div class="basic-breadcrumb-area bg-opacity bg-1 ptb-100">
    <div class="container">
        <div class="basic-breadcrumb text-center">
            <h3 class="">Product</h3>
            <ol class="breadcrumb text-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Product</a></li>
                <li class="active">Product</li>
            </ol>
        </div>
    </div>
</div>
<div class="product-area pt-90 pb-60">
    <div class="container">

        <div class="row">
            @foreach($blog as $index => $blog )

            <div class="col-md-4 col-sm-4 mb-30">
                <div class="product-box">
                    <div class="product-img">
                        <a href="{{ url('/blog')."/".$blog->slug }}"><img src="{{ $blog->thumb_image_full_path }}" alt="" /></a>

                    </div>
                    <div class="product-content text-center">
                        <h3 class="product-title"><a href="product-details.html">{{ $blog->name }}</a></h3>
                        <p>{{ $blog->short_description }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
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
