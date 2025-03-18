<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Capacitacion;
use App\Models\Participante;
use Faker\Factory as Faker;

class CapacitacionesYParticipantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inicializar Faker
        $faker = Faker::create();

        // Crear 5 capacitaciones
        for ($i = 1; $i <= 6; $i++) {
            $capacitacion = Capacitacion::create([
                'nombre' => $faker->sentence(3), // Nombre de la capacitación
                'fecha' => $faker->dateTimeBetween('-1 month', '+1 month'), // Fecha aleatoria
                'lugar' => $faker->city, // Lugar aleatorio
                'instructor' => $faker->name, // Nombre del instructor
            ]);

            // Crear 4 participantes para cada capacitación
            for ($j = 1; $j <= 5; $j++) {
                Participante::create([
                    'capacitacion_id' => $capacitacion->id,
                    'nombre' => $faker->name, // Nombre del participante
                    'email' => $faker->unique()->safeEmail, // Email único
                ]);
            }
        }

        $this->command->info('¡20 registros de capacitaciones y participantes creados exitosamente!');
    }
}
