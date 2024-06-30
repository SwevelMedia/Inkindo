<nav class="d-flex justify-content-center navbar navbar-main navbar-light bg-white navbar-expand-lg shadow-sm sticky-top" style="height: 10vh">
    <div class="container mx-xs-3 mx-lg-5 d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}" style="height: 100%;">
            <img style="max-height: 60px; width:150px" id="logo-inkindo"
                src="{{ asset('assets/img/new-logo-inkindo.png') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-md-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-3 navbar-link text-dark text-weight-400 me-3"
                        href="{{ route('dmi.search') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 navbar-link text-dark text-weight-400 me-3"
                        href="{{ route('dmi.produk-us') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 navbar-link text-dark text-weight-400 me-3"
                        href="{{ route('dmi.suplier') }}">Suplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 navbar-link text-dark text-weight-400 me-3"
                        href="{{ route('dmi.about-us') }}">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
