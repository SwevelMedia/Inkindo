<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Imports\AnggotaExcelImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Anggota::with(['user', 'klasifikasi'])->get();
        $konstruksi = Klasifikasi::where('klasifikasi', 'konstruksi')->get();
        $non_konstruksi = Klasifikasi::where('klasifikasi', 'non_konstruksi')->get();

        return view('dashboard.admin.kelola-anggota.anggota', compact('users', 'konstruksi', 'non_konstruksi'));
    }

    public function dataAnggotaJson()
    {
        return DataTables::of(Anggota::with('user')->limit(10))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.kelola-anggota.tambah-anggota');
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
            'perusahaan' => ['required'],
            'foto_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => ['required'],
            'no_anggota' => 'required|unique:anggotas,no_anggota',
            'penanggung_jawab' => ['required'],
            'alamat' => ['required'],
            'alamat_kabupaten' => ['required'],
            'no_hp' => ['required'],
            'email' => 'required|unique:users,email',
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $anggota = User::with('anggota')->create([
                    'name' => $request->penanggung_jawab,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'anggota',
                ]);

                $anggota->anggota()->create([
                    'perusahaan' => $request->perusahaan,
                    'foto_perusahaan' => $request->foto_perusahaan,
                    'logo' => $request->logo,
                    'no_anggota' => $request->no_anggota,
                    'deskripsi' => $request->deskripsi,
                    'penanggung_jawab' => $request->penanggung_jawab,
                    'alamat' => $request->alamat,
                    'alamat_kabupaten' => $request->alamat_kabupaten,
                    'linkedin' => $request->linkedin,
                    'maps' => $request->maps,
                    'no_hp' => $request->no_hp,
                    'no_telp' => $request->no_hp,
                    'website' => $request->website,
                ]);

                // sync klasifikasi
                // $new_anggota = Anggota::where('perusahaan', $request->perusahaan)->first();
                // $klasifikasi = $request->klasifikasi;
                // $new_anggota->klasifikasi()->sync([$klasifikasi]);

                $filenameProfil = '';
                $pathProfil = 'public/uploads/anggota/profil/';
                if ($request->hasFile('foto_perusahaan')) {
                    $file = $request->file('foto_perusahaan');
                    $extension = $file->getClientOriginalExtension();
                    $filenameProfil = time() . '.' . $extension;
                    $file->storeAs($pathProfil, $filenameProfil);
                    $anggota->anggota()->update([
                        'foto_perusahaan' => $filenameProfil,
                    ]);
                }
                $filenameLogo = '';
                $pathLogo = 'public/uploads/anggota/logo/';
                if ($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                    $filenameLogo = time() . '.' . $extension;
                    $file->storeAs($pathLogo, $filenameLogo);
                    $anggota->anggota()->update([
                        'logo' => $filenameLogo,
                    ]);
                }

                return redirect()->route('anggota.index')->with([
                'reload' => true,
                'success' => 'Anggota berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('anggota.index')->with(['reload'=> true, 'error' => 'Anggota gagal
                ditambahkan!']);
            }
        }
    }

    public function storeExcelAnggota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'anggotas' => ['required'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            $excelAnggotas = $request->file('anggotas');
            FacadesExcel::import(new AnggotaExcelImport(), $excelAnggotas);
        }
    }

    public function storeKonstruksi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_klasifikasi' => ['required', 'max:255'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                Klasifikasi::create([
                    'klasifikasi' => 'konstruksi',
                    'sub_klasifikasi' => $request->sub_klasifikasi,
                ]);

                toastr()->success('Klasifikasi Konstruksi berhasil ditambahkan!', 'Sukses');
                return redirect()->route('anggota.index');
            } catch (\Throwable $th) {
                toastr()->error('Klasifikasi Konstruksi gagal ditambahkan!', 'Gagal!');
                return redirect()->route('anggota.index');
            }
        }
    }

    public function storeNonKonstruksi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_klasifikasi' => ['required', 'max:255'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                Klasifikasi::create([
                    'klasifikasi' => 'non_konstruksi',
                    'sub_klasifikasi' => $request->sub_klasifikasi,
                ]);

                toastr()->success('Klasifikasi Non Konstruksi berhasil ditambahkan!', 'Sukses');
                return redirect()->route('anggota.index');
            } catch (\Throwable $th) {
                toastr()->error('Klasifikasi Non Konstruksi gagal ditambahkan!', 'Gagal!');
                return redirect()->route('anggota.index');
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
        $anggota = User::join('anggotas', 'users.id', '=', 'anggotas.user_id')
            ->where('users.role', 'anggota')
            ->where('users.id', $id)
            ->select('users.*', 'anggotas.*')
            ->first();

        return view('dashboard.admin.kelola-anggota.anggota', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dataAnggotaByIdJson($id)
    {
        $anggota = Anggota::with('user')
            ->where('id', $id)
            ->get();
        return response()->json($anggota);
    }

    public function showDataDestroyById(Request $request)
    {
        $anggota = Anggota::where('id', $request->id)->get();
        return response()->json($anggota);
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

            return redirect()->route('anggota.index')->with([
            'reload' => true,
            'success' => 'Anggota berhasil diupdate!',
            ]);
            } catch (\Throwable $th) {
                return redirect()->route('anggota.index')->with(['reload'=> true, 'error' => 'Anggota gagal
                diupdate!']);
            }
        }
    }

    public function updateKonstruksi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sub_klasifikasi' => ['required', 'max:255'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $klasifikasi = Klasifikasi::find($id);

                if (!$klasifikasi) {
                    toastr()->error('Data tidak ditemukan!', 'Gagal!');
                    return redirect()->route('anggota.index');
                }

                $klasifikasi->update([
                    'klasifikasi' => 'konstruksi',
                    'sub_klasifikasi' => $request->sub_klasifikasi,
                ]);

                toastr()->success('Klasifikasi Konstruksi berhasil diupdate!', 'Sukses');
                return redirect()->route('anggota.index');
            } catch (\Throwable $th) {
                toastr()->error('Klasifikasi Konstruksi gagal diupdate!', 'Gagal!');
                return redirect()->route('anggota.index');
            }
        }
    }

    public function updateNonKonstruksi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sub_klasifikasi' => ['required', 'max:255'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $klasifikasi = Klasifikasi::find($id);

                if (!$klasifikasi) {
                    toastr()->error('Data tidak ditemukan!', 'Gagal!');
                    return redirect()->route('anggota.index');
                }

                $klasifikasi->update([
                    'klasifikasi' => 'non_konstruksi',
                    'sub_klasifikasi' => $request->sub_klasifikasi,
                ]);

                toastr()->success('Klasifikasi Non Konstruksi berhasil diupdate!', 'Sukses');
                return redirect()->route('anggota.index');
            } catch (\Throwable $th) {
                toastr()->error('Klasifikasi Non Konstruksi gagal diupdate!', 'Gagal!');
                return redirect()->route('anggota.index');
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
        $anggota = Anggota::with('user')
            ->where('id', $id)
            ->first();
        $user = User::find($anggota->user_id);
        try {
            $anggota->delete();
            $user->delete();
            return redirect()
                ->route('anggota.index')
                ->with([
                    'reload' => true,
                    'success' => 'Anggota berhasil
            dihapus',
                ]);
        } catch (\Throwable $th) {
            return redirect()
                ->route('anggota.index')
                ->with(['reload'=> true, 'error' => 'Anggota gagal dihapus!']);
        }
    }

    public function destroyKonstruksi($id)
    {
        $klasifikasi = Klasifikasi::find($id);

        try {
            $klasifikasi->delete();
            toastr()->success('Klasifikasi Konstruksi berhasil dihapus!', 'Sukses');
            return redirect()->route('anggota.index');
        } catch (\Throwable $th) {
            toastr()->error('Klasifikasi Konstruksi gagal dihapus!', 'Gagal!');
            return redirect()->route('anggota.index');
        }
    }
}
