@extends('layouts.admin')

@section('content')

{{-- Inclusion of the Main Navbar --}}
 @include('admin.layout.navbar')

 <!-- Content section -->
<div class="content-wrapper">
    <div class="container-fluid mt-2">
        @yield('admin-content')
    </div>
</div>

@stop

@section('script')
<script>
    $('.dataTables').DataTable({
        //responsive: true,
        "scrollX": true,
        scrollCollapse: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible',
                    search: 'applied',
					order: 'applied',
                }

            },
            'colvis'
        ]
        });
        $('.btn').on('click', function() {
            var $this = $(this);
             $this.button('loading');
            setTimeout(function() {
               $this.button('reset');
           }, 30000);
        });
</script>
    @yield('admin-script')
@stop
