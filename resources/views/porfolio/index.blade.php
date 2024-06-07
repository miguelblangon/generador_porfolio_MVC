
@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Index')
@section('content_header_title', 'Porfolio')
@section('content_header_subtitle', 'Index')

{{-- Content body: main page content --}}

@section('content_body')
    {{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('porfolio.create') }}" class="btn btn-success btn-sm" role="button">Crear</a>
        </div>
    </div>
    <p>Bienvenido a esta seccion donde podras crear tu porfolio</p>


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
