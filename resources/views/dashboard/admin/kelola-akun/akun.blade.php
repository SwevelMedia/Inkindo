@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Akun')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="font-weight-bold mb-0">Daftar Admin</h5>
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" id="custom-blue" class="btn btn-sm" data-toggle="modal"
                            data-target="#tambahData">Tambah Data</button>

                        <!-- Modal -->
                        <form class="form-store">
                            @csrf
                            <div class="modal fade" id="tambahData" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Akun</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Nama Pengguna<sup
                                                        class="text-danger">*</sup></label>
                                                <input type="name" class="form-control form-input" id="name"
                                                    name="name" placeholder="Masukkan nama">
                                                <span
                                                    class="text-danger text_error_store text-small name_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Alamat Email<sup
                                                        class="text-danger">*</sup></label>
                                                <input type="email" class="form-control form-input" id="email"
                                                    name="email" placeholder="Masukkan email">
                                                <span
                                                    class="text-danger text_error_store text-small email_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Password<sup
                                                        class="text-danger">*</sup></label>
                                                <input type="password" class="form-control form-input" id="password"
                                                    name="password" placeholder="Password">
                                                <span
                                                    class="text-danger text_error_store text-small password_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Konfirmasi Password<sup
                                                        class="text-danger">*</sup></label>
                                                <input type="password" class="form-control form-input"
                                                    id="password_confirmation" name="password_confirmation"
                                                    placeholder="Konfirmasi password">
                                                <span
                                                    class="text-danger text_error_store text-small password_confirmation_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">No Telp/Whatsapp</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    placeholder="No telp">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    placeholder="Alamat">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Status</label>
                                                <select class="custom-select @error('status') is-invalid @enderror" name="status">
                                                    <option>Pilih status</option>
                                                    <option value="aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="nonaktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Nonaktif</option>
                                                </select>

                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label class="form-label font-weight-normal">Role</label>
                                                <select class="custom-select" name="role">
                                                    <option value="">Pilih role</option>
                                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                        Admin</option>
                                                    <option value="anggota"
                                                        {{ old('role') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id=""
                                                            name="foto">
                                                        <label class="custom-file-label form-control" for="">Pilih
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id=""
                                                            name="foto">
                                                        <label class="custom-file-label form-control" for="">Pilih
                                                            file</label>
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-danger text_error_store text-small foto_error_store"></span>
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
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead class="table-info">
                                    <tr>
                                        <th class="sorting-asc col-1 text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">No</th>
                                        <th class="sorting-asc text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">Nama</th>
                                        <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">Foto</th>
                                        <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">Email</th>
                                        <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">No Telp</th>
                                        <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">Alamat</th>
                                        {{-- <th class="sorting" tabindex="0" rowspan="1" colspan="1">Role</th> --}}
                                        <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">Status</th>
                                        <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                            colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr class="odd">
                                            <td class="text-center text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="0">{{ $data->name }}</td>
                                            <td class="text-center">
                                                <img class="elevation-2"
                                                    src="{{ asset('storage/uploads/akun/' . $data->foto) }}"
                                                    alt="" width="50px">
                                            </td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            {{-- <td class="text-center">
                                                @if ($data->role == 'admin')
                                                    <span class="badge badge-pill badge-primary">{{ $data->role }}</span>
                                                @elseif ($data->role == 'anggota')
                                                    <span class="badge badge-pill badge-success">{{ $data->role }}</span>
                                                @endif
                                            </td> --}}
                                            <td class="text-center">
                                                @if ($data->status == 'aktif')
                                                    <span class="badge badge-pill font-weight-bold badge-success px-3 py-2"
                                                        style="font-weight: 500">{{ $data->status }}</span>
                                                @elseif ($data->status == 'nonaktif')
                                                    <span class="badge badge-pill font-weight-bold badge-danger px-3 py-2"
                                                        style="font-weight: 500">{{ $data->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- Button hapus -->
                                                    <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                        data-target="#hapusAkun{{ $data->id }}"><i
                                                            class="far fa-trash-alt"></i></button>

                                                    <!-- Button Update-->
                                                    <button type="button" class="btn btn-sm text-white btn-warning mr-1"
                                                        data-toggle="modal" data-target="#updateData{{ $data->id }}">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                </div>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="hapusAkun{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="HapusKategoriGaleriLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="HapusKategoriGaleriLabel">
                                                                    Hapus Data
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('akun.destroy', $data->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <label class="font-weight-normal">Anda yakin <span
                                                                            class="text-danger fw-bold">
                                                                            <b>{{ $data->name }}</b></span>
                                                                        dihapus ?
                                                                    </label>
                                                                    <div class="btn d-flex justify-content-end gap-2">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger mt-3 mx-1 py-2 px-2"
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

                                                <!-- Modal Update -->
                                                <form class="form-update" data-id="{{ $data->id }}">
                                                    @csrf
                                                    <div class="modal fade" id="updateData{{ $data->id }}"
                                                        data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                                       Edit Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label class="form-label font-weight-normal">Nama
                                                                            Pengguna<sup
                                                                                class="text-danger">*</sup></label>
                                                                        <input type="name"
                                                                            class="form-control form-input" id="name"
                                                                            name="name" placeholder="Masukkan nama"
                                                                            value="{{ $data->name }}">
                                                                        <span
                                                                            class="text-danger text_error_update text-small name_error_update"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label font-weight-normal">Alamat
                                                                            Email<sup class="text-danger">*</sup></label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email"
                                                                            placeholder="Masukkan email"
                                                                            value="{{ $data->email }}">
                                                                        <span
                                                                            class="text-danger text_error_update text-small email_error_update"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="form-label font-weight-normal">Password
                                                                            <sup
                                                                                class="text-danger">*</sup></label></label>
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="password"
                                                                            placeholder="Password">
                                                                        <span
                                                                            class="text-danger text_error_update text-small password_error_update"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="form-label font-weight-normal">Konfirmasi
                                                                            Password
                                                                            <sup
                                                                                class="text-danger">*</sup></label></label>
                                                                        <input type="password" class="form-control"
                                                                            id="password_confirmation"
                                                                            name="password_confirmation"
                                                                            placeholder="Konfirmasi password">
                                                                        <span
                                                                            class="text-danger text_error_update text-small password_confirmation_error_update"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label font-weight-normal">No
                                                                            Telp/Whatsapp</label>
                                                                        <input type="text" class="form-control"
                                                                            id="no_hp" name="no_hp"
                                                                            placeholder="No telp"
                                                                            value="{{ $data->no_hp }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="form-label font-weight-normal">Alamat</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamat" name="alamat"
                                                                            placeholder="Alamat"
                                                                            value="{{ $data->alamat }}">
                                                                    </div>
                                                                    {{-- <div class="form-group">
                                                                            <label>Status</label>
                                                                            <select class="custom-select" name="status">
                                                                                <option>Pilih status</option>
                                                                                <option value="aktif"
                                                                                    {{ $data->status == 'aktif' ? 'selected' : '' }}>
                                                                                    Aktif</option>
                                                                                <option value="nonaktif"
                                                                                    {{ $data->status == 'nonaktif' ? 'selected' : '' }}>
                                                                                    Nonaktif</option>
                                                                            </select>
                                                                        </div> --}}
                                                                    {{-- <div class="form-group">
                                                                            <label
                                                                                class="form-label font-weight-normal">Role</label>
                                                                            <select class="custom-select" name="role">
                                                                                <option value="admin"
                                                                                    {{ $data->role == 'admin' ? 'selected' : '' }}>
                                                                                    Admin</option>
                                                                                <option value="anggota"
                                                                                    {{ $data->role == 'anggota' ? 'selected' : '' }}>
                                                                                    Anggota</option>
                                                                            </select>
                                                                        </div> --}}
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="form-label font-weight-normal">Foto</label>
                                                                        <input type="hidden" name="fotoOld"
                                                                            value="{{ $data->foto }}">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="custom-file-input"
                                                                                    id="" name="foto">
                                                                                <label
                                                                                    class="custom-file-label form-control"
                                                                                    for="">Pilih file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="text-danger text_error_store text-small foto_error_update"></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
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
            </div>
            <!-- /.card-body -->
        </div>
    </div>
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

            $(".form-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "akun",
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
                            location.reload()
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
                    url: "akun/" + dataId,
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
                            location.reload()
                        }
                    },
                });
            });

            // $('.reset-form').click(function(e) {
            //     e.preventDefault();
            //     $('[name="nama"]').val('');
            //     $('[name="logo"]').val(null);
            //     $('label.custom-file-label').text('Pilih File');

            // });


        });
    </script>
@endsection
