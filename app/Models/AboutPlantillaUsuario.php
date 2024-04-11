<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class AboutPlantillaUsuario extends Model
{
    use  HasFactory,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plantilla_usuario_id',
        'url_foto',
        'nombre_completo',
        'email',
        'provincial',
        'poblacion',
        'num_contacto',
        'nacimiento',
        'dip_viajar',
        'incorporacion',
        'texto1',
        'texto2',
    ];

}
