@extends('layouts.app')
@section('plugins.Select2', true)
{{-- Customize layout sections --}}

@section('subtitle', 'Introducción')
@section('content_header_title', 'Introducción')
@section('content_header_subtitle', 'Crear')

{{-- Content body: main page content --}}

@section('content_body')



{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row">
        @include('componentes.EnlaceParam',["ruta"=>'introduccion.index','color'=>'primary','mensaje'=>'Volver' ])
    </div>
    <form action="{{ route('introduccion.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
            @include('introduccion.input.input')
        <div class="row mt-3">
            @include('componentes.btnEnviar',[ 'mensaje'=> 'Guardar'])
        </div>
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
@endpush
