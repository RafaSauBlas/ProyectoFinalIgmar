<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->area = "Direccion";
        $rol->save();

        $rol1 = new Rol();
        $rol1->area = "Administrativo";
        $rol1->save();

        $rol = new Rol();
        $rol->area = "Asesora";
        $rol->save();

        $rol1 = new Rol();
        $rol1->area = "Quimico";
        $rol1->save();

        $rol = new Rol();
        $rol->area = "Coordinador de Operaciones";
        $rol->save();

        $rol1 = new Rol();
        $rol1->area = "Operador";
        $rol1->save();

        $rol1 = new Rol();
        $rol1->area = "Almacenistas";
        $rol1->save();
    }
}
