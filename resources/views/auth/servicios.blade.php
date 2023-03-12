<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Servicios</title>

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
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
    @include('layouts.partials.navbar')
    <main class="form-signin">

        <form id="formulario" method="post" action="{{ route('register.registerservicio') }}" class="container mt-5" style="width: 50%">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1 class="h3 mb-3 fw-normal">Registrar servicio</h1>
    
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="id" value="{{ old('id') }}" placeholder="id" required="required" autofocus>
                <label for="floatingEmail">Id del equipo</label>
                @if ($errors->has('id'))
                    <span class="text-danger text-left">{{ $errors->first('id') }}</span>
                @endif
            </div>

            <select id="tipo_servicio" name="tipo_servicio" class="form-select mb-4" value="{{ old('tipo_servicio') }} required="required"">
                <option value='null'>-Seleccione un tipo-</option>
                <option value="SERVICIO">SERVICIO</option>
                <option value="REPARACION">REPARACION</option>
            </select>
            @if ($errors->has('tipo_servicio'))
                <span class="text-danger text-left">{{ $errors->first('tipo_servicio') }}</span>
            @endif
            <div id="contenedor">

            </div>
            <div id="comentario" class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="comentario" value="{{ old('comentario') }}" placeholder="comentario" autofocus>
                <label for="floatingEmail">Comentario</label>
                @if ($errors->has('comentario'))
                    <span class="text-danger text-left">{{ $errors->first('comentario') }}</span>
                @endif
            </div>

            <select id="horas" name="horas" class="form-select mb-4" value="{{ old('horas') }}">
                <option selected>-Seleccione las horas-</option>
                <option value="150">150 hs</option>
                <option value="1000">1000 hs</option>
                <option value="4000">4000 hs</option>
            </select>
            @if ($errors->has('horas'))
                <span class="text-danger text-left">{{ $errors->first('horas') }}</span>
            @endif

            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
            
            @include('auth.partials.copy')
        </form>
        
    </main>
    <script>
        // Obtener el elemento select y el div a mostrar u ocultar
        const tipoServicio = document.getElementById('tipo_servicio');
        const horas = document.getElementById('horas');
        const comentario = document.getElementById('comentario');
        const copiaHoras = horas.cloneNode(true);
        const copiaComentario = comentario.cloneNode(true);
        const contenedor = document.getElementById('contenedor');
        comentario.remove();
        horas.remove();
        // Agregar un escucha al evento change del select
        tipoServicio.addEventListener('change', function(event) {
        // Verificar si la opción seleccionada es "opcion1"
            const opcionSeleccionada = event.target.value;
            if (opcionSeleccionada === 'SERVICIO') {
                copiaComentario.remove();
                contenedor.appendChild(copiaHoras);
            }else if (opcionSeleccionada == 'REPARACION') {
                copiaHoras.remove();
                contenedor.appendChild(copiaComentario);
            }else if(opcionSeleccionada == 'null'){
                copiaHoras.remove();
                copiaComentario.remove();
            }
        });
    </script>
    
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>