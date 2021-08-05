<footer class="greenp-footer-bar-wrapper">
    <div class="container">
        <div class="greenp-footer-main">                                                                             
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <a class="greenp-logo-wrapper" href="{{ url('/') }}">
                        <img src="{{ asset('images/green_places_logo.svg') }}" alt="">
                    </a>
                    <div class="greenp-signup-form-main">
                        <h4>Want to learn more?</h4>
                        <p>Sign up for our newsletter to keep up with Green Places news and events near you.</p>
                        <div class="greenp-signup-form">
                            <form id="get-notified-form">
                            @csrf
                                <div class="form-group">
                                {{ Form::text('email', null, ['id' => 'email', 'class'=>"form-control", 'placeholder' =>"Enter email"]) }} 
                                @if($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                                </div>
                                <button type="submit" id="get-notified-submit-btn" class="greenplace-theme-btn">Sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 offset-lg-1 col-lg-6">
                    <div class="greenp-page-link-and-social-link">
                        <div class="social-link">
                            <h5>Quick Links</h5>
                            <ul>
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter">Carbon  Calculator</a></li>
                                <li><a href="{{ url('/why-certify') }}">Why Certify?</a></li>
                                <li><a href="{{ url('/greenplaces-work') }}">Green Places to Work</a></li>
                                <li><a href="{{ url('/about-us') }}">About us</a></li>
                                <li><a href="{{ url('/blog') }}">Blog</a></li>
                            </ul>
                        </div>
                        <div class="social-link">
                            <h5>Follow us</h5>
                            <ul>
                                <li><a target="_blank" href="https://www.facebook.com/Green-Places-110217337948317"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/GreenPlacesTeam"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="https://www.instagram.com/greenplacestowork/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="https://www.linkedin.com/company/green-places-to-work/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a target="_blank" href="https://www.youtube.com/channel/UCM9iCt47eRnXTAm6tCZl01w"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="greenplane-towork-logo">
                            <a href="javascript:void(0);"><img src="{{ asset('images/greenplane-towork-logo.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="greenp-copy-rights-footer-bar">
        <div class="container">
            <ul class="greenp-footer-link">
                <li><a href="javascript:void(0);">© 2021 Green Places.</a> All rights reserved.</li>
                <li><a href="javascript:void(0);">Legal</a></li>
                <li><a href="{{ url('policy') }}">Privacy Policy</a></li>
                <li><a href="{{ url('terms') }}">Terms & Conditions</a></li>
            </ul>
        </div>
    </div>
</footer>

@include("calculate.carbon")

@push('scripts')    


<script src="{{ asset('custom/carboncalculator.js') }} "></script>
<link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-autocomplete/bootstrap-autocomplete.min.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-H2NGTP0D64"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-H2NGTP0D64');
</script>
    <script type="text/javascript">

        $(document).ready(function(){

            var footerGetNotifedFormValidate = $("#get-notified-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },                  
                }
            });
            
             // submit get-notified form
            $(document).on("click", "#get-notified-submit-btn", function(event) {
                event.preventDefault();
                if($("#get-notified-form").valid()) {
                    $("#get-notified-submit-btn").attr("disabled", true).html("Wait");
                    $("#get-notified-form").find( "input" ).blur();
                    $.ajax({
                        url: "{{ url('get-notified') }}",
                        type: "POST",
                        data: $('#get-notified-form').serialize(),
                        success: function(data){
                            $('#get-notified-form').trigger("reset");
                            footerGetNotifedFormValidate.resetForm();                            
                            $("#get-notified-submit-btn").attr("disabled", false).html("Submit");
                           fnToastSuccess(data.message);
                        },
                        error: function (xhr, status, error) {
                            isProcessing = false;
                            $("#get-notified-submit-btn").attr("disabled", false).html("Submit");
                            if(xhr.status == 422) {
                                var error = xhr.responseJSON.errors || "";
                                $.each(error, function(i, item) {
                                    fnToastError(error[i]);
                                })
                            } else {
                                ajaxError(xhr, status, error);
                            }
                        }
                    });
                }
                return false;
            });

        });

        // https://twitter.com/uixmat

        </script>
@endpush