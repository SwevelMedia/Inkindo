<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prakata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PrakataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prakata = Prakata::all();
        return view('dashboard.admin.kelola-prakata.prakata', compact('prakata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                $prakata = Prakata::find($id);

                if ($request->hasFile('foto_prakata')) {
                    $oldImagePath = 'storage/uploads/profil/' . $prakata->foto_prakata;

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }

                    $file = $request->file('foto_prakata');
                    $extension = $file->extension();
                    $filename = time() . '.' . $extension;
                    $file->move('storage/uploads/profil/', $filename);
                    $prakata->foto_prakata = $filename;
                }
                $prakata->nama_prakata = $request->nama_prakata;
                $prakata->jabatan = $request->jabatan;
                $prakata->sambutan = $request->sambutan;

                $prakata->update();
                return redirect()
                    ->route('prakata.index')
                    ->with([
                        'reload' => true,
                        'success' => 'Prakata berhasil diupdate!',
                    ]);
            } catch (\Throwable $th) {
                return redirect()
                    ->route('prakata.index')
                    ->with([
                        'reload' => true,
                        'error' => 'Prakata gagal diupdate!',
                    ]);
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
        //
    }
}
