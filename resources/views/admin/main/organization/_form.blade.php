@push("styles") 
    <link href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush


<div class="form-group row">
    <div class="col-sm-6">
    <label>Name</label>
        {{ Form::text('name', null, ['id' => 'name', 'class'=>"form-control"]) }}
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
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
                name: {
                    required: true,
                    maxlength: 255
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
                type: 'circle'
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
