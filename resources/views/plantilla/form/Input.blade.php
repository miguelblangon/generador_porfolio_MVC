
<div class="row">
    <div class="col">
        <x-adminlte-input name="name" label="Nombre" placeholder="Nombre de la plantilla"
        value="{{ old('name', $user->name ?? '' ) }}"  disable-feedback required/>
    </div>
</div>

<div class="row">
    <div class="col">
        <label for="formFile" class="form-label">Archivos</label>
        <input name="files" class="form-control" type="file" id="formFile">
    </div>
</div>
