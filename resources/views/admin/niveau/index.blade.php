@extends('admin.layout.app')
@section('title')
<title>{{ __('Niveau Management')}} </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">{{ __('Dashboard')}}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Niveau Management')}}</li>
</ol>
<!--Niveau Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{ __('Niveau Management Table')}}
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createNiveauModal" ><i class="fa fa-plus"></i> {{ __('Create Niveau')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($niveaux->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Niveau Name')}}</th>
                        <th>{{ __('Niveau Deparment')}}</th>
                        <th>{{ __('Created Date')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($niveaux as $niveau )
                    <tr >
                        <td>{{$niveau->niveau_name}}</td>
                        <td>{{$niveau->department->department_name}}</td>
                        <td>{{$niveau->created_at->diffForHumans()}}</td>
                        <td>
                            <button   title="{{ __('Edit niveau details') }}" data-id="" data-url="/admin/niveau/{{$niveau->id}}/edit" data-toggle="modal" data-target="#editNiveauModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="{{ __('Delete Niveau') }}" data-url="/admin/niveau/delete/{{$niveau->id}}" class="btn btn-danger deleteNiveauBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>{{ __('Information') }} </h4>
            <p>{{ __('No Niveau created yet') }}</p>
            <br>
            <button class="btn  btn-secondary " data-toggle="modal" data-target="#createNiveauModal" ><i class="fa fa-plus"></i> {{ __('Create Niveau') }}</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$niveaux->count()}} niveaux</div>
</div>
@include('admin.niveau.partials.create')
@include('admin.niveau.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
$(document).ready(function() {
    $('.dataTables-deprt').DataTable({
        responsive: true,
        "paging": false,
    });
    $('#editNiveauModal').on('show.bs.modal', function (event) {

        var editNiveauButton = $(event.relatedTarget) // Button that triggered the modal
        var url = editNiveauButton.data('url')
        var editNiveauModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                    editNiveauModal.find('input[name="id"]').val(response.data.id)
                    editNiveauModal.find('input[name="niveau_name"]').val(response.data.niveau_name)
                    editNiveauModal.find('select[name="department_id"]').val(response.data.department_id).trigger('change');
                }
                if(response.status =='error'){
                    toastr.warning(response.data,"{__('Oops Something is not alright') }}");
                }
            }
        });
    });
    $('.deleteNiveauBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete Niveau",
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
            swal("Niveau Information is safe!");
            }
          });
    })
});
</script>
@yield('post-script')
@stop
