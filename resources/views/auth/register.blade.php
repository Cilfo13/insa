<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Registro</title>

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

        <form method="post" action="{{ route('register.perform') }}" class="container mt-5" style="width: 50%">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            
            <h1 class="h3 mb-3 fw-normal"><strong>Registrar Cliente</strong> </h1>
    
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Juan Perez" required="required" autofocus>
                <label for="floatingEmail">Nombre</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                <label for="floatingEmail">Email</label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
    
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="cuit" value="{{ old('cuit') }}" placeholder="cuit" required="required" autofocus>
                <label for="floatingName">Cuit</label>
                @if ($errors->has('cuit'))
                    <span class="text-danger text-left">{{ $errors->first('cuit') }}</span>
                @endif
            </div>
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="direccion" required="required" autofocus>
                <label for="floatingName">Direccion</label>
                @if ($errors->has('direccion'))
                    <span class="text-danger text-left">{{ $errors->first('direccion') }}</span>
                @endif
            </div>
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="razon_social" value="{{ old('razon_social') }}" placeholder="razon_social" required="required" autofocus>
                <label for="floatingName">Razon Social</label>
                @if ($errors->has('razon_social'))
                    <span class="text-danger text-left">{{ $errors->first('razon_social') }}</span>
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