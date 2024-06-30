<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Admin\MitraController;
use App\Http\Controllers\Api\Admin\GaleriController;
use App\Http\Controllers\Api\Admin\ProfilController;
use App\Http\Controllers\Api\Admin\AnggotaController;
use App\Http\Controllers\Api\LeadsPublicController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::resources([
    'leads' => LeadsPublicController::class,
]);

Route::middleware(['auth:sanctum', 'user-access-api:admin'])->group(function () {
    // Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::resources([
        'galeri' => GaleriController::class,
    ]);

    Route::resources([
        'anggota' => AnggotaController::class,
    ]);

    Route::resources([
        'profil' => ProfilController::class,
    ]);

    Route::resources([
        'mitra' => MitraController::class,
    ]);
});
