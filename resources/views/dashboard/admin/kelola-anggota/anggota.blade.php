@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Anggota')

@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-weight-600 text-dark mb-0">Klasifikasi Konstruksi</h3>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                data-target="#tambah-klasifikasi-konstruksi">Tambah
                                Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500">
                                        No
                                    </th>
                                    <th class="text-weight-500">Sub Klasifikasi</th>
                                    <th class="text-weight-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konstruksi as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{!! $item->sub_klasifikasi !!}</td>
                                        <td>
                                            <div class="d-flex">
                                               
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusKlasifikasiKonstruksi{{ $item->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                            
                                                <button type="button" class="btn btn-sm btn-warning text-white mr-1"
                                                    data-toggle="modal"
                                                    data-target="#modalKlasifikasiUpdate{{ $item->id }}"
                                                    data-nama="#"><i class="far fa-edit"></i></button>
                                            </div>
                                           
                                            <div class="modal fade" id="hapusKlasifikasiKonstruksi{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <h5>Anda Yakin <span class="text-danger fw-bold">
                                                                        <b></b></span>
                                                                    dihapus ?
                                                                </h5>
                                                                <div class="btn d-flex justify-content-end gap-2">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-primary mt-3 mx-1 py-2 px-2"
                                                                        style="width: 70px;">ya</button>
                                                                    <button type="button" data-dismiss="modal"
                                                                        class="btn btn-sm btn-primary mt-3 mx-1 py-2 px-2"
                                                                        style="width: 70px;">tidak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="modal fade" tabindex="-1"
                                                id="modalklasifikasiUpdate{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form class="form-konstruksi-update" data-id="{{ $item->id }}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Klasifikasi Konstruksi</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3 has-validation">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Klasifikasi Konstruksi</label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="sub_klasifikasi" name="sub_klasifikasi"
                                                                        placeholder="Masukan Nama klasifikasi"
                                                                        value="{{ $item->sub_klasifikasi }}">
                                                                    <span
                                                                        class="text-danger text_error_update text-small sub_klasifikasi_error_update">
                                                                    </span>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-tambah blue-bg-inkindo">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <form class="form-konstruksi-store">
                                                @csrf
                                                <div class="modal fade" id="tambah-klasifikasi-konstruksi" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Data Klasifikasi Konstruksi
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3 has-validation">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Klasifikasi Konstruksi</label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="sub_klasifikasi" name="sub_klasifikasi"
                                                                        placeholder="Masukan Nama Klasifikasi">
                                                                    <span
                                                                        class="text-danger text_error_store text-small sub_klasifikasi_error_store">
                                                                    </span>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-tambah blue-bg-inkindo">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-weight-600 text-dark mb-0">Klasifikasi Non Konstruksi</h3>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                data-target="#tambah-kategori-nonkonstruksi">Tambah
                                Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500">
                                        No
                                    </th>
                                    <th class="text-weight-500">Sub Klasifikasi</th>
                                    <th class="text-weight-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($non_konstruksi as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{!! $item->sub_klasifikasi !!}</td>
                                        <td>
                                            <div class="d-flex">
                                       
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusKlasifikasiKonstruksi{{ $item->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                            
                                                <button type="button" class="btn btn-sm btn-warning text-white mr-1"
                                                    data-toggle="modal"
                                                    data-target="#modalKlasifikasiUpdate{{ $item->id }}"
                                                    data-nama="#"><i class="far fa-edit"></i></button>
                                            </div>
                                        
                                            <div class="modal fade" id="hapusKlasifikasinonKonstruksi{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <h5>Anda Yakin <span class="text-danger fw-bold">
                                                                        <b></b></span>
                                                                    dihapus ?
                                                                </h5>
                                                                <div class="btn d-flex justify-content-end gap-2">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-primary mt-3 mx-1 py-2 px-2"
                                                                        style="width: 70px;">ya</button>
                                                                    <button type="button" data-dismiss="modal"
                                                                        class="btn btn-sm btn-primary mt-3 mx-1 py-2 px-2"
                                                                        style="width: 70px;">tidak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="modal fade" tabindex="-1"
                                                id="modalKlasifikasiUpdate{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form class="form-konstruksi-update"
                                                            data-id="{{ $item->id }}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Klasifikasi Konstruksi</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3 has-validation">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Klasifikasi Konstruksi</label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="sub_klasifikasi" name="sub_klasifikasi"
                                                                        placeholder="Masukan Nama klasifikasi"
                                                                        value="{{ $item->sub_klasifikasi }}">
                                                                    <span
                                                                        class="text-danger text_error_update text-small sub_klasifikasi_error_update">
                                                                    </span>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-tambah blue-bg-inkindo">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                            <form class="form-nonkonstruksi-store">
                                                @csrf
                                                <div class="modal fade" id="tambah-kategori-nonkonstruksi" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Data Klasifikasi Non
                                                                    Konstruksi
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3 has-validation">
                                                                    <label class="form-label font-weight-normal">Nama
                                                                        Klasifikasi Konstruksi</label>
                                                                    <input type="text" class="form-control form-input"
                                                                        id="sub_klasifikasi" name="sub_klasifikasi"
                                                                        placeholder="Masukan Nama Klasifikasi">
                                                                    <span
                                                                        class="text-danger text_error_store text-small sub_klasifikasi_error_store">
                                                                    </span>
                                                                </div>
                                                                <div class="modal-footer mt-3">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-tambah blue-bg-inkindo">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col">
                <!-- Modal Update Anggota -->
                <form class="form-update">
                    @csrf
                    <div id="updateDataAnggota" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Update
                                        Data Anggota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="hiddenAngId" name="hiddenAngId" value="0">
                                    <div class="mb-2 mt-0">
                                        <label class="text-lg-1 mb-0" style="font-weight: 600;">Data
                                            Perusahaan</label>
                                        <hr class="my-1 p-0">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Nama
                                            Perusahaan<sup class="text-danger">*</sup></label>
                                        <input type="perusahaan" class="form-control form-input" id="perusahaan"
                                            name="perusahaan" placeholder="Masukkan nama perusahaan">
                                        <span
                                            class="text-danger text_error_update text-small perusahaan_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Deskripsi
                                            Perusahaan<sup class="text-danger">*</sup></label>
                                        <textarea type="deskripsi" class="form-control form-input" id="deskripsi" name="deskripsi"
                                            placeholder="Masukkan deskripsi"></textarea>
                                        <span
                                            class="text-danger text_error_update text-small deskripsi_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">No Anggota<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control form-input" id="no_anggota"
                                            name="no_anggota" placeholder="Masukkan no_anggota">
                                        <span
                                            class="text-danger text_error_update text-small no_anggota_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Logo
                                            Perusahaan</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="hidden" name="logoOld">
                                                <input type="file" class="custom-file-input form-input" id="logo"
                                                    name="logo">
                                                <label class="custom-file-label form-control" for="">Pilih
                                                    file</label>
                                            </div>
                                        </div>
                                        <span class="text-danger text_error_update text-small logo_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Foto Perusahaan
                                            (Opsional)
                                        </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="hidden" name="foto_perusahaanOld">
                                                <input type="file" class="custom-file-input form-input"
                                                    id="foto_perusahaan" name="foto_perusahaan">
                                                <label class="custom-file-label form-control" for="">Pilih
                                                    file</label>
                                            </div>
                                        </div>
                                        <span
                                            class="text-danger text_error_update text-small foto_perusahaan_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Nama Penanggung
                                            Jawab<sup class="text-danger">*</sup></label>
                                        <input type="penanggung_jawab" class="form-control form-input" id="penanggung_jawab"
                                            name="penanggung_jawab" placeholder="Masukkan nama">
                                        <span
                                            class="text-danger text_error_update text-small penanggung_jawab_error_update"></span>

                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Alamat<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control form-input" id="alamat" name="alamat"
                                            placeholder="Alamat">
                                        <span class="text-danger text_error_update text-small alamat_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Alamat
                                            Kabupaten<sup class="text-danger">*</sup></label>
                                        <select name="alamat_kabupaten" id="alamat_kabupaten"
                                            class="form-control form-input mt-2">
                                            <option value="">Pilih Kategori</option>
                                            <option value="jogja">
                                                Kota Jogja</option>
                                            <option value="sleman">
                                                Sleman</option>
                                            <option value="bantul">
                                                Bantul</option>
                                            <option value="kulonprogo">
                                                Kulon Progo</option>
                                            <option value="gunungkidul">
                                                Gunung Kidul</option>
                                        </select>
                                        <span
                                            class="text-danger text_error_update text-small alamat_kabupaten_error_update">
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">NPWP</label>
                                        <input type="text" class="form-control" id="npwp" name="npwp"
                                            placeholder="Masukkan NPWP">
                                    </div>
                                    <div class="my-2">
                                        <label class="text-lg-1 mb-0" style="font-weight: 600;">Akun</label>
                                        <hr class="my-1 p-0">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Alamat Email<sup
                                                class="text-danger">*</sup></label>
                                        <input type="email" class="form-control form-input" id="email"
                                            name="email" placeholder="Masukkan email">
                                        <span class="text-danger text_error_update text-small email_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Password</label>
                                        <input type="password" class="form-control form-input" id="password"
                                            name="password" placeholder="Password">
                                        <span
                                            class="text-danger text_error_update text-small password_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control form-input" id="password_confirmation"
                                            name="password_confirmation" placeholder="Konfirmasi password">
                                        <span
                                            class="text-danger text_error_update text-small password_confirmation_error_update"></span>
                                    </div>
                                    <div class="my-2">
                                        <label class="text-lg-1 mb-0" style="font-weight: 600;">Kontak & Sosial
                                            Media</label>
                                        <hr class="my-1 p-0">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Whatsapp<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control form-input" id="no_hp"
                                            name="no_hp" placeholder="No Whatsapp">
                                        <span class="text-danger text_error_update text-small no_hp_error_update"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">No Telp</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp"
                                            placeholder="No telp">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Linkedin</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                                            placeholder="Masukkan linkedin">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Website</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                            placeholder="Masukkan url website">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Maps</label>
                                        <textarea class="form-control" name="maps" placeholder="Embed dari google maps (copy html)"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Modal Hapus Anggota --}}
                <div class="modal fade" id="hapusDataAnggota" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusSyaratAnggotaLabel">
                                    Hapus Data
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-anggota-hapus" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <label class="font-weight-normal">Anda yakin <span class="text-danger fw-bold">
                                            <b class="nama-anggota-hapus"></b></span>
                                        dihapus ?
                                    </label>
                                    <div class="btn d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 mx-1 py-2 px-2"
                                            style="width: 70px;">ya</button>
                                        <button type="button" data-dismiss="modal"
                                            class="btn btn-sm btn-secondary mt-3 mx-1 py-2 px-2"
                                            style="width: 70px;">tidak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="font-weight-bold mb-0">Daftar Anggota</h5>
                            </div>
                            <div>
                                <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                    data-target="#tambahData">Tambah Data</button>
                                <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                    data-target="#importAnggotaExcel">Tambah
                                    Data (Excel)</button>

                                <!-- Modal -->
                                <form class="form-store">
                                    @csrf
                                    <div class="modal fade" id="tambahData" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-2 mt-0">
                                                        <label class="text-lg-1 mb-0" style="font-weight: 600;">Data
                                                            Perusahaan</label>
                                                        <hr class="my-1 p-0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Nama Perusahaan<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="perusahaan" class="form-control form-input"
                                                            id="perusahaan" name="perusahaan"
                                                            placeholder="Masukkan nama perusahaan"
                                                            value="{{ old('perusahaan') }}">
                                                        <span
                                                            class="text-danger text_error_store text-small perusahaan_error_store"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Deskripsi Perusahaan<sup
                                                                class="text-danger">*</sup></label>
                                                        <textarea type="deskripsi" class="form-control form-input" id="deskripsi" name="deskripsi"
                                                            placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                                                        <span
                                                            class="text-danger text_error_store text-small deskripsi_error_store"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">No Anggota<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-input"
                                                            id="no_anggota" name="no_anggota"
                                                            placeholder="Masukkan no_anggota"
                                                            value="{{ old('no_anggota ') }}">
                                                        <span
                                                            class="text-danger text_error_store text-small no_anggota_error_store"></span>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label class="font-weight-normal">Klasifikasi<sup
                                                                class="text-danger">*</sup></label>
                                                        <select name="klasifikasi" id="klasifikasi"
                                                            class="form-control form-input mt-2">
                                                            <option selected>Pilih klasifikasi</option>
                                                            <optgroup class="font-weight-normal" label="Konstruksi">
                                                                @foreach ($konstruksi as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->sub_klasifikasi }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                            <optgroup class="font-weight-normal" label="Non Konstruksi">
                                                                @foreach ($non_konstruksi as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->sub_klasifikasi }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        <span
                                                            class="text-danger text_error_store text-small klasifikasi_error_store">
                                                        </span>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Logo Perusahaan</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input form-input"
                                                                    id="logo" name="logo">
                                                                <label class="custom-file-label form-control"
                                                                    for="">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Foto Perusahaan</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input form-input"
                                                                    id="foto_perusahaan" name="foto_perusahaan">
                                                                <label class="custom-file-label form-control"
                                                                    for="">Pilih file</label>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-danger text_error_store text-small foto_perusahaan_error_store"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Nama Penanggung Jawab<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="penanggung_jawab" class="form-control form-input"
                                                            id="penanggung_jawab" name="penanggung_jawab"
                                                            placeholder="Masukkan nama"
                                                            value="{{ old('penanggung_jawab') }}">
                                                        <span
                                                            class="text-danger text_error_store text-small penanggung_jawab_error_store"></span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Alamat<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-input"
                                                            id="alamat" name="alamat" placeholder="Alamat"
                                                            value="{{ old('alamat') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Alamat Kabupaten<sup
                                                                class="text-danger">*</sup></label>
                                                        <select name="alamat_kabupaten" id="alamat_kabupaten"
                                                            class="form-control form-input mt-2">
                                                            <option value="">Pilih Kategori</option>
                                                            <option value="jogja">Kota Jogja</option>
                                                            <option value="sleman">Sleman</option>
                                                            <option value="bantul">Bantul</option>
                                                            <option value="kulonprogo">Kulon Progo</option>
                                                            <option value="gunungkidul">Gunung Kidul</option>
                                                        </select>
                                                        <span
                                                            class="text-danger text_error_store text-small alamat_kabupaten_error_store">
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">NPWP</label>
                                                        <input type="text" class="form-control" id="npwp"
                                                            name="npwp" placeholder="Masukkan NPWP"
                                                            value="{{ old('npwp') }}">
                                                    </div>
                                                    <div class="my-2">
                                                        <label class="text-lg-1 mb-0"
                                                            style="font-weight: 600;">Akun</label>
                                                        <hr class="my-1 p-0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Alamat Email<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="email" class="form-control form-input"
                                                            id="email" name="email" placeholder="Masukkan email"
                                                            value="{{ old('email') }}">
                                                        <span
                                                            class="text-danger text_error_store text-small email_error_store"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Password<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="password" class="form-control form-input"
                                                            id="password" name="password" placeholder="Password">
                                                        <span
                                                            class="text-danger text_error_store text-small password_error_store"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Konfirmasi Password<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="password" class="form-control form-input"
                                                            id="password_confirmation" name="password_confirmation"
                                                            placeholder="Konfirmasi password">
                                                        <span
                                                            class="text-danger text_error_store text-small password_confirmation_error_store"></span>
                                                    </div>
                                                    <div class="my-2">
                                                        <label class="text-lg-1 mb-0" style="font-weight: 600;">Sosial
                                                            Media & Kontak</label>
                                                        <hr class="my-1 p-0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Whatsapp<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control form-input"
                                                            id="no_hp" name="no_hp" placeholder="No Whatsapp"
                                                            value="{{ old('no_hp') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">No Telp</label>
                                                        <input type="text" class="form-control" id="no_telp"
                                                            name="no_telp" placeholder="No telp"
                                                            value="{{ old('no_telp') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Linkedin</label>
                                                        <input type="text" class="form-control" id="linkedin"
                                                            name="linkedin" placeholder="Masukkan linkedin"
                                                            value="{{ old('linkedin') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Website</label>
                                                        <input type="text" class="form-control" id="website"
                                                            name="website" placeholder="Masukkan url website"
                                                            value="{{ old('website') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Maps</label>
                                                        <textarea class="form-control" name="maps" placeholder="Embed dari google maps (copy html)"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Modal Import Excel -->
                                <form class="form-store-excel-anggota">
                                    @csrf
                                    <div class="modal fade" id="importAnggotaExcel" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="loading-store-excel"
                                                        style="z-index: 99;position: absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Tambah Data
                                                            (Excel)</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input form-input"
                                                                    id="anggotas" name="anggotas">
                                                                <label class="custom-file-label form-control"
                                                                    for="">Pilih file</label>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-danger text_error_store text-small anggotas_error_store"></span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-store-excel-submit">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data-anggota" class="table table-bordered table-striped updateData">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500 text-center">Perusahaan</th>
                                    <th class="text-weight-500 text-center">Perusahaan</th>
                                    <th class="text-weight-500 text-center">Nama P. Jawab</th>
                                    <th class="text-weight-500 text-center">Email P. Jawab</th>
                                    {{-- <th class="text-weight-500 text-center">Role</th> --}}
                                    <th class="text-weight-500 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            //initial val
            $('.loading-store-excel').hide();
            //
            //initial action
            var shouldReload = {!! json_encode(session('reload', false)) !!};

            if (shouldReload) {
                // Lakukan reload halaman
                location.reload();

                // Reset informasi reload
                {!! session(['reload' => false]) !!};
            }
            //
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function index() {
                $('#data-anggota').DataTable({
                    serverSide: true,
                    processing: true,
                    responsive: true,
                    lengthChange: false,
                    ajax: {
                        url: "{{ route('anggota.data') }}",
                        type: 'GET',
                    },
                    columns: [{
                            data: 'perusahaan',
                            name: 'perusahaan'
                        },
                        {
                            data: 'penanggung_jawab',
                            name: 'penanggung_jawab'
                        },
                        {
                            data: 'user.email',
                            name: 'user.email'
                        },
                        {
                            data: 'user.role',
                            name: 'user.role'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `<div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-sm text-white btn-warning mr-1" data-toggle="modal" data-target="#updateDataAnggota" data-id="${row.id}"><i class="far fa-edit"></i></button>
                                <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="${row.id}"><i
                                                    class="far fa-trash-alt"></i></button>
                                </div>`;
                            }
                        },
                    ]
                })
            }

            $('#updateDataAnggota').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('id');
                console.log('id', id);
                $('#updateDataAnggota input[name="perusahaan"]').val('');
                $('#updateDataAnggota textarea[name="deskripsi"]').html('');
                $('#updateDataAnggota input[name="no_anggota"]').val('');
                $('#updateDataAnggota input[name="logoOld"]').val('');
                $('#updateDataAnggota input[name="foto_perusahaanOld"]').val('');
                $('#updateDataAnggota input[name="penanggung_jawab"]').val('');
                $('#updateDataAnggota input[name="email"]').val('');
                $('#updateDataAnggota input[name="no_hp"]').val('');
                $('#updateDataAnggota input[name="no_telp"]').val('');
                $('#updateDataAnggota input[name="alamat"]').val('');
                $('#updateDataAnggota input[name="linkedin"]').val('');
                $('#updateDataAnggota input[name="website"]').val('');
                $('#updateDataAnggota textarea[name="maps"]').html('');
                $('#updateDataAnggota input[name="npwp"]').val('');

                $('#updateDataAnggota input[name="hiddenAngId"]').val('0');

                $.ajax({
                    url: 'anggota/data/' + id,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        $('#updateDataAnggota input[name="hiddenAngId"]').val(response[0]
                            .id);
                        $('#updateDataAnggota input[name="perusahaan"]').val(response[0]
                            .perusahaan);
                        $('#updateDataAnggota textarea[name="deskripsi"]').html(response[0]
                            .deskripsi);
                        $('#updateDataAnggota input[name="no_anggota"]').val(response[0]
                            .no_anggota);
                        $('#updateDataAnggota input[name="logoOld"]').val(response[0].logo);
                        $('#updateDataAnggota input[name="foto_perusahaanOld"]').val(response[0]
                            .foto_perusahaan);
                        $('#updateDataAnggota input[name="penanggung_jawab"]').val(response[0]
                            .penanggung_jawab);
                        $('#updateDataAnggota input[name="email"]').val(response[0]
                            .user.email);
                        $('#updateDataAnggota input[name="no_hp"]').val(response[0]
                            .no_hp);
                        $('#updateDataAnggota input[name="no_telp"]').val(response[0]
                            .no_telp);
                        $('#updateDataAnggota input[name="alamat"]').val(response[0]
                            .alamat);
                        $('#updateDataAnggota input[name="linkedin"]').val(response[0]
                            .linkedin);
                        $('#updateDataAnggota input[name="website"]').val(response[0]
                            .website);
                        $('#updateDataAnggota textarea[name="maps"]').html(response[0]
                            .maps);
                        $('#updateDataAnggota input[name="npwp"]').val(response[0]
                            .npwp);



                        $(`#updateDataAnggota option[value=${response[0].alamat_kabupaten}]`)
                            .prop("selected", true);
                    }
                });
            });

            $(".form-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "anggota",
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
                        console.log(response);
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

            $(".form-update").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                let dataId = form.find('#hiddenAngId').val();

                $.ajax({
                    type: "POST",
                    url: "anggota/" + dataId,
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

            $(document).on('click', '.btn-hapus', function(e) {
                e.preventDefault();
                console.log($(this));
                $('#hapusDataAnggota').modal('show');
                let dataId = $(this).data('id');

                $.ajax({
                    url: "{{ route('anggota.show.data.destroy') }}",
                    type: 'GET',
                    data: {
                        id: dataId,
                    },
                    beforeSend: function() {
                        $('.nama-anggota-hapus').text('');
                        // $('.form-anggota-hapus').attr('data-id', '');
                        $('.form-anggota-hapus').attr('action', '');
                    },
                    success: function(response) {
                        $('.nama-anggota-hapus').text(response[0].perusahaan);
                        // $('.form-anggota-hapus').attr('data-id', response[0].id);
                        $('.form-anggota-hapus').attr('action',
                            '{{ route('anggota.destroy', '') }}/' + response[0].id);
                    }
                });
            });

            // $(document).on('submit', '.form-anggota-hapus', function(e) {
            //     e.preventDefault();
            //     let dataId = $(this).data('id');
            //     hapusDataAnggota(dataId);
            // });

            // function hapusDataAnggota(id) {
            //     $.ajax({
            //         type: "DELETE",
            //         url: "{{ route('anggota.destroy', '') }}/" + id,
            //         success: function(response) {
            //             console.log(response)
            //             // location.reload()
            //         }
            //     });
            // }

            $(".form-store-excel-anggota").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('anggota.excel.store') }}",
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
                        $('.loading-store-excel').show();
                        $('.btn-store-excel-submit').prop("disabled", true);
                    },
                    success: function(response) {
                        $('.loading-store-excel').hide();
                        $('.btn-store-excel-submit').prop("disabled", false);
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

            //initial action
            index();
        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".form-konstruksi-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "anggota/konstruksi",
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
                        console.log(response);
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

            $(".form-konstruksi-update").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                const dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "anggota/konstruksi/" + dataId,
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

            $(".btn-konstruksi-hapus").click(function(e) {
                Swal.fire({
                    title: 'Hapus data?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    denyButtonText: `Tidak`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).attr('type', 'submit');
                        $(this).prop('form').submit()
                    } else if (result.isDenied) {
                        $(this).attr('type', 'button');
                    }
                })
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".form-nonkonstruksi-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "anggota/non-konstruksi",
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
                        console.log(response);
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

            $(".form-konstruksi-update").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                const dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "anggota/non-konstruksi/" + dataId,
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

            $(".btn-konstruksi-hapus").click(function(e) {
                Swal.fire({
                    title: 'Hapus data?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    denyButtonText: `Tidak`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).attr('type', 'submit');
                        $(this).prop('form').submit()
                    } else if (result.isDenied) {
                        $(this).attr('type', 'button');
                    }
                })
            });
        });
    </script>
@endsection
