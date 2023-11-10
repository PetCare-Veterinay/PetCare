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
        $respuesta= Producto::create($inputs);
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
        //
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'product not found']);
        }
        return response()->json($producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $e = Producto::find($id);
        if (isset($e)) {
            $e->Nombre = $request->Nombre;
            $e->Descripcion = $request->Descripcion;
            $e->Precio = $request->Precio;
            $e->Stock = $request->Stock; 
            
            return $e->save();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'No existe el Producto'
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
        //
        $servicio->delete();
        return response()->json(['message' => 'Product removed']);
    }
    public function edit($id)
    {
        $producto = Producto::find($id); // Reemplaza 'User' con el modelo de tus clientes
        return view('productos.update', ['producto' => $producto]);
    }
}
