<div class="row">
    @include('componentes.select',['col'=>6,'label'=>'Plantilla','name'=>'plantilla_usuario_id','coleccion'=>$coleccion,'valores'=>isset($model)?[$model->plantilla_usuario_id]:[],'req'=>1  ])
    @include('componentes.text',['col'=>6,'label'=>'Nombre','name'=>'nombre','place'=>'Nombre del servicio','value'=>isset($model)?$model->nombre:old('nombre'),'req'=>1  ])
</div>
<div class="row">
    <p>
      Modo de uso del apartado icono, dicho apartado sirve para verificar si el icono esta siendo introducido corretamente.
    </p>
</div>
<div class="row">
    <p>
        Los iconos estan en la siguiente web <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">Bootstrap icons</a>.

    </p>
</div>
<div class="row">
    <p>
        Cuando entremos en el apartado del icono deseado en el lateral derecho veremos un apartado llamo <b>Icon font</b> dentro de dicho apartado
        habra una etiqueta  &lt;i class="bi bi-arrow-left-right" &gt;

    </p>
</div>
<div class="row">
    <p>
      Necesitamos el conjunto de letras que vienen despues del <b> class </b> en este caso es bi bi-arrow-left-right que al ponerlo dentro de apartado icono
      y sacar el foco o sea hacer click con el rato en otra parte del documento se mostrara el icono dseado
    </p>
</div>
<div class="row">
    @include('componentes.text',['col'=>6,'label'=>'icono','name'=>'icono','place'=>'Clase del icono','value'=>isset($model)?$model->icono:old('icono'),'req'=>1  ])
    <div class="col-6 py-5" id="ver-icono"></div>
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
        <x-adminlte-text-editor name="descripcion" label="Contenido del servicio" label-class="text-info"
            igroup-size="sm" placeholder="Resumén del servicio" :config="$config">
            {{ isset($model)?$model->descripcion:old('descripcion') }}
        </x-adminlte-text-editor>
    </div>

</div>

