{{-- @extends('adminlte::auth.login') --}}
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Porfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                      Se ha enviado un codigo de Autenticación al siguiente correo <b>{{ $email }}</b>, por favor introduzca el codigo para poder acceder.
                    </div>
                  </div>

                <div class="card px-5 py-5">
                    <form action=" {{ route('code_autentication') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Codigo Autenticacion</label>
                            <input type="hidden" name="email" value="{{ $email }}" required>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Codigo de Autenticacion" required>
                          </div>
                          <div class="col">
                            <button type="submit" class="btn btn-dark">Autenticar</button>
                         </div>

                    </form>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
