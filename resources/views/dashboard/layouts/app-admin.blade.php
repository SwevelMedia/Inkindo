<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Inkindo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dist/bootstrap4/css/bootstrap.min.css') }}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('dist/summernote/summernote.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dist/font_awesome5/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/admin_lte/css/adminlte.min.css') }}">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- TagInput -->
    <link rel="stylesheet" href="{{ asset('dist/bootstrap_tagsinput/bootstrap-tagsinput.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('dist/datatables/DataTables-1.13.1/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/datatables/Buttons-2.3.3/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/datatables/Responsive-2.4.0/css/responsive.dataTables.min.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/img/logo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        @include('dashboard.layouts.partials.admin-navbar')

        @include('dashboard.layouts.partials.admin-sidebar')
        <div class="content-wrapper" style="background-color: #E8F8FF">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h4 class="m-0 font-weight-bold">@yield('title')</h1> --}}
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->

        </div>
    </div>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Jquery 3.6.1 -->
    <script src="{{ asset('dist/jquery_3.6.1/jquery-3.6.1.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dist/bootstrap4/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('dist/summernote/summernote.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/admin_lte/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/admin_lte/js/pages/dashboard.js') }}"></script>
    <!-- TagInput JS -->
    <script src="{{ asset('dist/bootstrap_tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('dist/datatables/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Responsive-2.4.0/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Responsive-2.4.0/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Buttons-2.3.3/js/buttons.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Buttons-2.3.3/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Buttons-2.3.3/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Buttons-2.3.3/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/Buttons-2.3.3/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dist/datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <!-- Bs custom file input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // DataTables
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

              $('#example2_1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            $('#example3').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            
            $("#example4").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');

            $(document).ready(function() {
                bsCustomFileInput.init();
            });
        });
    </script>

    @yield('script')

</body>

</html>
