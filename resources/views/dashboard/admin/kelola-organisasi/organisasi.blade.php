@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Organisasi')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="d-md-flex justify-content-md-between align-items-md-center">
                            <h5 class="font-weight-bold text-dark mb-0">Organisasi DPP</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table id="example1" class="table table-striped table-bordered" id="organisasidpp">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="text-weight-500">No</th>
                                            <th  class="text-weight-500">bidang</th>
                                            <th  class="text-weight-500">Foto</th>
                                            <th  class="text-weight-500">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($organisasi_dpp as $org_dpp)
                                            <tr class="odd">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $org_dpp->bidang_jabatan }}</td>
                                                <td><img src="{{ asset('storage/uploads/admin/organisasi/' . $org_dpp->foto) }}"
                                                        alt="" style="max-width: 300px; max-height: 300;">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="mr-1">
                                                            <button class="btn btn-sm btn-warning text-white" type="button"
                                                                data-target="#edit-organisasi{{ $org_dpp->id }}"
                                                                data-toggle="modal"><i class="far fa-edit"></i></button>

                                                            <!-- Modal -->
                                                            <form action="{{ route('organisasi.update', $org_dpp->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div id="edit-organisasi{{ $org_dpp->id }}"
                                                                    class="modal fade" role="dialog" tabindex="-1">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">
                                                                                    Edit Data Struktur Organnisasi</h5>
                                                                                <button class="close" type="button"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="form-label font-weight-normal">
                                                                                        Gambar<sup
                                                                                            class="text-danger">*</sup></label>
                                                                                    {{-- <input class="form-control"
                                                                                        type="file" name="foto"
                                                                                        value="{{ $org_dpp->nama_pengurus }}" /> --}}
                                                                                    <div class="input-group">
                                                                                        <div class="custom-file">
                                                                                            <input type="file"
                                                                                                class="custom-file-input"
                                                                                                name="foto">
                                                                                            <label
                                                                                                class="custom-file-label form-control"
                                                                                                for="">Pilih
                                                                                                file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-danger"
                                                                                    type="button"
                                                                                    data-dismiss="modal">Batal</button>
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
        </div>
    </section>
@endsection
