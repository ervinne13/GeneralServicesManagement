<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{env("APP_TITLE_TEXT")}}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!--Favicon-->
        <link rel="shortcut icon" href="{{ asset('favicon/favicon-graduation-cap.ico') }}">

        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Ionicons -->
        <!--<link href="/ionicons/ionicons.min.css" rel="stylesheet" type="text/css" />-->

        <!--Other Element / View Styles that shouold be overrided by AdminLTE skin-->
        <link href="{{ asset("/bower_components/sweetalert2/dist/sweetalert2.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css") }}" rel="stylesheet" type="text/css" />

        @include("layouts.parts.uses-css-plugins")

        <!-- Theme style -->
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

        <!--Skin: Blue-->
        <!--<link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />-->
        <!--<link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-green-light.min.css")}}" rel="stylesheet" type="text/css" />-->
        <!--<link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-red-light.min.css")}}" rel="stylesheet" type="text/css" />-->
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-red.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->        

        <link href="{{ asset("/css/app.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/css/style.css")}}" rel="stylesheet" type="text/css" />
        
        <meta name="_token" content="{{csrf_token()}}">
        @yield('css')
    </head>
    <body class="{{$bodyClass or ""}}">
        <div class="wrapper">

            <!-- Main Header -->
            @include(isset($header) ? $header : 'layouts.parts.default-header')

            <!-- Left side column. contains the logo and sidebar -->
            @if (Auth::user()->role_name == "ADMIN")
            @include('layouts.parts.admin-sidebar')
            @elseif (Auth::user()->role_name == "SECRETARY")
            @include('layouts.parts.secretary-sidebar')
            @elseif (Auth::user()->role_name == "ACCOUNTANT")
            @include('layouts.parts.accountant-sidebar')
            @endif

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div><!-- /.content-wrapper -->           

            <!-- Main Footer -->
            @include('layouts.parts.footer')

        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

        <script src="{{ asset ("/bower_components/sweetalert2/dist/sweetalert2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/select2/select2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.js") }}" type="text/javascript"></script>

        <script src="{{ asset ("/vendor/underscore/underscore.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/vendor/autoNumeric/autoNumeric.js") }}" type="text/javascript"></script>

        @include("layouts.parts.uses-js-plugins")
        
        <script src="{{ asset ("/js/utilities.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/js/globals.js") }}" type="text/javascript"></script>

        <script src="{{ asset ("/js/layout/top-nav.js") }}" type="text/javascript"></script>

        <script src="{{ asset ("/js/system.js") }}" type="text/javascript"></script>
        
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
              Both of these plugins are recommended to enhance the
              user experience -->

        <script type="text/javascript">
var baseURL = '{{ URL::to("/") }}';
var _token = $('meta[name="_token"]').attr('content');
$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
});
        </script>

        @yield('js')        
    </body>
</html>