<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use App\Models\User;
use Illuminate\Http\Request;

class AsociacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Asociacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_mod = $request[0]['id_mod'];
        $nombre = $request[0]['nombre'];
        $url_img = $request[0]['url_img'];

        $asoc = Asociacion::create(array(
            "nombre" => $nombre,
            "id_mod" => $id_mod,
            "url_img" => $url_img
        ));

        $last = Asociacion::orderBy('id', 'desc')->first();
        
        $id = $last->id;

        $mod = User::where('id', '=', $id_mod)->first();

        $mod->id_asociacion = $id;

        $mod->save();

        return response()->json([
            'message' => 'success',
            'status' => 201
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asociacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function show($id_asoc)
    {

        $asociacion = Asociacion::where('id', '=', $id_asoc)->get();
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
        $asociacion = new Asociacion();

        $asociacion = Asociacion::where('id', '=', $request[0]['id'])->first();

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
     * @param  \App\Models\Asociacion  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $asociacion)
    {
        if ($asociacion !== 1){
            $row = Asociacion::where('id', '=', $asociacion);
        }

        User::where('id_asociacion', '=', $asociacion)->update(['id_asociacion' => 1]);

        $row->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
