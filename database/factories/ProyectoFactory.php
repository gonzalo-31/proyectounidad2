<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    protected $model = Proyecto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'fecha_inicio' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['activo', 'completado', 'en progreso', 'pendiente']),
            'responsable' => $this->faker->name,
            'monto' => $this->faker->randomFloat(2, 1000, 100000),
            'created_by' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
