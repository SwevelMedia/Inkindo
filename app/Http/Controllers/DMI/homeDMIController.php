<?php

namespace App\Http\Controllers\DMI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class homeDMIController extends Controller
{
    public function populer()
    {
        $dmiResponse = Http::asForm()
            ->post('https://estimator.id/dev_msib/server/api/getProdukPopuler')
            ->json()['data'];
    
        // Batasi data menjadi 4
        // $limitedData = array_slice($dmiResponse, 0, 4);
        // return response()->json($limitedData);
        // return view('DMI.search-product', compact('limitedData'));
    }
}
