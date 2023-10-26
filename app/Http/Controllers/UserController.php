<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

    public function show($id)
    {
        // Mostrar un usuario específico
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Obtener el usuario que se va a actualizar
        $user = User::find($id);

        // Aplicar los cambios solo si los datos pasaron la validación
        $user->name = $request['name'];
        $user->email = $request['email'];
        
        if ($request->has('password')) {
            // Si se proporciona una nueva contraseña, aplicar el hash
            $user->password = Hash::make($request['password']);
        }

        // Guardar los cambios en la base de datos
        $user->save();
        return response()->json($user);
    }

    public function destroy(User $id)
    {
        //
        $id->delete();
        return response()->json(['message' => 'User removed']);
    }  

    public function edit($id)
    {
        $user = User::find($id); // Reemplaza 'User' con el modelo de tus clientes
        return view('users.update', ['user' => $user]);
    }

}
