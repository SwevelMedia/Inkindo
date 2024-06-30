<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MitraController extends Controller
{
    public function store(Request $request)
    {
        try {
            $mitra = Mitra::create([
                'nama' => $request->nama,
                'logo' => $request->logo,
            ]);

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/admin/mitra', $filename);
                $mitra->update([
                    'logo' => $filename,
                ]);
            }

            return response()->json(['message' => 'Item berhasil ditambahkan', 'mitra' => $mitra], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Item gagal ditambahkan'], 500);
        }
    }

    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return response()->json(['message' => 'Item berhasil ditemukan', 'mitra' => $mitra], 201);
    }
}
