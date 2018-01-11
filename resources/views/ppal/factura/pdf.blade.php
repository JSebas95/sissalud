<!DOCTYPE html>
<html><body>

  <h1>Ejemplo de factura con datos</h1>
        @foreach($pago as $pa)


              <p>{{ $pa->cliente->nombre }}</p>
              <p>{{ $pa->cliente->apellido }}</p>
              <p>{{ $pa->cliente->cc }}</p>
              <p>{{ $pa->telefono }}</p>
              <p>{{ $pa->valor }}</p>
              <p>En Pereira</p>

        @endforeach

    <p>Almacen<p><br/><br/>

  </body>
</html>
