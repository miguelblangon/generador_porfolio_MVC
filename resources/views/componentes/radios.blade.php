<div class="row g-2">
@foreach ($coleccion as $key => $item)
<div class="col">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $key }}" {{ in_array($key, $valores)?'checked':null}} >

        <label class="form-check-label" for="{{ $name }}">
            {!! isset($route)? '<a href="'.route($route,$key).'" target="_blank">':''  !!}
                {{ preg_replace(array('/\_/', '/\-/','/\./' ), ' ',ucwords($item))  }}
            {!! isset($route)?'</a>':'' !!}
        </label>
    </div>
</div>
@endforeach
</div>
