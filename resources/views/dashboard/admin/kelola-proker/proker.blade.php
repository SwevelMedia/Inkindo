@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Program Kerja')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-bold text-black mb-0">Daftar Divisi Program Kerja</h5>
                            </div>
                            <div>
                                <a href="#" class="btn btn-sm text-white" id="custom-blue" data-toggle="modal"
                                    data-target="#tambahDaftar">Tambah Data</a>

                                {{-- Modal tambah --}}
                                <div class="modal fade bd-example-modal-lg" id="tambahDaftar" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Divisi Program Kerja
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <form action="{{ route('proker.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label class="form-label font-weight-normal">Divisi Program
                                                            Kerja<sup class="text-danger">*</sup></label>
                                                        <input class="form-control form-input" id="nama_kategori"
                                                            name="nama_kategori" placeholder="Masukkan Divisi Program Kerja"
                                                            value="{{ old('nama_kategori') }}">
                                                        <span
                                                            class="text-danger text_error_store text-small nama_kategori_error_store"></span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="form-label font-weight-normal">Periode<sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control" name="periode"
                                                            value="{{ old('periode') }}" placeholder="Masukkan Periode">
                                                        <span
                                                            class="text-danger text_error_store text-small periode_error_store"></span>
                                                    </div>
                                                    <div id="poin-container">
                                                        <div class="form-group mb-2">
                                                            <label class="form-label font-weight-normal">Poin 1<sup
                                                                    class="text-danger">*</sup></label>
                                                            <textarea name="nama_proker[]" id="nama_proker" class="form-control">{{ old('nama_proker.0') }}</textarea>
                                                            <span
                                                                class="text-danger text_error_store text-small nama_proker_error_store"></span>
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-primary my-1 btn-block btn-tambah-poin"
                                                        id="tambah-poin">Tambah Poin</button>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" id="cancel-button"
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
                        <table class="table table-bordered table-striped dataTable dtr-inline" id="example2">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-center text-weight-500 text-center">No</th>
                                    <th scope="col" class="text-weight-500 text-center">Divisi Program Kerja</th>
                                    <th class="text-weight-500 text-center">Periode</th>
                                    <th class="text-weight-500 text-center" scope="col">Rincian</th>
                                    <th class="text-weight-500 text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $p)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_kategori }}</td>
                                        <td>{{ $p->periode }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="#"><i class="fa fa-eye fs-5" aria-hidden="true"
                                                    data-toggle="modal" data-target="#rincian{{ $p->id }}"></i></a>
                                        </td>
                                        {{-- modal show --}}
                                        <div class="modal fade" tabindex="-1" id="rincian{{ $p->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Poin Program Kerja</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('proker.show', $p->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            @if ($p->program_kerja)
                                                                @foreach ($p->program_kerja as $poin)
                                                                    <div class="form-group mb-2">
                                                                        <label class="form-label text-weight-500">Poin
                                                                            {{ $loop->iteration }}</label>
                                                                        <p>{{ $poin->nama_proker }}</p>
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
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" type="buttton"
                                                    class="btn btn-sm btn-warning mr-1 text-light" data-toggle="modal"
                                                    data-target="#updateProker{{ $p->id }}">
                                                    <i class="fas fa-edit fs-4"></i>
                                                </a>

                                                {{-- Modal update --}}
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="updateProker{{ $p->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update
                                                                    Program Kerja</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <form action="{{ route('proker.update', $p->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group mb-3">
                                                                        <label class="font-weight-bold">Divisi Program
                                                                            Kerja</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nama_kategori') is-invalid @enderror"
                                                                            name="nama_kategori"
                                                                            value="{{ $p->nama_kategori }}">
                                                                        @error('nama_proker')
                                                                            <div class="alert alert-danger mt-2">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label class="font-weight-bold">Divisi Program
                                                                            Kerja</label>
                                                                        <input type="text"
                                                                            class="form-control @error('periode') is-invalid @enderror"
                                                                            name="periode" value="{{ $p->periode }}">
                                                                        @error('periode')
                                                                            <div class="alert alert-danger mt-2">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div id="poin-container">
                                                                        @if ($p->program_kerja)
                                                                            @foreach ($p->program_kerja as $poin)
                                                                                <div class="form-group mb-2">
                                                                                    <label for="nama_proker1">Poin
                                                                                        {{ $loop->iteration }}</label>
                                                                                    <textarea name="nama_proker1[]" class="form-control" cols="30" rows="2">{{ $poin->nama_proker }}</textarea>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                    <button type="button"
                                                                        class="btn btn-primary my-1 btn-block btn-tambah-poin-update"
                                                                        id="tambah-poin-update">Tambah Poin</button>
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
                                                {{-- delete --}}
                                                <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                                    data-target="#hapusSyaratAnggota{{ $p->id }}"><i
                                                        class="far fa-trash-alt"></i></button>
                                                {{-- modal delete --}}
                                                <div class="modal fade" id="hapusSyaratAnggota{{ $p->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="hapusSyaratAnggotaLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusSyaratAnggotaLabel">
                                                                    Hapus Data
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('proker.destroy', $p->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <label class="font-weight-normal">Anda yakin <span
                                                                            class="text-danger fw-bold">
                                                                            <b>{{ $p->nama_kategori }}</b></span>
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
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
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
                var existingPoinCount = poinContainer.find('textarea[name="nama_proker1[]"]').length;
                var newPoinNumber = existingPoinCount + 1;
                var inputPoin = '<div class="form-group mb-2">' +
                    '<label for="nama_proker1">Poin ' + newPoinNumber + '</label>' +
                    '<textarea name="nama_proker1[]" class="form-control summernote"></textarea>' +
                    '</div>';

                poinContainer.append(inputPoin);
            });
            $('.btn-tambah-poin').click(function() {
                var modal = $(this).closest('.modal');
                var poinContainer = modal.find('#poin-container');
                var existingPoinCount = poinContainer.find('textarea[name="nama_proker[]"]').length;
                var newPoinNumber = existingPoinCount + 1;
                let inputPoin = ` <div class="form-group mb-2">
                        <label class="form-label font-weight-normal">Poin ${newPoinNumber}<sup class="text-danger">*</sup></label>
                        <textarea name="nama_proker[]" id="nama_proker"
                            class="form-control">{{ old('nama_proker.0') }}</textarea>
                        <span class="text-danger text_error_store text-small nama_proker_error_store"></span>
                    </div>`;

                poinContainer.append(inputPoin);
            });

            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('textarea[name="poin[]"]').val('');
            });
        });
    </script>
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
            placeholder: 'Tuliskan sesuatu disini...',
            tabsize: 4,
            tabDisable: false,
            dialogsInBody: true,
            blockquoteBreakingLevel: 0,
            defaultPastingFormat: 'html',
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'],
        });
    </script>

@endsection
