<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StudentManagementSystem') }} | @yield('title')</title>
        <link rel="icon" href="{{ asset('assets/dist/img/logo/favicon.png') }}" type="image/x-icon">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/crmtheme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css')}}">
        @yield('css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            
            @yield('sidemenu')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-header">
                    <!-- Content Header (Page header) -->
                    @yield('content-header')
                    <div class="container-fluid" @if(!session('success_message') && !session('error_message')) style="display: none;" @endif>
                        <div class="row mb-2">
                            <div class="col-sm-12">

                                <div class="alert alert-@if(session('success_message'))success @elseif(session('error_message'))danger @endif alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             
                                    @if(session('success_message')) <h5><i class="icon fas fa-check"></i> Success!</h5> {{ session('success_message') }} 
                                    @elseif(session('error_message')) <h5><i class="icon fas fa-ban"></i> Alert!</h5> {{ session('error_message') }} 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div><!-- /.container-fluid -->
                </section>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer text-sm text-center">
                <div class=" d-none d-sm-block">
                    {{-- <b>Version</b> 3.0.4 --}}
                </div>
                <strong>Copyright &copy; @php echo date('Y') @endphp | All Rights Reserved</strong>
            </footer>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-xl">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <div class="pageModal"><!-- Place at bottom of page --></div>
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('assets/plugins/toastr/toastr.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script type="text/javascript">

            $body = $("body");

            $(document).on({
                ajaxStart: function() { $body.addClass("loading");    },
                ajaxStop: function() { $body.removeClass("loading"); }    
            });

            $('[data-toggle="tooltip"]').tooltip();
        </script>
        <script type="text/javascript">

            function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                //if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))//46 '.'
                if (charCode > 31 && ((charCode < 48 || charCode > 57)))
                    return false;
                return true;
            }
        </script>
        @yield('js')
    </body>
</html>
