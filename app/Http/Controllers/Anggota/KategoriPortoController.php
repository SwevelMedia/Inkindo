<?php

namespace App\Http\Controllers\Anggota;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\KategoriPortofolio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KategoriPortoController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => ['required'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        }

        $anggota_id = Anggota::where('user_id', auth()->user()->id)->first();
        
        $kategori = KategoriPortofolio::create([
            'kategori' => $request->kategori,
            'anggota_id'=>$anggota_id->id,
        ]);
        return redirect()
            ->route('anggotaprofil.index')
            ->with('success', 'Kategori portofolio berhasil ditambahkan');
    }
}
