@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Berita')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col 12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bold mb-0">Kategori</h5>
                            <button id="custom-blue" data-toggle="modal" data-target="#tambah-kategori" class="btn btn-sm">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example4" class="table table-striped table-bordered">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500 text-center">
                                        No
                                    </th>
                                    <th class="text-weight-500 text-center">Nama Kategori</th>
                                    <th class="text-weight-500 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kategori)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $kategori->berita_kategori }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <button type="button"
                                                    class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                    data-toggle="modal"
                                                    data-target="#modalKategoriUpdate{{ $kategori->id }}"
                                                    data-nama="{{ $kategori->berita_kategori }}"><i
                                                        class="far fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger" type="button" data-toggle="modal"
                                                    data-target="#hapusKategoriBerita{{ $kategori->id }}"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </div>

                                            {{-- Modal Hapus --}}
                                            <div class="modal fade" id="hapusKategoriBerita{{ $kategori->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="HapusKategoriGaleriLabel"
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
                                                                action="{{ route('berita_kategori.destroy', $kategori->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $kategori->berita_kategori }}</b></span>
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
                                            <div class="modal fade" tabindex="-1"
                                                id="modalKategoriUpdate{{ $kategori->id }}" name="kategori-update">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form class="form-update-kategori"
                                                            data-id="{{ $kategori->id }}>
                                                            @csrf
                                                            <div class="modal-header">
                                                            <h5 class="modal-title">Edit Kategori</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group mb-2">
                                                            <label for="berita_kategor" class="font-weight-normal">Nama
                                                                Kategori</label>
                                                            <input type="text" name="berita_kategori"
                                                                id="berita_kategori" class="form-control form-input"
                                                                value="{{ $kategori->berita_kategori }}">
                                                            <span
                                                                class="text-danger text_kategori_error_update text-small berita_kategori_error_update"></span>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                    </form>
                                                </div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="font-weight-bold mb-0">Berita</h5>
                        <button id="custom-blue" data-toggle="modal" data-target="#tambah-berita" class="btn btn-sm">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered berita">
                        <thead class="table-info">
                            <tr>
                                <th class="text-weight-500 text-center">
                                    No
                                </th>
                                <th class="text-weight-500 text-center">Foto</th>
                                <th class="text-weight-500 text-center">Judul Berita</th>
                                <th class="text-weight-500 text-center">Tags</th>
                                <th class="text-weight-500 text-center">Isi Berita</th>
                                <th class="text-weight-500 text-center">Penulis</th>
                                <th class="text-weight-500 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $berita)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/uploads/admin/berita/' . $berita->poster) }}"
                                            class="rounded-circle"
                                            style="object-fit: cover; width: 50px; height: 50px;"alt="...">
                                    </td>
                                    <td>{{ Str::words($berita->judul, 5) }}</td>

                                    <td>
                                        @foreach ($berita->tags as $tag)
                                            #{{ $tag->name }}
                                        @endforeach
                                    </td>

                                    <td>{!! Str::words($berita->isi, 50) !!}</td>
                                    <td>{{ $berita->penulis }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="#" data-toggle="modal"
                                                data-target="#updateBerita{{ $berita->id }}"
                                                class="btn btn-sm btn-warning text-white mr-1"><i
                                                    class="far fa-edit"></i></a>

                                            {{-- Modal Update Berita --}}
                                            <div class="modal fade" tabindex="-1" id="updateBerita{{ $berita->id }}"
                                                name="kategori-tambah">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Berita
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-update" data-id='{{ $berita->id }}'>
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                            <label class="font-weight-normal"
                                                                                for="judul">Judul</label>
                                                                            <input type="text" name="judul"
                                                                                id="judul"
                                                                                class="form-control form-input mt-2"
                                                                                value="{{ $berita->judul }}">
                                                                            <span
                                                                                class="text-danger text_error_update text-small judul_error_update">
                                                                            </span>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="font-weight-normal"
                                                                                for="penulis ">Penulis</label>
                                                                            <input type="text" name="penulis"
                                                                                id="penulis"
                                                                                class="form-control form-input mt-2"
                                                                                value="{{ $berita->penulis }}">
                                                                            <span
                                                                                class="text-danger text_error_update text-small penulis_error_update">
                                                                            </span>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="berita_kategori_id"
                                                                                class="font-weight-normal">Kategori</label>
                                                                            <select name="berita_kategori_id"
                                                                                id="berita_kategori_id"
                                                                                class="form-control form-input mt-2">
                                                                                <option value="">Pilih Kategori
                                                                                </option>
                                                                                @foreach ($kategori2 as $item)
                                                                                    <option value="{{ $item->id }}"
                                                                                        {{ $berita->berita_kategori_id == $item->id ? 'selected' : '' }}>
                                                                                        {{ $item->berita_kategori }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span
                                                                                class="text-danger text_error_update text-small berita_kategori_id_error_update">
                                                                            </span>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="poster"
                                                                                class="form-label font-weight-normal">Input
                                                                                Gambar
                                                                                Berita</label>
                                                                            <div class="custom-file" id="logo-update">
                                                                                <input type="hidden" name="posterOld"
                                                                                    value="{{ $berita->poster }}">
                                                                                <input type="file" name="poster"
                                                                                    id="poster"
                                                                                    class="custom-file-input form-input">
                                                                                <label class="custom-file-label mb-2">Pilih
                                                                                    File</label>
                                                                                <span
                                                                                    class="text-danger text_error_update text-small poster_error_update">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">

                                                                            <div class="form-outline mb-3">
                                                                                <label
                                                                                    class="form-label font-weight-normal"
                                                                                    for="textAreaExample">Isi
                                                                                    Berita</label>
                                                                                <textarea class="form-control summernote" id="isi" name="isi">{!! $berita->isi !!}</textarea>
                                                                                <span
                                                                                    class="text-danger text_error_update text-small isi_error_update">
                                                                                </span>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="font-weight-normal"
                                                                                    for="tags">Tags</label>
                                                                                <input type="text" name="tags"
                                                                                    class="form-control form-input mt-2"
                                                                                    data-role="tagsinput"
                                                                                    value="{{ old('tags') }}">
                                                                                <small class="form-text text-muted">Untuk
                                                                                    menambahkan banyak tag
                                                                                    pisahkan
                                                                                    dengan
                                                                                    tanda
                                                                                    "<strong>KOMA</strong>"</small>
                                                                                <span
                                                                                    class="text-danger text_error_update text-small tags_error_update">
                                                                                </span>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger"
                                                                                data-dismiss="modal">Batal</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <input type="text" value="{{ $berita->id }}" name="id" hidden>

                                                <button class="btn btn-sm btn-danger" type="button" data-toggle="modal"
                                                    data-target="#hapusBerita{{ $berita->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                                <div class="modal fade" id="hapusBerita{{ $berita->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="HapusKategoriGaleriLabel" aria-hidden="true">
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
                                                                <form action="{{ route('berita.destroy', $berita->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <label class="font-weight-normal">Anda yakin <span
                                                                            class="text-danger fw-bold">
                                                                            <b>{{ $berita->judul }}</b></span>
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
    {{-- Modal Tambah Kategori --}}
    <div class="modal fade" tabindex="-1" id="tambah-kategori" name="kategori-tambah">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="form-store-kategori">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="berita_kategori" class="font-weight-normal">Nama Kategori</label>
                            <input type="text" name="berita_kategori" id="berita_kategori"
                                class="form-control form-input" value="{{ old('berita_kategori') }}">
                            <span class="text-danger text_kategori_error_store text-small berita_kategori_error_store">
                            </span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End --}}

    {{-- Modal Tambah Berita --}}
    <div class="modal fade" tabindex="-1" id="tambah-berita" name="kategori-tambah">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-store">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="font-weight-normal" for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul"
                                        class="form-control form-input mt-2">
                                    <span class="text-danger text_error_store text-small judul_error_store">
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="font-weight-normal" for="penulis ">Penulis</label>
                                    <input type="text" name="penulis" id="penulis"
                                        class="form-control form-input mt-2">
                                    <span class="text-danger text_error_store text-small penulis_error_store">
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="berita_kategori_id" class="font-weight-normal">Kategori</label>
                                    <select name="berita_kategori_id" id="berita_kategori_id"
                                        class="form-control form-input mt-2">
                                        <option value="">Pilih Kategori
                                        </option>
                                        @foreach ($kategori2 as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $berita->berita_kategori_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->berita_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger text_error_store text-small berita_kategori_id_error_store">
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="poster" class="form-label font-weight-normal">Input
                                        Gambar
                                        Berita</label>
                                    <div class="custom-file" id="logo-update">
                                        <input type="hidden" name="posterOld" value="{{ $berita->poster }}">
                                        <input type="file" name="poster" id="poster"
                                            class="custom-file-input form-input">
                                        <label class="custom-file-label mb-2">Pilih
                                            File</label>
                                        <span class="text-danger text_error_store text-small poster_error_store">
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-outline mb-3">
                                        <label class="form-label font-weight-normal" for="textAreaExample">Isi
                                            Berita</label>
                                        <textarea class="form-control summernote" id="isi" name="isi"></textarea>
                                        <span class="text-danger text_error_store text-small isi_error_store">
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="font-weight-normal" for="tags">Tags</label>
                                        <input type="text" name="tags" class="form-control form-input mt-2"
                                            data-role="tagsinput" value="{{ old('tags') }}">
                                        <small class="form-text text-muted">Untuk
                                            menambahkan banyak tag
                                            pisahkan
                                            dengan
                                            tanda
                                            "<strong>KOMA</strong>"</small>
                                        <span class="text-danger text_error_store text-small tags_error_store">
                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
            height: 300,
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

            $(".form-store-kategori").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "berita_kategori",
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
                    url: "berita_kategori/" + dataId,
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
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
                    url: "berita",
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
                    url: "berita/" + dataId,
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
                        console.log(response);
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
