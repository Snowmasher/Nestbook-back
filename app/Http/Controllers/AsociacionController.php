<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsocInfoBarRequest;
use App\Models\Asociacion;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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

    public function asociacion($id_asoc) {

        $asociaciones = Asociacion::All();

        foreach ($asociaciones as $asoc) {
            if ($asoc['id'] == $id_asoc) {
                return Asociacion::find($id_asoc);
            }
            else{
                return -1;
            }
        }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asociacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asociacion $asociacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asociacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asociacion $asociacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asociacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asociacion $asociacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asociacion  $asociacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asociacion $asociacion)
    {
        //
    }
}
