@push("styles") 
    <link href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush

<div class="form-group row duke-host-name-list-main">
    <div class="col-sm-6">
        <label>Category</label>
        {{ Form::select('company_id', [ "" => "Select"] + $companies, null, ['id'=> 'company_id', 'class' => 'form-control select2']) }}
        @if($errors->has('company_id'))
            <p class="text-danger">{{ $errors->first('company_id') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Title</label>
        {{ Form::text('title', null, ['id' => 'title', 'class'=>"form-control"]) }}
        @if($errors->has('title'))
            <p class="text-danger">{{ $errors->first('title') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Testimonial</label>
        {{ Form::textarea('testimonial', null, ['id' => 'testimonial', 'rows' => 3, 'class'=>"form-control"]) }}
        @if($errors->has('testimonial'))
            <p class="text-danger">{{ $errors->first('testimonial') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6 restaurantImage">
        <label for="image">Image</label>
        <div class="choose-file-box">
            {{ Form::file('image', ['id' => 'image', 'class'=>"image mb-2 mt-2", "accept" => ".png, .jpg, .jpeg"]) }}
        </div>          
        <input type="hidden" name="cropped_image" id="cropped_image" value="" style="display:none" />         
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image') }}</p>
        @endif
        <p id="displayImageValidationError" class="d-none text-danger text-center">Please upload either a JPG, JPEG or PNG</p>
    </div>
</div>
 
<div class="form-group img-crop-block-main">
    <div class="">
        @if(isset($result) && $result->image)
            <div id="preview-crop-image" style="width: 380px; height: 380px;" class="dukesurgery-preview-crop-image-block">
                <img src="{{ $result->thumb_image_full_path }}" class="img-thumbnail">
            </div>
        @else
            <div id="preview-crop-image" style="width: 380px; height: 380px; display: none;" class="dukesurgery-preview-crop-image-block">
                <img src="" class="img-thumbnail" style="display: none;">
            </div>
        @endif
    </div>
    <div class="col-sm-6 crop-img-section" style="display: none;">
        <div id="upload-demo"></div>
        <button class="dukesurgery-themes-btns-main upload-image">Crop Image</button>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6 duke-featured-topic">
        {{ Form::checkbox('is_featured', 1, null, ['id' => 'is_featured' ]) }}
        <label for="is_featured">Featured Topic</label>
        @if($errors->has('is_featured'))
            <p class="text-danger">{{ $errors->first('is_featured') }}</p>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6 duke-featured-topic">
        {{ Form::checkbox('in_certify', 1, null, ['id' => 'in_certify' ]) }}
        <label for="in_certify">View In Certify</label>
        @if($errors->has('in_certify'))
            <p class="text-danger">{{ $errors->first('in_certify') }}</p>
        @endif
    </div>
</div>

@push("scripts")

{{-- jQuery Validate --}}
<script src="{{ asset('plugins/jquery-validate/jquery.validate.min.js') }} "></script>
<script src="{{ asset('plugins/jquery-validate/additional-methods.min.js') }} "></script>

<link href="{{ asset('plugins/croppie/croppie.min.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/croppie/croppie.js') }}"></script>

<script src="{{ asset('plugins/datetimepicker/popper.min.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/moment.min.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/moment-timezone.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>


<script type="text/javascript">
  $(document).ready(function () {
        var rowID = 0;
        var deletedGuests = [];

        $('#long_description').summernote({
        tabsize: 10,
        height: 300,
        width: 600
        });
        /*
        if(!"{{ isset($result->id) }}") {
            setTimeout(function(){ $("#add-guest").trigger('click'); }, 100);
        }
        */
       
        $('.select2').select2({
            allowClear: true
        });

        
        $("#form_validate").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                company_id: {
                    required: true
                },
                title: {
                    required: true,
                    maxlength: 255
                },
                testimonial: {
                    /*required: true*/
                },              
                image: {
                    /*required: {{ (isset($result)) ? "false" : "true" }},*/
                    accept: "image/*"
                }                                                
            },
            errorPlacement: function(error, element) {
                if ( element.attr("id") == "blog_category_id" || element.attr("id") == "hosts") {
                    error.appendTo($(element).closest('.col-sm-6'));                     
                } else {
                    error.insertAfter(element);
                }
            }
        });

        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 380,
                height: 380,
                type: 'square'
            },
            boundary: {
                width: 400,
                height: 400
            }
        });


        if( "{{  isset($result)  }}" ) {
            $("#preview-profile_image-block").show();
            $('#preview-profile_image').attr('src', "{{ isset($result) ?  $result->thumb_image_full_path : null }}");

        } else {
            $("#preview-profile_image-block").hide();
        }

        $('#image').on('change', function () {
            var fileName = event.target.files[0].name;
            $(".img-name-lbl").html(fileName).removeClass('d-none');

            $('#preview-crop-image').css("display", 'block');
            displayImageOnFileSelect(this, $('.img-thumbnail'));

            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(blob){
                    //console.log('jQuery bind complete');
                });
            }

            reader.readAsDataURL(this.files[0]);
            $('.crop-img-section').show();
        });

        function displayImageOnFileSelect(input, thumbElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(thumbElement).attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.upload-image').on('click', function (ev) {
           resize.croppie('result',{circle: false, size: "original", type:"rawcanvas"}).then(function (rawcanv) {
             // resample_single(rawcanv, 340, 180, true);
             var img = rawcanv.toDataURL();

               $('#cropped_image').val(img.split(',')[1]);

               html = '<img src="' + img + '" class="img-thumbnail" />';
               $("#preview-crop-image").html(html);
           });
           return false;
       });

       
    });
</script>

@endpush
