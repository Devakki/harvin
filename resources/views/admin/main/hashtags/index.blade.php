@extends('admin.layouts.admin')

@push("styles")
@endpush

@section('content')

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="pull-right">                 
                    <a class="dukesurgery-themes-btns-main" href="{{"$module_route/create"}}" title="Add">Add</a>                    
                </div>
            </div>            
        </div>       
        <div class="card hs-bg-remove">
            <div class="card-header d-none">
                @if(isset($module_name))
                    <h5 class="card-title mb-0 ">{{  $module_name }} List</h5>
                @endif
                
            </div>
            <div class="card-body">
                <table class="table project-datatable" >
                    <thead>
                        <tr>
                            <th>#</th>                      
                            <th>Name</th>                         
                            <th>Date Created</th>                            
                            <th>Action</th>                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@push("scripts")

<script>
$(document).ready(function(){

    var oTable = $('.project-datatable').DataTable({
            "dom": '<"row" <"col-sm-4"l> <"col-sm-4"r> <"col-sm-4"f>> <"row"  <"col-sm-12"t>> <"row" <"col-sm-5"i> <"col-sm-7"p>>',
            processing: true,
            serverSide: true,
            responsive: true,
            pagingType: "full_numbers",
            stateSave: true,
            "ajax": {
                "url": "{!! $module_route.'/datatable' !!}",
                "data": function ( d ) {
                }
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false, orderable:false, width: 20 },
                { data: 'name', name: 'name'},                                                                                          
                { data: 'formated_created_at', name: 'created_at', width: 100 },               
                {
                    data:  null,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    targets: 0,
                    width: 70,
                    render:function(o){
                        var btnStr = "";
                            
                            btnStr += "<a href='{!!  $module_route  !!}/"+  o.id +"/edit' title='Edit'>Edit</a>";       
                           btnStr += " <a href='javascript:void(0);' class='deleteRecord' val='" + o.id + "' title='Delete' >Delete</a>";

                        return btnStr;
                    }
                }              
            ],
            order: [[1, "ASC"]]
    });

    //delete Record
    jQuery(document).on('click', '.deleteRecord', function(event) {
        var id = $(this).attr('val');
        var deleteUrl = "{!!  $module_route  !!}/" + id;
        var isDelete = deleteRecordByAjax(deleteUrl, "{{$module_name}}", oTable);
    });

    jQuery(document).on('click', '.sidebar-link, .dukesurgery-themes-btns-main', function(event) {
        oTable.state.clear();   
    });

});

</script>
@endpush
