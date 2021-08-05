@extends('admin.layouts.admin')
@section('content')
  {!! Form::model($result, array('url' => $module_route.'/'.$result->id, 'method' => 'PUT', "enctype"=>"multipart/form-data",'class'=>'form form-horizontal','id'=>'form_validate', 'autocomplete'=>'off')) !!}
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
                        <h5 class="card-title">{{  $module_name }} Edit</h5>
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
