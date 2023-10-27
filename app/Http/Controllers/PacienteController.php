<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->validate([
    
            'Nombre' => 'required|string',
            'Especie' => 'required|string',
            'Raza'=>'required|string',
            'Fecha_de_nacimiento'=>'required|string',
            'Genero'=>'required|string',
            'idCliente'=>'required|integer',
            
        ]);

        // Crea un nuevo cliente

        $paciente = new Paciente();
        $paciente->Nombre = $request->input('Nombre');
        $paciente->Especie = $request->input('Especie');
        $paciente->Raza = $request->input('Raza');
        $paciente->Fecha_de_nacimiento = $request->input('Fecha_de_nacimiento');
        $paciente->Genero = $request->input('Genero');
        $paciente->idCliente = $request->input('idCliente');
        $paciente->save();

        $data=[
            'message'=>'Patient successfully created',
            'paciente'=>$paciente
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
        $inputs = $request  ->input();
        $respuesta= Paciente::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $id)
    {
        //
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json(['message' => 'Paciente not found']);
        }

        return response()->json($paciente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id); // Reemplaza 'User' con el modelo de tus clientes
        return view('Pacientes.UpPaciente', ['paciente' => $paciente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $e = Paciente::find($id);
        if (isset($e)) {
            $e->Nombre = $request->Nombre;
            $e->Especie = $request->Especie;
            $e->Raza = $request->Raza; 
            $e->Fecha_de_nacimiento = $request;
            $e->Genero = $request->Genero;
            
            return $e->save();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'No existe el paciente'
            ]);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
        $paciente->delete();
        return response()->json(['message' => 'Patient eliminated']);
    }
}