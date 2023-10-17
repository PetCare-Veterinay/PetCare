<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalleVenta = DetalleVenta::all();
        return response()->json($detalleVenta);
    }

    public function create(Request $request)
    {
        $request->validate([
            'Cantidad' => 'required',
            'idProducto' => 'required',
            'idServicio' => 'required',
        ]);

        $detalleVenta = new DetalleVenta();
        $detalleVenta->Cantidad = $request->input('Cantidad');
        $detalleVenta->idProducto = $request->input('idProducto');
        $detalleVenta->idServicio = $request->input('idServicio');
        $detalleVenta->save();

        $data = [
            'message' => 'Detalle de venta creado exitosamente',
            'detalleVenta' => $detalleVenta,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $detalleVenta = DetalleVenta::find($id);
        if (isset($detalleVenta)) {
            return response()->json([
                'data' => $detalleVenta,
                'message' => 'Detalle de venta encontrado',
            ]);
        }
    }

    public function store(Request $request)
    {
        $inputs = $request  ->input();
        $respuesta= DetalleVenta::create($inputs);
        return $respuesta;
    }

    public function update(Request $request, $id)
    {
        $detalleVenta = DetalleVenta::find($id);
        if (isset($detalleVenta)) {
            $detalleVenta->Cantidad = $request->input('Cantidad');
            $detalleVenta->idProducto = $request->input('idProducto');
            $detalleVenta->idServicio = $request->input('idServicio');
            $detalleVenta->save();
            return response()->json([
                'message' => 'Detalle de venta actualizado exitosamente',
                'detalleVenta' => $detalleVenta,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Detalle de venta no encontrado',
            ]);
        }
    }

    public function destroy($id)
    {
        $detalleVenta = DetalleVenta::find($id);
        if (isset($detalleVenta)) {
            $detalleVenta->delete();
            return response()->json([
                'data' => $detalleVenta,
                'message' => 'Detalle de venta eliminado',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Detalle de venta no encontrado',
            ]);
        }
    }
}
