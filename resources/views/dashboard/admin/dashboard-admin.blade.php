@extends('dashboard.layouts.app-admin')

@section('title', 'Beranda')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                    <i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">
                        {{ $user }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                    <i class="fas fa-user-shield"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Anggota</span>
                    <span class="info-box-number">
                        {{ $anggota }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1">
                    <i class="fas fa-shield-alt"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Agenda</span>
                    <span class="info-box-number">
                        {{ $agenda }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1">
                    <i class="fas fa-signal"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Program Kerja</span>
                    {{-- <span class="info-box-number" id="user_online">{{ $programKerja }}</span> --}}
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div id="summernote"></div>
@endsection
