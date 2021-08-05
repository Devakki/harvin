@push("styles") 
    <link href="{{ asset('plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush


<div class="form-group row duke-host-name-list-main">
    <div class="col-sm-6">
    <label>Hosts</label>
        {{ Form::select('companies[]', $companies, ( isset($selectedCategories) && count($selectedCategories))?$selectedCategories:null, ['id'=> 'companies', 'class' => 'form-control select2', 'multiple' => 'multiple']) }}
        @if($errors->has('companies'))
            <p class="text-danger">{{ $errors->first('companies') }}</p>
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
    <label>Author Name</label>
        {{ Form::text('author_name', null, ['id' => 'author_name', 'class'=>"form-control"]) }}
        @if($errors->has('author_name'))
            <p class="text-danger">{{ $errors->first('author_name') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Short Description</label>
        {{ Form::textarea('short_description', null, ['id' => 'short_description', 'rows' => 3, 'class'=>"form-control"]) }}
        @if($errors->has('short_description'))
            <p class="text-danger">{{ $errors->first('short_description') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Long Description</label>
        {{ Form::textarea('long_description', null, ['id' => 'long_description', 'rows' => 3, 'class'=>"form-control"]) }}
        @if($errors->has('long_description'))
            <p class="text-danger">{{ $errors->first('long_description') }}</p>
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
    <div class="col-sm-6 restaurantImage">
        <label for="image">Full Image</label>
        <div class="choose-file-box">
            {{ Form::file('full_image', ['id' => 'full_image', 'class'=>"image mb-2 mt-2", "accept" => ".png, .jpg, .jpeg"]) }}
        </div>          
        <input type="hidden" name="cropped_full_image" id="cropped_full_image" value="" style="display:none" />         
        @if($errors->has('full_image'))
            <p class="text-danger">{{ $errors->first('full_image') }}</p>
        @endif
        <p id="displayFullImageValidationError" class="d-none text-danger text-center">Please upload either a JPG, JPEG or PNG</p>
    </div>
</div>
 
<div class="form-group img-crop-block-main">
    <div class="">
        @if(isset($result) && $result->full_image)
            <div id="preview-crop-full-image" style="width: 380px !important; height: 196px !important;" class="dukesurgery-preview-crop-image-block">
                <img src="{{ $result->thumb_detail_image_full_path }}" class="img-thumbnail">
            </div>
        @else
            <div id="preview-crop-full-image" style="width: 380px !important; height: 196px !important; display: none;" class="dukesurgery-preview-crop-image-block">
                <img src="" class="full-img-thumbnail" style="display: none;">
            </div>
        @endif
    </div>
    <div class="col-sm-6 crop-full-img-section" style="display: none;">
        <div id="upload-demo-full-image"></div>
        <button class="dukesurgery-themes-btns-main upload-full-image">Crop Image</button>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Meta Title</label>
        {{ Form::text('meta_title', null, ['id' => 'meta_title', 'class'=>"form-control"]) }}
        @if($errors->has('meta_title'))
            <p class="text-danger">{{ $errors->first('meta_title') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Meta Description</label>
        {{ Form::textarea('meta_description', null, ['id' => 'meta_description', 'rows' => 3, 'class'=>"form-control"]) }}
        @if($errors->has('meta_description'))
            <p class="text-danger">{{ $errors->first('meta_description') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
    <label>Meta Keyword</label>
        {{ Form::textarea('meta_keyword', null, ['id' => 'meta_keyword', 'rows' => 3, 'class'=>"form-control"]) }}
        @if($errors->has('meta_keyword'))
            <p class="text-danger">{{ $errors->first('meta_keyword') }}</p>
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

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        });//, 'File size must be less than {0} bytes'

        $("#form_validate").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                'company_id[]': {
                     /*required: true*/
                },
                title: {
                    required: true,
                    maxlength: 255
                },
                author_name:{
                    required: true,
                    maxlength: 255
                },
                testimonial: {
                    /*required: true*/
                },              
                image: {
                    /*required: {{ (isset($result)) ? "false" : "true" }},*/
                    accept: "image/*",
                    filesize: 2000000,
                },
                full_image: {
                    accept: "image/*",
                    filesize: 2000000,
                }, 
            },
            messages:{
                image:{
                    filesize: "Please upload maximum 2MB file.",
                },
                full_image:{
                    filesize: "Please upload maximum 2MB file.",
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

       // full image
        var resize1 = $('#upload-demo-full-image').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 380,
                height: 196,
                // type: 'square'
            },
            boundary: {
                width: 400,
                height: 216
            }
        });


        if( "{{  isset($result)  }}" ) {
            $("#preview-profile_image-block").show();
            $('#preview-profile_image').attr('src', "{{ isset($result) ?  $result->thumb_detail_image_full_path : null }}");

        } else {
            $("#preview-profile_image-block").hide();
        }

        $('#full_image').on('change', function () {
            var fileName = event.target.files[0].name;
            $(".img-name-lbl").html(fileName).removeClass('d-none');

            $('#preview-crop-full-image').css("display", 'block');
            displayFullImageOnFileSelect(this, $('.full-img-thumbnail'));

            var reader = new FileReader();
            reader.onload = function (e) {
                resize1.croppie('bind',{
                    url: e.target.result
                }).then(function(blob){
                    //console.log('jQuery bind complete');
                });
            }

            reader.readAsDataURL(this.files[0]);
            $('.crop-full-img-section').show();
        });

        function displayFullImageOnFileSelect(input, thumbElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(thumbElement).attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.upload-full-image').on('click', function (ev) {
           resize1.croppie('result',{circle: false, size: "original", type:"rawcanvas"}).then(function (rawcanv) {
             // resample_single(rawcanv, 340, 180, true);
             var img = rawcanv.toDataURL();

               $('#cropped_full_image').val(img.split(',')[1]);

               html = '<img src="' + img + '" class="full-img-thumbnail" />';
               $("#preview-crop-full-image").html(html);
           });
           return false;
       });

       
    });
</script>

@endpush
