@extends('admin.layout.app')
@section('title')
<title> Department Users</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#"> Management  </a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/departments"> Department Management  </a>
    </li>
    <li class="breadcrumb-item active"> Users </li>
</ol>
@include('admin.departments.partials._userstable')

@stop
@section('admin-script')
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
