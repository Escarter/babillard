@extends('admin.layout.app')
@section('title')
<title>Admin Dashboard </title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"></li>
</ol>
</div>
<!-- Icon Cards-->
<div class="m-4">
    <div class="row">
        <div class="col-xl-2 col-sm-3 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3>{{$users_count}}</h3>
                    Users!
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/users">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-3 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-image"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Image Uploaded!
                </div>
            </div>
            <a  class="card-footer text-white clearfix small z-1" href="/admin/users/image-uploaded">
                <span  class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-3 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-remove"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Image Not Uploaded!
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/users/image-not-uploaded">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-3 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Pending Approval!
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/users/image-pending">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-3 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-thumbs-up"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Approved!
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/users/image-approved">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
        <div class="col-xl-2 col-sm-3 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-thumbs-down"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Rejected!
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/admin/users/image-rejected">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 col-md-3 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Permanent Staffs!
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-2 col-md-3 mb-3">
            <div class="card text-dark bg-white o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-minus-o"></i>
                </div>
                <div class="mr-5 text-center">
                    <h3></h3>
                    Temporary Staffs!
                </div>
            </div>
            </div>
        </div>

    </div>
    <!-- Area Chart Example-->

</div>
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
    $('.dataTable-user').dataTable({
        responsive:false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csvHtml5',
            },
            {
                extend: 'excelHtml5'
            },
            {
                extend: 'print'
            }
        ]
    });
    $('.dataTable-department').dataTable({
        responsive:false,
        "paging":false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csvHtml5',
            },
            {
                extend: 'excelHtml5'
            },
            {
                extend: 'print'
            }
        ]
    });
    // Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// -- Area Chart Example
var ctx = document.getElementById("myLineChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan','Feb','March','Apr','May'],
    datasets: [{
        label: "Pending",
        backgroundColor: [
                'rgba(255, 255, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
            ],
        data: [1,10,11,20,40]
    },{
        label: "Approved",
        backgroundColor: [
                'rgba(255, 255, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
        data: [20,10,1,20,20]

    }]
},

    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
@yield('post-script')
@stop
