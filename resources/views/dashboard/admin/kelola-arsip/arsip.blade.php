@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Arsip')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">Kategori Arsip</h5>
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button id="custom-blue" type="button" class="btn btn-sm" data-toggle="modal"
                            data-target="#tambahKategori">
                            Tambah Data
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-store-kategori">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal"
                                                    for="arsip_kategori">Kategori</label>
                                                <input class="form-control form-input" type="text" name="arsip_kategori"
                                                    id="arsip_kategori" placeholder="Masukkan Kategori"
                                                    value="{{ old('arsip_kategori') }}">
                                                <span
                                                    class="text-danger text_error_kategori_store text-small arsip_kategori_error_store">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" id="custom-blue" class="btn">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"> --}}
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-striped dataTable dtr-inline" id="example2">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-center col-1 text-weight-500">No</th>
                                    <th class="text-weight-500">Kategori</th>
                                    <th class="text-center text-weight-500">opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->arsip_kategori }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-warning text-white" data-toggle="modal"
                                                data-target="#update-Kategori{{ $item->id }}"> <i
                                                    class="far fa-edit"></i></button>

                                            <!-- Modal Update -->
                                            <div class="modal fade" id="update-Kategori{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form class="form-update-kategori" data-id="{{ $item->id }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="form-label font-weight-normal"
                                                                        for="arsip_kategori">Kategori</label>
                                                                    <input class="form-control" type="text"
                                                                        name="arsip_kategori" id=""
                                                                        placeholder="Masukkan nama kategori"
                                                                        value="{{ $item->arsip_kategori }}" autofocus>
                                                                </div>
                                                                <span
                                                                    class="text-danger text_error_kategori_update text-small arsip_kategori_error_update"></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" id="custom-blue"
                                                                    class="btn">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modal Hapus --}}
                                            <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                data-target="#hapus-Kategori{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i></button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus-Kategori{{ $item->id }}" tabindex="-1"
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
                                                            <form action="{{ route('arsip_kategori.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $item->arsip_kategori }}</b></span>
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">Arsip</h5>
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" id="custom-blue" class="btn btn-sm" data-toggle="modal"
                            data-target="#tambahArsip">
                            Tambah Data
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambahArsip" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-store">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_arsip" class="form-label font-weight-normal">Nama
                                                    Arsip</label>
                                                <input type="text" class="form-control form-input" id="nama_arsip"
                                                    name="nama_arsip" placeholder="Masukkan nama arsip"
                                                    value="{{ old('nama_arsip') }}" autofocus>
                                                <span
                                                    class="text-danger text_error_store text-small nama_arsip_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan"
                                                    class="form-label font-weight-normal">Keterangan</label>
                                                <input type="text" class="form-control form-input" id="keterangan"
                                                    name="keterangan" placeholder="Masukkan keterangan"
                                                    value="{{ old('keterangan') }}">
                                                <span
                                                    class="text-danger text_error_store text-small keterangan_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="arsip_kategori_id"
                                                    class="form-label font-weight-normal">Kategori</label>
                                                <select class="form-control form-input" id=""
                                                    name="arsip_kategori_id" required>
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $k)
                                                        <option value="{{ $k->id }}">
                                                            {{ $k->arsip_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span
                                                    class="text-danger text_error_store text-small arsip_kategori_id_error_store"></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label font-weight-normal">File Arsip</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input form-input"
                                                            id="file_arsip" name="file_arsip">
                                                        <label class="custom-file-label form-control">Pilih
                                                            file</label>
                                                    </div>
                                                    <span
                                                        class="text-danger text_error_store text-small file_arsip_error_store"></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button id="custom-blue" type="submit" class="btn">Simpan</button>
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
                <table id="example2_1" class="table table-bordered table-striped" aria-describedby="example1_info">
                    <thead class="table-info">
                        <tr>
                            <th class="sorting-asc text-weight-500 text-center" tabindex="0" rowspan="1"
                                colspan="1">No</th>
                            <th class="sorting-asc text-weight-500" tabindex="0" rowspan="1" colspan="1">Nama
                                Arsip</th>
                            <th class="sorting text-weight-500" tabindex="0" rowspan="1" colspan="1">Keterangan
                            </th>
                            <th class="sorting text-weight-500" tabindex="0" rowspan="1" colspan="1">File</th>
                            <th class="sorting text-weight-500" tabindex="0" rowspan="1" colspan="1">Kategori
                            </th>
                            <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1"
                                colspan="1">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arsip as $arsip)
                            <tr class="odd">
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="dtr-control sorting_1" tabindex="0">{{ $arsip->nama_arsip }}</td>
                                <td>{{ $arsip->keterangan }}</td>
                                <td>{{ $arsip->file_arsip }}</td>
                                <td>{{ $arsip->arsip_kategori }}</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <button href="#" data-toggle="modal"
                                            data-target="#update-Arsip{{ $arsip->id }}"
                                            class="btn btn-sm btn-warning text-white mr-2"> <i
                                                class="far fa-edit"></i></button>
                                        {{-- Modal Update --}}
                                        <div class="modal fade" id="update-Arsip{{ $arsip->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-update" data-id="{{ $arsip->id }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nama_arsip"
                                                                    class="form-label font-weight-normal">Nama
                                                                    Arsip</label>
                                                                <input type="text" class="form-control form-input"
                                                                    id="nama_arsip" name="nama_arsip"
                                                                    placeholder="Masukkan nama arsip"
                                                                    value="{{ $arsip->nama_arsip }}" autofocus>
                                                                <span
                                                                    class="text-danger text_error_update text-small nama_arsip_error_update"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="keterangan"
                                                                    class="form-label font-weight-normal">Keterangan</label>
                                                                <textarea type="text" class="form-control form-input" id="keterangan" name="keterangan"
                                                                    placeholder="Masukkan keterangan">{{ $arsip->keterangan }}</textarea>
                                                                <span
                                                                    class="text-danger text_error_update text-small keterangan_error_update"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-label font-weight-normal">Kategori</label>
                                                                <select class="form-control form-input" id=""
                                                                    name="arsip_kategori_id" required>
                                                                    <option value="">Pilih Kategori</option>
                                                                    @foreach ($kategori as $k)
                                                                        <option value="{{ $k->id }}"
                                                                            {{ $k->id == $arsip->arsip_kategori_id ? 'selected' : '' }}>
                                                                            {{ $k->arsip_kategori }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger text_error_update text-small arsip_kategori_id_error_update"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label font-weight-normal">File
                                                                    Arsip</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="hidden" name="arsipOld"
                                                                            value="{{ $arsip->file_arsip }}">
                                                                        <input type="file"
                                                                            class="custom-file-input form-input"
                                                                            id="file_arsip" name="file_arsip">
                                                                        <label class="custom-file-label form-control">Pilih
                                                                            file</label>
                                                                    </div>
                                                                </div>
                                                                <span
                                                                    class="text-danger text_error_update text-small file_arsip_error_update"></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button id="custom-blue" type="submit"
                                                                    class="btn">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal Hapus --}}
                                        <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                            data-target="#hapus-arsip{{ $arsip->id }}"><i
                                                class="far fa-trash-alt"></i></button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus-arsip{{ $arsip->id }}" tabindex="-1"
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
                                                        <form action="{{ route('arsip.destroy', $arsip->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <label class="font-weight-normal">Anda yakin <span
                                                                    class="text-danger fw-bold">
                                                                    <b>{{ $arsip->nama_arsip }}</b></span>
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

            $(".form-store").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "arsip",
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
                    url: "arsip/" + dataId,
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

            $(".form-update-kategori").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let form = $(this);
                const dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "arsip_kategori/" + dataId,
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


        });
    </script>
@endsection
