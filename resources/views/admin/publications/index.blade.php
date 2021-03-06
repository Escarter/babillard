@extends('admin.layout.app')
@section('title')
<title>{{ __('Publication Management')}} </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">{{ __('Dashboard')}}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Publication Management')}}</li>
</ol>
<!--Publication Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> {{ __('Publication Management Table')}}
        <div class="float-right">
            <button class="btn btn-secondary  " data-toggle="modal" data-target="#createPublicationModal" ><i class="fa fa-plus"></i> {{ __('Create Publication')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @include('layouts.notifications')
        @if ($publications->count()>0)
        <div class="table-responsive">
            <table width="100%"  class="table table-bordered table-hover dataTables-deprt">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Publication Ecole')}}</th>
                        <th>{{ __('Publication User')}}</th>
                        <th>{{ __('Publication Name')}}</th>
                        <th>{{ __('Publication Type')}}</th>
                        <th>{{ __('Publication Description')}}</th>
                        <th>{{ __('Publication File')}}</th>
                        <th>{{ __('Publication Target')}}</th>
                        <th>{{ __('Publication Date')}}</th>
                        <th>{{ __('Expiry Date')}}</th>
                        <th>{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publications as $publication )
                    <tr >
                        <td>{{$publication->ecole->ecole_name}}</td>
                        <td>{{$publication->user->getFullName()}}</td>
                        <td>{{$publication->publication_name}}</td>
                        <td>{{$publication->publication_type}}</td>
                        <td>{{$publication->publication_description}}</td>
                        <td><a href="{{$publication->publication_file_path}}" class="btn btn-minor btn-sm" target="_blank" ><i class="fa fa-eye"></i></a></td>
                        <td>
                            @if($publication->publication_target == "internal")
                            <span class="badge badge-primary">Internal</span>
                            @else
                            <span class="badge badge-secondary">External</span>
                            @endif
                        </td>
                        <td>{{$publication->created_at}}</td>
                        <td>{{$publication->publication_expiry_date}}</td>
                        <td>
                            <button   title="{{ __('Edit Publication details') }}" data-id="" data-url="/admin/publication/{{$publication->id}}/edit" data-toggle="modal" data-target="#editPublicationModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button data-toggle="tooltip" data-placement="top"  title="{{ __('Delete Publication') }}" data-url="/admin/publication/delete/{{$publication->id}}" class="btn btn-danger deletePublicationBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>{{ __('Information') }} </h4>
            <p>{{ __('No Publication created yet') }}</p>
            <br>
            <button class="btn  btn-secondary " data-toggle="modal" data-target="#createPublicationModal" ><i class="fa fa-plus"></i> {{ __('Create Publication') }}</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$publications->count()}} Publications</div>
</div>
@include('admin.publications.partials.create')
@include('admin.publications.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
$(document).ready(function() {
    $('.dataTables-deprt').DataTable({
        responsive: true,
        "paging": false,
    });
    $('#editPublicationModal').on('show.bs.modal', function (event) {

        var editPublicationButton = $(event.relatedTarget) // Button that triggered the modal
        var url = editPublicationButton.data('url')
        var editPublicationModal = $(this)
        console.log(url);
        $.ajax({
            dataType  :'JSON',
            type      :'GET',
            url       : url,
            success   :function(response){
                console.log(response)
                if(response.status == 'success') {
                    editPublicationModal.find('input[name="id"]').val(response.data.id)
                    editPublicationModal.find('input[name="publication_name"]').val(response.data.publication_name)
                    editPublicationModal.find('textarea[name="publication_description"]').val(response.data.publication_description)
                    editPublicationModal.find('input[name="publication_expiry_date"]').val(response.data.publication_expiry_date)
                    editPublicationModal.find('select[name="publication_type"]').val(response.data.publication_type).trigger('change');
                    editPublicationModal.find('select[name="publication_target"]').val(response.data.publication_target).trigger('change');
                }
                if(response.status =='error'){
                    toastr.warning(response.data,"{__('Oops Something is not alright') }}");
                }
            }
        });
    });
    $('.deletePublicationBtn').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete Publication",
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
            swal("Publication Information is safe!");
            }
          });
    })
});
</script>
@yield('post-script')
@stop
