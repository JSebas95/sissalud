@extends ('layouts.admin')
@section('contenido')
@include('ppal.pago.search')
<div class="container">


  <h1>Lista de usuarios</h1>

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
                <td>Telefono</td>
                <td>Estado</td>
                <td>Opciones</td>

                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>

        @foreach($cliente as $cli)
            <tr>

              <td>{{ $cli->cc }}</td>
              <td>{{ $cli->nombre }}</td>
              <td>{{ $cli->apellido }}</td>
              <td>{{ $cli->telefono }}</td>
              <td>{{$cli->estado}}</td><!--Deuda-->



               <td><a href="{{URL::action('PpalController@show',$cli->id_user)}}"><button class="btn btn-warning">Pagar</button>
                 <a href="{{URL::action('PpalController@edit',$cli->cc)}}"><button class="btn btn-primary">Editar</button></td>

            </tr>

        @endforeach
        </tbody>
    </table>

  </div>
  </div>
@stop
