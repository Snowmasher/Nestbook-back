<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_asoc)
    {
        $ret = Publicacion::where('id_asociacion', '=', $id_asoc )->orderBy('created_at', 'desc')->get();

        return json_decode($ret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Publicacion::create(array(
            "id_asociacion" => $request[0]['id_asociacion'],
            "titulo" => $request[0]['titulo'],
            "contenido" => $request[0]['contenido']
        ));

    return response()->json([
        'message' => 'success',
        'status' => 201
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ret = Publicacion::where('id', '=', $id)->get();

        return json_decode($ret);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacion $publicacion)
    {
        //
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $publicacion = new Publicacion();

        $publicacion = Publicacion::where('id', '=', $request[0]['id'])->first();

        $publicacion->titulo = $request[0]['titulo'];
        $publicacion->contenido = $request[0]['contenido'];
        $publicacion->id_asociacion = $request[0]['id_asociacion'];

        $publicacion->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicacion  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($publicacion)
    {
        $rows = Publicacion::where('id', '=', $publicacion);

        $rows->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
