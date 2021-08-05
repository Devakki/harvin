@extends('layouts.app')

@push('meta-tags')

    <title>{{ $pledge->meta_title }}</title>
    <meta name="description" content="{{ $pledge->meta_description }}">
    <meta name="keywords" content="{{ $pledge->meta_keyword }}">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="{{ $pledge->name }}" />
    <meta property="og:description"  content="{{ $pledge->meta_description }}" />
    <meta name="image" property="og:image" content="{{ $pledge->thumb_image_full_path }}" />
    <meta property="og:type" content="website" />
    <!-- <meta property="og:site_name" content="{{ env('APP_URL') }}"/> -->
    
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{ $pledge->name }}" />
    <meta name="twitter:description" content="{{ $pledge->meta_description }}" />
    <meta name="twitter:image" content="{{ $pledge->thumb_image_full_path }}" />
   
@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenp-blog-inner-page">
            <div class="container">
                <div class="row" writeit-autostart>
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="greenp-blog-inner-details" data-aos="fade-up" data-aos-duration="1500">
                            <h1 class="typewriter1 greenp-page-title-main" writeit-animate writeit-speed="12">{{ $pledge->title }}</h1>
                            <h3 class="">{{ $pledge->short_description }}</h3>
                            <ul class="greenp-blog-tagtitle">
                                <li class="green-month-title-main">By {{ $pledge->author_name }}</li>
                                <li class="green-month-title-main">{{ $pledge->reading_time }} min read</li>
                               
                            </ul>
                            <div class="social-link-blog-page">
                                <ul>
                                    <li><a class="customer share" href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank" ><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a class="customer share" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a class="customer share" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a class="customer share" href="mailto:?subject={{$pledge->name}}&amp;body=Check out this amazing pledge {{url()->current()}}"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="greenp-blog-inner-banner-img" data-aos="fade-up" data-aos-duration="1500">
                    <img src="{{ $pledge->thumb_image_full_path }}" alt="">
                </div>  
                <div class="row">
                    <div class="offset-md-1 col-md-10 offset-lg-2 col-lg-8">
                        <div class="greenp-blog-inner-details-section">
                            <div class="greenp-paragraph-text" data-aos="fade-up" data-aos-duration="1500">
                                {!! htmlspecialchars_decode($pledge->long_description) !!}
                            </div>
                            <!-- <div class="greend-customer-wrapper">
                                <p class="greenp-paragraph-text">Pull Quotes will be styled like this. Pull Quotes will be styled like this. Pull Quotes will be styled like this. Pull Quotes will be styled like this. </p>
                            </div> -->
                            <div class="social-link-blog-page" data-aos="fade-up" data-aos-duration="1500">
                                <ul>
                                    <li><a class="customer share" href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a class="customer share" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a class="customer share" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a class="customer share" href="mailto:?subject={{$pledge->name}}&amp;body=Check out this amazing pledge {{url()->current()}}"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection

@push('scripts')
<script src="{{ asset('plugins/writeIt/WriteIt.min.js')}}"></script>
<script>
    //social media popup
(function($){
  
  
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    
    e.preventDefault();
    
   
    intWidth = intWidth || '1000';
    intHeight = intHeight || '1000';
    strResize = (blnResize ? 'yes' : 'no');

   
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
        
  }
 
  $(document).ready(function ($) {
    $('.customer.share').on("click", function(e) {
      $(this).customerPopup(e);
      window.location.reload();
    });
  });
    
}(jQuery));        
</script>
 
@endpush