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
            <h3 class="">Contact Us</h3>
            <ol class="breadcrumb text-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li class="active">Contact</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb area -->
<!-- basic-contact-area -->
<div class="basic-contact-area pt-90 pb-50">
    <div class="container">
        <div class="row multi-columns-row">
            <div class="col-sm-4 col-md-4 col-lg-4 mb-40">
                <div class="contact-person">
                    <h4>Medifine Center.</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna posuere.</p>
                    <a href="mailto:#"><i class="fa fa-calendar"></i>  Mon - Fri 9:00 am - 2:00 PM</a>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4 mb-40">
                <div class="contact-person">
                    <h4>Enquiry Phone.</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna posuere.</p>
                    <a href="mailto:#"><i class="fa fa-phone"></i> (+01) 204 0234 2065</a>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4 mb-40">
                <div class="contact-person">
                    <h4>Drop a line.</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna posuere.</p>
                    <a href="mailto:#"><i class="fa fa-envelope-o"></i> info@basictheme.net</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- basic-contact-area end -->

<div class="map-area">
    <div class="container">
        <div id="map"></div>
    </div>
</div>

<div class="basic-contact-form ptb-90">
    <div class="container">
        <div class="area-title text-center">
            <h2>Let’s talk</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <form id="contact-form" action="mail.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="sr-only">First Name</label>
                            <input type="text" class="form-control input-lg" name="name" placeholder="First Name" >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="sr-only">Email</label>
                            <input type="email" class="form-control input-lg" name="email" placeholder="Email" >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="sr-only">Subject</label>
                            <input type="text" class="form-control input-lg" name="subject" placeholder="Subject" >
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control input-lg" rows="7" name="message" placeholder="Message*"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-round btn-dark">Send Email</button>
                        </div>

                    </div><!-- .row -->
                </form>
                <!-- Ajax response -->
                <div class="ajax-response text-center"></div>
            </div>
        </div>
    </div>
</div>
@endsection
