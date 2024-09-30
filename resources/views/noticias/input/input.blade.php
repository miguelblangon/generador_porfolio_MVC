<div class="row">
    @include('componentes.text',['col'=>6,'label'=>'Titulo','name'=>'titulo','place'=>'Nombre Seccion','value'=>isset($model)?$model->titulo:old('titulo'),'req'=>1  ])
    @include('componentes.text',['col'=>6,'label'=>'Autor','name'=>'autor','place'=>'Nombre Seccion','value'=>isset($model)?$model->autor:old('autor'),'req'=>1  ])
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
        <x-adminlte-text-editor name="cuerpo" label="Contenido de la noticia" label-class="text-info"
            igroup-size="sm" placeholder="Noticia" :config="$config">
            {{ isset($model)?$model->cuerpo:old('cuerpo') }}
        </x-adminlte-text-editor>
    </div>

</div>
