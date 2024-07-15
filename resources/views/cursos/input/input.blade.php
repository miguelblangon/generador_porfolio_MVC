<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Plantilla','name'=>'plantilla_usuario_id','coleccion'=>$coleccion,'valores'=>isset($model)?[$model->plantilla_usuario_id]:[],'req'=>1  ])
</div>
<div class="row">
    @include('componentes.text',['col'=>6,'label'=>'Nombre','name'=>'nombre','place'=>'Nombre del curso','value'=>isset($model)?$model->nombre:old('nombre'),'req'=>1  ])
    @include('componentes.fecha',['formato'=>'DD/MM/YYYY', 'name'=>'year_fin','label'=>'Fecha de finalización','place'=>'Seleccionar una fecha...','value'=>isset($model)?$model->year_fin:old('year_fin'),'icono'=>'fa fa-flag-checkered'  ])
</div>


<div class="row">
    @include('componentes.text',['col'=>6,'label'=>'Tutor','name'=>'tutor','place'=>'Nombre tutor','value'=>isset($model)?$model->tutor:old('tutor'),'req'=>1  ])
    @include('componentes.text',['col'=>6,'label'=>'Categoría','name'=>'categoria','place'=>'Categoria','value'=>isset($model)?$model->categoria:old('categoria'),'req'=>1  ])
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
        ],
    ];
    @endphp
    <div class="col-12">
        <x-adminlte-text-editor name="descripcion" label="Contenido del curso" label-class="text-info"
            igroup-size="sm" placeholder="Resumén del curso" :config="$config">
            {{ isset($model)?$model->descripcion:old('descripcion') }}
        </x-adminlte-text-editor>
    </div>

</div>
<div class="row">
    @include('componentes.text',['col'=>12,'label'=>'Url del curso','name'=>'url','place'=>'Url','value'=>isset($model)?$model->url:old('url'),'req'=>1  ])

</div>



