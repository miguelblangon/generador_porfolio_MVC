<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

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
    public function plantillaUsuario(): BelongsTo
    {
        return $this->belongsTo(PlantillaUsuario::class);
    }
    public function getNacimientoAttribute($value)
    {
        if ($value==null) {
            return null;
        }
        return date("d/m/Y",strtotime($value));
    }
    public function setNacimientoAttribute($value)
    {
        $array = explode('/',$value);
        $this->attributes['nacimiento'] = date("Y-m-d",strtotime($array[2].'-'.$array[1].'-'.$array[0]));
    }
    public function getVerImagenAttribute(){
        return  str_replace('public','storage',$this->url_foto);
    }
    public function getEdadAttribute(){
        $array = explode('/',$this->nacimiento);
        return Carbon::createFromDate($array[2],$array[1],$array[0])->age;
    }
    public function getDisponibilidadAttribute(){

        return $this->dip_viajar?'Sí':'No';
    }
    private function btnEdit(int $id):string {

        return '<a href="'.route("about_me.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
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
        <form action="'.route('about_me.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';
    }

protected function getRowAttribute($value){
    return [$this->id,$this->plantillaUsuario->nombre,$this->nombre_completo,$this->url_foto,$this->email ,'<nobr>'.$this->btnEdit($this->id).$this->btnDelete($this->id).$this->btnDetails($this->plantilla_usuario_id).'</nobr>'];
}


}
