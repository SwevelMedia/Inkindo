@extends('dashboard.layouts.app-admin')

@section('title', 'Update Akun')

@section('content')
    <div class="card">
        <div class="card-header text-light" style="background-color: #2275AF">
            <h3 class="card-title">Tambah Akun Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('akun.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Pengguna</label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama" value="{{ $data->name }}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ $data->email }}">

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
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="No telp" value="{{ $data->no_hp }}">

                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ $data->alamat }}">

                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select @error('status') is-invalid @enderror" name="status">
                        <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $data->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Role</label>
                    <select class="custom-select @error('role') is-invalid @enderror" name="role">
                        <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="anggota" {{ $data->role == 'anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>

                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="">Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="" name="foto">
                            <label class="custom-file-label form-control" for="">Pilih file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn text-light" style="background-color: #2275AF">Submit</button>
            </div>
        </form>
    </div>
@endsection
