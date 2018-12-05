@extends('admin.layout.app')
@section('title')
<title>Users Management</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard </a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/users"> Users  </a>
    </li>
    <li class="breadcrumb-item active"> Image Pending</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Image Pending Table
        <div class="float-right">
        <a href="/admin/users" class="btn btn-secondary  btn-sm"><i class="fa fa-users"></i> All Users</a>
         </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        <div class="float-right">
            <div class="btn-group">
                <a href="/admin/users/image-uploaded" class="btn btn-outline-secondary btn-sm"><i class="fa fa-image"></i> Image Uploaded</a>
                <a href="/admin/users/image-not-uploaded" class="btn btn-outline-secondary btn-sm"><i class="fa fa-remove"></i> Image Not Uploaded</a>
                <a href="/admin/users/image-pending" class="btn btn-secondary btn-sm"><i class="fa fa-calendar"></i> Image Pending</a>
                <a href="/admin/users/image-approved" class="btn btn-outline-secondary  btn-sm"><i class="fa fa-thumbs-up"></i> Image Approved</a>
                <a href="/admin/users/image-rejected" class="btn btn-outline-secondary btn-sm"><i class="fa fa-thumbs-down"></i> Image Reject</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        @include('layouts.notifications')
        <div class="table-responsive">
            <table width="100%"   class="table table-bordered table-hover dataTable">
                <thead class="thead-light">
                    <tr>
                        <th><input name="select_all" value="1" id="select-all" type="checkbox" /></th>
                        <th>Action</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Emp Num</th>
                        <th>Gender</th>
                        <th>Depart</th>
                        <th>Img Uploaded Status</th>
                        <th>Img Validation Status</th>
                        <th>Uploaded Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>
@include('admin.users.partials.view-user-image')
@include('admin.users.partials.rejection-reason-modal')
@include('admin.users.partials.approve-modal')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
    $(document).ready(function() {
        var oTable  =   $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend:'csvHtml5',
                    exportOptions: {
                        columns: [':visible' ]
                    },

                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [':visible' ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [':visible' ]
                    }
                },'colvis'],
            "bDestroy": true,
            scrollY:        "1000px",
            scrollX: true,
            scrollCollapse: true,
            paging:         true,
            ajax: {
                url: '{!! route('datatables.users.image-pending') !!}',
                data: function (d) {

                   // console.log(d.REQUEST_DATE);
                }

            },
            columns: [
                { data: 'id', name: 'id', orderable: false, searchable: false},
                { data: 'action', name: 'action', orderable: false, searchable: false},
                { data: 'full_name', name:'full_name'},
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'hris_number', name: 'hris_number' },
                { data: 'gender', name: 'gender' },
                { data: 'department_id', name: 'department_id' },
                { data: 'image_uploaded_status', name: 'image_uploaded_status' },
                { data: 'image_validation_status', name: 'image_validation_status' },
                { data: 'uploaded_date', name: 'uploaded_date' }

            ],
             order: [[8, 'desc'],[2,'asc']],
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
    @include('admin.users.partials._validation_scripts')
    });
</script>
@yield('post-script')
@stop
