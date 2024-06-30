<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArsipKategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArsipKategoriController extends Controller
{
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
            'arsip_kategori' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $kategori = new ArsipKategori();
                $kategori->arsip_kategori = $request->arsip_kategori;
                $kategori->save();

                return redirect()->route('arsip.index')->with([
                'reload' => true,
                'success' => 'Kategori regulasi berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('arsip.index')->with(['reload'=> true, 'error' => 'Kategori regulasi gagal
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
            'arsip_kategori' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $kategori = ArsipKategori::find($id);
                $kategori->arsip_kategori = $request->arsip_kategori;
                $kategori->save();

                return redirect()->route('arsip.index')->with([
                'reload' => true,
                'success' => 'Kategori regulasi berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {

                return redirect()->route('arsip.index')->with(['reload'=> true, 'error' => 'Kategori regulasi gagal
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
        $kategori = ArsipKategori::find($id);
        try {
            $kategori->delete();

            return redirect()->route('arsip.index')->with([
            'reload' => true,
            'success' => 'Regulasi berhasil dihapus!',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('arsip.index')->with(['reload'=> true, 'error' => 'Regulasi regulasi gagal
            dihapus!']);
        }
    }
}
