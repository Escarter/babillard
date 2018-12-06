@extends('admin.layout.app')
@section('title')
<title>{{ __('Department Management')}} </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">{{ __('Dashboard')}}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Department Management')}}</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{ __('Department Management Table')}}
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createDepartmentModal" ><i class="fa fa-plus"></i> {{ __('Create Department')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($departments->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Department Name')}}</th>
                        <th>{{ __('Department Faculty')}}</th>
                        <th>{{ __('Created Date')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department )
                    <tr >
                        <td>{{$department->department_name}}</td>
                        <td>{{$department->faculte->faculte_name}}</td>
                        <td>{{$department->created_at->diffForHumans()}}</td>
                        <td>
                            <button   title="{{ __('Edit Department details') }}" data-id="" data-url="/admin/department/{{$department->id}}/edit" data-toggle="modal" data-target="#editDepartmentModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="{{ __('Delete Deparment') }}" data-url="/admin/department/delete/{{$department->id}}" class="btn btn-danger deleteDepartmentBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>{{ __('Information') }} </h4>
            <p>{{ __('No Department created yet') }}</p>
            <br>
            <button class="btn  btn-secondary " data-toggle="modal" data-target="#createDepartmentModal" ><i class="fa fa-plus"></i> {{ __('Create Department') }}</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$departments->count()}} Departments</div>
</div>
@include('admin.department.partials.create')
@include('admin.department.partials.edit')
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
                    editDepartmentModal.find('input[name="department_name"]').val(response.data.department_name)
                    editDepartmentModal.find('select[name="faculte_id"]').val(response.data.faculte_id).trigger('change');
                }
                if(response.status =='error'){
                    toastr.warning(response.data,"{__('Oops Something is not alright') }}");
                }
            }
        });
    });
    $('.deleteDepartmentBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete Department",
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
