<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Plantilla','name'=>'plantilla_usuario_id','coleccion'=>$coleccion,'valores'=>isset($model)?[$model->plantilla_usuario_id]:[],'req'=>1  ])
</div>
<div class="row">
    @include('componentes.text',['col'=>6,'label'=>'Nombre','name'=>'nombre_completo','place'=>'Nombre y apellidos','value'=>isset($model)?$model->nombre_completo:'','req'=>1  ])
    @include('componentes.fecha',['formato'=>'DD/MM/YYYY', 'name'=>'nacimiento','label'=>'Fecha de Nacimiento','place'=>'Seleccionar ...','value'=>isset($model)?$model->nacimiento:null ])
</div>
<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Provincia','name'=>'provincial','coleccion'=>$provincias,'valores'=>isset($model)?[$model->provincial]:[],'req'=>1  ])
    @include('componentes.select',['col'=>6,'label'=>'Poblacion','name'=>'poblacion','coleccion'=>isset($poblacion)?$poblacion: [],'valores'=>isset($model)?[$model->poblacion]:[],'req'=>1])
</div>

<div class="row">
    @include('componentes.text',['tipo'=>'email', 'col'=>6,'label'=>'Email','name'=>'email','place'=>'Email','value'=>isset($model)?$model->email:'','req'=>1 ])
    @include('componentes.text',['col'=>6,'label'=>'Numero contacto','name'=>'num_contacto','place'=>'Contacto','value'=>isset($model)?$model->num_contacto:'','req'=>1  ])
</div>
<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Disponibilidad para viajar','name'=>'dip_viajar','coleccion'=>[1=>'Sí',0=>'No',],'valores'=>isset($model)?[$model->dip_viajar]:[],'req'=>1  ])
    @include('componentes.text',['col'=>6,'label'=>'Incorporación','name'=>'incorporacion','place'=>'Incorporación','value'=>isset($model)?$model->incorporacion:'','req'=>1  ])
</div>
<div class="row">
    @include('componentes.textArea',['col'=>6,'name'=>'texto2','label'=>'Texto Inferior','row'=>6,'value'=>isset($model)?$model->texto2:'' ] )
</div>



<div class="row">
    <div class="col-6">
        <label for="formFile" class="form-label">Imagen</label>
        <input name="imagen" class="form-control" type="file" id="formFile" {{ isset($model)?null:'required' }} >
        @if ($errors->has('imagen'))
            <span class="text-danger">{{ $errors->first('imagen') }}</span>
        @endif
    </div>

    @if (isset($model))
        <div class="col-6 mt-3">
            <img src="{{ asset($model->ver_imagen) }}" class="col-4" alt="Girl in a jacket">
        </div>
    @endif

</div>

{{--
plantilla_usuario_id

        'texto1',
        'texto2',
--}}
