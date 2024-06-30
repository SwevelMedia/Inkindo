@extends('dashboard.layouts.app-anggota')

@section('title', 'Kelola Profil')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/anggota/profil.css') }}">
@endsection

@section('content')
    @forelse ($profil as $profil)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline shadow">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($profil->logo)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/uploads/anggota/logo/' . $profil->logo) }}"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/uploads/anggota/logo/blank-profile.png') }}"
                                            alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-weight-600 text-center">{{ $profil->perusahaan }}</h3>
                                <p class="text-muted text-center">{{ $profil->deskripsi }}</p>
                                <i class="fas fa-book mr-1"></i>
                                <p class="d-inline text-weight-600 text-dark mb-0"> Penanggung Jawab</p>
                                <p class="text-muted">
                                    {{ $profil->penanggung_jawab }}
                                </p>
                                <hr>
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <p class="d-inline text-weight-600 text-dark mb-0">Alamat</p>
                                <p class="text-muted">{{ $profil->alamat }}</p>
                                <hr>
                                <i class="fas fa-pencil-alt mr-1"></i>
                                <p class="d-inline text-weight-600 text-dark mb-0">Email</p>
                                <p class="text-muted">
                                    {{ $profil->user->email }}
                                </p>
                                <hr>
                                <i class="far fa-file-alt mr-1"></i>
                                <p class="d-inline text-weight-600 text-dark mb-0">No Wa</p>
                                <p class="text-muted">{{ $profil->no_hp }}</p>
                                <a href="#" class="btn btn-block" id="custom-blue" data-toggle="modal"
                                    data-target="#updateProfil{{ $profil->id }}">Update</a>

                                <!-- Modal Update-->
                                <form class="form-update" data-id="{{ $profil->id }}">
                                    @csrf
                                    <div class="modal fade" id="updateProfil{{ $profil->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Update
                                                        Data Profil</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Nama
                                                            Perusahaan<sup class="text-danger">*</sup></label>
                                                        <input type="perusahaan" class="form-control form-input"
                                                            id="perusahaan" name="perusahaan"
                                                            placeholder="Masukkan nama perusahaan"
                                                            value="{{ $profil->perusahaan }}">
                                                        <span
                                                            class="text-danger text_error_update text-small perusahaan_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Deskripsi
                                                            Perusahaan<sup class="text-danger">*</sup></label>
                                                        <textarea type="deskripsi" class="form-control form-input" id="deskripsi" name="deskripsi"
                                                            placeholder="Masukkan deskripsi">{{ $profil->deskripsi }}</textarea>
                                                        <span
                                                            class="text-danger text_error_update text-small deskripsi_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">No Anggota<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-input"
                                                            id="no_anggota" name="no_anggota"
                                                            placeholder="Masukkan no_anggota"
                                                            value="{{ $profil->no_anggota }}">
                                                        <span
                                                            class="text-danger text_error_update text-small no_anggota_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Klasifikasi<sup
                                                                class="text-danger">*</sup></label>
                                                        {{-- {{ $konstruksi }} --}}
                                                        {{-- {{ $users->klasifikasi[0]->pivot }}      --}}
                                                        <select name="klasifikasi" id="klasifikasi"
                                                            class="form-control form-input mt-2">
                                                            <option selected>Pilih Klasifikasi</option>
                                                            <optgroup class="font-weight-normal" label="Konstruksi">
                                                                @foreach ($konstruksi as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        @foreach ($profil->klasifikasi as $data => $value)
                                                                                    {{ $profil->klasifikasi[$data]->id == $item->id ? 'selected' : '' }} @endforeach>
                                                                        {{ $item->sub_klasifikasi }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup class="font-weight-normal" label="Non Konstruksi">
                                                                @foreach ($non_konstruksi as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        @foreach ($profil->klasifikasi as $data => $value)
                                                                                    {{ $profil->klasifikasi[$data]->id == $item->id ? 'selected' : '' }} @endforeach>
                                                                        {{ $item->sub_klasifikasi }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        <span
                                                            class="text-danger text_error_update text-small klasifikasi_error_update">
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Logo
                                                            Perusahaan<sup class="text-danger">*</sup></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="hidden" name="logoOld"
                                                                    value="{{ $profil->logo }}">
                                                                <input type="file" class="custom-file-input form-input"
                                                                    id="logo" name="logo">
                                                                <label class="custom-file-label form-control"
                                                                    for="">Pilih file</label>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-danger text_error_update text-small logo_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Foto Perusahaan
                                                            (Opsional)
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="hidden" name="foto_perusahaanOld"
                                                                    value="{{ $profil->foto_perusahaan }}">
                                                                <input type="file" class="custom-file-input form-input"
                                                                    id="foto_perusahaan" name="foto_perusahaan">
                                                                <label class="custom-file-label form-control"
                                                                    for="">Pilih file</label>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-danger text_error_update text-small foto_perusahaan_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Nama Penanggung
                                                            Jawab<sup class="text-danger">*</sup></label>
                                                        <input type="penanggung_jawab" class="form-control form-input"
                                                            id="penanggung_jawab" name="penanggung_jawab"
                                                            placeholder="Masukkan nama"
                                                            value="{{ $profil->penanggung_jawab }}">
                                                        <span
                                                            class="text-danger text_error_update text-small penanggung_jawab_error_update"></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Alamat Email<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="email" class="form-control form-input"
                                                            id="email" name="email" placeholder="Masukkan email"
                                                            value="{{ $profil->user->email }}">
                                                        <span
                                                            class="text-danger text_error_update text-small email_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Password</label>
                                                        <input type="password" class="form-control form-input"
                                                            id="password" name="password" placeholder="Password">
                                                        <span
                                                            class="text-danger text_error_update text-small password_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Konfirmasi
                                                            Password</label>
                                                        <input type="password" class="form-control form-input"
                                                            id="password_confirmation" name="password_confirmation"
                                                            placeholder="Konfirmasi password">
                                                        <span
                                                            class="text-danger text_error_update text-small password_confirmation_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Whatsapp<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-input"
                                                            id="no_hp" name="no_hp" placeholder="No Whatsapp"
                                                            value="{{ $profil->no_hp }}">
                                                        <span
                                                            class="text-danger text_error_update text-small no_hp_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">No Telp</label>
                                                        <input type="text" class="form-control" id="no_telp"
                                                            name="no_telp" placeholder="No telp"
                                                            value="{{ $profil->no_telp }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Alamat<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-input"
                                                            id="alamat" name="alamat" placeholder="Alamat"
                                                            value="{{ $profil->alamat }}">
                                                        <span
                                                            class="text-danger text_error_update text-small alamat_error_update"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Alamat
                                                            Kabupaten<sup class="text-danger">*</sup></label>
                                                        <select name="alamat_kabupaten" id="alamat_kabupaten"
                                                            class="form-control form-input mt-2">
                                                            <option value="">Pilih Kategori</option>
                                                            <option value="jogja"
                                                                {{ $profil->alamat_kabupaten == 'jogja' ? 'selected' : '' }}>
                                                                Kota Jogja</option>
                                                            <option value="sleman"
                                                                {{ $profil->alamat_kabupaten == 'sleman' ? 'selected' : '' }}>
                                                                Sleman</option>
                                                            <option value="bantul"
                                                                {{ $profil->alamat_kabupaten == 'bantul' ? 'selected' : '' }}>
                                                                Bantul</option>
                                                            <option value="kulonprogo"
                                                                {{ $profil->alamat_kabupaten == 'kulonprogo' ? 'selected' : '' }}>
                                                                Kulon Progo</option>
                                                            <option value="gunungkidul"
                                                                {{ $profil->alamat_kabupaten == 'gunungkidul' ? 'selected' : '' }}>
                                                                Gunung Kidul</option>
                                                        </select>
                                                        <span
                                                            class="text-danger text_error_update text-small alamat_kabupaten_error_update">
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Linkedin</label>
                                                        <input type="text" class="form-control" id="linkedin"
                                                            name="linkedin" placeholder="Masukkan linkedin"
                                                            value="{{ $profil->linkedin }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Website</label>
                                                        <input type="text" class="form-control" id="website"
                                                            name="website" placeholder="Masukkan url website"
                                                            value="{{ $profil->website }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Maps</label>
                                                        <textarea class="form-control" name="maps" placeholder="Embed dari google maps (copy html)">{{ $profil->maps }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">NPWP</label>
                                                        <input type="text" class="form-control" id="npwp"
                                                            name="npwp" placeholder="Masukkan NPWP"
                                                            value="{{ $profil->npwp }}">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary blue-bg-inkindo">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link btn-link active" href="#portofolio"
                                            data-toggle="tab">Portofolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn-link" href="#tambahPortofolio" data-toggle="tab">Tambah
                                            Portofolio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn-link" href="#tambahKategoriPortofolio"
                                            data-toggle="tab">Kategori
                                            Portofolio</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body text-center">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="portofolio"
                                        style="overflow-y: scroll;overflow-x: scroll; height: 470px">
                                        <div>
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead class="table-info">
                                                    <tr>
                                                        <th class="text-weight-500">
                                                            No
                                                        </th>
                                                        <th class="text-weight-500">Judul</th>
                                                        <th class="text-weight-500">Detail</th>
                                                        <th class="text-weight-500">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($portofolio as $portofolio)
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>
                                                                <p class="font-weight-normal">
                                                                    {{ $portofolio->nama }}</p>
                                                            </td>
                                                            <td>
                                                                <a href="#"><i class="fa fa-eye fs-5"
                                                                        aria-hidden="true" data-toggle="modal"
                                                                        data-target="#rincianPorto{{ $portofolio->id }}"></i></a>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex flex-wrap justify-content-center">
                                                                    {{-- hapus --}}
                                                                    <button class="btn btn-sm btn-danger mx-2"
                                                                        data-toggle="modal"
                                                                        data-target="#modalHapusPorto{{ $portofolio->id }}"><i
                                                                            class="far fa-trash-alt"></i></button>

                                                                    {{-- edit --}}
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-warning text-white mr-1"
                                                                        data-toggle="modal" {{-- data-target="#modalUpdatePorto{{ $portofolio->id }}" --}}
                                                                        data-nama="#"><i
                                                                            class="far fa-edit"></i></button>
                                                                </div>
                                                                {{-- modal hapus --}}
                                                                <div class="modal fade"
                                                                    id="modalHapusPorto{{ $portofolio->id }}"
                                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">
                                                                                    Hapus Data
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('portofolio.destroy', $portofolio->id) }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <h5>Anda Yakin <span
                                                                                            class="text-danger fw-bold">
                                                                                            <b></b></span>
                                                                                        dihapus ?
                                                                                    </h5>
                                                                                    <div
                                                                                        class="btn d-flex justify-content-end gap-2">
                                                                                        <button type="submit"
                                                                                            class="btn btn-sm btn-primary mt-3 mx-1 py-2 px-2"
                                                                                            style="width: 70px;">ya</button>
                                                                                        <button type="button"
                                                                                            data-dismiss="modal"
                                                                                            class="btn btn-sm btn-primary mt-3 mx-1 py-2 px-2"
                                                                                            style="width: 70px;">tidak</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- Modal Edit --}}
                                                                <div class="modal fade" tabindex="-1"
                                                                    id="modalUpdatePorto{{ $portofolio->id }}">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <form class="form-portofolio-update"
                                                                                data-id="{{ $portofolio->id }}">
                                                                                @csrf
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Edit
                                                                                        Portofolio
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="mb-3 has-validation">
                                                                                        <label
                                                                                            class="form-label font-weight-normal">Judul</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-input"
                                                                                            id="judul" name="judul"
                                                                                            placeholder="Masukan Judul Proyek"
                                                                                            value="{{ $portofolio->judul }}">
                                                                                        <span
                                                                                            class="text-danger text_error_update text-small judul_error_update">
                                                                                        </span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="input-group align-items-center w-100 mb-3">
                                                                                        <div class="img pr-2">
                                                                                            <img class="object-fit-cover"
                                                                                                src="{{ asset('storage/uploads/anggota/portofolio/' . $portofolio->gambar) }}"
                                                                                                alt="no-img"
                                                                                                style="max-width: 200px; height:100px">
                                                                                        </div>
                                                                                        <div class="d-flex-column w-75">
                                                                                            <div class="custom-file"
                                                                                                id="gambar-update">
                                                                                                <input type="hidden"
                                                                                                    name="gambarOld"
                                                                                                    value="{{ $portofolio->gambar }}">
                                                                                                <input type="file"
                                                                                                    name="gambar"
                                                                                                    class="custom-file-input form-input">
                                                                                                <label
                                                                                                    class="custom-file-label mb-2">Pilih
                                                                                                    File</label>
                                                                                            </div>
                                                                                            <div class="text-error">
                                                                                                <span
                                                                                                    class="text-danger text_error_update text-small gambar_error_update">
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer mt-3">
                                                                                        <button type="button"
                                                                                            class="btn btn-danger"
                                                                                            data-dismiss="modal">Batal</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary btn-tambah blue-bg-inkindo">Simpan</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <div
                                                            class="row px-0 d-flex justify-content-center align-items-center">
                                                            <div class="modal modal-xl ms-md-5 fade" id=""
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div
                                                                                class="row my-2 mx-1 d-flex align-items-start">
                                                                                <div class="col-lg-11 me-1 me-md-0">
                                                                                    <h5 class="ps-2 py-2 font-weight-bold"
                                                                                        style="border-left: #0169B8 solid 5px">
                                                                                        {{ $portofolio->nama }}
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-lg-1">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                            </div>
                                                                            <hr class="m-0 p-0">
                                                                            <div class="container">
                                                                                <div class="row mt-4">
                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <p
                                                                                                class="mb-1 font-weight-light">
                                                                                                Lokasi
                                                                                                Proyek</p>
                                                                                            <p class="text-weight-500">
                                                                                                {{ $portofolio->lokasi }}
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <p
                                                                                                class="mb-1 font-weight-light">
                                                                                                Tahun
                                                                                                Proyek</p>
                                                                                            <p class="text-weight-500">
                                                                                                {{ $portofolio->tahun }}
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <p
                                                                                                class="mb-1 font-weight-light">
                                                                                                Pemilik
                                                                                                Proyek</p>
                                                                                            <p class="text-weight-500">
                                                                                                {{ $portofolio->pemilik }}
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="row text-wrap w-100">
                                                                                            <p
                                                                                                class="mb-1 font-weight-light">
                                                                                                Deskripsi
                                                                                                Proyek</p>
                                                                                            <p class="text-weight-500 full-konten d-none"
                                                                                                style="text-align: justify">
                                                                                                {{ $portofolio->deskripsi }}
                                                                                            </p>
                                                                                            <p class="text-weight-500 part-konten"
                                                                                                style="text-align: justify">
                                                                                                {{ Str::limit($portofolio->deskripsi, 30) }}<a
                                                                                                    class="btn-full-konten text-decoration-none"
                                                                                                    style="cursor: pointer">
                                                                                                    Lebih
                                                                                                    lanjut...</a>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <p
                                                                                                class="mb-1 font-weight-light">
                                                                                                Dokumentasi Proyek
                                                                                            </p>
                                                                                            @foreach ($portofolio['portofolioGambar'] as $gambar)
                                                                                                <div
                                                                                                    class="col-lg-3 mb-4 mb-lg-0">
                                                                                                    <img src="{{ asset('storage/uploads/anggota/portofolio/' . $gambar['gambar']) }}"
                                                                                                        class="w-100 shadow-1-strong rounded mb-4 object-fit-cover"
                                                                                                        alt="img"
                                                                                                        style="max-height: 310px;" />
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="rincianPorto{{ $portofolio->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title px-2 py-2 font-weight-bold"
                                                                            id="exampleModalLabel"
                                                                            style="border-left: #0169B8 solid 5px">
                                                                            {{ $portofolio->nama }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p
                                                                                        class="mb-1 text-left font-weight-light">
                                                                                        Lokasi
                                                                                        Proyek</p>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <p class="text-left text-weight-500">
                                                                                        {{ $portofolio->lokasi }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p
                                                                                        class="mb-1 text-left font-weight-light">
                                                                                        Tahun
                                                                                        Proyek</p>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <p class="text-left text-weight-500">
                                                                                        {{ $portofolio->tahun }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p
                                                                                        class="mb-1 text-left font-weight-light">
                                                                                        Pemilik
                                                                                        Proyek</p>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <p class="text-left text-weight-500">
                                                                                        {{ $portofolio->pemilik }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p
                                                                                        class="mb-1 text-left font-weight-light">
                                                                                        Deskripsi
                                                                                        Proyek</p>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <p class="text-left text-weight-500">
                                                                                        {{ $portofolio->deskripsi }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p
                                                                                        class="mb-1 text-left font-weight-light">
                                                                                        Kategori
                                                                                        Proyek</p>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <p class="text-left text-weight-500">
                                                                                        @forelse ($portofolio->kategoriPortofolio as $item)
                                                                                            {{ $item->kategori }}
                                                                                        @empty
                                                                                            Belum ada
                                                                                        @endforelse
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p
                                                                                        class="mb-1 text-left font-weight-light">
                                                                                        Dokumentasi
                                                                                        Proyek</p>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="d-inline">
                                                                                        @foreach ($portofolio['portofolioGambar'] as $gambar)
                                                                                            <div class="mx-3 text-left">
                                                                                                <img src="{{ asset('storage/uploads/anggota/portofolio/' . $gambar['gambar']) }}"
                                                                                                    class="mb-4"
                                                                                                    alt="img"
                                                                                                    style="max-height: 310px;object-fit:cover;" />
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End Modal --}}
                                                    @empty
                                                        <!-- Alert portofolio kosong -->
                                                        <div class="alert alert-warning alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">×</button>
                                                            </i><strong> Perhatian !!!</strong>
                                                            Portofolio masih kosong, silahkan tambahkan portofolio
                                                            anda.
                                                        </div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tambahPortofolio">
                                        <form class="form-horizontal form-portofolio-store">
                                            @csrf
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left  text-weight-500">Judul<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <input type="text" name="judul" class="form-control form-input"
                                                        id="judul" placeholder="Judul Proyek">
                                                    <span
                                                        class="text-danger text_error_store text-small judul_error_store"></span>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left  text-weight-500">Deskripsi<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <textarea class="form-control form-input" name="deskripsi" placeholder="Deskripsi proyek" id="deskripsi_p"
                                                        cols="30" rows="10"></textarea>
                                                    <span
                                                        class="text-danger text_error_store text-small deskripsi_error_store"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left  text-weight-500">Pemilik<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <input type="text" name="pemilik" class="form-control form-input"
                                                        id="pemilik" placeholder="Pemilik Proyek">
                                                    <span
                                                        class="text-danger text_error_store text-small pemilik_error_store"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left  text-weight-500">Lokasi<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <input type="text" name="lokasi" class="form-control form-input"
                                                        id="lokasi" placeholder="Lokasi Proyek">
                                                    <span
                                                        class="text-danger text_error_store text-small lokasi_error_store"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left text-weight-500">Tahun<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <input type="text" name="tahun" class="form-control form-input"
                                                        id="tahun" placeholder="Tahun Proyek">
                                                    <span
                                                        class="text-danger text_error_store text-small tahun_error_store"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-left text-weight-500">Kategori
                                                    Portofolio</label>
                                                <div class="col">
                                                    <select name="kategori" id="kategori"
                                                        class="form-control form-input">
                                                        <option selected>Pilih Kategori</option>

                                                        @foreach ($kategori_porto as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left text-weight-500">Gambar<sup
                                                        class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <div class="custom-file">
                                                        <input type="file" name="gambars[]" id="gambars"
                                                            class="custom-file-input form-input" multiple>
                                                        <label class="custom-file-label mb-0">Pilih
                                                            File (Bisa lebih dari satu)</label>
                                                    </div>
                                                    <span
                                                        class="text-danger text_error_store text-small gambars.0_error_store"></span>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn brn-sm float-right"
                                                id="custom-blue">Submit</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="tambahKategoriPortofolio">
                                        <form class="form-horizontal form-k-portofolio-store">
                                            @csrf
                                            <div class="form-group row">
                                                <label for=""
                                                    class="col-sm-3 col-form-label text-left text-weight-500">Nama
                                                    Kategori<sup class="text-danger">*</sup></label>
                                                <div class="col">
                                                    <input type="text" name="kategori" class="form-control form-input"
                                                        id="kategori" placeholder="Kategori Portofolio">
                                                    <span
                                                        class="text-danger text_error_store text-small kategori_error_store"></span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn brn-sm float-right"
                                                id="custom-blue">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-primary shadow" style="height: 566px">
                            <div class="card-header" id="custom-blue">
                                <h3 class="card-title">Media Sosial</h3>
                            </div>

                            <div class="card-body">
                                <i class="fas fa-globe mr-1"></i>
                                <p class="d-inline text-weight-600">Website</p>
                                <p class="text-muted">
                                    {{ $profil->website }}
                                </p>
                                <hr>
                                <i class="fab fa-linkedin mr-1"></i>
                                <p class="d-inline text-weight-600">Linkedin</p>
                                <p class="text-muted">
                                    {{ $profil->linkedin }}
                                </p>
                                {{-- <i class="fab fa-facebook mr-1"></i>
                                <p class="d-inline text-weight-600">Facebook</p>
                                <p class="text-muted">{{ $profil->facebook }}</p>
                                <hr>
                                <i class="fab fa-instagram mr-1"></i>
                                <p class="d-inline text-weight-600">Instagram</p>
                                <p class="text-muted">
                                    {{ $profil->instagram }}
                                </p>
                                <hr>
                                <i class="fab fa-twitter mr-1"></i>
                                <p class="d-inline text-weight-600">Twitter</p>
                                <p class="text-muted">{{ $profil->twitter }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @empty
        <!-- Alert profil belum ada data -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Profil belum ada data!</strong> Silahkan isi profil terlebih dahulu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    @endforelse
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // GLOBAL X - CSRF - TOKEN SETUP
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".form-portofolio-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "portofolio",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_error_store').text('');
                        $('.form-input').toggleClass('is-invalid', false);
                    },
                    success: function(response) {
                        if (response.code == 0) {
                            $.each(response.errors, function(key, val) {
                                $(form).find('.' + key + '_error_store').text(val[0]);
                                $(form).find('#' + key).addClass("is-invalid");
                            })
                        } else {
                            setTimeout(() => {
                                location.reload()
                            }, 0);
                        }
                    },
                });
            });


            $(".form-k-portofolio-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "kategori-portofolio",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_error_store').text('');
                        $('.form-input').toggleClass('is-invalid', false);
                    },
                    success: function(response) {
                        if (response.code == 0) {
                            $.each(response.errors, function(key, val) {
                                $(form).find('.' + key + '_error_store').text(val[0]);
                                $(form).find('#' + key).addClass("is-invalid");
                            })
                        } else {
                            setTimeout(() => {
                                location.reload()
                            }, 0);
                        }
                    },
                });
            });

            $(".form-portofolio-update").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                const dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "portofolio/" + dataId,
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`,
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_error_update').text('');
                        $('.form-input').toggleClass('is-invalid', false);

                    },
                    success: function(response) {
                        if (response.code == 0) {
                            $.each(response.errors, function(key, val) {
                                $(form).find('.' + key + '_error_update').text(
                                    val[0]);
                                $(form).find('#' + key).addClass("is-invalid");
                            })
                        } else {
                            setTimeout(() => {
                                location.reload()
                            }, 0);
                        }
                    },
                });
            });

            $(".form-update").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                const dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "anggotaprofil/" + dataId,
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`,
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_error_update').text('');
                        $('.form-input').toggleClass('is-invalid', false);

                    },
                    success: function(response) {
                        console.log(response)
                        if (response.code == 0) {
                            $.each(response.errors, function(key, val) {
                                $(form).find('.' + key + '_error_update').text(
                                    val[0]);
                                $(form).find('#' + key).addClass("is-invalid");
                            })
                        } else {
                            setTimeout(() => {
                                location.reload()
                            }, 0);
                        }
                    },
                });
            });

            $('.btn-full-konten').click(function(e) {
                e.preventDefault();
                $('.part-konten').hide();
                $('.full-konten').removeClass("d-none");
            });
        });
    </script>
@endsection
