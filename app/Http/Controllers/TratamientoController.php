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
        //
        $tratamiento = Tratamiento::create([
            
        'start_date' => $request->input('start_date'),
        'final_date' => $request->input('final_date'),
        'treatment_name' => $request->input('treatment_name'),
        'medicamento' => $request->input('medicamento'),
        'dose' => $request->input('dose'),
        'duration' => $request->input('duration'),
        'cost' => $request->input('cost'),
        ]);
        return response()->json($tratamiento);
        
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
    public function update(Request $request, Tratamiento $tratamiento)
    {
        //
        $tratamiento->update([
            'start_date' => $request->input('start_date'),
            'final_date' => $request->input('final_date'),
            'treatment_name' => $request->input('treatment_name'),
            'medicamento' => $request->input('medicamento'),
            'dose' => $request->input('dose'),
            'duration' => $request->input('duration'),
            'cost' => $request->input('cost'),
        ])

        return redirect()->route('tratamiento.index')->with('success', 'Updated treatment');
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
        return redirect()->route('tratamiento.index')->with('success', 'Treatment removed');
    }
}
