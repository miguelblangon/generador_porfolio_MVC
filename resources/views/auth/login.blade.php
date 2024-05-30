@extends('layouts.external')
@section('title', 'Registro Nuevos Usuarios')
@section('content')
<div class="row d-flex justify-content-center">
            <div class="col-md-6">
            <div class="text-center text-capitalize -mb-2 mt-2">
                @isset($mensaje)
                <div class="alert alert-{{ $css }}" role="alert">
                    {{ $mensaje  }}
                </div>
                @endisset
            </div>

                <h3>Proceso de autenticación</h3>
                <div class="card px-5 py-5">
                    <form action=" {{ route('code_mailer') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Direccion de Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required>
                          </div>
                          <div class="col">
                            <button type="submit" class="btn btn-dark">Acceder</button>
                         </div>

                    </form>
                </div>
            </div>
</div>
@endsection
