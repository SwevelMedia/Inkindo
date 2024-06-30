<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BeritaKategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::latest()->get();
        $kategori = BeritaKategori::all();
        $kategori2 = BeritaKategori::all();
        return view('dashboard.admin.kelola-berita.berita', compact('berita', 'kategori', 'kategori2'));
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
            'judul' => 'required',
            'penulis' => 'required',
            'poster' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'isi' => 'required',
            'berita_kategori_id' => 'required',
            // 'tags' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $berita = new Berita();
                $tags = explode(',', $request->tags);

                $berita->judul = $request->judul;
                $berita->slug = Str::slug($request->judul);
                $berita->penulis = $request->penulis;
                $filename = '';
                if ($request->hasFile('poster')) {
                    $file = $request->file('poster');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs('public/uploads/admin/berita/', $filename);
                    $berita->poster = $filename;
                }
                $berita->isi = $request->isi;
                $berita->berita_kategori_id = $request->berita_kategori_id;
                $berita->save();

                $berita->tag($tags);

                return redirect()->route('berita.index')->with([
                'reload' => true,
                'success' => 'Berita berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('berita.index')->with(['reload'=> true, 'error' => 'Berita gagal
                ditambahkan!']);
            }
        }
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
            'judul' => 'required',
            'penulis' => 'required',
            'poster' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'isi' => 'required',
            'berita_kategori_id' => 'required',
            // 'tags' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $berita = Berita::find($id);
                $tags = explode(',', $request->tags);

                $berita->judul = $request->judul;
                $berita->slug = Str::slug($request->judul);
                $berita->penulis = $request->penulis;

                $filename = '';
                $path = 'public/uploads/admin/berita/';
                if ($request->hasFile('poster')) {
                    Storage::delete($path . '' . $berita->poster);
                    $file = $request->file('poster');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs($path, $filename);
                    $berita->poster = $filename;
                } else {
                    $berita->poster = $request->posterOld;
                }
                $berita->isi = $request->isi;
                $berita->berita_kategori_id = $request->berita_kategori_id;
                $berita->save();

                $berita->retag($tags);

                return redirect()->route('berita.index')->with([
                'reload' => true,
                'success' => 'Berita berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('berita.index')->with(['reload'=> true, 'error' => 'Berita gagal
                diupdate!']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $berita = Berita::find($id);
            $berita->untag();
            $path = 'public/uploads/admin/berita/';
            if ($berita->poster) {
                Storage::delete($path . '' . $berita->poster);
            }
            $berita->delete();
            return redirect()->route('berita.index')->with([
            'reload' => true,
            'success' => 'Berita berhasil dihapus!',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('berita.index')->with(['reload'=> true, 'error' => 'Berita gagal
            dihapus!']);
        }
    }
}
