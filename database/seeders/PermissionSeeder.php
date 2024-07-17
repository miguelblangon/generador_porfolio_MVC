<?php

namespace Database\Seeders;

use Database\Seeders\Permission\Permission as Permiso;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission= new Permiso([
        'about-plantilla-usuario',//OK
        'curso',//OK
        'introduccion-plantilla-usuario', //OK
        'estudios',//OK
        'experiencia',//OK
        'habilidad',//OK
        'plantilla',//OK
        'plantilla-usuario',//OK
        'role',//OK
        'seccion',//OK
        'servicio',//OK
        'user',
        ],[
            'menu-lateral-user',//OK
            'menu-lateral-about-plantilla-usuario',//OK
            'menu-lateral-introduccion-plantilla-usuario',//OK
            'menu-lateral-plantilla',//OK
            'menu-lateral-plantilla-usuario',//OK
            'menu-lateral-habilidad-plantilla-usuario',//OK
            'menu-lateral-estudio-plantilla-usuario',//OK
            'menu-lateral-experiencias-plantilla-usuario',//OK
            'menu-lateral-cursos-plantilla-usuario',//OK
            'menu-lateral-servicios-plantilla-usuario',//OK
            'menu-lateral-roles',//OK
            'menu-lateral-secciones',//OK
        ]);

         // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permission->permission() as $permission) {
            Permission::create(['name' => $permission]);
          }



    }
}
