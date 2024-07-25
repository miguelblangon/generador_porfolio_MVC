@extends('layouts.external')
@section('title', 'Autenticación')
@section('content')
<div class="container-fluid" style="min-height: 60vh; min-width: 60vw;">
    <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-capitalize -mb-2 mt-2">
                    @isset($mensaje)
                        <div class="alert alert-{{ $css }}" role="alert">
                            {{ $mensaje  }}
                        </div>
                    @endisset
                </div>

                <h3 class="h3 text-center">Proceso de autenticación</h3>
                <div class="card px-5 py-5">
                    <form action="{{ route('code_mailer') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Direccion de Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required>
                            </div>
                            <div class="col text-center">
                            <button type="submit" class="btn btn-success" style="color: black;" >{{  __('Login')  }}</button>
                            <a href="{{ route('register') }}" class="btn btn-secondary">{{  __('Register')  }}</a>
                            </div>
                    </form>
                </div>
                <p>Al hacer click en el boton 'Acceder' aceptas la política de uso</p>
                <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#politica">
                    Política de Uso
                </a>
            </div>
    </div>

</div>
@include('auth.politicaUso')
@endsection
