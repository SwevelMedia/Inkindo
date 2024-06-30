<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HubungiKami;
use App\Models\KategoriGallery;
use App\Models\KategoriHubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriHubungiKami::all();
        $contact = HubungiKami::with('kategori')->get();
        return view('dashboard.admin.kelola-pesan.pesan', compact('contact', 'kategori'));
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
        $contact = HubungiKami::findOrFail($id);
        // dd($contact);
        return view('dashboard.admin.kelola-pesan.show-pesan', compact('contact'));

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
        $hubungi = HubungiKami::find($id);
        $hubungi->status = 1;
        $hubungi->update();
        // return redirect()->back();
        return redirect()->route('hubungi-kami.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $pesan = HubungiKami::find($id);
        try {
            $pesan->delete();
            toastr()->success('pesan berhasil dihapus dihapus!', 'Sukses');
            return redirect()->route('hubungi-kami.index');
        } catch (\Throwable $th) {
            toastr()->error('pesan gagal dihapus!', 'Gagal!');
            return redirect()->route('hubungi-kami.index');
        }
    }

}
