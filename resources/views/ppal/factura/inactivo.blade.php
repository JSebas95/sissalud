@extends ('layouts.admin')
@section('contenido')




<div class="container">

  <h1>Usuarios Inactivos</h1>

  <div class="col-lg-12">



    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="table-inverse table-responsive">
        <table class="table table-striped table-bordered table-hover ">
            <thead>
                <tr style="background-color:lightgrey; font-weight:bold">
                    <td>Documento</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Telefono</td>
                    <td>Estado</td>
                    <!--td colspan="2"></td-->
                </tr>
            </thead>
            <tbody>
            @foreach($cliente as $cli)
                <tr>
                    <td>{{ $cli->cc }}</td>
                    <td>{{ $cli->nombre }}</td>
                    <td>{{ $cli->apellido }}</td>
                    <td>{{ $cli->telefono }}</td>
                    <td>{{ $cli->estado }}</td>



                </tr>
            @endforeach

            </tbody>
        </table>


      </div>





  </div>
  </div>







@stop
