@extends('layouts.app-home-v2')

@section('css')
    <style>
       .card {
            --bs-card-border-color: #005896 !important;
            --bs-card-border-width: 0px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid login-page d-flex justify-content-center align-items-center py-5 m-auto">
        <div class="row d-md-flex justify-content-md-center d-sm-flex justify-content-sm-center my-sm-0">
            <div class="col-auto px-md-0 py-sm-0 m-sm-3">
                <div class="card shadow-lg">
                    <div class="card-body pt-md-0 pb-md-0 ps-md-0 pe-md-0 my-sm-0 py-sm-0">
                        <div class="row d-flex flex-column-reverse flex-md-row mx-md-0">
                            <div class="col-lg-6 col-md-12 px-md-4 py-md-4 py-4 py-lg-5 px-lg-5 px-xl-5 py-xl-5">
                                <div class="login-konten">
                                    <div class="text-md-start">
                                        <img class="img-fluid" src="{{ asset('assets/img/auth/Inkindo-logo-upd.png') }}"
                                            width="20%" />
                                    </div>
                                    <h4 class="fw-bold text-center mt-4">Masuk ke akun anda</h4>
                                    <p class="text-muted text-center">Lorem ipsum dolor sit amet, consectetur</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col mb-xxl-0 mb-md-0">
                                                <label class="form-label fw-semibold">Email<sup
                                                        class="text-danger">*</sup></label>
                                                <input
                                                    class="border rounded-pill form-control py-2 @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" type="email"
                                                    placeholder="Masukkan email" autocomplete="email" required autofocus />

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col my-md-0">
                                                <label class="form-label fw-semibold">Password<sup
                                                        class="text-danger">*</sup></label>
                                                <input
                                                    class="border rounded-pill form-control py-2 @error('password') is-invalid @enderror"
                                                    name="password" type="password" placeholder="Masukkan password"
                                                    autocomplete="current-password" required />

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div
                                            class="row d-flex d-md-flex flex-column flex-md-row align-items-md-center my-3">
                                            <div class="col d-flex justify-content-center justify-content-md-start">
                                                <div class="form-check d-flex align-items-center"
                                                    style="margin-bottom: 0px;">
                                                    <input id="formCheck-1" class="form-check-input me-2" type="checkbox"
                                                        style="font-size: 14px;margin-top: 0px;" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }} />
                                                    <label class="form-check-label fw-semibold" for="formCheck-1"
                                                        style="font-size: 14px;">
                                                        Ingat Saya
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- <div
                                            class="col text-md-center d-flex justify-content-center justify-content-md-end my-2 py-md-0">
                                            <a class="fw-semibold text-decoration-none"
                                                href="{{ route('password.request') }}" style="font-size: 14px;">Lupa
                                                kata sandi ?
                                            </a>
                                        </div> --}}
                                        </div>
                                        <div class="btn-masuk mb-3">
                                            <button class="btn btn-primary border rounded-pill my-md-0" type="submit"
                                                style="background: #207fc1;width: 100%;">
                                                Masuk
                                            </button>
                                        </div>

                                        {{-- <button class="btn border rounded-pill border-dark px-md-2 my-2 my-md-2" type="button"
                                        style="width: 100%;">
                                        <i class="fab fa-google me-2"></i>
                                        Masuk menggunakan Google
                                    </button>
                                    <div class="text-center pt-2">Tidak punya akun? <a class="text-decoration-none"
                                            href="">Daftar</a> </div> --}}
                                    </form>
                                    <div class="row text-center">
                                        <div class="col text-muted">
                                            <i class="far fa-copyright" style="font-size: 12px;"></i>
                                            <label class="form-label" style="font-size: 12px;">
                                                2022 Inkindo all right reserved
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col img-login text-light py-md-5 px-md-5 px-4 pt-3 pb-md-3 px-xl-5 py-sm-4 px-lg-5"
                                style="background: #005896;border-top-left-radius: 24px;border-bottom-left-radius: 24px;">
                                <div class="row">
                                    <div class="col">
                                        <h2>Dedikasi pada member</h2>
                                        <p>Kami ada untuk memberikan yang terbaik kepada anda</p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col">
                                        <img class="img-fluid" src="{{ asset('assets/img/auth/img-login.png') }}"
                                            width="300px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
