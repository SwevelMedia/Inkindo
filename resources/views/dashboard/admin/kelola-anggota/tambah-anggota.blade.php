@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Akun')

@section('content')
    <div class="card">
        <div class="card-header text-light" style="background-color: #2275AF">
            <h3 class="card-title">Tambah Akun Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Perusahaan</label>
                    <input type="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" placeholder="Masukkan nama perusahaan"
                           value="{{ old('perusahaan') }}">

                    @error('perusahaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Deskripsi Perusahaan</label>
                    <input type="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" value="{{ old('deskripsi') }}">

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto Perusahaan (Opsional)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="" name="foto_perusahaan">
                            <label class="custom-file-label form-control" for="">Pilih file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nama Penanggung Jawab</label>
                    <input type="penanggung_jawab" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab" placeholder="Masukkan nama"
                           value="{{ old('penanggung_jawab') }}">

                    @error('penanggung_jawab')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                           placeholder="Konfirmasi password">

                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">No Telp/Whatsapp</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="No telp" value="{{ old('no_hp') }}">

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">

                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="Masukkan url website" value="{{ old('website') }}">

                    @error('website')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Facebook</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" placeholder="Masukkan url facebook"
                           value="{{ old('facebook') }}">

                    @error('facebook')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Instagram</label>
                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" placeholder="Masukkan url instagram"
                           value="{{ old('instagram') }}">

                    @error('instagram')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Twitter</label>
                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" placeholder="Masukkan url twitter" value="{{ old('twitter') }}">

                    @error('twitter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn text-light" style="background-color: #2275AF">Submit</button>
            </div>
        </form>
    </div>
@endsection
