@extends('dashboard.layouts.app-anggota')

@section('title', 'Kelola Portofolio')

@section('content')
    <section class="container-fluid">
        @forelse ($portofolio as $portofolio)
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="font-weight-bold mb-0">Portofolio</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-fluid" src="{{ asset('uploads/anggota/portofolio/' . $portofolio->gambar) }}" alt="">
                        </div>
                        <div class="col d-flex flex-column justify-self-end" height="100%">
                            <h5 class="font-weight-bold">{{ $portofolio->judul }}</h5>
                            <p class="text-muted mb-0">{{ $portofolio->deskripsi }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <button type="button" href="#" class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#editPortofolio">Edit</button>
                                    <button type="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPortofolio">Hapus</button>
                                </div>
                                <div>
                                    <button type="button" href="#" class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#tambahPortofolio">Tambah Portofolio</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Perhatian!</strong> Anda belum memiliki portofolio.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="mt-3">
                    <button type="button" href="#" class="btn btn-sm" id="custom-blue" data-toggle="modal" data-target="#tambahPortofolio">Tambah Portofolio</button>

                    <!-- Modal -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="tambahPortofolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Portofolio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-gorup">
                                            <label for="judul">Judul<sup class="text-danger">*</sup></label>
                                            <input type="text" name="judul" id="judul" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi<sup class="text-danger">*</sup></label>
                                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar<sup class="text-danger">*</sup></label>
                                            <input type="file" name="gambar" id="gambar" class="form-control-file border">
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File Tambahan (.pdf)</label>
                                            <input type="file" name="file" id="file" class="form-control-file border">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn" id="custom-blue">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforelse
    </section>
@endsection
