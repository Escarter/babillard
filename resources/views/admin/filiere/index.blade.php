@extends('admin.layout.app')
@section('title')
<title>{{ __('Filiere Management')}} </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">{{ __('Dashboard')}}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Filiere Management')}}</li>
</ol>
<!--Filiere Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{ __('Filiere Management Table')}}
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createFiliereModal" ><i class="fa fa-plus"></i> {{ __('Create Filiere')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($filieres->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Filiere Name')}}</th>
                        <th>{{ __('Filiere Niveau')}}</th>
                        <th>{{ __('Created Date')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filieres as $filiere )
                    <tr >
                        <td>{{$filiere->filiere_name}}</td>
                        <td>{{$filiere->niveau->niveau_name}}</td>
                        <td>{{$filiere->created_at->diffForHumans()}}</td>
                        <td>
                            <button   title="{{ __('Edit Filiere details') }}" data-id="" data-url="/admin/filiere/{{$filiere->id}}/edit" data-toggle="modal" data-target="#editFiliereModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="{{ __('Delete Filiere') }}" data-url="/admin/filiere/delete/{{$filiere->id}}" class="btn btn-danger deleteFiliereBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>{{ __('Information') }} </h4>
            <p>{{ __('No Filiere created yet') }}</p>
            <br>
            <button class="btn  btn-secondary " data-toggle="modal" data-target="#createFiliereModal" ><i class="fa fa-plus"></i> {{ __('Create Filiere') }}</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$filieres->count()}} Filieres</div>
</div>
@include('admin.filiere.partials.create')
@include('admin.filiere.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
$(document).ready(function() {
    $('.dataTables-deprt').DataTable({
        responsive: true,
        "paging": false,
    });
    $('#editFiliereModal').on('show.bs.modal', function (event) {

        var editFiliereButton = $(event.relatedTarget) // Button that triggered the modal
        var url = editFiliereButton.data('url')
        var editFiliereModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                    editFiliereModal.find('input[name="id"]').val(response.data.id)
                    editFiliereModal.find('input[name="filiere_name"]').val(response.data.filiere_name)
                    editFiliereModal.find('select[name="niveau_id"]').val(response.data.niveau_id).trigger('change');
                }
                if(response.status =='error'){
                    toastr.warning(response.data,"{__('Oops Something is not alright') }}");
                }
            }
        });
    });
    $('.deleteFiliereBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete Filiere",
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
            swal("Filiere Information is safe!");
            }
          });
    })
});
</script>
@yield('post-script')
@stop
