@extends ('layouts.admin')
@section('contenido')
@include('ppal.factura.search')
<div class="container">


  <h1>Lista de Pagos de usuarios</h1>

  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>CC</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Fecha de pago</td>
                <td>Valor Pagado</td>
                <td>Imprimir Factura</td>

                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>
        @foreach($pago as $pa)
            <tr>
              <td>{{ $pa->cliente->cc }}</td>
              <td>{{ $pa->cliente->nombre }}</td>
              <td>{{ $pa->cliente->apellido }}</td>
              <td>{{ $pa->creacion }}</td>
              <td>${{ $pa->valor }}</td>
              <td><a href="{{URL::action('PagoController@imprimirPDF',$pa->id_pago)}}"><button class="btn btn-warning">Imprimir</button></td>







            </tr>
        @endforeach
        </tbody>
    </table>

  </div>
  </div>
@stop
