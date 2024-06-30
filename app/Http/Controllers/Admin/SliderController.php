<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::first();
        $itemSlider = Slider::all();
        $tableData = Slider::all();
        return view('dashboard.admin.kelola-slider.slider', compact('slider', 'itemSlider', 'tableData'));
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
            'judul' => ['required', 'max:25'],
            'deskripsi' => ['required', 'max:30'],
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $filename = '';
                $slider = new Slider();
                $slider->judul = $request->judul;
                $slider->deskripsi = $request->deskripsi;
                if ($request->hasFile('gambar')) {
                    $file = $request->file('gambar');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs('public/uploads/admin/slider/', $filename);
                    $slider->gambar = $filename;
                }
                $slider->save();

                toastr()->success('Slider berhasil ditambahkan!', 'Sukses');
                return redirect()->route('slider.index');
            } catch (\Throwable $th) {
                toastr()->error('Slider gagal ditambahkan!', 'Gagal!');
                return redirect()->route('slider.index');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'max:25'],
            'deskripsi' => ['required', 'max:30'],
            'gambar' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'errors' => $validator->errors()->toArray()]);
        } else {
            try {
                $slider = Slider::find($id);
                if (!$slider) {
                    toastr()->error('Data tidak ditemukan!', 'Gagal!');
                    return redirect()->route('slider.index');
                }
                $slider->judul = $request->judul;
                $slider->deskripsi = $request->deskripsi;

                $path = 'public/uploads/admin/slider/';
                $filename = '';
                if ($request->hasFile('gambar')) {
                    Storage::delete($path . '' . $slider->gambar);
                    $file = $request->file('gambar');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->storeAs($path, $filename);
                    $slider->gambar = $filename;
                } else {
                    $slider->gambar = $request->gambarOld;
                }
                $slider->save();

                toastr()->success('Slider berhasil diupdate!', 'Sukses');
                return redirect()->route('slider.index');
            } catch (\Throwable $th) {
                toastr()->error('Slider gagal diupdate!', 'Gagal!');
                return redirect()->route('slider.index');
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
        $slider = Slider::find($id);
        $path = 'public/uploads/admin/slider/';
        try {
            if ($slider->gambar) {
                Storage::delete($path . '' . $slider->gambar);
            }
            $slider->delete();
            toastr()->success('Slider berhasil dihapus!', 'Sukses');
            return redirect()->route('slider.index');
        } catch (\Throwable $th) {
            toastr()->error('Slider gagal dihapus!', 'Gagal!');
            return redirect()->route('slider.index');
        }
    }
}
