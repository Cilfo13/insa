<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Equipos</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
    @include('layouts.partials.navbar')
    <main class="form-signin">

        <form method="post" action="{{ route('register.registerequipo') }}" class="container mt-5" style="width: 50%">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1 class="h3 mb-3 fw-normal">Registrar equipo</h1>
    
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="nombre" required="required" autofocus>
                <label for="floatingEmail">Nombre del equipo</label>
                @if ($errors->has('nombre'))
                    <span class="text-danger text-left">{{ $errors->first('nombre') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="id_usuario" value="{{ old('id_usuario') }}" placeholder="id_usuario" required="required">
                <label for="floatingEmail">Id del usuario</label>
                @if ($errors->has('id_usuario'))
                    <span class="text-danger text-left">{{ $errors->first('id_usuario') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="marca" value="{{ old('marca') }}" placeholder="marca" required="required">
                <label for="floatingEmail">Marca</label>
                @if ($errors->has('marca'))
                    <span class="text-danger text-left">{{ $errors->first('marca') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="n_identificacion" value="{{ old('n_identificacion') }}" placeholder="n_identificacion" required="required" >
                <label for="floatingEmail">Numero de identificacion</label>
                @if ($errors->has('n_identificacion'))
                    <span class="text-danger text-left">{{ $errors->first('n_identificacion') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}" placeholder="modelo" required="required" >
                <label for="floatingEmail">Modelo</label>
                @if ($errors->has('modelo'))
                    <span class="text-danger text-left">{{ $errors->first('modelo') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="potencia" value="{{ old('potencia') }}" placeholder="potencia" required="required">
                <label for="floatingEmail">Potencia</label>
                @if ($errors->has('potencia'))
                    <span class="text-danger text-left">{{ $errors->first('potencia') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="descripcion" required="required">
                <label for="floatingEmail">Descripcion</label>
                @if ($errors->has('descripcion'))
                    <span class="text-danger text-left">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" placeholder="tipo" required="required">
                <label for="floatingEmail">Tipo</label>
                @if ($errors->has('tipo'))
                    <span class="text-danger text-left">{{ $errors->first('tipo') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="estado" value="{{ old('estado') }}" placeholder="estado" required="required">
                <label for="floatingEmail">Estado</label>
                @if ($errors->has('estado'))
                    <span class="text-danger text-left">{{ $errors->first('estado') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
            
            @include('auth.partials.copy')
        </form>
        
    </main>
    
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>