<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GaleriController extends Controller
{
    public function store(Request $request)
    {
        try {
            $galeri = new Gallery();
            $galeri->judul = $request->judul;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/admin/galeri/', $filename);
                $galeri->gambar = $filename;
            }

            $galeri->deskripsi = $request->deskripsi;
            // $galeri->agenda_id = $request->agenda_id;

            $galeri->save();
            return response()->json(['message' => 'Item berhasil ditambahkan', 'galeri' => $galeri], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Item gagal ditambahkan'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $galeri = Gallery::findOrFail($id);
        try {
            $galeri->update($request->all());
            return response()->json(['message' => 'Item berhasil diupdate', 'galeri' => $galeri], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Item gagal diupdate'], 500);
        }
    }

    public function destroy($id)
    {
        $galeri = Gallery::findOrFail($id);

        try {
            $galeri->delete();
            return response()->json(['message' => 'Item berhasil dihapus', 'galeri' => $galeri], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Item gagal dihapus'], 500);
        }
    }
}
