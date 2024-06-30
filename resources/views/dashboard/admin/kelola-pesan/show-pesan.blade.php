@extends('dashboard.layouts.app-admin')

@section('title', 'Detail Pesan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="col">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('hubungi-kami.index') }}"><button id="custom-blue" class="btn btn-sm ">
                                <div class="mx-1">
                                    Semua pesan
                                </div>
                            </button></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead class="table-info">
                            <tr>
                                <th>Nama</th>
                                <th>Kategeori</th>
                                <th>Email</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                             <tr>
                                <td>{{$contact->nama}}</td>
                                <td>{{$contact->kategori->nama_kategori}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->pesan}}</td>

                             </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
