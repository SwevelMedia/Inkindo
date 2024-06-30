<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProgramKerja;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proker = ProgramKerja::all();
        $kategori = KategoriProgramKerja::all();
        return view('dashboard.admin.kelola-proker.proker', compact('proker', 'kategori'));
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
            'nama_kategori' => 'required|string',
            'periode' => 'required|string',
            'poin.*' => 'nullable|string',
        ]);

        $proker = new KategoriProgramKerja;
        $proker->nama_kategori = $validatedData['nama_kategori'];
        $proker->periode = $request->periode;
        $proker->save();

        $poinData = [];
        if ($request->has('nama_proker')) {
            foreach ($request->input('nama_proker') as $poin) {
                if ($poin !== null) {
                    $poinData[] = ['nama_proker' => $poin, 'kategori_id' => $proker->id];
                }
            }
        }
        ProgramKerja::insert($poinData);
        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
            'nama_kategori' => 'required|string',
            'periode' => 'required|string',
            'poin.*' => 'nullable|string',
        ]);

        $proker = KategoriProgramKerja::find($id);
        $proker->nama_kategori = $validatedData['nama_kategori'];
        $proker->periode = $request->periode;
        $proker->save();

        $poinData = [];
        if ($request->has('nama_proker1')) {
            foreach ($request->input('nama_proker1') as $poin) {
                if ($poin !== null) {
                    $poinData[] = ['nama_proker' => $poin, 'kategori_id' => $proker->id];
                }
            }
        }
        ProgramKerja::where('kategori_id', $id)->delete();
        ProgramKerja::insert($poinData);
        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriProgramKerja::find($id)->delete();
        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil dihapus');
    }
}