<?php

use App\Http\Controllers\Api\PasienController;
use App\Http\Controllers\ConsumeController;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('datamahasiswa',[ConsumeController::class, 'index'])->name('lihat-datamahasiswa');
Route::post('datamahasiswa',[ConsumeController::class, 'store'])->name('tambah-datamahasiswa');
Route::put('datamahasiswa/{id}', [ConsumeController::class, 'update']);
Route::delete('datamahasiswa/{nim}', [ConsumeController::class, 'destroy']);
