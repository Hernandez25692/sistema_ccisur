<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Capacitacion;

class DiplomaController extends Controller
{
    public function generarDiploma($capacitacionId)
    {
        $capacitacion = Capacitacion::with('participantes')->findOrFail($capacitacionId);

        // Generar el PDF
        $pdf = Pdf::loadView('diplomas.index', compact('capacitacion'));

        // Descargar el PDF
        return $pdf->download('diplomas.pdf');
    }
}
