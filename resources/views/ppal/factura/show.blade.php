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
                    <td>Fecha pago</td>
                    <td>Documento</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Telefono</td>
                    <td>Estado deuda</td>
                    <!--td colspan="2"></td-->
                </tr>
            </thead>
            <tbody>
            @foreach($pago as $pag)
                <tr>
                    <td>{{ $pag->creacion}}</td>
                    <td>{{ $pag->cliente->cc }}</td>
                    <td>{{ $pag->cliente->nombre }}</td>
                    <td>{{ $pag->cliente->apellido }}</td>


                    <td>{{ $pag->cliente->telefono }}</td>
                    <td>${{ $pag->valor }}</td>

                </tr>
            @endforeach
              <tr style="background-color:lightgrey; font-weight:bold">
                <td><h4>Total</h4></td>
                <td colspan='4'></td>
                <td><h4>${{ number_format($total_pagado) }}</h4></td>
                <td colspan='1'></td>
              </tr>
            </tbody>
        </table>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
            <a href="" data-target="#modal-delete" data-toggle="modal"><button name="botonfinal" class="btn btn-warning">Imprimir reporte</button></a>
                        @include('ppal.factura.modal')
          </div>

        </div>
      </div>





  </div>
  </div>







@stop
