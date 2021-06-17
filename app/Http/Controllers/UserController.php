<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asociacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function user(Request $request) {
        return $request->user();
    }

    public function usersByAsoc(int $id_asoc) {

        $users = User::where('id_asociacion', '=', $id_asoc)->get();
        $users = json_decode($users);
        return $users;
    }

    public function getMods() {

        $users = User::where('rol', '=', 'M')->get();
        $users = json_decode($users);
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $user)
    {

            User::create(array(
                "name" => $user[0]['name'],
                "real_name" => $user[0]['real_name'],
                "id_asociacion" => $user[0]['id_asociacion'],
                "avatar" => 3,
                "rol" => 'U',
                "email" => $user[0]['email'],
                "password" => Hash::make($user[0]['password']),
            ));

        return response()->json([
            'message' => 'success',
            'status' => 201
        ]);
    }


/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $user
     * @return \Illuminate\Http\Response
     */
    public function storeMod(Request $user)
    {

            User::create(array(
                "name" => $user[0]['name'],
                "real_name" => $user[0]['real_name'],
                "id_asociacion" => $user[0]['id_asociacion'],
                "rol" => 'M',
                "avatar" => 2,
                "email" => $user[0]['email'],
                "password" => Hash::make($user[0]['password']),
            ));

        return response()->json([
            'message' => 'success',
            'status' => 201
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $users = User::where('id', '=', $id)->get();
        $users = json_decode($users);
        return $users;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function showByName(string $name)
    {
        $users = User::where('name', '=', $name)->get();
        $users = json_decode($users);
        return $users;
    }

    /**
     * Display different users of the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function differents(int $id)
    {
        $users = User::where('id', '!=', $id)->get();
        $users = json_decode($users);
        return $users;
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = new User();

        $user = User::where('id', '=', $request[0]['id'])->first();

        $user->name = $request[0]['name'];
        $user->real_name = $request[0]['real_name'];
        $user->id_asociacion = $request[0]['id_asociacion'];
        $user->rol = 'U';
        $user->password = $request[0]['password'];

        $user->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Update the specified mod in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateMod(Request $request)
    {
        $user = new User();

        $user = User::where('id', '=', $request[0]['id'])->first();

        $user->name = $request[0]['name'];
        $user->real_name = $request[0]['real_name'];
        $user->rol = 'M';
        $user->password = Hash::make($request[0]['password']);

        $asociacion = Asociacion::where('id_mod', '=', $request[0]['id'])->first();

        $asociacion->id_mod = 1;

        $asociacion->save();

        $user->save();



        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $rows = User::where('id', '=', $user)->where('rol', '!=', 'A')->where('rol', '!=', 'M');

        $rows->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int User ID $user
     * @return \Illuminate\Http\Response
     */
    public function destroyMod(int $user)
    {

        $row = User::where('id', '=', $user)->where('rol', '!=', 'A')->where('rol', '!=', 'U');

        $id = User::where('id', '=', $user)->first()->id;

        Asociacion::where('id_mod', '=', $id)->update(['id_mod' => 1]);

        $row->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
