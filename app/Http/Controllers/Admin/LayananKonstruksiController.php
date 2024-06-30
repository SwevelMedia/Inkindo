<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LayananKonstruksi;
use App\Http\Controllers\Controller;
use App\Models\KlasifikasiKonstruksi;
use Illuminate\Support\Facades\Validator;

class LayananKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = KlasifikasiKonstruksi::all();
        $kategori = LayananKonstruksi::with('klasifikasi_konstruksi')->get();

        // dd($kategori);
        return view('dashboard.admin.kelola-layanan-konstruksi.konstruksi', compact('klasifikasi', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_layanan_konstruksi' => 'required|string',
            'deskripsi_layanan_konstruksi' => 'required|string',
        ]);

        $layanan = new LayananKonstruksi();
        $layanan->jenis_layanan_konstruksi = $request->jenis_layanan_konstruksi;
        $layanan->deskripsi_layanan_konstruksi = $request->deskripsi_layanan_konstruksi;
        $layanan->klasifikasi_konstruksi_id = $request->klasifikasi_konstruksi_id;
        $layanan->save();

        return redirect()
            ->route('layanan-konstruksi.index')
            ->with('success', 'Layanan Konstruksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_layanan_konstruksi' => 'required|string',
            'deskripsi_layanan_konstruksi' => 'required|string',
        ]);
        $layanan = LayananKonstruksi::find($id);
        $layanan->jenis_layanan_konstruksi = $request->jenis_layanan_konstruksi;
        $layanan->deskripsi_layanan_konstruksi = $request->deskripsi_layanan_konstruksi;
        $layanan->klasifikasi_konstruksi_id = $request->klasifikasi_konstruksi_id;
        $layanan->save();
        return redirect()
            ->route('layanan-konstruksi.index')
            ->with('success', 'Data Layanan Konstruksi berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LayananKonstruksi::find($id)->delete();
        return redirect()
            ->route('layanan-konstruksi.index')
            ->with('success', 'Berhasil Menghapus Data');
    }
}
