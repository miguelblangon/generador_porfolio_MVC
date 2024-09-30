<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array=[
            ['titulo'=>'about','cuerpo'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
            ['titulo'=>'habilidad','cuerpo'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
            ['titulo'=>'resumen','cuerpo'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
            ['titulo'=>'curso','cuerpo'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
            ['titulo'=>'servicio','cuerpo'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
            ['titulo'=>'contacto','cuerpo'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, ad quisquam maiores adipisci molestiae dolores dolorum porro facere, ex ea officia ipsa vel? Saepe ut accusamus et quidem consequuntur in?'],
         ];
         foreach ($array as  $value) {
             Noticia::create($value);
         }
    }
}
