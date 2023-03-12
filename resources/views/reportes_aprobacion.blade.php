<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Reportados</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

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
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <!-- Scripts para que funcione datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
    <!-- Plugin para pdf -->
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    
    <!-- Plugin para Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <!-- Estilos para bootstrap -->
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
<body>
    
    @include('layouts.partials.navbar')
    <main style="margin-top: 40px" class="container table-responsive">
      <h1 class="text-center mb-10"><strong>Pendientes de aprobacion</strong></h1>
        <table id="tabla" class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Equipo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Reparado</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Cotizado</th>
                <th scope="col">Confirmar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                  <tr>
                    <td>{{$equipo->id}}</td>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$equipo->descripcion}}</td>
                    <td>{{$equipo->realizado}}</td>
                    <td>{{$equipo->tipo}}</td>
                    <td>{{$equipo->estado}}</td>
                    <td>{{$equipo->users->name}}</td>
                    <td><a class="btn btn-outline-primary" href="#">Cotizar</a></td>
                    <td><a class="btn btn-outline-success" href="#">Confirmar</a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </main>

    <script>
      $(document).ready(function () {
        $('#tabla').DataTable({
          scrollX: true,
          dom: 'Bfrtip',
          buttons: [
              {
                  extend: 'pdfHtml5',
                  text: '<i class="bi bi-file-earmark-pdf-fill mb-1"></i> PDF',
                  className: 'btn btn-outline-danger',
                  orientation: 'landscape',
                  pageSize: 'LEGAL'
              },
              {
                  extend: 'excelHtml5',
                  text:'<i class="bi bi-file-earmark-spreadsheet mb-1"></i> EXCEL',
                  className: 'btn btn-outline-success',
                  autoFilter: true,
                  sheetName: 'Exported data'
              }
          ]
        });
      });
	  </script>
  </body>
</html>