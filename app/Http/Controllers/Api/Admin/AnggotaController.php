<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->get();
        return response()->json($anggota);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'perusahaan' => 'required',
        //     'foto_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'deskripsi' => 'required',
        //     'penanggung_jawab' => 'required',
        //     'alamat' => 'required',
        //     'no_hp' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'password_confirmation' => 'required|same:password',
        //     'website' => 'nullable',
        //     'npwp' => 'nullable',
        // ]);

        try {
            $user = User::with('anggota')->create([
                'name' => $request->penanggung_jawab,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp_penanggung_jawab,
                'role' => 'anggota',
                'foto' => $request->foto,
            ]);

            $anggota = $user->anggota()->create([
                'no_anggota' => $request->no_anggota,
                'perusahaan' => $request->perusahaan,
                'alamat' => $request->alamat_perusahaan,
                'foto_perusahaan' => $request->foto_perusahaan,
                'logo' => $request->logo,
                'no_hp' => $request->no_hp_perusahaan,
                'no_telp' => $request->no_telp_perusahaan,
                'deskripsi' => $request->deskripsi,
                'penanggung_jawab' => $request->penanggung_jawab,
                'website' => $request->website,
                'email' => $request->email_perusahaan,
                'npwp' => $request->npwp,
            ]);

            if ($request->hasFile('foto_perusahaan')) {
                $file = $request->file('foto_perusahaan');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/anggota/profil/', $filename);
                $anggota->update([
                    'foto_perusahaan' => $filename,
                ]);
            }

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/anggota/profil/', $filename);
                $anggota->update([
                    'logo' => $filename,
                ]);
            }

            return response()->json(['message' => 'Item berhasil ditambahkan', 'anggota' => $anggota], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Item gagal ditambahkan'], 500);
        }
    }
}
