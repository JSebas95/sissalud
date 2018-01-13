@extends ('layouts.admin')
@section('contenido')
@include('ppal.factura.month')



<div class="container">




  <h1>Reporte del ultimo mes</h1>

  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="table-inverse table-responsive">
        <table class="table table-striped table-bordered table-hover">
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

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
          <div class="form-group">
          <a href="{{URL::action('PagoController@imprimereporte')}}"><button class="btn btn-warning">Imprimir Reporte</button>
          </div>

        </div>
      </div>





  </div>
  </div>







@stop
