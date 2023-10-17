<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Diagnostico::all();
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
    
            'Vacunas' => 'required',
            'Examenes_Laboratorio' => 'required',
            'Recomendaciones'=>'required',
            'Plan_Seguimiento' => 'email',
            'Enfermedades'=>'required',
            'idTratamiento'=>'required'
            
        ]);

        // Crea un nuevo cliente

        $diagnostico = new Diagnostico();
        $diagnostico->Vacunas = $request->input('Vacunas');
        $diagnostico->Examenes_Laboratorio = $request->input('Examenes_Laboratorio');
        $diagnostico->Recomendaciones = $request->input('Recomendaciones');
        $diagnostico->Plan_Seguimiento = $request->input('Plan_Seguimiento');
        $diagnostico->Enfermedades = $request->input('Enfermedades');
        $diagnostico->idTratamiento = $request->input('idTratamiento');
        $diagnostico->save();

        $data=[
            'message'=>'client created successfully',
            'diagnostico'=>$diagnostico
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
        $respuesta= Diagnostico::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e=Diagnostico::find($id);
        if(isset($e)){
            return response ()->json([
                'data'=>$e,
                'message'=>" Diagnostico encontrado",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnostico $diagnostico)
    {
        //
    }
}
