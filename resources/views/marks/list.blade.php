@extends('layouts.master')
@extends('layouts.sidemenu')

@section('title') Student Marks @endsection

@section('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    
@endsection
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible" @if(!session('error')) style="display: none;" @endif>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              @if(session('error'))  {{ session('error') }} @endif
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1></h1>
        </div>
        <div class="col-sm-4">
        
        </div>
        <div class="col-sm-2">
            <div class="input-group input-group-sm" style="">
                <a class="btn btn-block btn-crm" data-endpoint="{{ route('marks.create') }}" data-target="modal-default" data-cache="false" data-toggle='modal' href='#' data-async="true">Add Mark</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card card-crm">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>

                    <div class="card-tools">
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div id="showresult">
                       @include('marks.listPagin')
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      
            $(document).on('click', 'a[data-async="true"]', function (e) {
                e.preventDefault();
                var self    = $(this),
                    url     = self.data('endpoint'),
                    target  = self.data('target'),
                    act_type  = self.data('act_type'),
                    cache   = self.data('cache');
                if(act_type=='delete'){
                    Swal.fire({
                        title: "Are you sure you want to delete student mark?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete!',
                        cancelButtonText: 'No, keep it'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url  : url,
                                type : "POST",
                                cache : cache,
                                data:{ "_token" :"{{ csrf_token() }}" },
                            }).done(function(data) {
                                if (data.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data.message,
                                        showConfirmButton: true,
                                        buttonsStyling: false,
                                        confirmButtonClass: "btn btn-crm",
                                        allowOutsideClick: false
                                    }).then((result) => {
                                        location.reload();
                                    });
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: data.message,
                                        showConfirmButton: true,
                                        timer: 3000,
                                    });
                                }
                            }).fail(function(error) {
                                console.log(error);
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire("Cancelled!");
                        }
                    });
                }
                else{
                    $.ajax({
                        url     : url,
                        cache   : cache,
                    }).done(function(result) {
                        if (result.status == 'error') {
                                toastr.error(result.message);
                            }
                        else{
                            if (target !== 'undefined'){
                                $('#'+target+' .modal-content').html(result);
                                $('#'+target).modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                                $('#erralert').html(" ");
                                $('#erralert').hide();
                            }       
                        }
                    }).fail(function(error) {
                        console.log(error);
                    });
                }
            });
           
        });

    </script>
    <script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    // getData(page);
                }
            }
        });
        
        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();
      
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
      
                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];
      
                getData(page);
            });
      
        });
      
        function getData(page){

            var entry_count = $('#entry_count').val();
            $.ajax(
            {
                url: '?page=' + page + '&entry_count='+entry_count,
                type: "get",
                datatype: "html"
            }).done(function(data){
                $("#showresult").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                toastr.error('An error occured. Please try again.');
                setTimeout(function() {
                    location.reload();
                }, 3000);
            });
        }
    </script>
@endsection