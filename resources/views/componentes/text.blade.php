<div class="col-{{ $col }}">
    <label for="input" class="form-label">{{ $label }}</label>
    <input type="{{ $tipo??'text' }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $place??old($name) }}" {{ isset($req)?'required':'' }}>
    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
