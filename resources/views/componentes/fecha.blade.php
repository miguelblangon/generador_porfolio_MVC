@php
    $config = [
        'format' => $formato??'DD/MM/YYYY HH:mm'
    ];
@endphp
<x-adminlte-input-date name="{{ $name }}" :config="$config" placeholder="{{ $place }}" value="{{ $value }}"
    label="{{ $label }}" label-class="text-primary">
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-primary" icon="fas fa-lg fa-birthday-cake"
            title="{{ $title??'Establece una fecha' }}"/>
    </x-slot>
</x-adminlte-input-date>
