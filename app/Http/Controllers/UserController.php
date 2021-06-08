<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $user)
    {

            User::create(array(
                "name" => $user[0]['name'],
                "real_name" => $user[0]['real_name'],
                "id_asociacion" => $user[0]['id_asociacion'],
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMod(Request $user)
    {

            User::create(array(
                "name" => $user[0]['name'],
                "real_name" => $user[0]['real_name'],
                "id_asociacion" => $user[0]['id_asociacion'],
                "rol" => 'M',
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
    public function destroy(User $user)
    {
        User::where('id', '=', $user[0]['id'])->delete();
    }
}
