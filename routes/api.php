<?php

use App\Http\Controllers\CanarioController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UserController;
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

Route::get('/usersByAsoc/{id_asoc}', [UserController::class, 'usersByAsoc']);

Route::get('/getMods', [UserController::class, 'getMods']);

Route::get('/asociacion/getAll', [AsociacionController::class, 'index']);

Route::get('/asociacion/{id_asoc}', [AsociacionController::class, 'asociacion']);

Route::get('/canario/user/{id_user}', [CanarioController::class, 'byUser']);

Route::get('/posts/{id_asocciacion}', [PublicacionController::class, 'index']);
