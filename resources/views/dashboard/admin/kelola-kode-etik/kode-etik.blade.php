@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Kode Etik')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="font-weight-bold text-dark mb-0">Kode Etik</h5>
                        <button class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#tambah-kategori">Tambah
                            Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="example1">
                        <thead class="table-info">
                            <tr>
                                <th class="text-weight-500 text-center">
                                    No
                                </th>
                                <th class="text-weight-500 text-center">Kode Etik</th>
                                <th class="text-weight-500 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kode_etik as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{!! $item->poin_kode_etik !!}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            {{-- edit --}}
                                            <button type="button"
                                                class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                data-toggle="modal" data-target="#modalKategoriUpdate{{ $item->id }}"
                                                data-nama="{{ $item->poin_kode_etik }}"><i class="far fa-edit"></i></button>

                                            {{-- hapus --}}
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapusKodeEtik{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i></button>

                                            {{-- modal hapus --}}
                                            {{-- <div class="modal fade" id="hapusKodeEtik{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="HapusKategoriGaleriLabel">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('kode-etik.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{!! $item->poin_kode_etik !!}</b></span>
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
                                            </div> --}}
                                            <div class="modal fade" id="hapusKodeEtik{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="HapusKategoriGaleriLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="HapusKategoriGaleriLabel">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('kode-etik.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $item->poin_kode_etik }}</b></span>
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
                                        </div>

                                        {{-- Modal Edit --}}
                                        <div class="modal fade" tabindex="-1" id="modalKategoriUpdate{{ $item->id }}"
                                            name="kategori-update">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form class="form-update" data-id={{ $item->id }}>
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Kode Etik</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal"
                                                                    for="nama_kategori">Nama Kode Etik</label>
                                                                <textarea class="form-control form-input summernote" name="poin_kode_etik">{{ $item->poin_kode_etik }}</textarea>
                                                                <span
                                                                    class="text-danger text_error_update text-small poin_kode_etik_error_update"></span>
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
                                        {{-- Modal Tambah Kategori --}}
                                        <div class="modal fade" tabindex="-1" id="tambah-kategori"
                                            name="kategori-tambah">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form class="form-store">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Kode Etik</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label class="form-label font-weight-normal">Nama Kode
                                                                    etik</label>
                                                                <textarea class="form-control form-input summernote" name="poin_kode_etik"></textarea>
                                                                <span
                                                                    class="text-danger text_error_store text-small poin_kode_etik_error_store"></span>
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
                                        {{-- End --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
            ],
            styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            height: 200,
            placeholder: 'Tuliskan sesuatu disini...',
            tabsize: 4,
            tabDisable: false,
            dialogsInBody: true,
            blockquoteBreakingLevel: 0,
            // default format on paste
            defaultPastingFormat: 'html',
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'],
        });
    </script>

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
                    url: "kode-etik",
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
                    url: "kode-etik/" + dataId,
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

            $(".form-store-kategori").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "arsip_kategori",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("token")}`
                    },
                    beforeSend: function(e) {
                        $(form).find('.text_error_kategori_store').text('');
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

            // $('.reset-form').click(function(e) {
            //     e.preventDefault();
            //     $('[name="nama"]').val('');
            //     $('[name="logo"]').val(null);
            //     $('label.custom-file-label').text('Pilih File');

            // });

        });
    </script>
@endsection
