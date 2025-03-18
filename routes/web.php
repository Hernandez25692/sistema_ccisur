<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\DiplomaController;


Route::get('/', function () {
    return view('welcome');
});

// Ruta principal
Route::get('/', [CapacitacionController::class, 'index'])->name('capacitaciones.index');



// Ruta para generar el diploma
Route::get('/generar-diploma/{participanteId}', [DiplomaController::class, 'generarDiploma'])->name('generar.diploma');


//NUEVO --------------------------------------------------------------------------------
// Rutas para capacitaciones
Route::resource('capacitaciones', CapacitacionController::class);

// Ruta para generar diplomas
Route::get('/generar-diploma/{capacitacionId}', [DiplomaController::class, 'generarDiploma'])->name('generar.diploma');

// Ruta para agregar participantes
Route::get('/participantes/create/{capacitacionId}', [ParticipanteController::class, 'create'])->name('participantes.create');
Route::post('/participantes', [ParticipanteController::class, 'store'])->name('participantes.store');

// Ruta para mostrar el formulario de agregar participantes
Route::get('/participantes/create/{capacitacionId}', [ParticipanteController::class, 'create'])->name('participantes.create');

// Ruta para guardar un nuevo participante
Route::post('/participantes', [ParticipanteController::class, 'store'])->name('participantes.store');

// Ruta para listar participantes de una capacitación
Route::get('/capacitaciones/{capacitacionId}/participantes', [ParticipanteController::class, 'index'])->name('participantes.index');

// Ruta para cargar plantilla
Route::get('/capacitaciones/{capacitacionId}/plantilla', [CapacitacionController::class, 'plantilla'])->name('capacitaciones.plantilla');
Route::post('/capacitaciones/{capacitacionId}/plantilla', [CapacitacionController::class, 'guardarPlantilla'])->name('capacitaciones.guardarPlantilla');

// Ruta para generar diplomas
Route::get('/generar-diploma/{capacitacionId}', [DiplomaController::class, 'generarDiploma'])->name('generar.diploma');

Route::get('/participantes/create/{capacitacionId}', [ParticipanteController::class, 'create'])->name('participantes.create');
Route::post('/participantes', [ParticipanteController::class, 'store'])->name('participantes.store');