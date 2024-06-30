<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BeritaKategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BeritaKategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'berita_kategori' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        }
         else {
            try {
                BeritaKategori::create([
                    'berita_kategori' => $request->berita_kategori,
                    'slug' => Str::slug($request->berita_kategori),
                ]);
              
                return redirect()->route('berita.index')->with([
                'reload' => true,
                'success' => 'Kategori Berita berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('berita.index')->with(['reload'=> true, 'error' => 'Kategori Berita gagal
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
            'berita_kategori' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                BeritaKategori::find($id)->update([
                    'berita_kategori' => $request->berita_kategori,
                    'slug' => Str::slug($request->berita_kategori),
                ]);

                return redirect()->route('berita.index')->with([
                'reload' => true,
                'success' => 'Kategori Berita berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('berita.index')->with(['reload'=> true, 'error' => 'Kategori Berita gagal
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
            BeritaKategori::find($id)->delete();

            return redirect()->route('berita.index')->with([
            'reload' => true,
            'success' => 'Kategori Berita berhasil dihapus!',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('berita.index')->with(['reload'=> true, 'error' => 'Kategori Berita gagal
            dihapus!']);
        }
    }
}
