<?php

namespace App\Http\Controllers\Admin;

use App\Models\Arsip;
use Illuminate\Http\Request;
use App\Models\ArsipKategori;
use App\Http\Controllers\Controller;
use App\Models\ArsipText;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsip = Arsip::join('arsip_kategoris', 'arsip_kategoris.id', '=', 'arsips.arsip_kategori_id')
            ->select('arsips.*', 'arsip_kategoris.arsip_kategori')
            ->get();
        $kategori = ArsipKategori::all();
        return view('dashboard.admin.kelola-arsip.arsip', compact('arsip', 'kategori'));
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
            'nama_arsip' => 'required',
            'keterangan' => 'required',
            'arsip_kategori_id' => 'required',
            'file_arsip' => 'required|mimes:pdf|max:2048',
            // 'file_arsip' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        }
        try {
            $arsip = new Arsip();
            $arsip->nama_arsip = $request->nama_arsip;
            $arsip->keterangan = $request->keterangan;
            $arsip->arsip_kategori_id = $request->arsip_kategori_id;
            if ($request->hasFile('file_arsip')) {
                $file = $request->file('file_arsip');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->storeAs('public/uploads/admin/arsip/', $filename);
                $arsip->file_arsip = $filename;
            }
            $arsip->save();

            if ($request->hasFile('file_arsip')) {
                $file = $request->file('file_arsip');
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($file);
                $pages = $pdf->getPages();
                $arsip_id = $arsip->id;
                foreach ($pages as $p => $value) {
                    $cleanedString = preg_replace('/[^a-zA-Z0-9 ]/', '', $pages[$p]->getText());
                   $arsipText =  ArsipText::create([
                        'arsip_id' => $arsip_id,
                        'text' => $cleanedString,
                        'halaman' => $p + 1,
                    ]);
                    // dd($arsipText);
                }
            }

            return redirect()->route('arsip.index')->with([
            'reload' => true,
            'success' => 'Regulasi berhasil ditambahkan!',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('arsip.index')->with(['reload'=> true, 'error' => 'Regulasi gagal
            ditambahkan!']);
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
            'nama_arsip' => 'required',
            'keterangan' => 'required',
            'arsip_kategori_id' => 'required',
            'file_arsip' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $arsip = Arsip::find($id);
                $arsip->nama_arsip = $request->nama_arsip;
                $arsip->keterangan = $request->keterangan;
                $arsip->arsip_kategori_id = $request->arsip_kategori_id;

                $path = 'public/uploads/admin/arsip/';
                $filename = '';
                if ($request->hasFile('file_arsip')) {
                    Storage::delete($path . '' . $arsip->file_arsip);
                    $file = $request->file('file_arsip');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs($path, $filename);
                    $arsip->file_arsip = $filename;
                }
                $arsip->save();

                if ($request->hasFile('file_arsip')) {
                    $arsipTextOld = ArsipText::where('arsip_id', $arsip->id);
                    if ($arsipTextOld) {
                        $arsipTextOld->delete();
                    }
                    $file = $request->file('file_arsip');
                    $parser = new \Smalot\PdfParser\Parser();
                    $pdf = $parser->parseFile($file);
                    $pages = $pdf->getPages();
                    foreach ($pages as $p => $value) {
                        ArsipText::create([
                            'arsip_id' => $arsip->id,
                            'text' => $pages[$p]->getText(),
                            'halaman' => $p + 1,
                        ]);
                    }
                }

                return redirect()->route('arsip.index')->with([
                'reload' => true,
                'success' => 'Regulasi berhasil diupdate!',
                ]);
            } catch (\Throwable $th) {
                return redirect()->route('arsip.index')->with(['reload'=> true, 'error' => 'Regulasi gagal
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
        $path = 'public/uploads/admin/arsip/';
        $arsip = Arsip::find($id);

        try {
            if ($arsip->file_arsip) {
                Storage::delete($path . '' . $arsip->file_arsip);
            }
            $arsip->delete();

            return redirect()->route('arsip.index')->with(['reload'=> true, 'success' => 'Regulasi berhasil
            dihapus!']);
        } catch (\Throwable $th) {
            return redirect()->route('arsip.index')->with(['reload'=> true, 'error' => 'Regulasi gagal
            dihapus!']);
        }
    }
}
