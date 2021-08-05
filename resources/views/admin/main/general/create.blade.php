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