<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::all();

        return view('dashboard.admin.kelola-profil.profil', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.kelola-profil.tambah-profil');
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
            'gambar_prakata' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
            'email' => 'unique:profils',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $profil = new Profil();
                $profil->prakata = $request->prakata;
                $profil->deskripsi_home = $request->deskripsi_home;
                if ($request->hasFile('gambar_prakata')) {
                    $file = $request->file('gambar_prakata');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('storage/uploads/profil/', $filename);
                    $profil->gambar_prakata = $filename;
                }
                $profil->visi = $request->visi;
                $profil->misi = $request->misi;
                $profil->daftar_misi = $request->daftar_misi;
                $profil->email = $request->email;
                $profil->no_hp = $request->no_hp;
                $profil->alamat = $request->alamat;
                $profil->facebook = $request->facebook;
                $profil->instagram = $request->instagram;
                $profil->twitter = $request->twitter;
                $profil->whatsapp = $request->whatsapp;
                $profil->save();

                return redirect()
                    ->route('profil.index')
                    ->with([
                        'reload' => true,
                        'success' => 'Profil berhasil ditambahkan!',
                    ]);
            } catch (\Throwable $th) {
                return redirect()
                    ->route('profil.index')
                    ->with([
                        'reload' => true,
                        'error' => 'Profil gagal
                  ditambahkan!',
                    ]);
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
            'gambar_prakata' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2548',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $profil = Profil::find($id);
                if ($request->hasFile('gambar_visi')) {
                    $oldImagePath = 'storage/uploads/profil/' . $profil->gambar_visi;

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }

                    $file = $request->file('gambar_visi');
                    $extension = $file->extension();
                    $filename = time() . '.' . $extension;
                    $file->move('storage/uploads/profil/', $filename);
                    $profil->gambar_visi = $filename;
                }

                if ($request->hasFile('gambar_prakata')) {
                    $oldImagePath = 'storage/uploads/profil/' . $profil->gambar_prakata;

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }

                    $file = $request->file('gambar_prakata');
                    $extension = $file->extension();
                    $filename = time() . '.' . $extension;
                    $file->move('storage/uploads/profil/', $filename);
                    $profil->gambar_prakata = $filename;
                }

                $profil->prakata = $request->prakata;
                $profil->deskripsi_home = $request->deskripsi_home;
                $profil->visi = $request->visi;
                $profil->misi = $request->misi;
                $profil->daftar_misi = $request->daftar_misi;
                $profil->kode_etik = $request->kode_etik;
                $profil->email = $request->email;
                $profil->no_hp = $request->no_hp;
                $profil->alamat = $request->alamat;
                // $profil->facebook = $request->facebook;
                $profil->instagram = $request->instagram;
                // $profil->twitter = $request->twitter;
                $profil->whatsapp = $request->whatsapp;
                $profil->maps = $request->maps;

                $profil->update();

                return redirect()
                    ->route('profil.index')
                    ->with([
                        'reload' => true,
                        'success' => 'Profil berhasil diupdate!',
                    ]);
            } catch (\Throwable $th) {
                return redirect()
                    ->route('profil.index')
                    ->with([
                        'reload' => true,
                        'error' => 'Profil gagal
                diupdate!',
                    ]);
            }
        }
    }
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'gambar_prakata' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2548',
    //     ]);

    //     $profil = Profil::find($id);

    //     $oldImages = 'storage/uploads/profil/' . $profil->gambar_prakata;
    //     if (file_exists($oldImages)) {
    //         unlink($oldImages);
    //     }
    //     $profil->prakata = $request->prakata;
    //     if ($request->hasFile('gambar_prakata')) {
    //         $file = $request->file('gambar_prakata');
    //         $extension = $file->extension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('storage/uploads/profil/', $filename);
    //         $profil->gambar_prakata = $filename;
    //     }

    //     $profil->visi = $request->visi;
    //     $profil->misi = $request->misi;
    //     $profil->daftar_misi = $request->daftar_misi;
    //     $profil->kode_etik = $request->kode_etik;
    //     $profil->email = $request->email;
    //     $profil->no_hp = $request->no_hp;
    //     $profil->alamat = $request->alamat;
    //     $profil->facebook = $request->facebook;
    //     $profil->instagram = $request->instagram;
    //     $profil->twitter = $request->twitter;
    //     $profil->whatsapp = $request->whatsapp;
    //     $profil->update();

    //     return redirect()->route('profil.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $profil = Profil::find($id);
            $profil->delete();

            return redirect()
                ->route('profil.index')
                ->with([
                    'reload' => true,
                    'success' => 'Profil berhasil dihapus!',
                ]);
        } catch (\Throwable $th) {
            return redirect()
                ->route('profil.index')
                ->with([
                    'reload' => true,
                    'error' => 'Profil gagal dihapus!',
                ]);
        }
    }
}
