@extends('admin.layouts.admin')

@section('content')
{!! Form::open(['url' => $module_route, 'method' => 'POST', "enctype"=>"multipart/form-data",'class'=>'form-horizontal','id'=>'form_validate', 'autocomplete'=>'off']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12 justify-content-between d-flex mb-4">                            
                <a href="{{ $module_route }}" class="mr-2 dukesurgery-themes-btns-main hs-gray-btn">Cancel</a>
                <button id="submitFormBtn" class="dukesurgery-themes-btns-main" type="submit">Save</button>
            </div>   
        </div>      
        <div class="card">
            <div class="card-header d-none">
                @if(isset($module_name))
                    <h5 class="card-title">{{  $module_name }} Create</h5>
                @endif
            </div>
            <div class="card-body">

                @include("$moduleView._form")
                
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection

@push("scripts")
<script src="{{ asset('plugins/jquery-validate/jquery.form.js') }} "></script> 
<script>
    $(document).ready(function () {            
        $('form').ajaxForm({
            beforeSend: function() {
                var percentVal = 'Saving... (0%)';                    
                $("#submitFormBtn").html(percentVal);
                $('#submitFormBtn').prop('disabled', true);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                if( percentComplete < 99.99 ) {

                    var percentVal = "Saving... ("+ percentComplete + '%)';
                    $("#submitFormBtn").html(percentVal);                
                }
            },
            complete: function(xhr) {
                $("#submitFormBtn").html("Saving... (100%)");  
                              
                if(xhr.status === 200  ) {                
                    fnToastSuccess(xhr.responseJSON["message"]);
                } else {
                    fnToastError(xhr.responseJSON["message"]);
                }
                $("#submitFormBtn").html('Save'); 
                setTimeout(() => {
                    $('#submitFormBtn').prop('disabled', false);                                            
                    window.location.href = "{!! $module_route !!}";         
                }, 1000);
            },
            error:  function(xhr, desc, err) {
                fnToastError(err);
                console.debug(xhr);
                console.log("Desc: " + desc + "\nErr:" + err);
                $('#submitFormBtn').prop('disabled', false);
            }
        });
    });

</script>
@endpush
