@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Directory">

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
                                            <img src="images/testimonial-border-img.svg">
                                            <div class="greenp-customer-text">
                                                <p class="greenp-paragraph-text">{{ $testimonial->testimonial }}</p>
                                            </div>
                                        </div>
                                        <div class="green-place-directory">
                                            <img src="images/green-place-image.svg">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="greenp-swiper-errow-block-main"> 
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <section class="greenp-client-logos-wrapper">
            <div class="container">
                <div class="greenp-client-logos-list">
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
                            <!-- <a href="{{ url('/greenplaces-work') }}" class="greenp-readmore-btn">See the list<i class="fa fa-chevron-right" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="greenp-find-company-wrapper">
            <div class="container">
                <div class="greenp-table-wrapper">
                 
                <div class="greenp-filter-wrapper">
                    <form class="form-inline">
                            <input class="form-control form-control-sm" type="search" id="search_value" placeholder="Search" aria-label="Search" aria-controls="project-datatable">
                            <a href="javascript:void(0);" class="greenplace-theme-btn">Search</a>
                          
                        </form>
                        <a href="javascript:void(0);" class="greenplace-theme-btn" data-toggle="modal" data-target="#exampleModalCenter">Get Listed</a>
                    </div>
                    <div class="table-responsive">
                   
                        <table id="project-datatable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Industry</th>
                                    <th>Metric Tons Offset</th>
                                    <th>Carbon Neutral</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div> 

  

@endsection

@push('scripts')


@push('styles')
<style>
    .clickable-row{
        cursor: pointer;
    }
</style>
@endpush


<script>
    var swiper = new Swiper("#greenplaces-directory", {
        spaceBetween: 15,
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    $(document).ready(function() {
       
        var oTable = $('#project-datatable').DataTable({ 
            "dom": '<"top"i>rt<"bottom"flp><"clear">',
             processing: true,
            bLengthChange: false,
            searching: false,
            bInfo : false,
            serverSide: true,
            responsive: true,
            pagingType: "simple",
            stateSave: true,
            "ajax": {
                "url": "{!! $module_route.'/datatable' !!}",
                "data": function ( d ) {
                    d.search = $('#search_value').val();
                }
            },
            columns: [
                { data: 'name', name: 'name'},        
                { data: 'city_name', name: 'city_name'},    
                { data: 'state_name', name: 'state_name'},     
                { data: 'industry_name', name: 'industry_name'},                                       
                {   data: null, 
                    name: 'tone_offset',
                    render:function(o){
                        var ton = '';
                        ton += o.tone_offset + " mT";
                        return ton;
                    }
                },                                       
                {
                    data: null,
                    name: 'slug',
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    targets: 0,
                    width: 70,
                    render:function(o){
                        // var btnStr = "";
                            
                        // btnStr += "<a href='{!!  $module_route  !!}/"+  o.slug +"' title='Edit'>"+ o.company_level +"</a>";

                        // return btnStr;
                        return (o.company_level == 'Y') ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
                    }
                }              
            ],
            aoColumnDefs: [
            { "aTargets": [ 0 ], "bSortable": true },
            { "aTargets": [ 1 ], "bSortable": true },
            { "aTargets": [ 2 ], "bSortable": true },
            { "aTargets": [ 3 ], "bSortable": true },
            { "aTargets": [ 4 ], "bSortable": true },
            ]
    });

  
    $('.greenplace-theme-btn').click(function(){
     $('#project-datatable').DataTable().draw(true);
    });

    $('#project-datatable').on( 'click', 'tbody tr', function () {
        window.location.href = $(this).data('url');
    });
} );


function scrollNav() {
  $('.nav-item a').click(function(){
    $(".active").removeClass("active");     
    $(this).addClass("active");
    
    $('html, body').stop().animate({
      scrollTop: $($(this).attr('href')).offset().top - 160
    }, 300);
    return false;
  });
}
scrollNav();

</script>
@endpush