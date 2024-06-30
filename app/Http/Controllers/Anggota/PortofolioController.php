<?php

namespace App\Http\Controllers\Anggota;

use App\Models\Anggota;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $portofolio = Portofolio::with('user')->where('user_id', $user_id)->get();
        return view('dashboard.anggota.kelola-profil.portofolio', compact('portofolio'));
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
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'file' => 'nullable',
        ]);

        $portofolio = new Portofolio();
        $portofolio->judul = $request->judul;
        $portofolio->deskripsi = $request->deskripsi;
        $portofolio->anggota_id = Anggota::where('user_id', auth()->user()->id)->first()->id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/anggota/portofolio/', $filename);
            $portofolio->gambar = $filename;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/anggota/portofolio/', $filename);
            $portofolio->file = $filename;
        }

        $portofolio->save();

        return redirect()->route('anggotaprofil.index')->with('success', 'Portofolio berhasil ditambahkan');
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
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'file' => 'nullable',
        ]);

        $portofolio = Portofolio::find($id);
        $portofolio->judul = $request->judul;
        $portofolio->deskripsi = $request->deskripsi;
        $portofolio->anggota_id = Anggota::where('user_id', auth()->user()->id)->first()->id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/anggota/portofolio/', $filename);
            $portofolio->gambar = $filename;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/anggota/portofolio/', $filename);
            $portofolio->file = $filename;
        }

        $portofolio->save();

        return redirect()->route('anggotaprofil.index')->with('success', 'Portofolio berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        $portofolio->delete();

        return redirect()->route('anggotaprofil.index')->with('success', 'Portofolio berhasil dihapus');
    }
}
