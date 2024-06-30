@extends('layouts.app-home')

@section('title', 'Daftar Anggota')

@section('content')
    <section class="py-3" style="background: #0a425c;">
        <div class="container">
            <h1 class="text-white" style="font-family: Poppins, sans-serif;">Daftar Anggota</h1>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered" id="table-daftaranggota">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama perusahaan</th>
                                <th>No Anggota</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $anggota)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anggota->perusahaan }}</td>
                                    <td>{{ $anggota->no_anggota }}</td>
                                    <td>{{ $anggota->user->alamat }}</td>
                                    <td>{{ $anggota->user->no_hp }}</td>
                                    <td>
                                        <a href="#" data-bs-target="#detail{{ $anggota->id }}" data-bs-toggle="modal"
                                           class="btn btn-outline-secondary btn-sm d-inline-flex justify-content-xl-center align-items-xl-center" role="button">
                                            <i class="fas fa-eye me-2"></i>
                                            <span>Detail</span>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="detail{{ $anggota->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Detail Perusahaan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="box-profile">
                                                            <div class="text-center">
                                                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('uploads/anggota/profil/' . $anggota->foto_perusahaan) }}"
                                                                     alt="Foto Perusahaan">
                                                            </div>
                                                            <h3 class="profile-username text-center">{{ $anggota->perusahaan }}</h3>
                                                            <p class="text-muted text-center">{{ $anggota->deskripsi }}</p>
                                                            <ul class="list-group list-group-unbordered mb-3">
                                                                <li class="list-group-item">
                                                                    <b>Penanggung Jawab</b>
                                                                    <p class="">{{ $anggota->penanggung_jawab }}</p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Email</b>
                                                                    <p class="">{{ $anggota->user->email }}</p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Website</b>
                                                                    <p class="">{{ $anggota->website }}</p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Facebook</b>
                                                                    <p class="">{{ $anggota->facebook }}</p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Instagram</b>
                                                                    <p class="">{{ $anggota->instagram }}</p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Twitter</b>
                                                                    <p class="">{{ $anggota->twitter }}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                        <button class="btn" id="custom-blue" data-bs-target="#portofolio{{ $anggota->id }}" data-bs-toggle="modal">Portofolio Perusahaan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Portofolio -->
                                        <div class="modal fade" id="portofolio{{ $anggota->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalToggleLabel2">Portofolio {{ $anggota->perusahaan }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @forelse ($anggota->portofolio as $portofolio)
                                                            <div class="post">
                                                                <div class="row m-0">
                                                                    <div class="col-md-auto">
                                                                        <img class="img-fluid img-circle img-bordered-sm" src="{{ asset('uploads/anggota/portofolio/' . $portofolio->gambar) }}"
                                                                             alt="image">
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <h5 class="fw-bold">{{ $portofolio->judul }}</h5>
                                                                            <!-- Jika portofolio memiliki file -->
                                                                            @if ($portofolio->file != null)
                                                                                <a href="{{ asset('uploads/anggota/portofolio/' . $portofolio->file) }}" class="btn btn-sm btn-outline-secondary"
                                                                                   target="_blank">
                                                                                    <i class="fas fa-download me-2"></i>
                                                                                    <span>Unduh</span>
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                        <p>
                                                                            Updated at <strong class="text-muted">{{ $portofolio->updated_at }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <p class="px-2 py-3 mb-0">{{ $portofolio->deskripsi }}</p>
                                                            </div>
                                                        @empty
                                                            <!-- Alert portofolio kosong -->
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Maaf!</strong> Perusahaan belum memiliki portofolio.
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" data-bs-target="#detail{{ $anggota->id }}" data-bs-toggle="modal">Kembali</button>
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
    </section>
@endsection

@section('script')
    <script>
        $(function() {
            $("#table-daftaranggota").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "pageLength": 5,
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endsection
