<?php

use App\Http\Controllers\CanarioController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UserController;
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

// Usuarios

Route::get('/user', '\App\Http\Controllers\UserController@user')->middleware('auth:api');

Route::get('/user/{id}', [UserController::class, 'show']);

Route::post('/user/create', [UserController::class, 'store']);

Route::put('/user/update', [UserController::class, 'update']);

Route::put('/user/updateMod', [UserController::class, 'updateMod']);

Route::post('/user/createMod', [UserController::class, 'storeMod']);

Route::get('/usersByAsoc/{id_asoc}', [UserController::class, 'usersByAsoc']);

Route::get('/getMods', [UserController::class, 'getMods']);

// Asociaciones

Route::post('/asociacion/create', [AsociacionController::class, 'store']);

Route::put('/asociacion/update', [AsociacionController::class, 'update']);

Route::get('/asociacion/getAll', [AsociacionController::class, 'index']);

Route::get('/asociacion/{id_asoc}', [AsociacionController::class, 'asociacion']);

// Canarios

Route::post('/canario/create', [CanarioController::class, 'store']);

Route::put('/canario/update', [CanarioController::class, 'update']);

Route::get('/canario/user/{id_user}', [CanarioController::class, 'byUser']);

Route::get('/canario/{canario}', [CanarioController::class, 'show']);

// Publicaciones

Route::post('/posts/create', [PublicacionController::class, 'store']);

Route::put('/posts/update', [PublicacionController::class, 'update']);

Route::get('/posts/{id_asocciacion}', [PublicacionController::class, 'index']);
