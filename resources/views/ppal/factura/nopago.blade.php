@extends ('layouts.admin')
@section('contenido')




<div class="container">
{!! Form::open(array('url'=>'ppal/factura/show', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'))!!}
<label for="mes">Buscar por fecha</label>
  <select name="mes">
    <option value="01">Enero</option>
    <option value="02">Febrero</option>
    <option value="03">Marzo</option>
    <option value="04">Abril</option>
    <option value="05">Mayo</option>
    <option value="06">Junio</option>
    <option value="07">Julio</option>
    <option value="08">Agosto</option>
    <option value="09">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>

    <button class="btn btn-primary" type="submit">Buscar</button>
{{Form::close()}}
  <h1>Reporte del ultimo mes</h1>

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
                    <td>Estado deuda</td>
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
