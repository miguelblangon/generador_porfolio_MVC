@extends('layouts.app')
{{-- Customize layout sections --}}

@section('subtitle', 'Plantilla')
@section('content_header_title', 'Plantilla')
@section('content_header_subtitle', 'Crear')

{{-- Content body: main page content --}}

@section('content_body')

{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row mb-2">
        @include('componentes.EnlaceParam',["ruta"=>'plantillas.index','color'=>'primary','mensaje'=>'Volver' ])
    </div>



<form action="{{ route('plantillas.store') }}" method="post" enctype='multipart/form-data'>

    @csrf
    <x-adminlte-card title="Datos Plantilla" theme="primary" icon="fas fa-lg fa-fan" removable collapsible>
        @include('plantilla.form.Input')
    </x-adminlte-card>
    @include('componentes.btnEnviar',['mensaje'=>'Crear'])
</form>

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
   @include('componentes.toast')
@endpush
