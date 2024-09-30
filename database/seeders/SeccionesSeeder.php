<?php

namespace Database\Seeders;

use App\Models\Seccion;
use Illuminate\Database\Seeder;

class SeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $array=[
           ['seccion'=>'about','texto'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
           ['seccion'=>'habilidad','texto'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
           ['seccion'=>'resumen','texto'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
           ['seccion'=>'curso','texto'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
           ['seccion'=>'servicio','texto'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
           ['seccion'=>'contacto','texto'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
        ];
        foreach ($array as  $value) {
            Seccion::create($value);
        }
    }
}
