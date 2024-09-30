@extends('layouts.app')
@section('plugins.Sweetalert2', true)
@section('plugins.Summernote', true)
{{-- Customize layout sections --}}

@section('subtitle', 'Seccion')
@section('content_header_title', 'Seccion')
@section('content_header_subtitle',$model->seccion )

{{-- Content body: main page content --}}

@section('content_body')
{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row">
        @include('componentes.EnlaceParam',["ruta"=>'secciones.index','color'=>'primary','mensaje'=>'Volver' ])
    </div>
    <form action="{{ route('secciones.update',$model->id) }}" method="post">
        @csrf
        @method('patch')
            @include('secciones.input.input')
        <div class="row mt-3">
            @include('componentes.btnEnviar',[ 'mensaje'=> 'Actualizar'])
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
    @include('componentes.toast')
@endpush
