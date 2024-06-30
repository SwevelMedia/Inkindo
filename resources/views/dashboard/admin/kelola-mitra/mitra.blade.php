@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Mitra')

@section('content')
    <div class="container-fluid">
        {{-- Mitra --}}
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="font-weight-bold mb-0">Daftar Mitra</h5>
                    </div>
                    <div>
                        <button id="custom-blue" class="btn btn-sm" type="button" data-target="#modal-tambah"
                            data-toggle="modal">Tambah Data</button>
                        {{-- Modal Tambah --}}
                        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Mitra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-store">
                                            @csrf
                                            <div class="mb-3 has-validation">
                                                <label class="form-label font-weight-normal">Nama Mitra</label>
                                                <input type="text" class="form-control form-input" id="nama-store"
                                                    name="nama" placeholder="Masukan Nama Mitra">
                                                <span class="text-danger text_error_store text-small nama_error_store">

                                                </span>

                                            </div>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="logo" id="logo-store"
                                                        class="custom-file-input form-input">
                                                    <label class="custom-file-label">Pilih
                                                        File</label>
                                                </div>
                                            </div>
                                            <span class="text-danger text_error_store text-small logo_error_store">

                                            </span>

                                            <div class="modal-footer mt-3">
                                                <button type="button" class="btn btn-secondary reset-form">Reset
                                                    form</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary btn-tambah">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example4" class="table table-striped table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th class="text-center align-middle text-weight-500">No</th>
                            <th class="text-center align-middle text-weight-500">Nama Mitra</th>
                            <th class="text-center align-middle text-weight-500">Logo Mitra</th>
                            <th class="text-center align-middle text-weight-500">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mitras as $key => $mitra)
                            <tr>
                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                <td class="text-center align-middle">{{ $mitra->nama }}</td>
                                <td class="text-center align-middle">
                                    <img class="object-fit-cover"
                                        src="{{ asset('storage/uploads/admin/mitra/' . $mitra->logo) }}" alt="img"
                                        style="max-width: 200px; height:100px">
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-sm btn-warning text-white mr-1"
                                            data-toggle="modal" data-target="#modal-edit{{ $mitra->id }}"><i
                                                class="far fa-edit mitra-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal"
                                            data-target="#hapusMitra{{ $mitra->id }}"><i
                                                class="far fa-trash-alt"></i></button>

                                        {{-- Modal Hapus Mitra --}}
                                        <div class="modal fade" id="hapusMitra{{ $mitra->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
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
                                                        <form action="{{ route('mitra.destroy', $mitra->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <label class="font-weight-normal">Anda yakin <span
                                                                    class="text-danger fw-bold">
                                                                    <b>{{ $mitra->nama }}</b></span>
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

                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="modal-edit{{ $mitra->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Mitra</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-update" data-id="{{ $mitra->id }}">
                                                            @csrf
                                                            <div class="mb-3 has-validation">
                                                                <label class="form-label font-weight-normal">Nama
                                                                    Mitra</label>
                                                                <input type="text form-input" class="form-control"
                                                                    name="nama" id="nama-update"
                                                                    placeholder="Masukan Nama Mitra"
                                                                    value="{{ $mitra->nama }}">
                                                                <span
                                                                    class="text-danger text_error_update text-small nama_error_update">
                                                                </span>
                                                            </div>
                                                            <div class="input-group align-items-center w-100 mb-3">
                                                                <div class="img pr-2 mb-2">
                                                                    <img class="object-fit-cover"
                                                                        src="{{ asset('storage/uploads/admin/mitra/' . $mitra->logo) }}"
                                                                        alt="no-img"
                                                                        style="max-width: 200px; height:100px">
                                                                </div>
                                                                <div class="d-flex-column w-75">
                                                                    <div class="custom-file" id="logo-update">
                                                                        <input type="hidden" name="logoOld"
                                                                            value="{{ $mitra->logo }}">
                                                                        <input type="file" name="logo"
                                                                            class="custom-file-input form-input">
                                                                        <label class="custom-file-label mb-2">Pilih
                                                                            File</label>
                                                                    </div>
                                                                    <div class="text-error">
                                                                        <span
                                                                            class="text-danger text_error_update text-small logo_error_update">
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-update">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        // GLOBAL X-CSRF-TOKEN SETUP
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $(document).ready(function() {
            $(".form-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "post",
                    url: "mitra",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        // "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                        // Accept: "application/json",
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
                                $(form).find('#' + key + '-store').addClass(
                                    "is-invalid");
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
                console.log(formData)
                $.ajax({
                    type: "POST",
                    url: "mitra/" + dataId,
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
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
                                $(form).find('#' + key + '-update').addClass(
                                    "is-invalid");
                            })
                        } else {
                            location.reload()
                        }
                    },
                });
            });

            $('.reset-form').click(function(e) {
                e.preventDefault();
                $('[name="nama"]').val('');
                $('[name="logo"]').val(null);
                $('label.custom-file-label').text('Pilih File');

            });


        });
    </script>

@endsection
