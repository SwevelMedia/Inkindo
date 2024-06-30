<?php

namespace App\Http\Controllers\Anggota;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Portofolio;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriPortofolio;
use App\Models\PortofolioAnggota;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnggotaProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota_id = Anggota::where('user_id', auth()->user()->id)->first();
        $anggota = Anggota::with('user')
            ->where('id', $anggota_id->id)
            ->first();
        $portofolio = PortofolioAnggota::with(['portofolioGambar','kategoriPortofolio'])
            ->where('anggota_id', $anggota_id->id)
            ->get();
       
        $konstruksi = Klasifikasi::where('klasifikasi', 'konstruksi')->get();
        $non_konstruksi = Klasifikasi::where('klasifikasi', 'non_konstruksi')->get();
        $profil = Anggota::with(['user', 'klasifikasi'])
            ->where('id', $anggota_id->id)
            ->get();

        $kategori_porto = KategoriPortofolio::where('anggota_id', $anggota_id->id)->get();

        return view('dashboard.anggota.kelola-profil.profil', compact('profil', 'portofolio', 'konstruksi', 'non_konstruksi', 'kategori_porto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'perusahaan' => 'required',
            'foto_perusahaan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'website' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
        ]);

        $anggota = Anggota::create([
            'perusahaan' => $request->perusahaan,
            'foto_perusahaan' => $request->foto_perusahaan,
            'deskripsi' => $request->deskripsi,
            'penanggung_jawab' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
        ]);

        if ($request->hasFile('foto_perusahaan')) {
            $request->file('foto_perusahaan')->move('uploads/anggota/profil/', $request->file('foto_perusahaan')->getClientOriginalName());
            $anggota->foto_perusahaan = $request->file('foto_perusahaan')->getClientOriginalName();
            $anggota->save();
        }

        return redirect()
            ->route('anggotaprofil.index')
            ->with('success', 'Profil berhasil ditambahkan');
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
            'perusahaan' => ['required'],
            'foto_perusahaan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => ['required'],
            'no_anggota' => ['required'],
            'penanggung_jawab' => ['required'],
            'alamat' => ['required'],
            'alamat_kabupaten' => ['required'],
            'klasifikasi' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $user_id = Anggota::where('id', $id)->first();

                $anggota = User::with('anggota')
                    ->where('id', $user_id->user_id)
                    ->first();

                if ($request->filled('password')) {
                    $anggota->password = bcrypt($request->password);
                }

                $anggota->update([
                    'name' => $request->penanggung_jawab,
                    'email' => $request->email,
                    'role' => 'anggota',
                ]);

                $anggota->anggota()->update([
                    'perusahaan' => $request->perusahaan,
                    'no_anggota' => $request->no_anggota,
                    'deskripsi' => $request->deskripsi,
                    'penanggung_jawab' => $request->penanggung_jawab,
                    'alamat' => $request->alamat,
                    'linkedin' => $request->linkedin,
                    'maps' => $request->maps,
                    'no_hp' => $request->no_hp,
                    'no_telp' => $request->no_hp,
                    'website' => $request->website,
                ]);

                // $new_anggota = Anggota::where('perusahaan', $request->perusahaan)->first();
                // $klasifikasi = $request->klasifikasi;
                // $new_anggota->klasifikasi()->sync([$klasifikasi]);

                $filenameProfil = '';
                $pathProfil = 'public/uploads/anggota/profil/';
                if ($request->hasFile('foto_perusahaan')) {
                    Storage::delete($pathProfil . '' . $anggota->foto_perusahaan);
                    $file = $request->file('foto_perusahaan');
                    $extension = $file->getClientOriginalExtension();
                    $filenameProfil = time() . '.' . $extension;
                    $file->storeAs($pathProfil, $filenameProfil);
                    $anggota->anggota()->update([
                        'foto_perusahaan' => $filenameProfil,
                    ]);
                } else {
                    $anggota->anggota()->update([
                        'foto_perusahaan' => $request->foto_perusahaanOld,
                    ]);
                }

                $filenameLogo = '';
                $pathLogo = 'public/uploads/anggota/logo/';
                if ($request->hasFile('logo')) {
                    Storage::delete($pathLogo . '' . $anggota->logo);
                    $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                    $filenameLogo = time() . '.' . $extension;
                    $file->storeAs($pathLogo, $filenameLogo);
                    $anggota->anggota()->update([
                        'logo' => $filenameLogo,
                    ]);
                } else {
                    $anggota->anggota()->update([
                        'logo' => $request->logoOld,
                    ]);
                }

                toastr()->success('Anggota berhasil diupdate!', 'Sukses');
                return redirect()->route('anggotaprofil.index');
            } catch (\Throwable $th) {
                toastr()->error('Anggota gagal diupdate!', 'Gagal!');
                return redirect()->route('anggotaprofil.index');
            }
            //    return redirect()
            //    ->route('anggotaprofil.index')
            //    ->with('success', 'Profil berhasil diubah');
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
        //
    }
}
