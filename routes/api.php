<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', 'api\RegisterController@register');
Route::post('login', 'AuthController@login');

Route::group(["middleware"=> "jwt.auth"], function(){
Route::post('logout', 'AuthController@logout');
});

Route::post('refresh', 'AuthController@refresh');

Route::group(['middleware'=> 'api.role:guru'], function() {
    Route::post('GuruSchedule', 'api\GuruInteractionController@GuruSchedule');
});
Route::patch('upload/{id}', 'api\UploadController@uploadImageDecoded');
Route::get('get-image', 'api\UploadController@getPhoto');
