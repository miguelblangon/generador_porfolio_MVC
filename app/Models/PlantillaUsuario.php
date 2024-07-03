<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlantillaUsuario extends Model
{
    use  HasFactory,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plantilla_id',
        'user_id',
        'nombre',
        'url',
    ];
    /**
     * Get the post that owns the comment.
     */
    public function plantilla(): BelongsTo
    {
        return $this->belongsTo(Plantilla::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function introduccionPlantillaUsuario():HasOne
    {
        return $this->hasOne(IntroduccionPlantillaUsuario::class);
    }
    public function aboutPlantillaUsuario():HasOne
    {
        return $this->hasOne(AboutPlantillaUsuario::class);
    }
    public function habilidades():HasMany
    {
        return $this->hasMany(Habilidad::class);
    }



    private function btnEdit(int $id):string {

        return '<a href="'.route("porfolio.edit",$id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
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
        <form action="'.route('porfolio.destroy',$id).'" method="post" class="d-inline">'.
        '<input type="hidden" name="_token" value="'. csrf_token(). '" />
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>
        </form>';
    }

protected function getRowAttribute($value){
    return [$this->id,$this->nombre,$this->url,$this->user->email ,'<nobr>'.$this->btnEdit($this->id).$this->btnDelete($this->id).$this->btnDetails($this->id).'</nobr>'];
}

}
