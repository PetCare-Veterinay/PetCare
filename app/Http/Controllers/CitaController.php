<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cita = Cita::all();
        return response()-> json($cita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
    
            'Motivo' => 'required',
            'Fecha' => 'required',
            'Hora'=>'required',
            'idPaciente' => 'email',
            'idDiagnostico'=>'required',
            
        ]);

        // Crea una nueva cita

        $cita = new Cita();
        $cita->Motivo = $request->input('Motivo');
        $cita->Fecha = $request->input('Fecha');
        $cita->Hora = $request->input('Hora');
        $cita->idPaciente = $request->input('idPaciente');
        $cita->idDiagnostico = $request->input('idDiagnostico');
        $cita->save();

        $data=[
            'message'=>'cita created successfully',
            'cita'=>$cita
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
        $respuesta= Cita::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e=Cita::find($id);
        if(isset($e)){
            return response ()->json([
                'data'=>$e,
                'message'=>" Cita encontrada",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $e = Cita::find($id);
        if (isset($e)) {
            $e->Motivo = $request->Motivo;
            $e->Fecha = $request->Fecha;
            $e->Hora = $request->Hora; 
            $e->idPaciente = $request->idPaciente;
            $e->idDiagnostico = $request->idDiagnostico;
            return $e->save();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'No existe la cita'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e=Cita::find($id);
        if(isset($e)){
            $res=Cita::destroy($id);   
            if($res){
                return response ()->json([
                    'data'=>$e,
                    'message'=>" Cita eliminada",
                ]);
            }
        }
    }
}