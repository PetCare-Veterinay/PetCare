<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tratamiento = Tratamiento::all();
        return response()->json($tratamiento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
    
            'Fecha_Inicio' => 'required',
            'Fecha_Final' => 'required',
            'Nombre_tratamiento'=>'required',
            'Medicamento'=>'required',
            'Dosis'=>'required',
            'Duracion'=>'required',
            'Costo'=>'required',
            
        ]);

        // Crea un nuevo cliente

        $tratamiento = new Tratamiento();
        $tratamiento->Fecha_Inicio = $request->input('Fecha_Inicio');
        $tratamiento->Fecha_Final = $request->input('Fecha_Final');
        $tratamiento->Nombre_tratamiento = $request->input('Nombre_tratamiento');
        $tratamiento->Medicamento = $request->input('Medicamento');
        $tratamiento->Dosis = $request->input('Dosis');
        $tratamiento->Duracion = $request->input('Duracion');
        $tratamiento->Costo = $request->input('Costo');
        $tratamiento->save();

        $data=[
            'message'=>'Successfully created treatment',
            'tratamiento'=>$tratamiento
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
        $respuesta= Tratamiento::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $id)
    {
        //
        $tratamiento = Tratamiento::find($id);
        if (!$tratamiento) {
            return response()->json(['message' => 'Treatment not found']);
        }
        return response()->json($tratamiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $e = Tratamiento::find($id);
        if (isset($e)) {
            $e->Fecha_Inicio = $request->Fecha_Inicio;
            $e->Fecha_Final = $request->Fecha_Final;
            $e->Nombre_tratamiento = $request->Nombre_tratameinto; 
            $e->Medicamento = $request->Medicamento;
            $e->Dosis = $request->Dosis;
            $e->Duracion = $request->Duracion;
            $e->Costo = $request->Costo;   
            
            return $e->save();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'No existe el Tratamiento'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tratamiento $tratamiento)
    {
        //
        $tratamiento->delete();
        return response()->json(['message' => 'Treatment removed']);
    }
}
