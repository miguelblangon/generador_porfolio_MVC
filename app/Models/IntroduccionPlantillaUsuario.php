<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

class IntroduccionPlantillaUsuario extends Model
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
        'frase_introductoria',
        'nombre',
    ];
    public function plantillaUsuario(): BelongsTo
    {
        return $this->belongsTo(PlantillaUsuario::class);
    }
    private function btnEdit(int $id):string {

        return '<a href="'.route("introduccion.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>';

    }
    private function btnDetails(int $id):string {

        return '<a href="'.route("introduccion.show",$id).'" target="_blank" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </a>';

    }
    private function btnDelete(int $id):string {
        return '
        <form action="'.route('introduccion.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';
    }

protected function getRowAttribute($value){
    return [$this->id,$this->plantillaUsuario->nombre,$this->nombre,$this->url_foto,$this->frase_introductoria ,'<nobr>'.$this->btnEdit($this->id).$this->btnDelete($this->id).$this->btnDetails($this->id).'</nobr>'];
}

}
