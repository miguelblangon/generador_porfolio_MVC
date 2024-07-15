<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Plantilla','name'=>'plantilla_usuario_id','coleccion'=>$coleccion,'valores'=>isset($model)?[$model->plantilla_usuario_id]:[],'req'=>1  ])
</div>
<div class="row">
    @include('componentes.text',['tipo'=>'number', 'col'=>6,'label'=>'Año Inicio','name'=>'year_inicio','place'=>'Inicio','value'=>isset($model)?$model->year_inicio:'','req'=>1  ])
    @include('componentes.text',['tipo'=>'number','col'=>6,'label'=>'Año Fin','name'=>'year_fin','place'=>'Fin','value'=>isset($model)?$model->year_fin:''  ])
</div>

<div class="row">
    @include('componentes.text',['col'=>12,'label'=>'Nombre','name'=>'nombre','place'=>'NOMBRE DE LA EXPERIENCIA','value'=>isset($model)?$model->nombre:'','req'=>1  ])
</div>
<div class="row">
    @include('componentes.text',['col'=>12,'label'=>'Empresa','name'=>'centro','place'=>'Centro','value'=>isset($model)?$model->centro:'','req'=>1  ])
</div>

<div class="row">
   {{-- With placeholder, sm size, label and some configuration --}}
@php
    $config = [
        "height" => "300px",
        "toolbar" => [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['row'=>10]
        ],
    ];
    @endphp
    <div class="col-12">
        <x-adminlte-text-editor name="contenido" label="Contenido" label-class="text-info"
            igroup-size="sm" placeholder="Experiencia" :config="$config">
            {{ isset($model)?$model->contenido:'' }}
        </x-adminlte-text-editor>
    </div>

</div>



