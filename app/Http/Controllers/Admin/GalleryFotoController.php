<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class GalleryFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($galleryId)
    {
        $photos = PhotoGallery::where('gallery_id', $galleryId)->get();
        $galeri = Gallery::find($galleryId);
        return view('dashboard.admin.kelola-galeri.galeri-detail', compact('photos', 'galeri'));
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
            'gambar' => 'required',
        ]);
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $photo = new PhotoGallery();
                $photo->gallery_id = $request->input('gallery_id');
                // $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                // $file->storeAs('storage/uploads/admin/galeri/', $filename);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('storage/uploads/admin/galeri/', $filename);

                $photo->nama_foto = $filename;
                $photo->save();
            }
        }
        return redirect()
            ->route('galeri_detail', $request->input('gallery_id'))
            ->with('success', 'Data berhasil ditambahkan');
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
            'gambar' => 'required',
        ]);

        $galeri = PhotoGallery::find($id);
        $oldImages = 'storage/uploads/admin/galeri/' . $galeri->nama_foto;
        if (file_exists($oldImages)) {
            unlink($oldImages);
        }
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_foto = $gambar->getClientOriginalName();
            $gambar->move('storage/uploads/admin/galeri/', $nama_foto);
            $galeri->nama_foto = $nama_foto;
        }
        $galeri->save();
        $galeri_id = $request->input('gallery_id');
        return redirect()
            ->route('galeri_detail', $request->input('gallery_id'))
            ->with('success', 'Galeri berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $galeri = PhotoGallery::find($id);
        $oldImages = 'storage/uploads/admin/galeri/' . $galeri->nama_foto;
        if (file_exists($oldImages)) {
            unlink($oldImages);
        }
        $galeri->delete();
        $galeri_id = $request->input('gallery_id');
        return redirect()
            ->route('galeri_detail', $galeri_id)
            ->with('success', 'Foto berhasil hapus');
    }
}
