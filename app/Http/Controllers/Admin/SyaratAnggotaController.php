<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JudulSyaratAnggota;
use App\Models\PoinSyaratAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyaratAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori1 = JudulSyaratAnggota::where('kategori', 0)->orderByDesc('created_at')->get();
        $kategori2 = JudulSyaratAnggota::where('kategori', 1)->orderByDesc('created_at')->get();
        // dd($kategori1);
        return view('dashboard.admin.kelola-syarat-anggota.syarat-anggota', compact('kategori1', 'kategori2'));
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
            'nama_judul' => 'required|string',
            'kategori' => 'required|in:0,1',
            'poin.*' => 'nullable|string',
        ]);

        $judulSyaratAnggota = new JudulSyaratAnggota;
        $judulSyaratAnggota->nama_judul = $validatedData['nama_judul'];
        $judulSyaratAnggota->kategori = $request->kategori;
        $judulSyaratAnggota->save();

        $poinData = [];
        if ($request->has('poin')) {
            foreach ($request->input('poin') as $poin) {
                if ($poin !== null) {
                    $poinData[] = ['poin' => $poin, 'judul_syarat_anggota_id' => $judulSyaratAnggota->id];
                }
            }
        }
        PoinSyaratAnggota::insert($poinData);

        return redirect()->route('syarat-anggota.index')->with('success', 'Data Syarat berhasil disimpan');
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
            'nama_judul' => 'required|string',
            'kategori' => 'required|in:0,1',
            'poin.*' => 'nullable|string',
        ]);
        $judulSyaratAnggota = JudulSyaratAnggota::find($id);
        $judulSyaratAnggota->nama_judul = $validatedData['nama_judul'];
        $judulSyaratAnggota->kategori = $request->kategori;
        $judulSyaratAnggota->save();

        $poinData = [];
        if ($request->has('poin1')) {
            foreach ($request->input('poin1') as $poin) {
                if ($poin !== null) {
                    $poinData[] = ['poin' => $poin, 'judul_syarat_anggota_id' => $judulSyaratAnggota->id];
                }
            }
        }
        PoinSyaratAnggota::where('judul_syarat_anggota_id', $id)->delete();
        PoinSyaratAnggota::insert($poinData);
        return redirect()->route('syarat-anggota.index')->with('success', 'Data Syarat keanggotaan berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JudulSyaratAnggota::find($id)->delete();
        return redirect()->route('syarat-anggota.index')->with('success', 'Berhasil Menghapus Data');
    }
}