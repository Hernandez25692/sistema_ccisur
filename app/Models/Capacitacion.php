<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capacitacion extends Model
{
    use HasFactory;
     // Nombre de la tabla (opcional si sigue la convención de Laravel)
     protected $table = 'capacitaciones';

    // Campos que se pueden llenar masivamente
      protected $fillable = [
        'nombre', 'fecha', 'lugar', 'instructor', 'cargo', 'plantilla', 'firma'
    ];

    // Relación con la tabla participantes
    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }
}
