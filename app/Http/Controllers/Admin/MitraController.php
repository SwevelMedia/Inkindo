<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::all();
        return view('dashboard.admin.kelola-mitra.mitra', ['mitras' => $mitras]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $filename = '';
                if ($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs('public/uploads/admin/mitra/', $filename);
                }

                Mitra::create([
                    'nama' => $request->nama,
                    'logo' => $filename,
                ]);

                return redirect()->route('mitra.index')->with([
                'reload' => true,
                'success' => 'Mitra berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('mitra.index')->with(['reload'=> true, 'error' => 'Mitra gagal
                ditambahkan!']);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $mitra = Mitra::find($id); 

                if (!$mitra) {
                    return redirect()->route('mitra.index')->with(['reload'=> true, 'error' => 'Mitra tidak
                    ditemukan!']);
                }

                $filename = '';
                $path = 'public/uploads/admin/mitra/';
                if ($request->hasFile('logo')) {
                    Storage::delete($path . '' . $mitra->logo);
                    $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs($path, $filename);
                } else {
                    $filename = $request->logoOld;
                }

                $mitra->update([
                    'nama' => $request->nama,
                    'logo' => $filename,
                ]);

                return redirect()->route('mitra.index')->with([
                'reload' => true,
                'success' => 'Mitra berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {

                return redirect()->route('mitra.index')->with(['reload'=> true, 'error' => 'Mitra gagal
                diupdate!']);
            }
        }
    }
    public function destroy($id)
    {
        $mitra = Mitra::find($id);
        $path = 'public/uploads/admin/mitra/';

        try {
            if ($mitra->logo) {
                Storage::delete($path . '' . $mitra->logo);
            }
            $mitra->delete();

            return redirect()->route('mitra.index')->with([
            'reload' => true,
            'success' => 'Mitra berhasil dihapus!',
            ]);
        } catch (\Throwable $th) {

            return redirect()->route('mitra.index')->with(['reload'=> true, 'error' => 'Mitra gagal
            dihapus!']);
        }
    }
}
