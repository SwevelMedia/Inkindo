<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriHubungiKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriHubungiKamiController extends Controller
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
            'nama_kategori' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                KategoriHubungiKami::create([
                    'nama_kategori' => $request->nama_kategori,
                    'slug' => Str::slug($request->nama_kategori),
                ]);

                toastr()->success('Kategori berhasil ditambahkan!', 'Sukses');
                return redirect()->route('hubungi-kami.index');
            } catch (\Throwable $th) {
                toastr()->error('Kategori gagal ditambahkan!', 'Gagal!');
                return redirect()->route('hubungi-kami.index');
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
            'nama_kategori' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                KategoriHubungiKami::find($id)->update([
                    'nama_kategori' => $request->nama_kategori,
                    'slug' => Str::slug($request->nama_kategori),
                ]);
                toastr()->success('Kategori berhasil diupdate!', 'Sukses');
                return redirect()->route('hubungi-kami.index');
            } catch (\Throwable $th) {
                toastr()->error('Kategori gagal diupdate!', 'Gagal!');
                return redirect()->route('hubungi-kami.index');
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
        $kategori = KategoriHubungiKami::find($id);
        try {
            $kategori->delete();
            toastr()->success('Kode etik berhasil dihapus!', 'Sukses');
            return redirect()->route('hubungi-kami.index');
        } catch (\Throwable $th) {
            toastr()->error('Kode etik gagal dihapus!', 'Gagal!');
            return redirect()->route('hubungi-kami.index');
        }
    }
}

