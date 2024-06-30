<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ_Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FAQ_KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kategori = FAQ_Kategori::all();
        // return view('dashboard.admin.kelola-faq.faq', compact('kategori'));
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
            'faq_kategori' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                FAQ_Kategori::create([
                    'faq_kategori' => $request->faq_kategori,
                ]);

                return redirect()->route('faq.index')->with([
                'reload' => true,
                'success' => 'Kategori FAQ berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {

                return redirect()->route('faq.index')->with(['reload'=> true, 'error' => 'Kategori FAQ gagal
                ditambahkan!']);
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
            'faq_kategori' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                FAQ_Kategori::where('id', $id)->update([
                    'faq_kategori' => $request->faq_kategori,
                ]);

                return redirect()->route('faq.index')->with([
                'reload' => true,
                'success' => 'Kategori FAQ berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {

                return redirect()->route('faq.index')>with(['reload'=> true, 'error' => 'Kategori FAQ gagal
                diupdate!']);
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
            $faq_ketegori = FAQ_Kategori::find($id);
            $faq_ketegori->delete();

            return redirect()->route('faq.index')->with([
            'reload' => true,
            'success' => 'Kategori FAQ berhasil dihapus!',
            ]);
        } catch (\Throwable $th) {

            return redirect()->route('faq.index')>with(['reload'=> true, 'error' => 'Kategori FAQ gagal
            dihapus!']);
        }
    }
}
