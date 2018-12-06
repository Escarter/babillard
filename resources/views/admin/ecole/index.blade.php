@extends('admin.layout.app')
@section('title')
<title>{{ __('School Management')}} </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">{{ __('Dashboard')}}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('School Management')}}</li>
</ol>
<!--School Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{ __('School Management Table')}}
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createSchoolModal" ><i class="fa fa-plus"></i> {{ __('Create School')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($schools->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Name')}}</th>
                        <th>{{ __('Type')}}</th>
                        <th>{{ __('Representative')}}</th>
                        <th>{{ __('Address')}}</th>
                        <th>{{ __('Location')}}</th>
                        <th>{{ __('Phone')}}</th>
                        <th>{{ __('Created Date')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school )
                    <tr >
                        <td>{{$school->ecole_name}}</td>
                        <td>{{$school->ecole_type}}</td>
                        <td>{{$school->ecole_representative}}</td>
                        <td>{{$school->ecole_address}}</td>
                        <td>{{$school->ecole_location}}</td>
                        <td>{{$school->ecole_phone}}</td>
                        <td>{{$school->created_at->diffForHumans()}}</td>
                        <td>
                            <button   title="{{ __('Edit School details') }}" data-id="" data-url="/admin/school/{{$school->id}}/edit" data-toggle="modal" data-target="#editSchoolModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="{{ __('Delete School') }}" data-url="/admin/school/delete/{{$school->id}}" class="btn btn-danger deleteSchoolBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>{{ __('Information') }} </h4>
            <p>{{ __('No School created yet') }}</p>
            <br>
            <button class="btn  btn-secondary " data-toggle="modal" data-target="#createSchoolModal" ><i class="fa fa-plus"></i> {{ __('Create School') }}</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$schools->count()}} Schools</div>
</div>
@include('admin.ecole.partials.create')
@include('admin.ecole.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
$(document).ready(function() {
    $('.dataTables-deprt').DataTable({
        responsive: true,
        "paging": false,
    });
    $('#editSchoolModal').on('show.bs.modal', function (event) {

        var editSchoolButton = $(event.relatedTarget) // Button that triggered the modal
        var url = editSchoolButton.data('url')
        var editSchoolModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                    editSchoolModal.find('input[name="id"]').val(response.data.id)
                    editSchoolModal.find('input[name="ecole_name"]').val(response.data.ecole_name)
                    editSchoolModal.find('input[name="ecole_type"]').val(response.data.ecole_type)
                    editSchoolModal.find('input[name="ecole_representative"]').val(response.data.ecole_representative)
                    editSchoolModal.find('input[name="ecole_address"]').val(response.data.ecole_address)
                    editSchoolModal.find('input[name="ecole_location"]').val(response.data.ecole_location)
                    editSchoolModal.find('input[name="ecole_phone"]').val(response.data.ecole_phone)
                }
                if(response.status =='error'){
                    toastr.warning(response.data,"{__('Oops Something is not alright') }}");
                }
            }
        });
    });
    $('.deleteSchoolBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete School",
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
            swal("School Information is safe!");
            }
          });
    })
});
</script>
@yield('post-script')
@stop
