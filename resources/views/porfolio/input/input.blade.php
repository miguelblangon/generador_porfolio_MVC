
<div class="row">
    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" value="{{ old('nombre', $model->nombre ?? '' ) }}" fgroup-class="col-md-6" disable-feedback required/>
    <x-adminlte-input name="url" label="Url" placeholder="Url" value="{{ old('url', $model->url ?? '' ) }}" fgroup-class="col-md-6" disable-feedback required/>
</div>
    <div class="row g-2 mb-3">
        <div class="col">
            @if ($errors->has('nombre'))
                <span class="text-danger">{{ $errors->first('nombre') }}</span>
            @endif
        </div>
        <div class="col">
            @if ($errors->has('url'))
            <span class="text-danger">{{ $errors->first('url') }}</span>
        @endif
        </div>
    </div>


    <x-adminlte-card title="Plantillas" theme="primary" icon="fas fa-lg fa-fan" removable collapsible>
    @include('componentes.radios',['coleccion'=>$coleccion,'name'=>'plantilla_id','route'=>'plantillas.show','valores'=>isset($model)? [$model->plantilla_id] : [] ] )
    @if ($errors->has('plantilla_id'))
        <span class="text-danger">{{ $errors->first('plantilla_id') }}</span>
    @endif
    </x-adminlte-card>

