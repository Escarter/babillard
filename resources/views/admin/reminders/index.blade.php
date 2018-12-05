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
    <li class="breadcrumb-item active"> Users Management</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Users Table
        <div class="float-right">
            <a href="/admin/users" class="btn btn-dark btn-sm "><i class="fa fa-users"></i> All Users</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        <hr>

        <div class="table-responsive">
        @if($reminders->count()>0)
            <table width="100%"   class="table table-bordered table-hover dataTable">
                <thead class="thead-light">
                    <tr>
                        <th>Action</th>
                        <th>Reciever's Name</th>
                        <th>Sender's Name</th>
                        <th>Type</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Sent Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reminders as $reminder)
                <tr>
                    <td><a href="" data-id="{{$reminder->id}}" data-url="/admin/reminder/delete/{{$reminder->id}}" class="btn deleteBtn btn-sm btn-danger"><i class="fa fa-remove"></i></a></td>
                    <td>{{$reminder->receiver}}</td>
                    <td>{{$reminder->sender}}</td>
                    <td>
                        @if($reminder->reminder_type == 'single')
                            <span class="badge badge-info">single</span>
                        @elseif($reminder->reminder_type == "mass")
                            <span class="badge badge-secondary">mass</span>
                        @else
                            <span class="badge badge-warning">mass_rejection</span>
                        @endif
                    </td>
                    <td>{{$reminder->reminder_subject}}</td>
                    <td>{{$reminder->reminder_body}}</td>
                    <td>{{$reminder->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-secondary">
            <h3>Sorry</h3>
            <p>No Reminders Sent yet!</p>
            <hr>
            <p>Start Reminder to see reminders here!</p>
        </div>
        @endif
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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    filename: "Approved Max 3 SIM List for  - {{Carbon\Carbon::now()}}",
                    pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied',
                    }
                },'colvis'],
            "bDestroy": true,
            scrollY:        "1000px",
            scrollX: true,
            scrollCollapse: true,
            paging:         true,

        });
        	//delete user details Not working yet
	$('.deleteBtn').on('click', function(e){
		e.preventDefault();
		var url = $(this).attr('data-url');
		console.log(url)
		swal({
			title: "Are you sure?",
			text: "Do you really want to delete this Entry",
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
							swal({title:"Error",text:response.message,icon:"warning"});
						}
					}
				});
			} else {
			swal("Entry Information is safe!");
			}
		});
	});

    });
</script>
@yield('post-script')
@stop
