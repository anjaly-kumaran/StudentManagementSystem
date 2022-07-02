<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StudentManagementSystem') }}</title>
        <link rel="icon" href="{{ asset('assets/dist/img/logo/favicon.png') }}" type="image/x-icon">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/crmtheme.min.css') }}">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box mb-2" >
            <!-- /.login-logo -->
            <div class="card card-outline card-crm">
                <div class="card-header text-center">
                    {{-- <img height="70" src="{{ asset('assets/dist/img/logo/Logo.png') }}" alt="CRM"> --}}
                    <a href="#" class="h3">Student Management System</a>
                </div>
                <div class="card-body">
                    @yield('content')
                    
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
        <footer class=" text-sm" style="text-align: center;">
            <span class="text-dark">
                Copyright &copy; @php echo date('Y') @endphp
            </span>
        </footer>
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    </body>
</html>
