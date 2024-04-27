<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    @laravelPWA
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active fs-2" aria-current="page" href="#">Conducción</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-2" href="#">Direcciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-2" href="#">Dinero</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <!-- agregar direccion-->

      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Agregar Envío</h2>
            <form action="{{route('crear')}}" method="POST">
                {{ csrf_field() }}
              <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
              </div>
              <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
              </div>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
          </div>
          <br>
          <br>
          <p> Total: $ {{ $total ?? '' }}. </p>
        </div>
      </div>


        

      <!-- Tabla de direcciones -->
      <div class="container p-5">
      <div class="card ">

        <div class="card-body">

        <table id="envios" class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Dirección</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Agregar</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($envios as $envio)
            <tr>
                <th scope="row">{{$envio->id}}</th>
                <td>{{$envio->direccion}}</td>
                <td>{{$envio->cantidad}}</td>
                <td>
                    <form action="{{route('actualizar', $envio->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="d-flex">
                            <input type="number" class="form-control flex-grow-1 me-2" id="cantidad" name="cantidad">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </td>
                <td>
                    <p>${{$envio->cantidad * 100}}</p>
                </td>
                <td>

                </td>
            </tr>
            @endforeach
            
            </tbody>
        </table>
            </div>
        </div>
    </div>



    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script>
        new DataTable('#envios',{
            responsive: true,
            autoWidth: false
        }
           
    );
    </script>
</body>
</html>