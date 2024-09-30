


<div class="row">
    @include('componentes.select',['col'=>6,'coleccion'=>$coleccion,'label'=>'Plantilla','name'=>'plantilla_usuario_id','req'=>true,'valores'=>isset($model)?[$model->plantilla_usuario_id]:[] ])



    @include('componentes.text',['col'=>6,'label'=>'Nombre','name'=>'nombre','place'=>'Nombre y apellidos','value'=>isset($model)?$model->nombre:'' ])
</div>

 @include('componentes.textArea',['col'=>12,'label'=>'Frase','name'=>'frase_introductoria','row'=>5,'value'=>isset($model)?$model->frase_introductoria:null ])

<div class="row">
    <div class="col-6">
        <label for="formFile" class="form-label">Imagen</label>
        <p>Es la imagen principal de fondo que se ve al principio de la plantilla, la cual tiene un tamaño grande</p>
        <input name="imagen" class="form-control" type="file" id="formFile" {{ isset($model)?null:'required' }} >
        @if ($errors->has('imagen'))
            <span class="text-danger">{{ $errors->first('imagen') }}</span>
        @endif
    </div>

    @if (isset($model))
        <div class="col-6 mt-3">
            <img src="{{ asset($model->ver_imagen ) }}" class="col-4" alt="Girl in a jacket">
        </div>
    @endif

</div>




