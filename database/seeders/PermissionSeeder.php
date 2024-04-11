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
        'about-plantilla-usuario',
        'introduccion-plantilla-usuario',
        'menu-lateral',
        'plantilla',
        'plantilla-usuario',
        'user',
        ],[
            'menu-lateral-user',
            'menu-lateral-menu',
            'menu-lateral-about-plantilla-usuario',
            'menu-lateral-introduccion-plantilla-usuario',
            'menu-lateral-plantilla',
            'menu-lateral-plantilla-usuario',
        ]);

         // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permission->permission() as $permission) {
            Permission::create(['name' => $permission]);
          }



    }
}
