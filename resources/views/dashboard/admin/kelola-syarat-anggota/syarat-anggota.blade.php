@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Syarat Anggota')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bold mb-0">Syarat Permohonan Anggota</h5>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                data-target="#tambah-syarat-anggota">Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500 text-center">
                                        No
                                    </th>
                                    <th class="text-weight-500 text-center">Nama Judul</th>
                                    <th class="text-weight-500 text-center">Rincian</th>
                                    <th class="text-weight-500 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori1 as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{!! $item->nama_judul !!}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="#"><i class="fa fa-eye fs-5" aria-hidden="true"
                                                    data-toggle="modal" data-target="#rincian{{ $item->id }}"></i></a>
                                            {{-- modal show --}}
                                            <div class="modal" tabindex="-1" id="rincian{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Poin Syarat Permohonan Anggota</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('proker.show', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                @if ($item->poinSyaratAnggota)
                                                                    @foreach ($item->poinSyaratAnggota as $poin)
                                                                        <div class="form-group mb-2">
                                                                            <label class="form-label text-weight-500">Poin
                                                                                {{ $loop->iteration }}</label>
                                                                            <p>{{ $poin->poin }}</p>
                                                                            <hr class="m-0 p-0">
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                {{-- hapus --}}
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusSyaratAnggota{{ $item->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                                {{-- edit --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-warning text-white kategoriUpdate mr-1"
                                                    data-toggle="modal"
                                                    data-target="#modalSyaratAnggotaUpdate{{ $item->id }}"
                                                    data-nama="{{ $item->nama_judul }}"><i class="far fa-edit"></i></button>

                                            </div>
                                            {{-- modal hapus --}}
                                            <div class="modal fade" id="hapusSyaratAnggota{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="hapusSyaratAnggotaLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusSyaratAnggotaLabel">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('syarat-anggota.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $item->nama_judul }}</b></span>
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

                                            {{-- Modal Edit syarat anggota --}}
                                            <div class="modal fade" tabindex="-1"
                                                id="modalSyaratAnggotaUpdate{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('syarat-anggota.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Nama Kode
                                                                        Etik<sup class="text-danger">*</sup></label>
                                                                    <textarea class="form-control summernote" name="nama_judul" rows="5">{{ $item->nama_judul }}</textarea>
                                                                    <span
                                                                        class="text-danger text_error_update text-small nama_judul_error_update"></span>
                                                                </div>
                                                                <input type="hidden" name="kategori" id="kategori"
                                                                    class="form-control" value="0">
                                                                <div id="poin-container">
                                                                    @if ($item->poinSyaratAnggota)
                                                                        @foreach ($item->poinSyaratAnggota as $poin)
                                                                            <div class="form-group mb-2">
                                                                                <label
                                                                                    class="form-label font-weight-normal">Poin
                                                                                    {{ $loop->iteration }}</label>
                                                                                <textarea name="poin1[]" id="poin1" class="form-control summernote" cols="30" rows="2">{{ $poin->poin }}</textarea>
                                                                            </div>
                                                                            <span
                                                                                class="text-danger text_error_update text-small poin1_error_update"></span>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-block btn-tambah-poin-update"
                                                                    id="tambah-poin-update">Tambah Poin</button>
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
                                            {{-- Modal Tambah Syarat --}}
                                            <div class="modal fade" tabindex="-1" id="tambah-syarat-anggota"
                                                name="tambah-syarat-anggota">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('syarat-anggota.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Data</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label class="form-label font-weight-normal">Judul<sup
                                                                            class="text-danger">*</sup></label>
                                                                    <textarea class="form-control summernote" name="nama_judul" id="nama_judul" cols="30" rows="2"></textarea>
                                                                    <span
                                                                        class="text-danger text_error_store text-small nama_judul_error_store"></span>
                                                                </div>
                                                                <div id="poin-container">
                                                                    <div class="form-group mb-2">
                                                                        <label class="form-label font-weight-normal">Poin
                                                                            1<sup class="text-danger">*</sup></label>
                                                                        <textarea name="poin[]" id="poin" class="form-control summernote" cols="30" rows="2">{{ old('poin.0') }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-block btn-tambah-poin"
                                                                    id="tambah-poin">Tambah Poin</button>
                                                                <input type="hidden" name="kategori" id="kategori"
                                                                    class="form-control" value="0">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    id="cancel-button" data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
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
        {{-- ----------------------------------------------------------------------batas ----------------------------------- --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bold mb-0">Syarat Permohonan Sertifikat Badan Usaha</h5>
                            <button class="btn btn-sm" id="custom-blue" data-toggle="modal"
                                data-target="#tambah-syarat-anggota2">Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500 text-center">
                                        No
                                    </th>
                                    <th class="text-weight-500 text-center">Nama Judul</th>
                                    <th class="text-weight-500 text-center">Rincian</th>
                                    <th class="text-weight-500 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori2 as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{!! $item->nama_judul !!}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="#"><i class="fa fa-eye fs-5" aria-hidden="true"
                                                    data-toggle="modal"
                                                    data-target="#rincian{{ $item->id }}"></i></a>
                                            {{-- modal show --}}
                                            <div class="modal fade" id="rincian{{ $item->id }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Poin Syarat Permohonan Sertifikat Badan
                                                                Usaha</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('proker.show', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                @if ($item->poinSyaratAnggota)
                                                                    @foreach ($item->poinSyaratAnggota as $poin)
                                                                        <div class="form-group mb-2">
                                                                            <label class="form-label text-weight-500">Poin
                                                                                {{ $loop->iteration }}</label>
                                                                            <p>{{ $poin->poin }}</p>
                                                                            <hr class="m-0 p-0">
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- hapus --}}
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusSyaratAnggota{{ $item->id }}"><i
                                                        class="far fa-trash-alt"></i></button>

                                                {{-- edit --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-warning text-white SyaratAnggotaUpdate mr-1"
                                                    data-toggle="modal"
                                                    data-target="#modalSyaratAnggotaUpdate2{{ $item->id }}"
                                                    data-nama="{{ $item->nama_judul }}"
                                                    data-poin="{{ $item->poin }}"><i class="far fa-edit"></i></button>
                                            </div>
                                            {{-- modal hapus --}}
                                            <div class="modal fade" id="hapusSyaratAnggota{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="hapusSyaratAnggota"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusSyaratAnggotaLabel">
                                                                Hapus Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('syarat-anggota.destroy', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <label class="font-weight-normal">Anda yakin <span
                                                                        class="text-danger fw-bold">
                                                                        <b>{{ $item->nama_judul }}</b></span>
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
                                            {{-- Modal Edit syarat permohnan syarat --}}
                                            <div class="modal fade" tabindex="-1"
                                                id="modalSyaratAnggotaUpdate2{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('syarat-anggota.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label for="nama_judul"
                                                                        class="form-label font-weight-normal">Nama Kode
                                                                        Etik<sup class="text-danger">*</sup>
                                                                    </label>
                                                                    <textarea class="form-control summernote" name="nama_judul" cols="30" rows="2">{{ $item->nama_judul }}</textarea>
                                                                </div>
                                                                <span
                                                                    class="text-danger text_error_update text-small nama_judul_error_update"></span>

                                                                <input type="hidden" name="kategori" id="kategori"
                                                                    class="form-control" value="1">
                                                                <div id="poin-container">
                                                                    @if ($item->poinSyaratAnggota)
                                                                        @foreach ($item->poinSyaratAnggota as $poin)
                                                                            <div class="form-group mb-2">
                                                                                <label for="poin1"
                                                                                    class="form-label font-weight-normal">
                                                                                    Poin {{ $loop->iteration }}<sup
                                                                                        class="text-danger">*</sup></label>
                                                                                <textarea name="poin1[]" class="form-control summernote" cols="30" rows="2"></textarea>
                                                                            </div>
                                                                            <span
                                                                                class="text-danger text_error_update text-small poin1_error_update"></span>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-block btn-tambah-poin-update"
                                                                    id="tambah-poin-update">Tambah Poin</button>
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
                                            {{-- Modal Tambah Syarat --}}
                                            <div class="modal fade" tabindex="-1" id="tambah-syarat-anggota2"
                                                name="tambah-syarat-anggota2">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('syarat-anggota.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                    Tambah Data</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <label for="nama_judul"
                                                                        class="form-label font-weight-normal">Judul<sup
                                                                            class="text-danger">*</sup>
                                                                    </label>
                                                                    <textarea class="form-control summernote" name="nama_judul" id="nama_judul" cols="30" rows="2"></textarea>
                                                                </div>
                                                                <span
                                                                    class="text-danger text_error_update text-small nama_judul_error_update"></span>

                                                                <div id="poin-container">
                                                                    <div class="form-group mb-2">
                                                                        <label for="poin"
                                                                            class="form-label font-weight-normal">
                                                                            Poin 1<sup class="text-danger">*</sup></label>
                                                                        <textarea name="poin[]" id="poin" class="form-control summernote" cols="30" rows="2">{{ old('poin.0') }}</textarea>
                                                                    </div>
                                                                    <span
                                                                        class="text-danger text_error_update text-small poin_error_update"></span>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-block btn-tambah-poin"
                                                                    id="tambah-poin">Tambah Poin</button>
                                                                <input type="hidden" name="kategori" id="kategori"
                                                                    class="form-control" value="1">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    id="cancel-button" data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-tambah-poin-update').click(function() {
                var modal = $(this).closest('.modal');
                var poinContainer = modal.find('#poin-container');
                var existingPoinCount = poinContainer.find('textarea[name="poin1[]"]').length;
                var newPoinNumber = existingPoinCount + 1;
                let inputPoin = `<div id="poin-container">
                        <div class="form-group mb-2">
                            <label class="form-label font-weight-normal">Poin ${newPoinNumber}<sup class="text-danger">*</sup></label>
                            <textarea name="poin1[]" id="poin" class="form-control summernote" cols="30"
                                rows="2"></textarea>
                        </div>
                    </div>`

                poinContainer.append(inputPoin);
            });
            $('.btn-tambah-poin').click(function() {
                var modal = $(this).closest('.modal');
                var poinContainer = modal.find('#poin-container');
                var existingPoinCount = poinContainer.find('textarea[name="poin[]"]').length;
                var newPoinNumber = existingPoinCount + 1;

                let inputPoin = `<div id="poin-container">
                        <div class="form-group mb-2">
                            <label class="form-label font-weight-normal">Poin ${newPoinNumber}<sup class="text-danger">*</sup></label>
                            <textarea name="poin[]" id="poin" class="form-control summernote" cols="30"
                                rows="2"></textarea>
                        </div>
                    </div>`


                poinContainer.append(inputPoin);
            });

            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('textarea[name="poin[]"]').val('');
            });
        });
    </script>
@endsection
