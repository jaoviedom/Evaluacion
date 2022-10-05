<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre' => 'Administrador']);
        Rol::create(['nombre' => 'Gestor']);
        Rol::create(['nombre' => 'Evaluador']);
        Rol::create(['nombre' => 'Usuario']);
    }
}
