<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        // $notificaciones = Notificacion::where('id_to', '=', $id)->get();

        $notificaciones = Notificacion::where('id_to', '=', $id)
        ->where('created_at', '<=', Carbon::today()->addDays(14))->get();

        

        $notificaciones = json_decode($notificaciones);
        return $notificaciones;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $id_mod = Asociacion::where('id', '=', $request[0]['id_asociacion'])->first()->id_mod;

        $id_from = 1;
        $id_to = $id_mod;
        $tipo = 'U';
        $contenido = json_encode($request[0]['contenido']);
        $aceptada = false;

        //dd($contenido);

        Notificacion::create(array(
            "id_from" => $id_from,
            "id_to" => $id_to,
            "tipo" => $tipo,
            "contenido" => $contenido,
            "aceptada" => $aceptada
        ));

        return response()->json([
            'message' => 'success',
            'status' => 201
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeIntercambio(Request $request)
    {

        $id_from = $request[0]['id_from'];
        $id_to = $request[0]['id_to'];
        $tipo = 'I';
        $contenido = $request[0]['contenido'];
        $aceptada = false;

        Notificacion::create(array(
            "id_from" => $id_from,
            "id_to" => $id_to,
            "tipo" => $tipo,
            "contenido" => $contenido,
            "aceptada" => $aceptada
        ));

        return response()->json([
            'message' => 'success',
            'status' => 201
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notificacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $notificacion = Notificacion::where('id', '=', $id)->get();
        $notificacion = json_decode($notificacion);
        return $notificacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $asociacion = new Notificacion();

        $asociacion = Notificacion::where('id', '=', $request[0]['id'])->first();

        $asociacion->nombre = $request[0]['nombre'];
        $asociacion->id_mod = $request[0]['id_mod'];
        $asociacion->url_img = $request[0]['url_img'];

        $asociacion->save();

        // Cambiamos el id_asociacion al moderador elegido

        $user = User::where('id', '=', $request[0]['id_mod'])->first();

        $user->id_asociacion = $request[0]['id'];

        $user->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notificacion  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $notificacion)
    {
        
        $row = Notificacion::where('id', '=', $notificacion);

        $row->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
