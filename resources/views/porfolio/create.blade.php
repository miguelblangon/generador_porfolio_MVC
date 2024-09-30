@extends('layouts.app')
{{-- Customize layout sections --}}

@section('subtitle', 'Porfolio')
@section('content_header_title', 'Porfolio')
@section('content_header_subtitle', 'Crear')

{{-- Content body: main page content --}}

@section('content_body')



{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row">
        @include('componentes.EnlaceParam',["ruta"=>'porfolio.index','color'=>'primary','mensaje'=>'Volver' ])
    </div>
    <form action="{{ route('porfolio.store') }}" method="post">
        @csrf
            @include('porfolio.input.input')
        <div class="row">
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
