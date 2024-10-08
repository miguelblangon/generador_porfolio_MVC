@extends('layouts.app')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
{{-- Customize layout sections --}}

@section('subtitle', 'Usurio')
@section('content_header_title', 'Usuario')
@section('content_header_subtitle', 'Index')

{{-- Content body: main page content --}}

@section('content_body')

{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row pt-2">
        <div class="col-12">
            {{-- Setup data for datatables --}}
            @php
                $heads = [
                ['label' => 'ID', 'no-export' => true, 'width' => 2],
                ['label' => 'NOMBRE', 'classes'=>'text-center' ],
                ['label' => 'EMAIL', 'classes'=>'text-center' ],
                ['label' => 'ACCIONES', 'no-export' => true, 'width' => 5], ];
                $config = ['data' => $models];
            @endphp
       <x-adminlte-datatable id="table" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered compressed/>
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
   @include('componentes.toast')
@endpush
