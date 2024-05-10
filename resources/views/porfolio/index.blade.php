
@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Index')
@section('content_header_title', 'Porfolio')
@section('content_header_subtitle', 'Index')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Bienvenido a esta seccion donde podras crear tu porfolio</p>
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
