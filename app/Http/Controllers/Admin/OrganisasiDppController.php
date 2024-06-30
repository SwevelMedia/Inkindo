<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OrganisasiDpp;
use App\Models\OrganisasiJabatan;
use App\Http\Controllers\Controller;
use App\Models\OrganisasiBidangJabatan;
use App\Models\OrganisasiLain;

class OrganisasiDppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisasi_dpp = OrganisasiDpp::all();
        $organisasi_badan_dewan = OrganisasiLain::all();

        return view('dashboard.admin.kelola-organisasi.organisasi', compact('organisasi_dpp', 'organisasi_badan_dewan'));
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
            'nama_pengurus' => 'required',
            'jabatan' => 'required',
            'bidang_jabatan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $organisasi_dpp = new OrganisasiDpp();

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/organisasi');
            $image->move($destinationPath, $name);
            $organisasi_dpp->foto = $name;
        }

        $organisasi_dpp->nama_pengurus = $request->nama_pengurus;
        $organisasi_dpp->jabatan = $request->jabatan;
        $organisasi_dpp->bidang_jabatan = $request->bidang_jabatan;
        $organisasi_dpp->save();

        return redirect()->route('organisasi.index')->with('success', 'Pengurus berhasil ditambahkan');
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
            'bidang_jabatan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $organisasi = OrganisasiDpp::find($id);
        $oldImages = 'storage/uploads/admin/organisasi/' . $organisasi->foto;
        if (file_exists($oldImages)) {
            unlink($oldImages);
        }
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // $nama_foto = $foto->getClientOriginalName();
            $foto->move('storage/uploads/admin/organisasi/', $organisasi->foto);
            // $foto->move('storage/uploads/admin/organisasi/', $nama_foto);
            // $organisasi->foto = $nama_foto;
        }
        $organisasi->save();
        return redirect()->route('organisasi.index')->with('success', 'Pengurus berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisasi_dpp = OrganisasiDpp::find($id);
        $organisasi_dpp->delete();

        return redirect()->route('organisasi.index')->with('success', 'Pengurus berhasil dihapus');
    }
}
