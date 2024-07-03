@php
    $is_multiple = false;
@endphp
<div class="col-{{ $col }}">
    <label class="label-for-select" for="{{ $label }}">
        {{   preg_replace(array('/\_/', '/\-/','/\./' ), ' ',ucwords($label))  }}
      </label>
    <select class="form-control select2" {{ $is_multiple? 'multiple':''  }} name="{{ $name }}" id="{{ $name }}" {{ isset($req)? 'required' : '' }} >
        <option value="">Seleccionar...</option>
        @foreach ($coleccion as $key => $item)
            <option value="{{ $key }}"  {{ in_array($key, $valores)?'selected':null}}
            >{{   preg_replace(array('/\_/', '/\-/','/\./' ), ' ',ucwords($item))  }}</option >
        @endforeach
      </select>
</div>

