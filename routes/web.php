<?php

use App\Http\Controllers\{AdminController, PageController, RuanganController, SaranaPrasaranaController, PetunjukController};
use App\Models\Sarpras;
use Illuminate\Support\Facades\Route;

// (urg hidde dulu yaaa)
Route::get('/api', [PageController::class, 'index']);
Route::post('/getRuangan', [RuanganController::class, 'getRuangAjax']);
Route::post('/getSarpras', [SaranaPrasaranaController::class, 'getSarprasAjax']);
Route::get('/room/{id}/show', [PageController::class, 'show']);
Route::get('/landingpage', 'HomeController@index')->name('landingpage');

/*
|--------------------------------------------------------------------------
| Admin CRUD (Chandra)
|--------------------------------------------------------------------------
 */

// (ini route login baru auth)
Route::post('/', 'AdminController@login')->name('login');
Route::get('/', 'AdminController@index2')->name('login');

// Auth Basic Navigation
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {return view('home');});
    Route::get('/register', 'AdminController@register');
    Route::post('/logout', 'AdminController@logout')->name('logout');
});
// CRUD User : API
Route::get('/home', 'AdminController@index')->name('home');
Route::get('/petunjuk', [PetunjukController::class, 'index'])->name('petunjuk');
Route::get('/register', [AdminController::class, 'register']);
Route::post('users/register/setOpenCloseRegist', 'api\RegisterController@statement');

// CRUD Jadwal
Route::get('/jadwal', 'JadwalController@index')->name('jadwal');
Route::get('/jadwal/create', 'JadwalController@create')->name('jadwal.create');
Route::post('/jadwal/create', 'JadwalController@store')->name('jadwal.store');
Route::get('/jadwal/edit/{id}', 'JadwalController@edit')->name('jadwal.edit');
Route::patch('/jadwal/edit/{id}', 'JadwalController@update')->name('jadwal.update');
Route::delete('/jadwal/delete/{id}', 'JadwalController@destroy')->name('jadwal.destroy');

// CRUD User
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/create', 'UsersController@store')->name('users.store');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::patch('/users/edit/{id}', 'UsersController@update')->name('users.update');
Route::delete('users/delete/{id}', 'UsersController@destroy')->name('users.destroy');

// CRUD Petunjuk
Route::get('/petunjuk','PetunjukController@index')->name('petunjuk');
Route::get('/petunjuk/create','PetunjukController@create')->name('petunjuk.create');
Route::post('/petunjuk/create','PetunjukController@store')->name('petunjuk.store');
Route::get('/petunjuk/edit/{id}','PetunjukController@edit')->name('petunjuk.edit');
Route::patch('/petunjuk/edit/{id}','PetunjukController@update')->name('petunjuk.update');
Route::delete('petunjuk/delete/{id}','PetunjukController@destroy')->name('petunjuk.destroy');


/*
|--------------------------------------------------------------------------
| Ruangan Routes
|--------------------------------------------------------------------------
 */
Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
Route::post('/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::patch('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
Route::get('materi', [PageController::class, 'showUploadMateri']);

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
