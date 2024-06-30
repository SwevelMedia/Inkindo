<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodeEtik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KodeEtikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode_etik = KodeEtik::all();
        return view('dashboard.admin.kelola-kode-etik.kode-etik', compact('kode_etik'));
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
        $validator = Validator::make($request->all(), [
            'poin_kode_etik' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                KodeEtik::create([
                    'poin_kode_etik' => $request->poin_kode_etik,
                    'slug' => Str::slug($request->poin_kode_etik),
                ]);

                return redirect()
                    ->route('kode-etik.index')
                    ->with([
                        'reload' => true,
                        'success' => 'Kode etik berhasil ditambahkan!',
                    ]);
            } catch (\Throwable $th) {
                return redirect()->route('kode-etik.index') >
                    with([
                        'reload' => true,
                        'error' => 'Kode etik gagal ditambahkan!',
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
            'poin_kode_etik' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                KodeEtik::find($id)->update([
                    'poin_kode_etik' => $request->poin_kode_etik,
                    'slug' => Str::slug($request->poin_kode_etik),
                ]);
                return redirect()
                    ->route('kode-etik.index')
                    ->with([
                        'reload' => true,
                        'success' => 'Kode etik berhasil diupdate!',
                    ]);
            } catch (\Throwable $th) {
                return redirect()
                    ->route('kode-etik.index')
                    ->with([
                        'reload' => true,
                        'error' => 'Kode etik gagal ditambahkan!',
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
        try {
            $kodeEtik = KodeEtik::find($id);
            $kodeEtik->delete();
            return redirect()
                ->route('kode-etik.index')
                ->with([
                    'reload' => true,
                    'success' => 'Kode etik berhasil dihapus!',
                ]);
        } catch (\Throwable $th) {
            return redirect()
                ->route('kode-etik.index')
                ->with([
                    'reload' => true,
                    'error' => 'Kode etik gagal dihapus!',
                ]);
        }
    }
}
