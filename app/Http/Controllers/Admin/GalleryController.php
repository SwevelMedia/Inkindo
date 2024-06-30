<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use App\Models\Gallery;
use App\Models\KategoriGallery;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = DB::table('galleries')
            ->join('kategori_galleries', 'galleries.kategori_gallery_id', '=', 'kategori_galleries.id')
            ->select('galleries.id', 'galleries.judul', 'galleries.deskripsi', 'galleries.tanggal', 'galleries.kategori_gallery_id', 'kategori_galleries.nama_kategori')
            ->orderBy('galleries.created_at', 'desc')
            ->get();

        // dd($galeri);
        $kategori = KategoriGallery::all();
        return view('dashboard.admin.kelola-galeri.galeri', compact('galeri', 'kategori'));
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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori_gallery_id' => 'required',
            'tanggal' => 'required'
        ]);

        $galeri = new Gallery;
        $galeri->judul = $request->input('judul');
        $galeri->deskripsi = $request->input('deskripsi');
        $galeri->kategori_gallery_id = $request->input('kategori_gallery_id');
        $galeri->tanggal = $request->input('tanggal');
        $galeri->save();

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $photo = new PhotoGallery;
                $photo->gallery_id = $galeri->id;
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/uploads/admin/galeri/', $filename);
                $photo->nama_foto = $filename;
                $photo->save();
            }
        }
        return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan');
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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori_gallery_id' => 'required',
            'tanggal' => 'required'
        ]);
        $galeri = Gallery::find($id);

        if (!$galeri) {
            return redirect()->route('galeri.index')->with('error', 'Data tidak ditemukan');
        }
        $galeri->judul = $request->input('judul');
        $galeri->deskripsi = $request->input('deskripsi');
        $galeri->kategori_gallery_id = $request->input('kategori_gallery_id');
        $galeri->tanggal = $request->input('tanggal');
        $galeri->save();
        return redirect()->route('galeri.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $galeri = Gallery::find($id);

        if (!empty($galeri)) {
            $photos = PhotoGallery::where('gallery_id', $id)->get();

            foreach ($photos as $photo) {
                $gambarPath = public_path('storage/uploads/galeri/') . $photo->nama_foto;

                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
            $galeri->delete();

            return redirect()->route('galeri.index')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->route('galeri.index')->with('error', 'Galeri tidak ditemukan');
    }

}
