<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectoSeeder extends Seeder
{
    public function run()
    {
        Proyecto::factory()->count(10)->create();
    }
}
