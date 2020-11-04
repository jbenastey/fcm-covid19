<!DOCTYPE html>
<!--
Template Name: Apex - Bootstrap 4 Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/apex_admin
Renew Support: https://1.envato.market/apex_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" style="scroll-behavior: smooth">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Nafsha">
    <title>Clustering Bantuan Covid-19</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('apex/app-assets/img/ico/favicon-32.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('apex/app-assets/img/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="{{asset('apex/app-assets/css/css0491.css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900')}}" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/vendors/css/datatables/dataTables.bootstrap4.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/themes/layout-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('apex/app-assets/css/plugins/switchery.min.css')}}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/app-assets/css/pages/dashboard1.min.css')}}">
    <link rel="stylesheet" href="{{asset('apex/app-assets/css/pages/page-maintenance.min.css')}}">
    <link rel="stylesheet" href="{{asset('apex/app-assets/css/pages/authentication.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('apex/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

@guest
    <body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
    @yield('content')
    @else
        <body class="vertical-layout vertical-menu 2-columns navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

        @include('custom-layouts.header')

        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="wrapper">


            <!-- main menu-->
            @include('custom-layouts.sidebar')

            <div class="main-panel">
                <!-- BEGIN : Main Content-->
                <div class="main-content">
                    <div class="content-overlay"></div>
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
                <!-- END : End Main Content-->

                @include('custom-layouts.footer')

            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        @endguest

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        <!-- BEGIN VENDOR JS-->
        <script src="{{asset('apex/app-assets/vendors/js/vendors.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/vendors/js/switchery.min.js')}}"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script src="{{asset('apex/app-assets/vendors/js/datatable/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/vendors/js/chart.min.js')}}"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN APEX JS-->
        <script src="{{asset('apex/app-assets/js/core/app-menu.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/js/core/app.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/js/notification-sidebar.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/js/customizer.min.js')}}"></script>
        <script src="{{asset('apex/app-assets/js/scroll-top.min.js')}}"></script>
        <!-- END APEX JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="{{asset('apex/app-assets/js/data-tables/dt-basic-initialization.js')}}"></script>
        <script src="{{asset('apex/app-assets/js/sweetalert2/dist/sweetalert.min.js')}}"></script>
        <!-- END PAGE LEVEL JS-->
        <!-- BEGIN: Custom CSS-->
        <script src="{{asset('apex/assets/js/scripts.js')}}"></script>
        <script src="{{asset('js/grafik.js')}}"></script>
        <!-- END: Custom CSS-->

        </body>
        <!-- END : Body-->

</html>
