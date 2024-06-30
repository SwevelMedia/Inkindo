<?php

namespace App\Http\Controllers\DMI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class DMIController extends Controller
{
    public function home()
    {
        $getDataPopuler = Http::get(env('DMI_PRODUK_POPULER'));
        $getDataRekomendasi = Http::asForm()->post(env('DMI_PRODUK_POPULER'), [
            'page' => 1,
            'page_limit' => 12,
        ]);
        $getDataTerbaru = Http::get(env('DMI_PRODUK_TERBARU'));
        $getDataAllSuplier = Http::get(env('DMI_PRODUK_SUPLIER'));

        $dataPopuler = $getDataPopuler->json()['data'];
        $dataRekomendasi = $getDataRekomendasi->json()['data'];
        $dataTerbaru = $getDataTerbaru->json()['data'];
        $dataAllSuplier = $getDataAllSuplier->json()['data'];

        return view('DMI.search-product', compact('dataPopuler', 'dataTerbaru', 'dataAllSuplier', 'dataRekomendasi'));
    }

    public function produk()
    {
        $getDataMerk = Http::GET(env('DMI_PRODUK_MERK'));
        $getDataWilayah = Http::GET(env('DMI_PRODUK_WILAYAH'));
        $getDataKategori = Http::GET(env('DMI_PRODUK_KATEGORI'));
        $getProdukPopuler = $response = Http::asForm()->post(env('DMI_PRODUK_POPULER'), [
            'page' => 1,
            'page_limit' => 9,
        ]);

        // dd($getDataWilayah->json());
        // return response($getProdukPopuler->json());

        $dataMerk = $getDataMerk->json()['data'];
        $dataWilayah = $getDataWilayah->json()['data'];
        $dataKategori = $getDataKategori->json();
        $produkPopuler = $getProdukPopuler->json()['data'];

        return view('DMI.product.product', compact('dataMerk', 'dataWilayah', 'dataKategori', 'produkPopuler'));
    }

    public function produkPopuler(Request $request)
    {
        $getProdukPopuler = Http::asForm()->post(env('DMI_PRODUK_POPULER'), [
            'page' => $request->page,
            'page_limit' => $request->page_limit,
        ]);
        $produkPopuler = $getProdukPopuler->json();

        return response()->json($produkPopuler);
    }

    public function detailProduk($id)
    {
        $getDataDetailProduk = Http::asForm()->post(env('DMI_PRODUK_DETAIL'), [
            'id_produk' => $id,
        ]);
        $dataDetailProduk = $getDataDetailProduk->json()['data']['data'];
        $getProdukPopuler = $response = Http::asForm()->post(env('DMI_PRODUK_POPULER'), [
            'page' => 1,
            'page_limit' => 9,
        ]);
        $produkPopuler = $getProdukPopuler->json()['data'];

        return view('DMI.product.detail-product', compact('dataDetailProduk', 'produkPopuler'));
    }
    public function filterProduk(Request $request)
    {
        $params = [
            "keyword"=> $request->keyword,
            "merk" => json_encode($request->merk),
            "kategori" => json_encode($request->kategori),
            "harga_start" => $request->harga_start,
            "harga_end" => $request->harga_end,
            "wilayah" => json_encode($request->wilayah),
            "page" => $request->page,
            "page_limit" => $request->page_limit,
            "order_by" => $request->harga_dasar,
        ];
        if ($request->order_rule) {
           $params["order_rule"] = $request->order_rule;
           $params["order_by"] = $request->order_by;
        }
        $getFilterPorduk = Http::asForm()->post(env('DMI_PRODUK_FILTER'),$params);
        
        return response($getFilterPorduk);
    
    }

    public function aboutUs()
    {
        $getDataAllSuplier = Http::get(env('DMI_PRODUK_SUPLIER'));
        $dataAllSuplier = $getDataAllSuplier->json()['data'];

        return view('DMI.about-us', compact('dataAllSuplier'));
    }

    public function suplier()
    {
        return view('DMI.suplier.suplier');
    }

    public function dataSuplier(Request $request)
    {
        $getDataAllSuplier = Http::asForm()->post(env('DMI_PRODUK_SUPLIER'), ['page' => $request->page, 'page_limit' => 9]);
        //   $dataAllSuplier = $getDataAllSuplier->json()['data'];

        return response()->json($getDataAllSuplier->json());
    }

    public function detailSuplier($id)
    {
        $dataSuplier = Http::asForm()->post(env('DMI_SUPLIER_DETAIL'), [
            'id_supplier' => $id,
            'page' => 1,
            'page_limit' => 9,
        ]);
        $dataSuplier = $dataSuplier->json()['data']['data'];
        $dataSuplierDetail = $dataSuplier['supplier'];

        // $cleanedResponse = str_replace("\r\n", "", $dataSuplierDetail['nama_pengguna']);
        // dd($cleanedResponse == "American Standard");
        // dd($dataSuplierDetail['nama_pengguna'] == "American Standard");
        //kategori
        $getDataMerk = Http::GET(env('DMI_PRODUK_MERK'));
        $getDataWilayah = Http::GET(env('DMI_PRODUK_WILAYAH'));
        $getDataKategori = Http::GET(env('DMI_PRODUK_KATEGORI'));

        $dataMerk = $getDataMerk->json()['data'];
        $dataWilayah = $getDataWilayah->json()['data'];
        $dataKategori = $getDataKategori->json();

        $idSuplier = $id;

        return view('DMI.suplier.detail-suplier', compact('dataMerk', 'dataWilayah', 'dataKategori', 'dataSuplierDetail', 'idSuplier'));
    }

    public function produkSuplier(Request $request, $id)
    {
        $dataSuplier = Http::asForm()->post(env('DMI_SUPLIER_DETAIL'), [
            'id_supplier' => $id,
            'page' => $request->page,
            'page_limit' => $request->page_limit,
        ]);
        $dataSuplier = $dataSuplier->json()['data']['data'];
        $dataProductSuplier = $dataSuplier['product'];
        $dataSuplierDetail = $dataSuplier['supplier'];
        // dd($dataProductSuplier);
        return response()->json(['produk' => $dataProductSuplier, 'suplier' => $dataSuplierDetail]);
    }
}
