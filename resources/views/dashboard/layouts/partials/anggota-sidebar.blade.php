<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 bg-sidebar">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-flex justify-content-center align-items-center pb-md-0 pt-md-0">
        <div class="mr-2">
            <img src="{{ asset('assets/img/logo-inkindo.png') }}" alt="Inkindo-Logo" width="50"
                style="opacity: .8;object-fit:cover;">
        </div>
        <div class="text-light">
            <p style="font-size: 20px; margin-bottom: 0px; padding-bottom: 0px; padding-top: 10px">INKINDO</p>
            <p style="font-size: 13px; margin-top: -5px; padding-top: 0px">YOGYAKARTA</p>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel my-3 d-flex align-items-center">
            <div class="image">
                @if (Auth::user()->anggota()->get()[0]->logo)
                    <img src="{{ asset('storage/uploads/anggota/logo/' .Auth::user()->anggota()->get()[0]->logo) }}"
                        class="img-circle elevation-2" alt="user-image" style="opacity: .8;object-fit:cover;">
                @else
                    <img src="{{ asset('storage/uploads/anggota/logo/blank-profile.png') }}"
                        class="img-circle elevation-2" alt="Img" style="opacity: .8;object-fit:cover;">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block text-light">Hallo {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline mb-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar btn-light">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mb-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    {{-- <a href="{{ route('dashboard.anggota') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('dashboard.anggota') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Beranda</p>
                    </a> --}}
                    <a href="{{ route('anggotaprofil.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('anggotaprofil.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Profil</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
