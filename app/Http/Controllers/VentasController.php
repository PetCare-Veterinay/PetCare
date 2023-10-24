<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas = Ventas::all();
        return response()->json($ventas);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
    
            'Fecha' => 'required',
            'Precio_Total' => 'required',
            
        ]);

        // Crea una nueva venta 

        $ventas = new Ventas();
        $ventas->Fecha = $request->input('Fecha');
        $ventas->Precio_Total = $request->input('Precio_Total');
        $ventas->save();

        $data=[
            'message'=>'Venta creada correctamente',
            'ventas'=>$ventas
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
        $respuesta= ventas::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ventas = ventas::find($id);
        if (isset($ventas)) {
            return response()->json([
                'data' => $ventas,
                'message' => 'Venta encotrada',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Busca la venta por ID
        $ventas = ventas::find($id);
    
        if (isset($ventas)) {
            $ventas->id = $request->input('id');
            $ventas->Fecha = $request->input('Fecha');
            $ventas->Precio_total = $request->input('Precio_Total');
            $ventas->save();
            return response()->json([
                'message' => 'Venta Actualizada Correctamente',
                'ventas' => $ventas,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Venta no encontrada',
            ]);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventas = Ventas::find($id);
        if (isset($producto)) {
            $ventas->delete();
            return response()->json([
                'data' => $ventas,
                'message' => 'Venta eliminada',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Venta no encotrada',
            ]);
        }
    }
}


