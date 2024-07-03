<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Plantilla','name'=>'plantilla_usuario_id','coleccion'=>$coleccion,'valores'=>isset($model)?[$model->plantilla_usuario_id]:[],'req'=>1  ])
</div>
<div class="row">
    @include('componentes.text',['col'=>8,'label'=>'Nombre','name'=>'nombre','place'=>'Nombre de Habilidad','value'=>isset($model)?$model->nombre:'','req'=>1  ])
    @include('componentes.text',['tipo'=>'number', 'col'=>4,'label'=>'Valor','name'=>'valor','place'=>'Valor','value'=>isset($model)?$model->valor:'','req'=>1  ])
</div>
