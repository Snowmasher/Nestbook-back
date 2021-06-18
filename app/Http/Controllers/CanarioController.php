<?php

namespace App\Http\Controllers;

use App\Models\Canario;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CanarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource by User.
     *
     * @return \Illuminate\Http\Response
     */
    public function byUser(int $id_user)
    {
        $ret = Canario::where('id_usuario', '=', $id_user )->get();

        return json_decode($ret);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Canario::create(array(
            "num_anilla" => $request[0]['num_anilla'],
            "num_anilla_padre" => $request[0]['num_anilla_padre'],
            "num_anilla_madre" => $request[0]['num_anilla_madre'],
            "url_img" => $request[0]['url_img'],
            "id_usuario" => $request[0]['id_usuario'],
            "sexo" => $request[0]['sexo'],
            "fecha_nacimiento" => $request[0]['fecha_nacimiento'],
        ));

    return response()->json([
        'message' => 'success',
        'status' => 201
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function show(int $id_canario)
    {
        $ret = Canario::where('id', '=', $id_canario )->get();

        return json_decode($ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $canario = new Canario();

        $canario = Canario::where('id', '=', $request[0]['id'])->first();

        $canario->sexo = $request[0]['sexo'];
        $canario->url_img = $request[0]['url_img'];

        $canario->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function intercambio(Request $request)
    {
        Canario::where('id', '=', $request[0]['id_canario'])->update(array('id_usuario' => $request[0]['id_user']));

        Notificacion::destroy($request[0]['id']);

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canario  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($canario)
    {
        $rows = Canario::where('id', '=', $canario);

        $rows->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
