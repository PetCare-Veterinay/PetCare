<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Cliente::all();
        return response()->json($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
    
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Telefono'=>'required',
            'email' => 'email',
            'Direccion'=>'required',
            
        ]);

        // Crea un nuevo cliente

        $client = new Cliente();
        $client->nombre = $request->input('Nombre');
        $client->apellido = $request->input('Apellido');
        $client->Telefono = $request->input('Telefono');
        $client->email = $request->input('email');
        $client->Direccion = $request->input('Direccion');
        $client->save();

        $data=[
            'message'=>'client created successfully',
            'client'=>$client
        ];

        return response()->json($data); 
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Telefono' => 'required',
            'email' => 'email',
            'Direccion' => 'required',
        ]);

        $cliente->nombre = $request->input('Nombre');
        $cliente->apellido = $request->input('Apellido');
        $cliente->Telefono = $request->input('Telefono');
        $cliente->email = $request->input('email');
        $cliente->Direccion = $request->input('Direccion');
        $cliente->save();

        return response()->json([
            'message' => 'Cliente actualizado exitosamente',
            'client' => $cliente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
