<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeadsPublicResource;

class LeadsPublicController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::with('user')->get();
        $emailTotal = Anggota::count();
        $phoneTotal = Anggota::count('no_hp');
        $institutes = Anggota::select('perusahaan')->get();   
        $institutesData = json_decode($institutes, true);
        $institutesDataResult = [];
        foreach ($institutesData as $key => $value) {
         array_push($institutesDataResult, $institutesData[$key]['perusahaan']);
        }

         array_unshift($institutesDataResult, '-');
        //  $institutesDataResult = json_encode($institutes, true);

        $anggotasFiltered = LeadsPublicResource::collection($anggotas);
        return response()->json(['status' => 200, 'error' => null, 'data' => ['total' => ['email' => $emailTotal, 'phone' => $phoneTotal], 
        'category'=>['-'],
        'institute'=>$institutesDataResult,
        'leads' => $anggotasFiltered]]);
    }
}
