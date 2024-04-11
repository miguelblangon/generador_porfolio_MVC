<x-adminlte-input name="name" label="Nombre" placeholder="Nombre"
value="{{ old('name', $role->name ?? '' ) }}"
fgroup-class="col-md-6" disable-feedback required/>
@if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
@endif

{{-- With multiple slots, and plugin config parameters --}}
@php
    $config = [
        "placeholder" => "Selección multiple opciones...",
        "allowClear" => true,
    ];
@endphp
<x-adminlte-select2 id="permissions" name="permissions[]" label="Lista de Permisos"
    label-class="text-danger" igroup-size="sm" :config="$config" multiple  fgroup-class="col-md-6" required>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-red">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    @if (isset($rolePermissions))
        <x-adminlte-options :options="$permissions" :selected="$rolePermissions"/>
    @else
        <x-adminlte-options :options="$permissions"/>
    @endif

</x-adminlte-select2 >
@if ($errors->has('permissions'))
    <span class="text-danger">{{ $errors->first('permissions') }}</span>
@endif
