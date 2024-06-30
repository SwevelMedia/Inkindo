<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // admin only
        $data = User::where('role', 'admin')->get();
        return view('dashboard.admin.kelola-akun.akun', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.kelola-akun.tambah-akun');
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required | min:8',
            'password_confirmation' => 'required | same:password',
            'foto' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->no_hp = $request->no_hp;
                $user->alamat = $request->alamat;
                $user->role = 'admin';
                $user->status = 'aktif';
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs('public/uploads/akun/', $filename);
                    $user->foto = $filename;
                }
                $user->save();

                return redirect()->route('akun.index')->with([
                'reload' => true,
                'success' => 'Akun berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('akun.index')->with(['reload'=> true, 'error' => 'Akun gagal ditambahkan!']);
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
        $data = User::find($id);
        return view('dashboard.admin.kelola-akun.edit-akun', compact('data'));
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],       
            'password_confirmation' => ['same:password'],
            'foto' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $user = User::find($id);
                if (!$user) {
                    return redirect()->route('akun.index')->with(['reload'=> true, 'error' => 'Data tidak ditemukan!']);
                }

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->no_hp = $request->no_hp;
                $user->alamat = $request->alamat;
                $user->status = 'aktif';

                $path = 'public/uploads/akun/';
                if ($request->hasFile('foto')) {
                    Storage::delete($path . '' . $user->foto);
                    $file = $request->file('foto');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs($path, $filename);
                    $user->foto = $filename;
                } else {
                    $user->foto = $request->fotoOld;
                }
                $user->save();

                return redirect()->route('akun.index')->with([
                'reload' => true,
                'success' => 'Akun berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('akun.index')->with(['reload'=> true, 'error' => 'Akun gagal diupdate!']);
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
        $user = User::find($id);
        $path = 'public/uploads/akun/';

        try {
            if ($user->foto) {
                Storage::delete($path . '' . $user->foto);
            }
            $user->delete();
            return redirect()->route('akun.index')->with(['reload'=> true, 'error' => 'Akun berhasil dihapus!']);
        } catch (\Throwable $th) {
            toastr()->error('Akun gagal dihapus!', 'Gagal!');
            return redirect()->route('akun.index')->with(['reload'=> true, 'error' => 'Akun gagal dihapus!']);
        }
    }
}
