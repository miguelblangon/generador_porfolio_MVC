<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Noticia extends Model
{
    use HasFactory;
    /**
     * Campos
     *   id
     *   titulo.
     *   cuerpo
     *   autor.
     */


     protected $fillable = [
        'titulo',
        'cuerpo',
        'autor'
     ];

     private function btnEdit(int $id):string {

        return '<a href="'.route("noticias.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';

    }
    private function btnDelete(int $id):string {
        return '
        <form action="'.route('noticias.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';
    }
    private function cuerpo(string $cuerpo):string {
        return $value = Str::limit($cuerpo, 30, '...');

    }
    protected function getRowAttribute($value){
        return [$this->id,$this->titulo, $this->cuerpo($this->cuerpo),$this->autor,'<nobr>'.$this->btnEdit($this->id).$this->btnDelete($this->id).'</nobr>'];
    }







}
