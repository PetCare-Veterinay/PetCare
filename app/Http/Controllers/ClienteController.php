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
        $inputs = $request  ->input();
        $respuesta= Cliente::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $id)
    {
        //
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Nervice not found']);
        }
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
    public function update(Request $request, $id)

    {
        $e = Cliente::find($id);
        if (isset($e)) {
            $e->Nombre = $request->Nombre;
            $e->Apellido = $request->Apellido;
            $e->Telefono = $request->Telefono; 
            $e->email = $request->email;
            $e->Direccion = $request->Direccion;
            return $e->save();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'No existe el cliente'
            ]);
        }
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
        $cliente->delete();
        return response()->json(['message' => 'Client removed']);
    }      
}