{{-- With multiple slots, and plugin config parameters --}}
@php
    $config = [
        "placeholder" => "Selección multiple opciones...",
        "allowClear" => true,
    ];
@endphp
<x-adminlte-select2 id="" name="{{ $name }}" label="{{ $nombre }}"
    label-class="text-danger" :config="$config" multiple>
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
