<?php

use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\PublicacionController;
use App\Models\User;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', '\App\Http\Controllers\UserController@user')->middleware('auth:api');

Route::post('/register', '\App\Http\Controllers\UserController@register');

Route::get('/asociacion/{id_asoc}', [AsociacionController::class, 'asociacion']);

Route::get('/posts', [PublicacionController::class, 'index']);
