<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KlasifikasiKonstruksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KlasifikasiKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $request->validate([
            'nama_klasifikasi_konstruksi' => 'required',
        ]);

        KlasifikasiKonstruksi::create([
            'nama_klasifikasi_konstruksi' => $request->nama_klasifikasi_konstruksi,
            'slug' => Str::slug($request->nama_klasifikasi_konstruksi),
        ]);

        return redirect()->route('layanan-konstruksi.index')->with('success', 'Berhasil menambahkan Klasifikasi Konstruksi');
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
        KlasifikasiKonstruksi::find($id)->update([
            'nama_klasifikasi_konstruksi' => $request->nama_klasifikasi_konstruksi,
            'slug' => Str::slug($request->nama_klasifikasi_konstruksi),
        ]);

        return redirect()->route('layanan-konstruksi.index')->with('success', 'Berhasil mengubah Klasifikasi Konstruksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KlasifikasiKonstruksi::find($id)->delete();
        return redirect()->route('layanan-konstruksi.index')->with('success', 'Berhasil menghapus kategori');
    }
}
