@extends('admin.layout.app')
@section('title')
<title>{{ __('Faculty Management')}} </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">{{ __('Dashboard')}}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Faculty Management')}}</li>
</ol>
<!--Faculty Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{ __('Faculty Management Table')}}
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createFacultyModal" ><i class="fa fa-plus"></i> {{ __('Create Faculty')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($facultes->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Faculty Name')}}</th>
                        <th>{{ __('Faculty School')}}</th>
                        <th>{{ __('Created Date')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facultes as $faculte )
                    <tr >
                        <td>{{$faculte->faculte_name}}</td>
                        <td>{{$faculte->ecole->ecole_name}}</td>
                        <td>{{$faculte->created_at->diffForHumans()}}</td>
                        <td>
                            <button   title="{{ __('Edit Faculty details') }}" data-id="" data-url="/admin/faculte/{{$faculte->id}}/edit" data-toggle="modal" data-target="#editFacultyModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="{{ __('Delete Faculty') }}" data-url="/admin/faculte/delete/{{$faculte->id}}" class="btn btn-danger deleteFacultyBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>{{ __('Information') }} </h4>
            <p>{{ __('No Faculty created yet') }}</p>
            <br>
            <button class="btn  btn-secondary " data-toggle="modal" data-target="#createFacultyModal" ><i class="fa fa-plus"></i> {{ __('Create Faculty') }}</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$facultes->count()}} Facultys</div>
</div>
@include('admin.facultes.partials.create')
@include('admin.facultes.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
$(document).ready(function() {
    $('.dataTables-deprt').DataTable({
        responsive: true,
        "paging": false,
    });
    $('#editFacultyModal').on('show.bs.modal', function (event) {

        var editFacultyButton = $(event.relatedTarget) // Button that triggered the modal
        var url = editFacultyButton.data('url')
        var editFacultyModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                    editFacultyModal.find('input[name="id"]').val(response.data.id)
                    editFacultyModal.find('input[name="faculte_name"]').val(response.data.faculte_name)
                    editFacultyModal.find('select[name="ecole_id"]').val(response.data.ecole_id).trigger('change');
                }
                if(response.status =='error'){
                    toastr.warning(response.data,"{__('Oops Something is not alright') }}");
                }
            }
        });
    });
    $('.deleteFacultyBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete Faculty",
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
            swal("Faculty Information is safe!");
            }
          });
    })
});
</script>
@yield('post-script')
@stop
