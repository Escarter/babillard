@extends('admin.layout.app')
@section('title')
<title>Audit Trails Management</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard </a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/audit"> Logs  </a>
    </li>
    <li class="breadcrumb-item active"> Audit Trails</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Audit Trails Table
        <div class="float-right">
        <a href="/admin/users" class="btn btn-secondary  btn-sm"><i class="fa fa-users"></i> All Users</a>
         </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @include('layouts.notifications')
        <div class="table-responsive">
            <table width="100%" id="user-table"  class="table table-bordered table-hover dataTable">
                <thead class="thead-light">
                    <tr>
                        <!-- <th>Action</th> -->
                        <th>Log Author</th>
                        <th>Log Action</th>
                        <th>Log Message</th>
                        <th>Log Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>              
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
    $(document).ready(function() {
        var oTable  =   $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            "bDestroy": true,  
            scrollY:        "1000px",
            scrollX: true,
            scrollCollapse: true,
            paging:         true,
            ajax: {
                url: '{!! route('datatables.audit') !!}',
                data: function (d) {

                   // console.log(d.REQUEST_DATE);
                }

            },
            columns: [
                // { data: 'action', name: 'action', orderable: false, searchable: false},
                { data: 'logger', name:'logger'},
                { data: 'log_action', name: 'log_action' },
                { data: 'log_message', name: 'log_message' },
                { data: 'created_at', name: 'created_at' },
            ],
            // order: [[8, 'desc'],[2,'asc']],
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
              },           
        });
    });
</script> 
@yield('post-script')
@stop
