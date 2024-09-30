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
        'noticia',//OK
        'user',
        ],[
            'view-menu-lateral-user',//OK
            'view-menu-lateral-about-plantilla-usuario',//OK
            'view-menu-lateral-introduccion-plantilla-usuario',//OK
            'view-menu-lateral-plantilla',//OK
            'view-menu-lateral-plantilla-usuario',//OK
            'view-menu-lateral-habilidad-plantilla-usuario',//OK
            'view-menu-lateral-estudio-plantilla-usuario',//OK
            'view-menu-lateral-experiencias-plantilla-usuario',//OK
            'view-menu-lateral-cursos-plantilla-usuario',//OK
            'view-menu-lateral-servicios-plantilla-usuario',//OK
            'view-menu-lateral-roles',//OK
            'view-menu-lateral-secciones',//OK
            'view-menu-lateral-noticias'//OK
        ]);

         // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permission->permission() as $permission) {
            Permission::create(['name' => $permission]);
          }



    }
}
