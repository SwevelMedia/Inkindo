@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Profil')

@section('content')
    @forelse ($profil as $profil)
        <section class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <h5 class="font-weight-bold text-dark mb-0">Profil</h5>
                        <button class="btn btn-sm" id="custom-blue" type="button" data-target="#update-prakata"
                            data-toggle="modal">Update</button>
                    </div>

                    <!-- Modal Profil -->
                    <form action="{{ route('profil.update', $profil->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div id="update-prakata" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Prakata</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="font-weight-normal">Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-input"
                                                        id="gambar_prakata" name="gambar_prakata">
                                                    <label class="custom-file-label form-control" for="">Pilih
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <label class="font-weight-normal">Prakata</label>
                                            <textarea class="form-control summernote" name="prakata">{{ $profil->prakata }}</textarea>
                                        </div>

                                        <!-- HIDDEN -->
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="visi" hidden>{{ $profil->visi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="daftar_misi" hidden>{{ $profil->daftar_misi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="misi" hidden>{{ $profil->misi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="kode_etik" hidden>{{ $profil->kode_etik }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="email"
                                                value="{{ $profil->email }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="no_hp"
                                                value="{{ $profil->no_hp }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="alamat"
                                                value="{{ $profil->alamat }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="instagram"
                                                value="{{ $profil->instagram }}">
                                        </div>
                                        {{-- <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="twitter"
                                                value="{{ $profil->twitter }}">
                                        </div> --}}
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="whatsapp"
                                                value="{{ $profil->whatsapp }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="maps" hidden>{{ $profil->maps }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><img class="img-fluid"
                                src="{{ asset('storage/uploads/profil/' . $profil->gambar_prakata) }}" /></div>
                        <div class="col">
                            {!! Str::words($profil->prakata, 100) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <h5 class="font-weight-bold text-dark mb-0">Profil Beranda</h5>
                        <button class="btn btn-sm" id="custom-blue" type="button" data-target="#update-profil-home"
                            data-toggle="modal">Update</button>
                    </div>

                    <!-- Modal Profil -->
                    <form action="{{ route('profil.update', $profil->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div id="update-profil-home" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Prakata</h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-md-0">
                                            <label class="font-weight-normal">Profil Beranda</label>
                                            <textarea class="form-control summernote" name="deskripsi_home">{{ $profil->deskripsi_home }}</textarea>
                                        </div>

                                        <!-- HIDDEN -->
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="prakata" hidden>{{ $profil->prakata }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="visi" hidden>{{ $profil->visi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="daftar_misi" hidden>{{ $profil->daftar_misi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="misi" hidden>{{ $profil->misi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="kode_etik" hidden>{{ $profil->kode_etik }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="email"
                                                value="{{ $profil->email }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="no_hp"
                                                value="{{ $profil->no_hp }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="alamat"
                                                value="{{ $profil->alamat }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="instagram"
                                                value="{{ $profil->instagram }}">
                                        </div>
                                        {{-- <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="twitter"
                                                value="{{ $profil->twitter }}">
                                        </div> --}}
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="whatsapp"
                                                value="{{ $profil->whatsapp }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="maps" hidden>{{ $profil->maps }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {!! Str::words($profil->deskripsi_home, 100) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid mt-4">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <h5 class="font-weight-bold text-dark mb-0">Visi Misi</h5>
                        <button class="btn btn-sm" id="custom-blue" type="button" data-target="#update-visimisi"
                            data-toggle="modal">Update</button>
                    </div>
                    <form action="{{ route('profil.update', $profil->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div id="update-visimisi" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Visi Misi</h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="font-weight-normal">Visi</label>
                                            <textarea class="form-control summernote" name="visi">{{ $profil->visi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Misi</label>
                                            <textarea class="form-control summernote" name="misi">{{ $profil->misi }}</textarea>
                                        </div>
                                        <div class="form-group ">
                                            <label class="font-weight-normal">Daftar Misi <span class="font-weight-bold"
                                                    style="color: red;">!!Pisahkan dengan koma (,) setiap penambahan
                                                    misi</span></label>
                                            <textarea class="form-control summernote" name="daftar_misi">{{ $profil->daftar_misi }}</textarea>
                                        </div>
                                         <div class="form-group mb-md-0">
                                            <label class="font-weight-normal">Gambar Visi</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-input"
                                                        id="gambar_visi" name="gambar_visi">
                                                    <label class="custom-file-label form-control" for="">Pilih
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HIDDEN -->
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="prakata" hidden>{{ $profil->prakata }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="kode_etik" hidden>{{ $profil->kode_etik }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="email"
                                                value="{{ $profil->email }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="no_hp"
                                                value="{{ $profil->no_hp }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="alamat"
                                                value="{{ $profil->alamat }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="instagram"
                                                value="{{ $profil->instagram }}">
                                        </div>
                                        {{-- <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="twitter"
                                                value="{{ $profil->twitter }}">
                                        </div> --}}
                                        <div class="form-group mb-md-0">
                                            <input type="hidden" class="form-control" name="whatsapp"
                                                value="{{ $profil->whatsapp }}">
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="maps" hidden>{{ $profil->maps }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500">Gambar</th>
                                    <th class="text-weight-500">Visi</th>
                                    <th class="text-weight-500">Misi</th>
                                    <th class="text-weight-500">Sub Misi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img style="width: 100px;"
                                            src="{{ asset('storage/uploads/profil/' . $profil->gambar_visi) }}"
                                            alt=""></td>
                                    <td>{!! Str::words($profil->visi, 100) !!}</td>
                                    <td>{!! Str::words($profil->misi, 100) !!}</td>
                                    <td>{!! Str::words($profil->daftar_misi, 100) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid mt-4">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <h5 class="font-weight-bold text-dark mb-0">Kontak</h5>
                        <button class="btn btn-sm" id="custom-blue" type="button" data-target="#update-kontak"
                            data-toggle="modal">Update</button>
                    </div>
                    <form action="{{ route('profil.update', $profil->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div id="update-kontak" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Kontak</h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="font-weight-normal">Email</label>
                                            <textarea class="form-control" rows="5" name="email">{{ $profil->email }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Alamat</label>
                                            <textarea class="form-control" rows="5" name="alamat">{{ $profil->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">No Telp</label>
                                            <textarea class="form-control" rows="5" name="no_hp">{{ $profil->no_hp }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Instagran</label>
                                            <textarea class="form-control" rows="5" name="instagram">{{ $profil->instagram }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Whatsapp</label>
                                            <textarea class="form-control" rows="5" name="whatsapp">{{ $profil->whatsapp }}</textarea>
                                        </div>

                                        <!-- HIDDEN -->
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="daftar_misi" hidden>{{ $profil->daftar_misi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="prakata" hidden>{{ $profil->prakata }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="visi" hidden>{{ $profil->visi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="misi" hidden>{{ $profil->misi }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="kode_etik" hidden>{{ $profil->kode_etik }}</textarea>
                                        </div>
                                        <div class="form-group mb-md-0">
                                            <textarea class="form-control" name="maps" hidden>{{ $profil->maps }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row row-cols-2">
                        <div class="col"><label class="font-weight-bold text-dark">Email</label>
                            <p>{{ $profil->email }}</p>
                        </div>
                        <div class="col"><label class="font-weight-bold text-dark">Alamat</label>
                            <p>{{ $profil->alamat }}</p>
                        </div>
                        <div class="col"><label class="font-weight-bold text-dark">No Telp</label>
                            <p>{{ $profil->no_hp }}</p>
                        </div>
                        <div class="col"><label class="font-weight-bold text-dark">Instagram</label>
                            <p>{{ $profil->instagram }}</p>
                        </div>
                    </div>
                    <div class="col"><label class="font-weight-bold text-dark">Whatsapp</label>
                        <p>{{ $profil->whatsapp }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid mt-4">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <h5 class="font-weight-bold text-dark mb-0">Maps</h5>
                        <button class="btn btn-sm" id="custom-blue" type="submit" data-target="#update-kodeetik"
                            data-toggle="modal">Update</button>
                    </div>
                    <form action="{{ route('profil.update', $profil->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div id="update-kodeetik" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Maps</h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-md-0">
                                            <label class="font-weight-normal">Alamat Maps</label>
                                            <textarea class="form-control" rows="10" name="maps">{{ $profil->maps }}</textarea>
                                        </div>
                                    </div>

                                    <!-- HIDDEN -->
                                    <div class="form-group mb-md-0">
                                        <textarea class="form-control" name="daftar_misi" hidden>{{ $profil->daftar_misi }}</textarea>
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <textarea class="form-control" name="prakata" hidden>{{ $profil->prakata }}</textarea>
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <textarea class="form-control" name="visi" hidden>{{ $profil->visi }}</textarea>
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <textarea class="form-control" name="misi" hidden>{{ $profil->misi }}</textarea>
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <input type="hidden" class="form-control" name="email"
                                            value="{{ $profil->email }}">
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <input type="hidden" class="form-control" name="no_hp"
                                            value="{{ $profil->no_hp }}">
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <input type="hidden" class="form-control" name="alamat"
                                            value="{{ $profil->alamat }}">
                                    </div>
                                    <div class="form-group mb-md-0">
                                        <input type="hidden" class="form-control" name="instagram"
                                            value="{{ $profil->instagram }}">
                                    </div>

                                    <div class="form-group mb-md-0">
                                        <input type="hidden" class="form-control" name="whatsapp"
                                            value="{{ $profil->whatsapp }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {!! $profil->maps !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @empty
    @endforelse
    <style>
        .card-body iframe {
            width: 100% !important;
        }
    </style>
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
            // default format on paste
            defaultPastingFormat: 'html',
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'],
        });
    </script>
@endsection
