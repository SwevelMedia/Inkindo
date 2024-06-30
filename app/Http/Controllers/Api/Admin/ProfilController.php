<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'gambar_prakata' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
        // ]);
        dd($request);
        try {
            $profil = Profil::find($id);
            if ($request->hasFile('gambar_prakata')) {
                $file = $request->file('gambar_prakata');
                $extension = $file->extension();
                $filename = time() . '.' . $extension;
                $file->move('storage/uploads/profil/', $filename);
                $profil->gambar_prakata = $filename;
            }
           
            $profil->update();

            return response()->json(['message' => 'Item berhasil diupdate', 'profil' => $profil], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Item gagal diupdate'], 500);
        }
    }
}
