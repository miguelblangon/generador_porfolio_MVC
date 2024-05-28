<x-adminlte-input name="name" label="Nombre" placeholder="Nombre" value="{{ old('name', $role->name ?? '' ) }}" fgroup-class="col-md-6" disable-feedback required/>
@if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
@endif

<x-adminlte-card title="Permisos" theme="primary" icon="fas fa-lg fa-fan" removable collapsible>
    @include('componentes.switch',['coleccion'=> $permissions, 'valores'=>$rolePermissions, 'name'=>'permissions[]'] )
</x-adminlte-card>

@if ($errors->has('permissions'))
    <span class="text-danger">{{ $errors->first('permissions') }}</span>
@endif
