@extends ('layouts.admin')
@section('contenido')

<div class="container">


  <h1>Pago de servicios</h1>

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
                    <td>Usuario</td>
                    <td>Fecha deuda</td>
                    <td>Valor pagado</td>
                    <td>Estado deuda</td>
                    <!--td colspan="2"></td-->
                </tr>
            </thead>
            <tbody>
            @foreach($pago as $pag)
                <tr>
                    <td>{{ $pag->creacion}}</td>
                    <td>{{ $pag->cliente->nombre }}</td>
                    <td>{{ $pag->cliente->apellido }}</td>
                    <td>{{ $pag->cliente->cc }}</td>
                    <td>{{ $pag->telefono }}</td>
                    <td>${{ $pag->valor }}</td>

                </tr>
            @endforeach
              <tr style="background-color:lightgrey; font-weight:bold">
                <td><h4>Total</h4></td>
                <td colspan='3'></td>
                <td><h4>${{ number_format($total_pagado) }}</h4></td>
                <td colspan='1'></td>
              </tr>
            </tbody>
        </table>
      </div>





  </div>
  </div>







@stop
