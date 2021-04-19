<?php

use App\Http\Controllers\{CrudController, AdminController,PageController, RuanganController, SaranaPrasaranaController, RegisterController};
use App\Models\Sarpras;
use Illuminate\Support\Facades\Route;

Route::get('/api', [PageController::class, 'index']);
Route::post('/getRuangan', [RuanganController::class, 'getRuangAjax']);
Route::post('/getSarpras', [SaranaPrasaranaController::class, 'getSarprasAjax']);
Route::get('/room/{id}/show', [PageController::class, 'show']);


/*
|--------------------------------------------------------------------------
| Admin crud (Chandra)
|--------------------------------------------------------------------------
*/
Route::get('/home', 'AdminController@index');
Route::get('/login', 'AdminController@login');
Route::get('/register', 'AdminController@register');
Route::get('/datausers','UsersController@users');
Route::get('/datajadwal','AdminController@datajadwal');
Route::post('/logout', 'AdminController@logout')->name('logout');

Route::get('/crud', [CrudController::class, 'index'])->name('crud');
Route::post('/crud', [CrudController::class, 'store'])->name('crud_matpel');
Route::post('register/setOpenCloseRegist', 'api\RegisterController@statement');
Route::post('/register', 'api\RegisterController@register')->name('regisuser');



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
