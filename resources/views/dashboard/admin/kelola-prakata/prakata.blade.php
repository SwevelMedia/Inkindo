@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Prakata')

@section('content')
    @foreach ($prakata as $item)
        <section class="container-fluid mt-4">
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <h5 class="font-weight-bold text-dark mb-0">Prakata</h5>
                        <button class="btn btn-sm" id="custom-blue" type="button" data-target="#update-prakata"
                            data-toggle="modal">Update</button>
                    </div>
                    <form action="{{ route('prakata.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div id="update-prakata" class="modal fade" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Prakata</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="font-weight-normal">Nama Pimpinan</label>
                                            <textarea class="form-control summernote" name="nama_prakata">{{ $item->nama_prakata }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Jabatan</label>
                                            <textarea class="form-control summernote" name="jabatan">{{ $item->jabatan }}</textarea>
                                        </div>
                                        <div class="form-group ">
                                            <label class="font-weight-normal">Sambutan</label>
                                            <textarea class="form-control summernote" name="sambutan">{{ $item->sambutan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-input"
                                                        id="foto_prakata" name="foto_prakata">
                                                    <label class="custom-file-label form-control" for="">Pilih
                                                        file</label>
                                                </div>
                                            </div>
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
                        <table id="example" class="table table-bordered table-striped">
                            <thead class="table-info">
                                <tr>
                                    <th class="text-weight-500 text-center">Nama</th>
                                    <th class="text-weight-500 text-center">Jabatan</th>
                                    <th class="text-weight-500 text-center">Sambutan</th>
                                    <th class="text-weight-500 text-center">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td style="max-width: 200px;">{!! Str::words($item->nama_prakata, 100) !!}</td>
                                    <td style="max-width: 200px;">{!! Str::words($item->jabatan, 100) !!}</td>
                                    <td style="max-width: 300px;">{!! Str::words($item->sambutan, 100) !!}</td>
                                    <td><img style="width: 200px;"
                                            src="{{ asset('storage/uploads/profil/' . $item->foto_prakata) }}"
                                            alt=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
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
@endsection
