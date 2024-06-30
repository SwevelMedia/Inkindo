<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KlasifikasiNonKonstruksi;
use App\Models\LayananNonKonstruksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayananNonKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = KlasifikasiNonKonstruksi::all();
        $konstruksi = LayananNonKonstruksi::with('klasifikasi_non_konstruksi')->get();

        return view('dashboard.admin.kelola-layanan-non-konstruksi.nonkonstruksi', compact('konstruksi', 'klasifikasi'));
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
        $validatedData = $request->validate([
            'jenis_layanan_non_konstruksi' => 'required|string',
            'deskripsi_layanan_non_konstruksi' => 'required|string',
        ]);

        $layanan = new LayananNonKonstruksi;
        $layanan->jenis_layanan_non_konstruksi = $validatedData['jenis_layanan_non_konstruksi'];
        $layanan->deskripsi_layanan_non_konstruksi = $request->deskripsi_layanan_non_konstruksi;
        $layanan->klasifikasi_non_konstruksi_id = $request->klasifikasi_non_konstruksi_id;
        $layanan->save();

        return redirect()->route('layanan-nonkonstruksi.index')->with('success', 'Layanan Konstruksi berhasil ditambahkan');
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
        $validatedData = $request->validate([
            'jenis_layanan_non_konstruksi' => 'required|string',
            'deskripsi_layanan_non_konstruksi' => 'required|string',
        ]);
        $layanan = LayananNonKonstruksi::find($id);
        $layanan->jenis_layanan_non_konstruksi = $validatedData['jenis_layanan_non_konstruksi'];
        $layanan->deskripsi_layanan_non_konstruksi = $request->deskripsi_layanan_non_konstruksi;
        $layanan->klasifikasi_non_konstruksi_id = $request->klasifikasi_non_konstruksi_id;
        // $layanan->save();
        if ($layanan) {
            $layanan->save();
            return redirect()->route('layanan-nonkonstruksi.index')->with('success', 'Data Layanan Non Konstruksi berhasil dirubah');
        } else {
            return redirect()->route('layanan-nonkonstruksi.index')->with('error', 'Data Tidak Ditemukan');
        }
        // return redirect()->route('layanan-nonkonstruksi.index')->with('success', 'Data Layanan Non Konstruksi berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layananNonKonstruksi = LayananNonKonstruksi::find($id);
        if ($layananNonKonstruksi) {
            $layananNonKonstruksi->delete();
            return redirect()->route('layanan-nonkonstruksi.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return redirect()->route('layanan-nonkonstruksi.index')->with('error', 'Data Tidak Ditemukan');
        }
    }

    // public function destroy($id)
    // {
    //     LayananNonKonstruksi::find($id)->delete();
    //     return redirect()->route('layanan-nonkonstruksi.index')->with('success', 'Berhasil Menghapus Data');
    // }
}
