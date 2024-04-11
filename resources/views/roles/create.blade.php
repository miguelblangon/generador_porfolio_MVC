@extends('layouts.app')
@section('plugins.Select2', true)
{{-- Customize layout sections --}}

@section('subtitle', 'Roles')
@section('content_header_title', 'Roles')
@section('content_header_subtitle', 'Crear')

{{-- Content body: main page content --}}

@section('content_body')



{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row">
        <div class="col text-right pb-2">
            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm" role="button">Volver</a>
        </div>
    </div>
    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <div class="row">
            @include('roles.input.input')
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
