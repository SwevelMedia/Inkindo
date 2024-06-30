<?php

namespace App\Http\Controllers\Admin;

use App\Models\FAQ;
use App\Models\FAQ_Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FAQ_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = FAQ::all();
        $kategori = FAQ_Kategori::all();
        return view('dashboard.admin.kelola-faq.faq', compact('kategori', 'faq'));
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'faq_kategori_id' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                FAQ::create([
                    'pertanyaan' => $request->pertanyaan,
                    'jawaban' => $request->jawaban,
                    'faq_kategori_id' => $request->faq_kategori_id,
                ]);

                return redirect()->route('faq.index')->with([
                'reload' => true,
                'success' => 'FAQ berhasil ditambahkan!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('faq.index')->with(['reload'=> true, 'error' => 'FAQ gagal
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'faq_kategori_id' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                FAQ::where('id', $id)->update([
                    'pertanyaan' => $request->pertanyaan,
                    'jawaban' => $request->jawaban,
                    'faq_kategori_id' => $request->faq_kategori_id,
                ]);

                return redirect()->route('faq.index')->with([
                'reload' => true,
                'success' => 'FAQ berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {

                return redirect()->route('faq.index')->with(['reload'=> true, 'error' => 'FAQ gagal
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
            $faq = FAQ::find($id);
            $faq->delete();

            return redirect()->route('faq.index')->with([
            'reload' => true,
            'success' => 'FAQ berhasil dihapus!',
            ]);
        } catch (\Throwable $th) {

            return redirect()->route('faq.index')->with(['reload'=> true, 'error' => 'FAQ gagal
            dihapus!']);
        }
    }
}
