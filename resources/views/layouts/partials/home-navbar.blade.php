<!-- Navbar -->
<nav class="d-flex justify-content-center navbar navbar-main navbar-light navbar-expand-lg shadow-sm sticky-top" style="height: 10vh">
    <div class="container mx-xs-3 mx-lg-5 d-flex justify-content-between">
        <a class="navbar-brand" href="#" style="height: 100%;">
            <img style="max-height: 60px; max-width:150px" id="logo-inkindo"
                src="{{ asset('assets/img/new-logo-inkindo.png') }}" />
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navcol-1" class="collapse navbar-collapse d-xl-flex justify-content-end">
            <ul class="navbar-nav fw-normal d-xl-flex gap-3 justify-content-between text-desc">
                <li class="nav-item">
                    <a class="nav-link contain text-dark text-weight-400 {{ Request::route()->getName() == 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark text-weight-400" aria-expanded="false" data-bs-toggle="dropdown"
                        href="#" style="color: #000000">Profil</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('home.profil') }}">Profil</a>
                        <a class="dropdown-item" href="{{ route('home.prakata') }}">Prakata</a>
                        <a class="dropdown-item" href="{{ route('home.kode-etik') }}">Kode Etik</a>
                        <a class="dropdown-item" href="{{ route('home.organisasi') }}">Struktur Organisasi</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark text-weight-400" aria-expanded="false" data-bs-toggle="dropdown"
                        href="#" style="color: #000000">Layanan</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('home.layanan.konstruksi') }}">Konstruksi</a>
                        <a class="dropdown-item" href="{{ route('home.layanan.nonkonstruksi') }}">Non Konstruksi</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark text-weight-400" aria-expanded="false" data-bs-toggle="dropdown"
                        href="#" style="color: #000000">Keanggotaan</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('home.daftar-anggota') }}">Daftar Anggota</a>
                        <a class="dropdown-item" href="{{ route('home.syarat-anggota') }}">Syarat Anggota</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark text-weight-400 {{ Request::route()->getName() == '' ? 'active' : '' }}"
                        aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: #000000">Publik</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item {{ Request::route()->getName() == 'daftar-berita' ? 'active' : '' }}"
                            href="{{ route('home.beritas') }}">Berita</a>
                        {{-- <a class="dropdown-item {{ Request::route()->getName() == 'agenda' ? 'active' : '' }}"
                            href="#">Agenda</a> --}}
                        <a class="dropdown-item {{ Request::route()->getName() == 'program-kerja' ? 'active' : '' }}"
                            href="{{ route('home.proker1') }}">Program Kerja</a>
                        {{-- <a class="dropdown-item {{ Request::route()->getName() == 'regulasi' ? 'active' : '' }}"
                            href="#">Regulasi</a> --}}
                        <a class="dropdown-item {{ Request::route()->getName() == 'galeri' ? 'active' : '' }}"
                            href="{{ route('home.galeri') }}">Galeri</a>
                        <a class="dropdown-item {{ Request::route()->getName() == 'faq' ? 'active' : '' }}"
                            href="{{ route('home.faq') }}">FAQ</a>
                    </div>
                </li>
                @guest
                    <li>
                        <a class="ms-md-2 btn btn-primary blue-bg-inkindo" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-weight-400 text-dark dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="color: #000000" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item"
                                href="@if (Auth::user()->role == 'admin') {{ route('dashboard.admin') }} @else {{ route('anggotaprofil.index') }} @endif">
                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>Dashboard</a>

                            <a class="dropdown-item" href="#"><i
                                    class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i
                                    class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i> Activity log</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
