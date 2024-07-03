<div class="col-{{ $col }}">
    <label for="textarea" class="form-label">{{ $label }}</label>
    <textarea class="form-control" id="{{ $name }}"  name="{{ $name }}" rows="{{ $row??3 }}">{{$value??old($name)}}</textarea>
    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>

