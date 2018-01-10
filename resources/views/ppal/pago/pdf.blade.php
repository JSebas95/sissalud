<!DOCTYPE html>
<html><body>
        <H1 align="center">PAZ Y SALVO</H1>
        <table class="table table-striped table-bordered">
        <tbody>
        @foreach($clientes as $cli)
            <tr>
              <td>Dado el {{ $cli->nombre }}</td>
              <td>En Pereira</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>Almacen mi chiquitin<p><br/><br/>

  </body>
</html>
