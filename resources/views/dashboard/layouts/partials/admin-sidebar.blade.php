<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 bg-sidebar">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-flex justify-content-center align-items-center pb-md-0 pt-md-0">
        <div class="mr-2">
            <img src="{{ asset('assets/img/logo-inkindo.png') }}" alt="Inkindo-Logo" width="50" style="opacity: .8">
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
                @if (Auth::user()->foto)
                    <img src="{{ asset('storage/uploads/akun/' . Auth::user()->foto) }}" class="img-circle elevation-2"
                        alt="user-image" style="opacity: .8;object-fit:cover;">
                @else
                    <img src="{{ asset('storage/uploads/anggota/logo/blank-profile.png') }}"
                        class="img-circle elevation-2" alt="Img" style="opacity: .8;object-fit:cover;">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block text-light">Hallo,&nbsp;&nbsp;{{ Auth::user()->name }}</a>
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
                    <a href="{{ route('dashboard.admin') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('dashboard.admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('akun.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('akun.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Akun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('anggota.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('anggota.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('profil.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Profil Inkindo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('prakata.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('prakata.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>Prakata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kode-etik.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('kode-etik.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-lightbulb"></i>
                        <p>Kode Etik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('layanan-konstruksi.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('layanan-konstruksi.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paint-roller"></i>
                        <p>Konstruksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('layanan-nonkonstruksi.index') }}"
                        class="nav-link d-flex text-light pb-1 {{ Request::routeIs('layanan-nonkonstruksi.index') ? 'active' : '' }}">
                        <i class="d-flex align-items-center nav-icon fas fa-hammer"></i>
                        <p class="ml-1">Non Konstruksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('slider.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('berita.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('syarat-anggota.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('syarat-anggota.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>Syarat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('proker.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('proker.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Program Kerja</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('agenda.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('agenda.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Kelola Agenda</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('organisasi.index') }}" class="nav-link text-light pb-1">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Organisasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arsip.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('arsip.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Arsip</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galeri.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('galeri.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Galeri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('faq.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('faq.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mitra.index') }}"
                        class="nav-link text-light pb-1 {{ Request::routeIs('mitra.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake fa-xs" style="color: #ffffff;"></i>
                        <p>Mitra</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
