<?php

namespace Database\Seeders;

use App\Models\MenuLateral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuLateralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $menu=[
            [
                'nombre'=>'Porfolio',
                'permiso'=>'menu-lateral-plantilla-usuario',
                'rute_name'=>'porfolio',
                'orden'=>1,
                'sub_orden'=>null,
            ],
            [
                'nombre'=>'Introduccion',
                'permiso'=>'menu-lateral-introduccion-plantilla-usuario',
                'rute_name'=>'introduccion',
                'orden'=>2,
                'sub_orden'=>null,
            ],
            [
                'nombre'=>'Info. Personal',
                'permiso'=>'menu-lateral-about-plantilla-usuario',
                'rute_name'=>'about_me',
                'orden'=>3,
                'sub_orden'=>null,
            ],
            [
                'nombre'=>'Usuario',
                'permiso'=>'menu-lateral-user',
                'rute_name'=>'user',
                'orden'=>'5',
                'sub_orden'=>null,
            ],
            [
                'nombre'=>'Menu',
                'permiso'=>'menu-lateral-menu',
                'rute_name'=>'menu',
                'orden'=>'6',
                'sub_orden'=>null,
            ],
            [
                'nombre'=>'Plantilla',
                'permiso'=>'menu-lateral-plantilla',
                'rute_name'=>'plantilla',
                'orden'=>'7',
                'sub_orden'=>null,
            ],
        ];
        foreach ($menu as $value) {
            MenuLateral::create($value);
        }
    }
}
