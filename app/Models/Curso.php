<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'plantilla_usuario_id',
        'nombre',
        'descripcion',
        'tutor',
        'categoria',
        'year_fin',
        'url'
    ];
    public function plantillaUsuario(): BelongsTo
    {
        return $this->belongsTo(PlantillaUsuario::class);
    }


    public function getYearFinAttribute($value)
    {
        if ($value==null) {
            return null;
        }
        return date("d/m/Y",strtotime($value));
    }
    public function setYearFinAttribute($value)
    {
        $array = explode('/',$value);
        $this->attributes['year_fin'] = date("Y-m-d",strtotime($array[2].'-'.$array[1].'-'.$array[0]));
    }


    private function btnEdit(int $id):string {

        return '<a href="'.route("cursos.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';

    }
    private function btnDetails(int $id):string {

        return '<a href="'.route("porfolio.show",$id).'" target="_blank" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </a>';

    }
    private function btnDelete(int $id):string {
        return '
        <form action="'.route('cursos.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';
    }

protected function getRowAttribute($value){
    return [$this->id,$this->plantillaUsuario->nombre,$this->nombre,$this->tutor,$this->year_fin,$this->categoria ,'<nobr>'.$this->btnEdit($this->id).$this->btnDelete($this->id).$this->btnDetails($this->plantilla_usuario_id).'</nobr>'];
}


}
