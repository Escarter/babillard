@extends('admin.layout.app')
@section('title')
<title>Zipped Images Management</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">@lang('Dashboard')</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#"> @lang('Management')  </a>
    </li>
    <li class="breadcrumb-item active"> @lang('Zipped Images Management')</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> @lang('Zipped Images Table')
        <div class="float-right">
            <button class="btn btn-secondary" d ><i class="fa fa-arrow-circle-left"></i> @lang('Back')</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @include('layouts.notifications')
        @if (count($files)>0)
        <div class="table-responsive">
            <table width="100%"   id="dataTable" class="table table-bordered dataTable-zip table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>@lang('File Name')</th>
                        <th>@lang('File Size')</th>
                        <th>@lang('created Date')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 0 ; $i < count($files); ++$i )

                    <tr >
                        <td>{{$i+1}}</td>
                        <td>{{$files[$i]["fileName"]}}</td>
                        <td>{{$files[$i]["fileSize"]}}</td>
                        <td>{{$files[$i]["fileCreated_at"] }}</td>
                        <td>
                            <button  data-value="@lang('Download')" data-url="/admin/zipped-imgs/download/{{$files[$i]['fileName']}}" class="btn btn-info actionBtn btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('Download')"><i class="fa fa-download " ></i></button>
                            <button  data-value="@lang('Delete')" data-url="/admin/zipped-imgs/delete/{{$files[$i]['fileName']}}" class="btn btn-danger deleteBtn btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('Delete')"><i class="fa fa-remove " alt="delete"></i></button>
                        </td>
                    </tr>
                    @endfor

                </tbody>
            </table>
        </div>
        @else
            <h4>@lang('Information') </h4>
            <p>@lang('No Images Zipped yet')</p>
            <br>
        @endif
    </div>
    <div class="card-footer small text-muted">{{count($files)}} @lang('Csv Files')</div>
</div>
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
    $(document).ready(function(){
        $('.dataTable-zip').DataTable({
             "language": {
                "search": "@lang('Search'):",
                "lengthMenu":     "@lang('Show') _MENU_ @lang('entries')",
                "emptyTable":     "@lang('No data available in table')",
                "info":           "@lang('Showing') _START_ @lang('to') _END_ @lang('of') _TOTAL_ @lang('entries')",
                "infoEmpty":      "Showing 0 to 0 of 0 entries",
                "infoFiltered":   "(@lang('filtered') @lang('from') _MAX_ @lang('total entries'))",
                "loadingRecords": "@lang('Loading...')",
                "processing":     "@lang('Processing...')",
                "paginate": {
                    "first":      "@lang('First')",
                    "last":       "@lang('Last')",
                    "next":       "@lang('Next')",
                    "previous":   "@lang('Previous')"
                },
              }
        });
        $('.actionBtn').on('click', function(e){
            e.preventDefault();
            var url = $(this).attr('data-url');
            var btnVal = $(this).attr('data-value');
            console.log(url);
            swal({
                title: "@lang('Are you sure?')",
                text: "@lang('Do you really want to') '"+btnVal+"' @lang('this Csv file..')",
                icon: "warning",
                buttons: ['@lang("Cancel")', '@lang("Confirm")'],
                dangerMode: true,
              })
              .then((willDelete)=> {
                if (willDelete) {
                  location.href = url;
                } else {
                swal(" @lang('No action Performed!')");
                }
              });
        })
        $('.deleteBtn').on('click', function(e){
            e.preventDefault();
            var url = $(this).attr('data-url');
            var btnVal = $(this).attr('data-value');
            console.log(url);
            swal({
                title: "@lang('Are you sure?')",
                text: "@lang('Do you really want to') '"+btnVal+"' @lang('this Csv file..')",
                icon: "warning",
                buttons: ['@lang("Cancel")', '@lang("Confirm")'],
                dangerMode: true,
              })
              .then((willDelete)=> {
                if (willDelete) {
                    $.ajax({
                        dataType  :'JSON',
                        method      :'GET',
                        url       : url,
                        success     :function(response){
                            console.log(response);
                            if (response.status == 'success') {
                                swal({title:"Great Job",text:response.message,icon:response.status })
                                .then((willReload) =>{
                                        if (willReload) {
                                    location.reload();
                                    }
                                });
                            }
                            if(response.status =='error'){
                                swal({title:"Error",text:response.message,icon:"warning"});
                            }
                        }
                    });
                } else {
                swal(" @lang('No action Performed!')");
                }
              });
        })
    });
</script>
@stop
