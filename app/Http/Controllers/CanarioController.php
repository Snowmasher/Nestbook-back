<?php

namespace App\Http\Controllers;

use App\Models\Canario;
use App\Models\User;
use Illuminate\Http\Request;

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
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function show(Canario $canario)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function edit(Canario $canario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canario $canario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canario  $canario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canario $canario)
    {
        //
    }
}
