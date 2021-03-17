<?php

use App\Http\Controllers\{PageController, RuanganController, SaranaPrasaranaController};
use App\Models\Sarpras;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::post('/getRuangan', [RuanganController::class, 'getRuangAjax']);
Route::post('/getSarpras', [SaranaPrasaranaController::class, 'getSarprasAjax']);
Route::get('/room/{id}/show', [PageController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Ruangan Routes
|--------------------------------------------------------------------------
*/

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
Route::get('/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::patch('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
Route::post('/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');

/*
|--------------------------------------------------------------------------
| Sarana Prasarana Routes
|--------------------------------------------------------------------------
*/

Route::get('/sarpras', [SaranaPrasaranaController::class, 'index'])->name('sarpras.index');
Route::get('/sarpras/create', [SaranaPrasaranaController::class, 'create'])->name('sarpras.create');
Route::post('/sarpras', [SaranaPrasaranaController::class, 'store'])->name('sarpras.store');
Route::get('/sarpras/{id}/edit', [SaranaPrasaranaController::class,'edit'])->name('sarpras.edit');
Route::patch('/sarpras/{id}', [SaranaPrasaranaController::class,'update'])->name('sarpras.update');
Route::delete('/sarpras/{id}',[SaranaPrasaranaController::class,'destroy'])->name('sarpras.destroy');
