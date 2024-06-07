


@php
    $is_id = true;
    $is_multiple = false;
@endphp
<div class="col-{{ $col }}">
    <label class="label-for-select" for="{{ $label }}">
        {{   preg_replace(array('/\_/', '/\-/','/\./' ), ' ',ucwords($label))  }}
      </label>
    <select class="form-select"  {{ $is_multiple? 'multiple':''  }}  aria-label="Default select example">
        <option selected>Seleccionar...</option>
        @foreach ($coleccion as $key => $item)
            <option value="{{ $is_id?$key:$item }}"  {{ in_array($key, $valores)?'selected':null}}
            >{{   preg_replace(array('/\_/', '/\-/','/\./' ), ' ',ucwords($item))  }}</option >
        @endforeach
      </select>
</div>

