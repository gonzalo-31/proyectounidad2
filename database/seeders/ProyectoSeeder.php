<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectoSeeder extends Seeder
{
    public function run()
    {
        Proyecto::insert([
            [
                'nombre' => 'Proyecto 1',
                'fecha_inicio' => now(),
                'estado' => 'en progreso',
                'responsable' => 'Juan Pérez',
                'monto' => 10000,
                'created_by' => 1,
            ],
            [
                'nombre' => 'Proyecto 2',
                'fecha_inicio' => now(),
                'estado' => 'en progreso',
                'responsable' => 'María López',
                'monto' => 20000,
                'created_by' => 1,
            ],
            [
                'nombre' => 'Proyecto 3',
                'fecha_inicio' => now(),
                'estado' => 'en progreso',
                'responsable' => 'Carlos García',
                'monto' => 30000,
                'created_by' => 1,
            ]
        ]);
    }
}
