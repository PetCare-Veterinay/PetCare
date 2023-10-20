<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
        
    public function index()
    {
        //
        $servicio = Servicio::all();
        return response()->json($servicio);
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
            'Description' => 'required',
            'Precio'=>'required',
            
        ]);

        // Crea un nuevo cliente

        $servicio = new Servicio();
        $servicio->nombre = $request->input('Nombre');
        $servicio->Descripcion = $request->input('Descripcion');
        $servicio->Precio = $request->input('Precio');
        $servicio->save();

        $data=[
            'message'=>'service created successfully',
            'servicio'=>$servicio
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
        $respuesta= Servicio::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $id)
    {
        //
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['message' => 'Nervice not found']);
        }
        return response()->json($servicio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $e = Servicio::find($id);
        if (isset($e)) {
            $e->Nombre = $request->Nombre;
            $e->Descripcion = $request->Descripcion;
            $e->Precio = $request->Precio; 
            
            return $e->save();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'No existe el servicio'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
        $servicio->delete();
        return response()->json(['message' => 'Service removed']);
    }
}
