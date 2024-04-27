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