<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntiSpan extends Model
{
    use HasFactory;
    protected $fillable = [
               'ip',
               'mac',
               'intentos',
               'navegador',
               'es_bloq',
    ];

}
