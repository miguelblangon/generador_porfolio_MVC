{{-- With multiple slots, and plugin config parameters --}}
@php
    $config = [
        "placeholder" => "Selección multiple opciones...",
        "allowClear" => true,
    ];
@endphp
<x-adminlte-select2 id="{{ $name }}" name="{{ $name }}" label="{{ $nombre }}"
    label-class="text-danger" :config="$config">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-red">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    @if (isset($userRoles))
        <x-adminlte-options :options="$roles" :selected="$userRoles"/>
    @else
        <x-adminlte-options :options="$roles"/>
    @endif

</x-adminlte-select2 >


{{-- <select class="form-select" multiple aria-label="Multiple select example">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select> --}}
