<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $agenda = Agenda::latest()->paginate(3);
        // Paginator::useBootstrap();
        // return view('dashboard.admin.kelola-agenda.agenda', compact('agenda'));
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
            'kegiatan' => 'nullable',
            'deskripsi' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'tempat' => 'nullable',
            'penyelenggara' => 'nullable',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'link' => '',
        ]);

        $agenda = new Agenda;
        $agenda->kegiatan = $request->kegiatan;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->tanggal = $request->tanggal;
        $agenda->waktu = $request->waktu;
        $agenda->tempat = $request->tempat;
        $agenda->penyelenggara = $request->penyelenggara;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/admin/agenda/', $filename);
            $agenda->poster = $filename;
        }
        $agenda->link = $request->link;
        $agenda->save();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan');
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
            'kegiatan' => '',
            'deskripsi' => '',
            'tanggal' => '',
            'waktu' => '',
            'tempat' => '',
            'penyelenggara' => '',
            'link' => '',
            'poster' => 'max:5120',
        ]);

        $agenda = Agenda::find($id);

        $agenda->kegiatan = $request->kegiatan;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->tanggal = $request->tanggal;
        $agenda->waktu = $request->waktu;
        $agenda->tempat = $request->tempat;
        $agenda->penyelenggara = $request->penyelenggara;
        $agenda->link = $request->link;
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/admin/agenda/', $filename);
            $agenda->poster = $filename;
        }
        $agenda->save();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}
