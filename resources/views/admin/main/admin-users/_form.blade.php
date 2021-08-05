@push("styles")
<!-- <style>
    .col-form-label {
        padding-left: 0;
        padding-right: 0;
    }
</style> -->
@endpush

<div class="form-group row">
    <div class="col-sm-4">
        <label for="name">Name</label>
        {{ Form::text('name', null, ['id' => 'name', 'class'=>"form-control"]) }}
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <label for="email">Email</label>
        {{ Form::email('email', null, ['id' => 'email', 'class'=>"form-control"]) }}
        @if($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
    </div>
</div>

<div class="form-group row ">
    <div class="col-sm-4">
    <label for="password">Password</label>
        {{ Form::password('password', ['id' => 'password', 'class'=>"form-control"]) }}
        @if($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif
    </div>
</div>



@push("scripts")

{{-- jQuery Validate --}}
<script src="{{ asset('plugins/jquery-validate/jquery.validate.min.js') }} "></script>
<script src="{{ asset('plugins/jquery-validate/additional-methods.min.js') }} "></script>
<script type="text/javascript">
    $(document).ready(function () {

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
                email: {
                    required: true,
                    email: true
                },                        
                password: {
                    required:  function() {
                        @if(isset($result)) 
                            return false; 
                        @endif 
                        return true;
                    },
                    minlength: 8
                },                
            }
        });
    });
</script>

@endpush
