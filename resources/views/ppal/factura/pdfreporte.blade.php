
<div class="container">

@if($mes=="01")
<h1>Reporte de Enero</h1>
@endif
@if($mes=="02")
<h1>Reporte de Febrero</h1>
@endif
@if($mes=="03")
<h1>Reporte de Marzo</h1>
@endif
@if($mes=="04")
<h1>Reporte de Abril</h1>
@endif
@if($mes=="05")
<h1>Reporte de Mayo</h1>
@endif
@if($mes=="06")
<h1>Reporte de Junio</h1>
@endif
@if($mes=="07")
<h1>Reporte de Julio</h1>
@endif
@if($mes=="08")
<h1>Reporte de Agosto</h1>
@endif
@if($mes=="09")
<h1>Reporte de Septiembre</h1>
@endif
@if($mes=="10")
<h1>Reporte de Octubre</h1>
@endif
@if($mes=="11")
<h1>Reporte de Noviembre</h1>
@endif
@if($mes=="12")
<h1>Reporte de Diciembre</h1>
@endif

  <div class="col-lg-12">


    <div class="table-inverse table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr style="background-color:lightgrey; font-weight:bold">
                  <td>Fecha pago</td>
                  <td>Documento</td>
                  <td>Nombre</td>
                  <td>Apellido</td>
                  <td>Telefono</td>
                  <td>Empresa</td>
                  <td>EPS</td>
                  <td>ARL</td>
                  <td>Pension</td>
                  <td>Fecha Afiliacion</td>
                  <td>Valor</td>
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
                  <td>{{ $pag->cliente->empresa }}</td>
                  <td>{{ $pag->cliente->eps }}</td>
                  <td>{{ $pag->cliente->arl }}</td>
                  <td>{{ $pag->cliente->pension }}</td>
                  <td>{{ $pag->cliente->fecha_afiliacion }}</td>
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

      </div>

  </div>
  </div>
