<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="admins/img/favicon.ico">
    <title>La Plume de Myss</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/fullcalendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/css/bootstrap5.css')}}">
</head>

<body class="font-sans antialiased">
    <div class="main-wrapper">

    @include('layouts.partials.auth_user_sidbar')
    @include('layouts.partials.auth_user_navbar')

    <div class="page-wrapper">
    <div class="content">

    @yield("content")
{{-- @include('layouts.partials.admin_footer') --}}
</div>
</div>
</div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('admins/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('admins/js/popper.min.js')}}"></script>
    <script src="{{asset('admins/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admins/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('admins/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('admins/js/chart.js')}}"></script>
    <script src="{{asset('admins/js/app.js')}}"></script>
    <script src="{{asset('admins/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('admins/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admins/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/js/bootstrap5.min.js')}}"></script>
    <script src="{{asset('admins/js/bootstrap5.js')}}"></script>
    <script src="{{asset('admins/js/select2.min.js')}}"></script>
    <script src="{{asset('admins/js/moment.min.js')}}"></script>
    @yield("scripts")
</body>
</html>
