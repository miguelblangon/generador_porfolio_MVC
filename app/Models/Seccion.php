<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'seccion',
        'texto'
     ];

     private function btnEdit(int $id):string {

        return '<a href="'.route("secciones.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';

    }
    private function btnDelete(int $id):string {
        return '
        <form action="'.route('secciones.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';
    }
    protected function getRowAttribute($value){
        return [$this->id,$this->seccion,'<nobr>'.$this->btnEdit($this->id).$this->btnDelete($this->id).'</nobr>'];
    }


}
