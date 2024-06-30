<?php

namespace App\Http\Controllers\Anggota;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\PortofolioAnggota;
use App\Http\Controllers\Controller;
use App\Models\KategoriPortofolio;
use App\Models\PortofolioGambar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnggotaPortofolioController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'pemilik' => ['required'],
            'lokasi' => ['required'],
            'tahun' => ['required'],
            // 'gambars' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // validasi untuk multiple image belum jalan
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $anggota = Anggota::where('user_id', Auth::user()->id)->first();
                $portoAngg = PortofolioAnggota::create([
                    'nama' => $request->judul,
                    'pemilik' => $request->pemilik,
                    'deskripsi' => $request->deskripsi,
                    'lokasi' => $request->lokasi,
                    'tahun' => $request->tahun,
                    'gambar' => 'dummy',
                    'anggota_id' => $anggota->id,
                ]);

                $filename = '';
                if ($request->hasFile('gambars')) {
                    $gambars = $request->file('gambars');
                    foreach ($gambars as $gambar) {
                        $gambarName = uniqid() . '.' . $gambar->getClientOriginalExtension();
                        $gambar->storeAs('public/uploads/anggota/portofolio', $gambarName);
                        PortofolioGambar::create([
                            'gambar' => $gambarName,
                            'portofolio_id' => $portoAngg->id,
                        ]);
                    }
                }

                if ($request->kategori) {
                    $portoAngg->kategoriPortofolio()->sync($request->kategori);
                }

                toastr()->success('Portofolio berhasil ditambahkan!', 'Sukses');
                return redirect()->route('anggotaprofil.index');
            } catch (\Throwable $th) {
                toastr()->error('Portofolio gagal ditambahkan!', 'Gagal!');
                return redirect()->route('anggotaprofil.index');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required'],
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $portofolio = PortofolioAnggota::find($id);

                $filename = '';
                $path = 'public/uploads/anggota/portofolio/';
                if ($request->hasFile('gambar')) {
                    Storage::delete($path . '' . $portofolio->logo);
                    $file = $request->file('gambar');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs($path, $filename);
                } else {
                    $filename = $request->gambarOld;
                }

                $portofolio->update([
                    'judul' => $request->judul,
                    'gambar' => $filename,
                ]);
                toastr()->success('Portofolio berhasil ditambahkan!', 'Sukses');
                return redirect()->route('anggotaprofil.index');
            } catch (\Throwable $th) {
                toastr()->error('Portofolio gagal ditambahkan!', 'Gagal!');
                return redirect()->route('anggotaprofil.index');
            }
        }
    }

    public function destroy($id)
    {
        $porto = PortofolioAnggota::find($id);
        $path = 'public/uploads/anggota/portofolio/';

        try {
            $porto_img = PortofolioGambar::where('portofolio_id', $id);
            if ($porto_img->get()) {
                foreach ($porto_img->get() as $item) {
                     Storage::delete($path . '' . $item->gambar);
                }
            }
            $porto_img->delete();
            $porto->delete();

            // if ($porto->gambar) {
            //     Storage::delete($path . '' . $porto->gambar);
            // }
            // $porto->delete();
            toastr()->success('Portofolio berhasil dihapus!', 'Sukses');
            return redirect()->route('anggotaprofil.index');
        } catch (\Throwable $th) {
            toastr()->error('Portofolio gagal dihapus!', 'Gagal!');
            return redirect()->route('anggotaprofil.index');
        }
    }
}
