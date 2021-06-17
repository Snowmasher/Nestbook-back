<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Notificacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Display the specified resource.
     *
     * @param  \App\Models\Notificacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function show($id_asoc)
    {

        $asociacion = Notificacion::where('id', '=', $id_asoc)->get();
        $asociacion = json_decode($asociacion);
        return $asociacion;
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
    public function destroy(int $asociacion)
    {
        if ($asociacion !== 1){
            $row = Notificacion::where('id', '=', $asociacion);
        }

        User::where('id_asociacion', '=', $asociacion)->update(['id_asociacion' => 1]);

        $row->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
