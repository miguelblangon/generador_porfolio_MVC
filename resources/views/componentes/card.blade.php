<div class="card" style="width: {{ $ancho??'18rem' }};">
    <div class="card-body">
      <h5 class="card-title">{!! Str::limit( $titulo, $tit_limi??20, ' ...')  !!}</h5>
       @isset($mostrar)
        <p class="card-text">{!! $descripcion !!}</p>
       @endisset
        @isset($ruta)
           <a href="{{ route($ruta,$parametros ) }}" class="btn btn-primary">{{ $enlace_nombre }}</a>
        @endisset
    </div>
  </div>
