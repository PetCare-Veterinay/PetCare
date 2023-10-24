<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all();
        return response()->json($producto);
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
            'Descripcion' => 'required',
            'Precio'=>'required',
            'Stock' => 'required',
            
        ]);

        // Crea un nuevo producto

        $producto = new Producto();
        $producto->Nombre = $request->input('Nombre');
        $producto->Descripcion = $request->input('Descripcion');
        $producto->Precio = $request->input('Precio');
        $producto->Stock = $request->input('Stock');
        $producto->save();

        $data=[
            'message'=>'Producto creado correctamente',
            'producto'=>$producto
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
        $respuesta= producto::create($inputs);
        return $respuesta;
    }
    
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = producto::find($id);
        if (isset($producto)) {
            return response()->json([
                'data' => $producto,
                'message' => 'Producto encotrado',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $producto = producto::find($id);
        if (isset($producto)) {
            $producto->nombre = $request->input('Nombre');
            $producto->descripcion = $request->input('Descripcion');
            $producto->precio = $request->input('Precio');
            $producto->stock = $request->input('Stock');
            $producto->save();
            return response()->json([
                'message' => 'Producto Actualizado Correctamente',
                'producto' => $producto,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Detalle de venta no encontrado',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = producto::find($id);
        if (isset($producto)) {
            $producto->delete();
            return response()->json([
                'data' => $producto,
                'message' => 'Producto eliminado',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Producto no encotrado',
            ]);
        }
    }
}
