@extends('layouts.admin')
@section('title','Exhibition | Details')
@section('content')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-responsive-bs4/cs')}}s/responsive.bootstrap4.min.css">
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/sweetalert/css/sweetalert.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/data-table/extensions/autofill/css/select.dataTables.min.css')}}">
<!-- Select 2 css -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}"/>
<!-- Switch component css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/switchery/css/switchery.min.css')}}">
<!-- Tags css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />
<!-- flag icon framework css -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/pages/flag-icon/flag-icon.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{asset('admin/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admin/assets/js/sweetalert2@8.js')}}"></script>