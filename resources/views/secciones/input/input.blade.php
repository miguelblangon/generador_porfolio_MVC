<div class="row">
    @include('componentes.text',['col'=>6,'label'=>'Seccion','name'=>'seccion','place'=>'Nombre Seccion','value'=>isset($model)?$model->seccion:old('seccion'),'req'=>1  ])
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
        <x-adminlte-text-editor name="texto" label="Contenido de la sección" label-class="text-info"
            igroup-size="sm" placeholder="Texto identificativo de la sección" :config="$config">
            {{ isset($model)?$model->texto:old('texto') }}
        </x-adminlte-text-editor>
    </div>

</div>
