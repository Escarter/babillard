@extends('admin.layout.app')
@section('title')
<title> Department Management</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Department management</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Table Example
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createDepartmentModal" ><i class="fa fa-plus"></i> Create Department</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($departments->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>Color</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Descriptiom</th>
                        <th>Users</th>
                        <th>created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department )
                    <tr >
                        <td class="">
                            <span style="background-color: {{ $department->color }}; height: 25px; width: 25px; border-radius: 50%; display: inline-block;"></span>
                        </td>
                        <td>{{$department->id}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->description}}</td>
                        <td>
                            <a href="/admin/department/{{$department->id}}/users" data-toggle="tooltip" data-placement="top"  title="View users associated to department" data-url="/admin/department/{{$department->id}}/edit" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-users "></i>
                            </a >
                        </td>
                        <td>{{$department->created_at->diffForHumans()}}</td>
                        <td>
                            <button   title="Edit user details" data-id="" data-url="/admin/department/{{$department->id}}/edit" data-toggle="modal" data-target="#editDepartmentModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="Delete user" data-url="/admin/department/delete/{{$department->id}}" class="btn btn-danger deleteDepartmentBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>Information </h4>
            <p>No Department created yet</p>
            <br>
            <button class="btn  btn-warning " data-toggle="modal" data-target="#createDepartmentModal" ><i class="fa fa-plus"></i> Create Department</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$departments->count()}} Departments</div>
</div>
@include('admin.departments.partials.create')
@include('admin.departments.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
$(document).ready(function() {
    $('.dataTables-deprt').DataTable({
        responsive: true,
        "paging": false,
    });
    $('#editDepartmentModal').on('show.bs.modal', function (event) {

        var editDepartmentButton = $(event.relatedTarget) // Button that triggered the modal
        var url = editDepartmentButton.data('url')
        var editDepartmentModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                    editDepartmentModal.find('input[name="id"]').val(response.data.id)
                    editDepartmentModal.find('input[name="name"]').val(response.data.name)
                    editDepartmentModal.find('textarea[name="description"]').val(response.data.description)
                }
                if(response.status =='error'){
                    toastr.warning(response.data,'Oops Something is not alright');
                }
            }
        });
    });
    $('.deleteDepartmentBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete department",
            icon: "warning",
            buttons: true,
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
                            swal({title:"Error",text:"Something went wrong!",icon:"warning"});
                        }
                    }
                });
            } else {
            swal("Department Information is safe!");
            }
          });
    })
});
</script>
@yield('post-script')
@stop
