<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        // Listar todos los usuarios
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Crear un nuevo usuario
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        // Mostrar un usuario específico
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Actualizar un usuario
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        // Eliminar un usuario
        $user = User::find($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
