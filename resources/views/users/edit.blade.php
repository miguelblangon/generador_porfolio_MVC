@extends('layouts.app')
@section('plugins.Select2', true)
{{-- Customize layout sections --}}

@section('subtitle', 'Usuario')
@section('content_header_title', 'Usuario')
@section('content_header_subtitle', $user->name)

{{-- Content body: main page content --}}

@section('content_body')

{{-- Minimal without header / body only --}}
<x-adminlte-card theme="lightblue" theme-mode="outline">
    <div class="row mb-2">
        @include('componentes.EnlaceParam',["ruta"=>'users.index','color'=>'primary','mensaje'=>'Volver' ])
    </div>



<form action="{{ route('users.update', $user->id) }}" method="post">
    @method('patch')
    @csrf
    <x-adminlte-card title="Datos Personales" theme="primary" icon="fas fa-lg fa-fan" removable collapsible>
        @include('users.form.userInput')
    </x-adminlte-card>
    <x-adminlte-card title="Roles" theme="primary" icon="fas fa-lg fa-fan" removable collapsible>
        @include('componentes.select',['col'=>12, 'name'=>'roles' ,'label'=>'Listado de Roles','coleccion'=>$roles, 'valores'=>$userRoles,'req'=>1 ])
    </x-adminlte-card>
    <x-adminlte-card title="Permisos" theme="primary" icon="fas fa-lg fa-fan" removable collapsible>
        @include('users.form.permisos',['permission'=>$permission,'userPermission'=>$userPermission ] )
    </x-adminlte-card>
    @foreach ($usar as $nombre)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="usar" value="{{ $nombre }}" required>
            <label class="form-check-label" for="usar">
            {{ $nombre }}
            </label>
        </div>
    @endforeach

    @include('componentes.btnEnviar',['mensaje'=>'Actualizar'])
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
