<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Plantilla extends Model
{
    use  HasFactory,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'ruta_plantilla',
    ];
    private function btnDetails(int $id):string {

        return '<a href="'.route("plantillas.show",$id).'" target="_blank" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </a>';

    }
    private function btnDelete(int $id):string {

        return '
        <form action="'.route('plantillas.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';

    }
    private function imagen(string $ruta):string {

        return '<img src="'.asset('storage/'.$ruta).'" alt="'.$this->nombre.'" class="rounded  mx-auto d-block" style="width:100px;height:100px;">';

    }

protected function getRowAttribute($value){
    return [$this->id,$this->nombre,$this->ruta_plantilla,'<nobr>'.$this->btnDelete($this->id).$this->btnDetails($this->id).'</nobr>'];
}

}
