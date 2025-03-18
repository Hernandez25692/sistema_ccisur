<?php

namespace App\Http\Controllers;
use App\Models\Capacitacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                // Obtener todas las capacitaciones con sus participantes
                $capacitaciones = Capacitacion::with('participantes')->get();

                // Pasar los datos a la vista
                return view('capacitaciones.index', compact('capacitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // Mostrar el formulario para cargar la plantilla
     public function plantilla($capacitacionId)
{
    $capacitacion = Capacitacion::findOrFail($capacitacionId);
        return view('capacitaciones.plantilla', compact('capacitacion'));
}

// Guardar la plantilla, firma y otros datos
public function guardarPlantilla(Request $request, $capacitacionId)
{
    // Validar los datos del formulario
    $request->validate([
        'plantilla' => 'required|mimes:pdf',
        'firma' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'instructor' => 'required|string|max:255',
        'cargo' => 'required|string|max:255',
    ]);

    // Guardar la plantilla en el servidor
    $plantillaPath = $request->file('plantilla')->store('plantillas');

    // Guardar la firma en el servidor
    $firmaPath = $request->file('firma')->store('firmas');

    // Guardar los datos en la base de datos
    $capacitacion = Capacitacion::findOrFail($capacitacionId);
    $capacitacion->plantilla = $plantillaPath;
    $capacitacion->firma = $firmaPath;
    $capacitacion->instructor = $request->input('instructor');
    $capacitacion->cargo = $request->input('cargo');
    $capacitacion->save();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('capacitaciones.index')->with('success', 'Plantilla y firma cargadas exitosamente.');
}


    public function create()
    {
        return view('capacitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Guardar la nueva capacitación
    public function store(Request $request)
    {
         // Validar los datos del formulario
         $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
        ]);

        // Crear la nueva capacitación
        Capacitacion::create($request->all());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('capacitaciones.index')->with('success', 'Capacitación registrada exitosamente.');
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

     //Este método muestra el formulario para editar una capacitación.
    public function edit(string $id)
    {
        $capacitacion = Capacitacion::findOrFail($id);
        return view('capacitaciones.edit', compact('capacitacion'));
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

     //Este método elimina una capacitación.
    public function destroy(string $id)
    {
        $capacitacion = Capacitacion::findOrFail($id);
        $capacitacion->delete();
    
        return redirect()->route('capacitaciones.index')->with('success', 'Capacitación eliminada exitosamente.');
    }
}
