
@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}

@section('content_body')
<x-adminlte-card title="Tutorial" theme="primary" icon="fas fa-user-graduate" removable  >
    {{-- collapsible="collapsed" --}}
<div class="row">
    <div class="col">
        <p>
            Bienvenido al tutorial sobre cómo usar de manera adecuada el sistema.
        </p>
        <p>
            Como podremos apreciar en el lado izquierdo tememos un menú con una serie de elementos.
            Dichos elementos corresponden a las secciones que tiene el porfolio. Las cuales podemos ver en la imagen adyacente
        </p>
    </div>
    <div class="col mx-3 my-3">
        <picture>
            <img src="{{ asset('storage/tutorial/Menu.png') }}" alt="">
        </picture>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <p>
           <b>La primera</b>  sección es la sección se llama <b>Porfolio</b>, en dicha sección se podrá crear la URL así como darle un nombre y visualizar la plantilla seleccionada.
        </p>
        <p>Si hacemos click sobre esta seccion veremos la parte de administracion de la misma</p>
        <p>La primera vez que ingresemos en la sección estará vacía por lo que veremos una sección como la siguiente imagen</p>
        <picture>
            <img src="{{ asset('storage/tutorial/porfolio.index.png') }}" style="max-width: 40vw;" alt="">
        </picture>
        <p>
            Para crear un Porfolio le daremos al botón verde de la esquina superior derecha es el botón que esta resaltado en rojo
        </p>
        <picture>
            <img src="{{ asset('storage/tutorial/porfolio.index.botonCrear.png') }}" style="max-width: 40vw;" alt="">
        </picture>
        <p>
            Al pulsar sobre dicho botón iremos a la sección de creación de Porfolios la cual será parecido a la siguiente imagen.
        </p>
        <picture>
            <img src="{{ asset('storage/tutorial/porfolio.crear.png') }}" style="max-width: 40vw;" alt="">
        </picture>
        <p>
            Como se puede apreciar en la imagen tenemos 3 elementos y dos botones el botón azul ( volver hacia la parte de la administración de los porfolios), el botón verde ( guardar la información introducida)
        </p>
        <p>Los 3 elementos son:</p>
        <p>1 El campo Nombre: Contendrá el nombre del porfolio, es conveniente poner un nombre sencillo y directo puesto que este nombre después será fundamental para identificarlo.</p>
        <ul>
            <li> Ejemplo: <b>Desarrollo web</b></li>
        </ul>
        <p>
            2 El campo Url: Contendrá la dirección del porfolio dicha dirección será la que se use para acceder al porfolio de manera externa.
        </p>
        <ul>
            <li> Ejemplo: <b>miguel_angel_desarrollo_web</b></li>
        </ul>
        <p>
            3 Selección de la plantilla: en esta sección elegiremos la plantilla que deseamos usar para nuestro porfolio, si pulsamos sobre el nombre de la plantilla se abrirá una nueva ventana con la plantilla en cuestión para su visualización.
        </p>
        <p>
            Una vez rellenos todos los campos pulsaremos sobre el botón verde para que guardar la información en la base de datos, al pulsar sobre el botón volveremos a la parte de la administración de la sección porfolio.
        </p>
        <picture>
            <img src="{{ asset('storage/tutorial/porfolio.tabla.index.png') }}" style="max-width: 40vw;" alt="">
        </picture>
        <p>
            En la imagen se puede apreciar elementos resaltados de la tabla y los botones que estan al final de la fila.
        </p>
        <p>
            El elemento 1 hace referencia al nombre del Porfolio mientras que el segundo elemento hace referncia a la url, si pinchamos sobre la url esta se abrira en una pestaña nueva es importante
            resaltar que esta url en la pestaña es la que se usara para mostrar el portafolio mientras que el boton con el icono del ojo el primer boton empezando por la derecha se usara para
            de forma interna.
        </p>
        <p>
            Explicación de los botones el primer boton empezando por la izquierda con forma de lapiz sirve para editar, al pusar sobre ste boton iremos la vista de editar que es igual pero con los datos introdcidos
            anteriormete donde podremos editar dicho datos y modificarlos.
        </p>
        <p>
            Segundo boton es la funcion de eliminar dicho boton tiene una papelera en rojo al pusar sobre este boton se borrara dicho registro.
        </p>
        <p>
            ultimo boton boton de visualizar la plantilla con forma de ojo en azul claro sirve para ver el estado interno del porfolio.
        </p>
        <p>
            Todas las ecciones del porfolio comprenden estos elementos y que dichas secciones estan puestas de forma secuencial por lo que se deben de rellenar en ese orden.
        </p>

    </div>
    <div class="col">
        <picture>
            <img src="{{ asset('storage/tutorial/MenuPorfolio.png') }}" alt="">
        </picture>
    </div>
</div>
















</x-adminlte-card>
@stop
{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    {{-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> --}}
@endpush

