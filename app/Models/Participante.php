<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente
    protected $fillable = ['capacitacion_id', 'nombre', 'email'];

    // Relación con la tabla capacitaciones
    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class);
    }

}
