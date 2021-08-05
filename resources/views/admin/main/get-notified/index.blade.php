@extends('admin.layouts.admin')

@push("styles")
@endpush

@section('content')
<div class="dukesurgery-notification-btn">
    <label>Receive email notifications <i id="email-setting-loader-loader" class="fa fa-circle-o-notch fa-spin fa-fw d-none"></i></label>
    <label class="switch">
        <input id="receive_notification_emails" name="receive_notification_emails" type="checkbox">
        <span class="slider round"></span>
    </label>
</div>

<div class="row">
    <div class="col-12">            
        <div class="card hs-bg-remove">            
            <div class="card-body">
                <table class="table project-datatable" >
                    <thead>
                        <tr>
                            <th>#</th>                             
                            <th>Email</th>                            
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
 
    if( "{{ $receive_notification_emails->value }}" == 1 ) { 
        $( "#receive_notification_emails" ).prop( "checked", true );
    }
    
    var oTable = $('.project-datatable').DataTable({
            "dom": '<"row" <"col-sm-4"l> <"col-sm-4"r> <"col-sm-4"f>> <"row"  <"col-sm-12"t>> <"row" <"col-sm-5"i> <"col-sm-7"p>>',
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave: true,
            pagingType: "full_numbers",
            "ajax": {
                "url": "{!! $module_route.'/datatable' !!}",
                "data": function ( d ) {
                }
            },
            columns: [
                { data: 'DT_RowIndex', searchable: false, orderable:false, width: 20 },                            
                { data: 'email', name: 'email'},                                   
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

    jQuery(document).on('click', '.sidebar-link', function(event) {
        oTable.state.clear();   
    });

    $("#receive_notification_emails").change(function() { 
        $("#email-setting-loader-loader").removeClass('d-none');
        $("#receive_notification_emails").attr('disabled', true);

        $.ajax({
            url: "{{ url('admin/change-email-notification-settings') }}",
            type: "POST",
            data: {
                receive_notification_emails: $('#receive_notification_emails').prop('checked') ? 1 : 0,
                "_token": window.Laravel.csrfToken
            },
            success: function(data){ 
                $("#email-setting-loader-loader").addClass('d-none');
                $("#receive_notification_emails").attr('disabled', false);
                fnToastSuccess(data.message);
            },
            error: function (xhr, status, error) {       
                $("#email-setting-loader-loader").addClass('d-none');
                $("#receive_notification_emails").attr('disabled', false);                    
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
    });

});

</script>
@endpush
