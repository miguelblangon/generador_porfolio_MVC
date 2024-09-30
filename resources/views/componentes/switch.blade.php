<div class="row g-6">
@foreach ($coleccion as $key => $item)
    <div class="col-6">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="{{ $item }}" name="{{ $name }}" value="{{ $key }}"
             {{ in_array($key, $valores)?'checked':null}}
            >
            <label class="form-check-label" for="{{ $item }}">
                {{   preg_replace(array('/\_/', '/\-/','/\./' ), ' ',ucwords($item))  }}
              </label>

          </div>
    </div>
@endforeach
</div>
