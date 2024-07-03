<div class="col-{{ $col }}">
    <label for="input" class="form-label">{{ $label }}</label>
    <input type="{{ $tipo??'text' }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" placeholder="{{ $place??'' }}" {{ isset($req)?'required':'' }}>
</div>
