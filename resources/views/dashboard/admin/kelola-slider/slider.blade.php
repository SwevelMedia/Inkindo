@extends('dashboard.layouts.app-admin')

@section('title', 'Kelola Slider')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-lg-flex justify-content-between align-items-lg-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">Slider</h5>
                    </div>
                    <div>
                        <button id="custom-blue" class="btn btn-sm" type="button" data-target="#tambahSlider"
                            data-toggle="modal">Tambah Slider</button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahSlider" tabindex="-1" role="dialog"
                            aria-labelledby="tambahProfilLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahProfilLabel">Tambah Data Slider</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-store">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="judul"
                                                    class="col-sm-3 col-form-label font-weight-normal">Judul</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-input" id="judul"
                                                        name="judul" value="">
                                                    <span class="text-danger text_error_store text-small judul_error_store">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="deskripsi"
                                                    class="col-sm-3 col-form-label font-weight-normal">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-input" id="deskripsi"
                                                        name="deskripsi">
                                                    <span
                                                        class="text-danger text_error_store text-small deskripsi_error_store">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gambar"
                                                    class="col-sm-3 col-form-label font-weight-normal">Gambar Slider</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input form-input"
                                                                id="gambar" name="gambar" value="">
                                                            <label class="custom-file-label">Pilih
                                                                File</label>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-danger text_error_store text-small gambar_error_store">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
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
                <div class="row">
                    <div class="col">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @forelse ($itemSlider as $itemSlider)
                                    <div class="carousel-item position-relative {{ $loop->first ? 'active' : '' }}">
                                        <img class="d-block img-fluid" id="carousel_image"
                                            src="{{ asset('storage/uploads/admin/slider/' . $itemSlider->gambar) }}"
                                            alt="Slide Image">
                                        <div class="caraousel-text position-absolute text-center py-3 px-5"
                                            id="custom-blue">
                                            <h4 class="fw-semibold">{{ $itemSlider->judul }}</h4>
                                            <p class=" mb-0">{{ $itemSlider->deskripsi }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="carousel-item active">
                                        <img class="w-100 d-block" id="carousel_image"
                                            src="{{ asset('uploads/admin/slider/default.jpg') }}" alt="Slide Image" />
                                        <div class="carousel-caption rounded-pill shadow" style="background-color: #2275AF">
                                            <h3>Belum Ada Data</h3>
                                            <p>Silahkan Tambahkan Data</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <table class="table table-bordered table-striped slider-table" aria-describedby="example1_info">
                            <thead class="table-info">
                                <tr>
                                    <th class="sorting-asc text-weight-500 text-center" tabindex="0" rowspan="1"
                                        colspan="1">Judul</th>
                                    <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1" colspan="1">
                                        Gambar</th>
                                    <th class="sorting text-weight-500 text-center" tabindex="0" rowspan="1" colspan="1">
                                        Deskripsi</th>
                                    <th class="text-weight-500 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tableData as $data)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $data->judul }}</td>
                                        <td class="text-center">
                                            <img class="elevation-2"
                                                src="{{ asset('storage/uploads/admin/slider/' . $data->gambar) }}"
                                                alt="" width="50px">
                                        </td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                {{-- Button Edit --}}
                                                <button class="btn btn-sm text-white btn-warning mr-2" type="button"
                                                    data-target="#modal-update{{ $data->id }}" data-toggle="modal"><i
                                                        class="far fa-edit"></i></button>

                                                {{-- Button Hapus --}}
                                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#hapusSlider{{ $data->id }}"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="modal-update{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="tambahProfilLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Data Slider</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-update" data-id="{{ $data->id }}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="judul"
                                                                    class="col-sm-3 col-form-label font-weight-normal">Judul</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-input"
                                                                        id="judul" name="judul"
                                                                        value="{{ $data->judul }}">
                                                                    <span
                                                                        class="text-danger text_error_update text-small judul_error_update">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="deskripsi"
                                                                    class="col-sm-3 col-form-label font-weight-normal">Deskripsi</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-input"
                                                                        id="deskripsi" name="deskripsi"
                                                                        value="{{ $data->deskripsi }}">
                                                                    <span
                                                                        class="text-danger text_error_update text-small deskripsi_error_update">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="gambar"
                                                                    class="col-sm-3 col-form-label font-weight-normal">Gambar
                                                                    Slider</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="gambarOld"
                                                                            value="{{ $data->gambar }}">
                                                                        <div class="custom-file">
                                                                            <input type="file"
                                                                                class="custom-file-input form-input"
                                                                                id="gambar" name="gambar"
                                                                                value="">
                                                                            <label class="custom-file-label">Pilih
                                                                                File</label>
                                                                        </div>
                                                                    </div>
                                                                    <span
                                                                        class="text-danger text_error_update text-small gambar_error_update">
                                                                    </span>
                                                                </div>
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
                                        </div>
                                        <div class="modal fade" id="hapusSlider{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="HapusKategoriGaleriLabel" aria-hidden="true">
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
                                                        <form action="{{ route('slider.destroy', $data->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <label class="font-weight-normal">Anda yakin <span
                                                                    class="text-danger fw-bold">
                                                                    <b>{{ $data->judul }}</b></span>
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
                    url: "slider",
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
                    url: "slider/" + dataId,
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
                    icon: 'question',
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

@endsection
