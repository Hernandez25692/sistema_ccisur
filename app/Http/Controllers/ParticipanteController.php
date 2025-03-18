<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacion;
use App\Models\Participante;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     // Listar participantes de una capacitación
    public function index($capacitacionId)
    {
        $capacitacion = Capacitacion::with('participantes')->findOrFail($capacitacionId);
        return view('participantes.index', compact('capacitacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($capacitacionId)
    {
        //
        $capacitacion = Capacitacion::findOrFail($capacitacionId);
        return view('participantes.create', compact('capacitacion'));
    }

    /**
     * Store a newly created resource in storage.
     */

     // Guardar un nuevo participante
    public function store(Request $request)
    {
         // Validar los datos del formulario
         $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'capacitacion_id' => 'required|exists:capacitaciones,id',
        ]);

        Participante::create($request->all());

        return response()->json(['message' => 'Participante agregado exitosamente.']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
