
    @php
        $config = [
            "placeholder" => "Selección de opcion...",
        ];
    @endphp


<div class="row">
    <div class="col">
        <x-adminlte-select2 id="plantilla_usuario_id" name="plantilla_usuario_id" label="plantilla" label-class="text-danger" :config="$config">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-red">
                    <i class="fas fa-address-book"></i>
                </div>
            </x-slot>
            @if (isset($model))
                <x-adminlte-options :options="$coleccion" :selected="[$model->plantilla_usuario_id ]"/>
            @else
                <x-adminlte-options :options="$coleccion"/>
            @endif

        </x-adminlte-select2>
    </div>


    @include('componentes.text',['col'=>6,'label'=>'Nombre','name'=>'nombre','place'=>'Nombre y apellidos','value'=>isset($model)?$model->nombre:'' ])
</div>

 @include('componentes.textArea',['col'=>12,'label'=>'Frase','name'=>'frase_introductoria','row'=>5,'value'=>isset($model)?$model->frase_introductoria:null ])

<div class="row">
    <div class="col-6">
        <label for="formFile" class="form-label">Archivos</label>
        <input name="imagen" class="form-control" type="file" id="formFile" {{ isset($model)?null:'required' }} >
        @if ($errors->has('imagen'))
            <span class="text-danger">{{ $errors->first('imagen') }}</span>
        @endif
    </div>

    @if (isset($model))
        <div class="col-6 mt-3">
            <img src="{{ route('introduccion.imagen',$model->id) }}" class="col-4" alt="Girl in a jacket">
        </div>
    @endif

</div>




