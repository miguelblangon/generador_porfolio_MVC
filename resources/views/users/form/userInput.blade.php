
<div class="row">
    <div class="col">
        <x-adminlte-input name="name" label="Nombre" placeholder="Nombre"
        value="{{ old('name', $user->name ?? '' ) }}"  disable-feedback required/>
    </div>
    <div class="col">
        <x-adminlte-input name="email" label="Email" placeholder="Email"
        value="{{ old('name', $user->email ?? '' ) }}"  disable-feedback required/>
    </div>
</div>
