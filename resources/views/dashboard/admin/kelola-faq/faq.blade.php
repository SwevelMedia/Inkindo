@extends('dashboard.layouts.app-admin')

@section('title', 'FAQ')

@section('content')
    <div class="container-fluid">
        {{-- Kategori FAQ --}}
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="font-weight-bold mb-0">kategori FAQ</h5>
                    </div>
                    <div>
                        <button id="custom-blue" class="btn btn-sm" type="button" data-target="#modal-tambah"
                            data-toggle="modal">Tambah Kategori</button>
                        {{-- Modal Tambah --}}
                        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog"
                            aria-labelledby="tambahProfilLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahProfilLabel">Tambah Data Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-store-kategori">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="faq_kategori"
                                                    class="col-sm-3 col-form-label font-weight-normal">Nama
                                                    Kategori</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-input" id="faq_kategori"
                                                        name="faq_kategori" placeholder="Masukkan Kategori">
                                                    <span
                                                        class="text-danger text_kategori_error_store text-small faq_kategori_error_store">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
                <table id="example4" class="table table-striped table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th class="text-center align-middle text-weight-500">No</th>
                            <th class="text-center align-middle text-weight-500">Nama Kategori</th>
                            <th class="text-center align-middle text-weight-500">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $k)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td>{{ $k->faq_kategori }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-sm btn-warning mr-2 text-white" type="button"
                                            data-target="#modal-edit-{{ $k->id }}" data-toggle="modal"><i
                                                class="far fa-edit mitra-edit"></i></button>

                                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal"
                                            data-target="#hapusKategoriFaq{{ $k->id }}"><i
                                                class="far fa-trash-alt"></i></button>

                                        {{-- Modal Hapus Kat Faq --}}
                                        <div class="modal fade" id="hapusKategoriFaq{{ $k->id }}" tabindex="-1"
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
                                                        <form action="{{ route('faq_kategori.destroy', $k->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <label class="font-weight-normal">Anda yakin <span
                                                                    class="text-danger fw-bold">
                                                                    <b>{{ $k->faq_kategori }}</b></span>
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
                                        <div class="modal fade" id="modal-edit-{{ $k->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahKategoriLabel">Update Data
                                                            Slider
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-update-kategori" data-id="{{ $k->id }}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="faq_kategori"
                                                                    class="col-sm-3 col-form-label font-weight-normal">Nama
                                                                    Kategori</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-input"
                                                                        id="faq_kategori" name="faq_kategori"
                                                                        placeholder="Masukkan Kategori"
                                                                        value="{{ $k->faq_kategori }}">
                                                                    <span
                                                                        class="text-danger text_kategori_error_update text-small faq_kategori_error_update"></span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
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
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Mohon maaf!</strong> Data kategori FAQ belum tersedia. Silahkan tambahkan data
                                kategori FAQ terlebih dahulu.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="font-weight-bold mb-0">Daftar FAQ</h5>
                    </div>
                    <div>
                        <button id="custom-blue" class="btn btn-sm" type="button" data-target="#tambahFAQ"
                            data-toggle="modal">Tambah FAQ</button>
                    </div>
                    {{-- Modal Tambah --}}
                    <div class="modal fade bd-example-modal-lg" id="tambahFAQ" tabindex="-1" role="dialog"
                        aria-labelledby="tambahFAQLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahFAQLabel">Tambah FAQ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body  p-4">
                                    <form class="form-store">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="pertanyaan"
                                                class="col-sm-2 col-form-label font-weight-normal">Pertanyaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-input" id="pertanyaan"
                                                    name="pertanyaan" placeholder="Pertanyaan">
                                                <span
                                                    class="text-danger text_error_store text-small pertanyaan_error_store">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jawaban"
                                                class="col-sm-2 col-form-label font-weight-normal">Jawaban</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-input" id="jawaban"
                                                    name="jawaban" placeholder="jawaban">
                                                <span class="text-danger text_error_store text-small jawaban_error_store">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="faq_kategori_id"
                                                class="col-sm-2 col-form-label font-weight-normal">Kategori</label>
                                            <div class="col-sm-10">
                                                <select class="form-control form-input" id="faq_kategori_id"
                                                    name="faq_kategori_id">
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $k)
                                                        <option value="{{ $k->id }}">{{ $k->faq_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span
                                                    class="text-danger text_error_store text-small faq_kategori_id_error_store">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead class="table-info">
                                    <tr>
                                        <th class="text-center align-middle text-weight-500">No</th>
                                        <th class="sorting-asc text-center align-middle text-weight-500" tabindex="0"
                                            rowspan="1" colspan="1">pertanyaan
                                        </th>
                                        <th class="sorting text-center align-middle text-weight-500" tabindex="0"
                                            rowspan="1" colspan="1">Jawaban</th>
                                        <th class="sorting text-center align-middle text-weight-500" tabindex="0"
                                            rowspan="1" colspan="1">
                                            Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faq as $data)
                                        <tr class="odd">
                                            <td class="text-center align-middle">{{ $loop->iteration }}</td>

                                            <td class="dtr-control sorting_1" tabindex="0">{{ $data->pertanyaan }}</td>
                                            <td>{{ $data->jawaban }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-warning text-white mr-1"
                                                        data-toggle="modal" data-target="#updateData{{ $data->id }}">
                                                        <i class="far fa-edit mitra-edit"></i>
                                                    </button>

                                                    <button class="btn btn-sm btn-danger" type="button"
                                                        data-toggle="modal" data-target="#hapusFaq{{ $data->id }}"><i
                                                            class="far fa-trash-alt"></i></button>

                                                    {{-- Modal Hapus Faq --}}
                                                    <div class="modal fade" id="hapusFaq{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">
                                                                        Hapus Data
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('faq.destroy', $data->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <label class="font-weight-normal">Anda yakin <span
                                                                                class="text-danger fw-bold">
                                                                                <b>{{ $data->pertanyaan }}</b></span>
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

                                                    <!-- Modal Edit Faq -->
                                                    <form class="form-update" data-id="{{ $data->id }}">
                                                        @csrf
                                                        <div class="modal fade" id="updateData{{ $data->id }}"
                                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold"
                                                                            id="staticBackdropLabel">Update FAQ</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label for="pertanyaan"
                                                                                class="col-sm-2 col-form-label font-weight-normal">Pertanyaan</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    class="form-control form-input"
                                                                                    id="pertanyaan" name="pertanyaan"
                                                                                    placeholder="Pertanyaan"
                                                                                    value="{{ $data->pertanyaan }}">
                                                                                <span
                                                                                    class="text-danger text_error_update text-small pertanyaan_error_update">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="jawaban"
                                                                                class="col-sm-2 col-form-label font-weight-normal">Jawaban</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    class="form-control form-input"
                                                                                    id="jawaban" name="jawaban"
                                                                                    placeholder="jawaban"
                                                                                    value="{{ $data->jawaban }}">
                                                                                <span
                                                                                    class="text-danger text_error_update text-small jawaban_error_update">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="faq_kategori_id"
                                                                                class="col-sm-2 col-form-label font-weight-normal">Kategori</label>
                                                                            <div class="col-sm-10">
                                                                                <select class="form-control"
                                                                                    id="faq_kategori_id"
                                                                                    name="faq_kategori_id">
                                                                                    <option value="">Pilih Kategori
                                                                                    </option>
                                                                                    @foreach ($kategori as $k)
                                                                                        <option
                                                                                            value="{{ $k->id }}"
                                                                                            {{ $data->faq_kategori_id == $k->id ? 'selected' : '' }}>
                                                                                            {{ $k->faq_kategori }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span
                                                                                    class="text-danger text_error_update text-small faq_kategori_id_error_update">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn"
                                                                            id="custom-blue">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

            $(".form-store-kategori").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "faq_kategori",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_kategori_error_store').text('');
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

            $(".form-update-kategori").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                const dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "faq_kategori/" + dataId,
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`,
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_kategori_error_update').text('');
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

            $(".btn-hapus-kategori").click(function(e) {
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

            // $('.reset-form').click(function(e) {
            //     e.preventDefault();
            //     $('[name="nama"]').val('');
            //     $('[name="logo"]').val(null);
            //     $('label.custom-file-label').text('Pilih File');

            // });

            $(".form-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "faq",
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
                    url: "faq/" + dataId,
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

            $(".btn-hapus").click(function(e) {
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
