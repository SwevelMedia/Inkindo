@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Pesan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold text-dark mb-0">Kategori Pesan</h5>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#tambah-kategori">Tambah
                                Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-info">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{!! $item->nama_kategori !!}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{-- edit --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                    data-toggle="modal" data-target="#modalKategoriUpdate{{ $item->id }}"
                                                    data-nama="{{ $item->nama_kategori}}"><i class="far fa-edit"></i></button>
                                                {{-- hapus --}}
                                                <form action="{{ route('kategori-hubungi.destroy', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger btn-hapus"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>
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
                                                                    <textarea class="form-control form-input summernote" name="nama_kategori">{{ $item->nama_kategori }}</textarea>
                                                                    <span
                                                                        class="text-danger text_error_update text-small nama_kategori_error_update"></span>
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
                                            </div>
                                            {{-- Modal Tambah Kategori --}}
                                            <div class="modal fade" tabindex="-1" id="tambah-kategori" name="kategori-tambah">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form class="form-store">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Kategori</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Nama Kategori</label>
                                                                    <textarea class="form-control form-input summernote" name="nama_kategori"></textarea>
                                                                    <span
                                                                        class="text-danger text_error_store text-small nama_kategori_error_store"></span>
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
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold text-dark mb-0">Kotak Masuk</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-info">
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>Nama</th>
                                    <th>Kategeori</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{!! $item->nama !!}</td>
                                        <td>{!! $item->kategori->nama_kategori !!}</td>
                                        <td>{!! $item->email !!}</td>
                                        <td>{!! $item->pesan !!}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{-- hapus --}}
                                                <form action="{{ route('hubungi-kami.destroy', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger btn-hapus"><i
                                                            class="far fa-trash-alt"></i></button>
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
                url: "kategori-hubungi",
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
                url: "kategori-hubungi/" + dataId,
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
