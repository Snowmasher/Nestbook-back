<?php

use App\Http\Controllers\CanarioController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificacionController;
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

Route::get('/user/searchAll', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/userByName/{name}', [UserController::class, 'showByName']);

Route::post('/user/create', [UserController::class, 'store']);

Route::put('/user/update', [UserController::class, 'update']);

Route::put('/user/updateMod', [UserController::class, 'updateMod']);

Route::post('/user/createMod', [UserController::class, 'storeMod']);

Route::get('/usersByAsoc/{id_asoc}', [UserController::class, 'usersByAsoc']);

Route::get('/getMods', [UserController::class, 'getMods']);

Route::get('/user/getDifferents/{id}', [UserController::class, 'differents']);

Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

Route::delete('/user/deleteMod/{id}', [UserController::class, 'destroyMod']);

// Asociaciones

Route::post('/asociacion/create', [AsociacionController::class, 'store']);

Route::put('/asociacion/update', [AsociacionController::class, 'update']);

Route::get('/asociacion/getAll', [AsociacionController::class, 'index']);

Route::get('/asociacion/{id_asoc}', [AsociacionController::class, 'show']);

Route::delete('/asociacion/delete/{id}', [AsociacionController::class, 'destroy']);


// Canarios

Route::post('/canario/create', [CanarioController::class, 'store']);

Route::put('/canario/update', [CanarioController::class, 'update']);

Route::put('/canario/intercambio', [CanarioController::class, 'intercambio']);

Route::get('/canario/user/{id_user}', [CanarioController::class, 'byUser']);

Route::get('/canario/{canario}', [CanarioController::class, 'show']);

Route::delete('/canario/delete/{id}', [CanarioController::class, 'destroy']);


// Publicaciones

Route::post('/posts/create', [PublicacionController::class, 'store']);

Route::put('/posts/update', [PublicacionController::class, 'update']);

Route::get('/posts/{id_asocciacion}', [PublicacionController::class, 'index']);

Route::get('/posts/show/{id}', [PublicacionController::class, 'show']);

Route::delete('/posts/delete/{id}', [PublicacionController::class, 'destroy']);

// Notificaciones

Route::get('/notificacionByUser/{id}', [NotificacionController::class, 'index']);

Route::get('/notificacion/{id}', [NotificacionController::class, 'show']);

Route::post('/notificacion/create/user', [NotificacionController::class, 'storeUser']);

Route::post('/notificacion/create/intercambio', [NotificacionController::class, 'storeIntercambio']);

Route::delete('/notificacion/delete/{id}', [NotificacionController::class, 'destroy']);


