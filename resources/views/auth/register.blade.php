{{-- @extends('adminlte::auth.register') --}}

@extends('layouts.external')

@section('title', 'Registro Nuevos Usuarios')

@section('content')
 <section>
    <form  method="POST" action="{{ route('register') }}" class="mx-1 mx-md-4">
        @csrf
        <div class="card px-4" style="min-height: 40vh">
            <div class="d-flex flex-row align-items-center mb-4 mt-5">
                <div  class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example1c">Nombre</label>
                  <input type="text" id="form3Example1c" name="name" class="form-control" placeholder="Nombre" />
                </div>
              </div>

              <div class="d-flex flex-row align-items-center mb-4">
                <div  class="form-outline flex-fill mb-0">
                  <label class="form-label" for="form3Example3c">Email</label>
                  <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Email" />
                  <p class="fw-bolder">
                      Se debe de usar un email Valido debido que se enviara la contraseña a ese email para poder acceder
                  </p>
                </div>
              </div>
              <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <button  type="submit"  class="btn btn-primary btn-lg" style="color: black">Registro</button>
              </div>
        </div>

        <p>Al hacer click en 'Registro' aceptas la política de uso</p>
        <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#politica">
            Política de Uso
        </a>

      </form>
  </section>
@include('auth.politicaUso')
@endsection
