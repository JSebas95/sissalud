<!DOCTYPE html>
<html>
<head>
  <style>
  @page { margin: 4px; }
body { margin: 4px; }
  </style>
</head>


<body>

<div align="center">

@foreach($pago as $pa)
<h4>Gestión Profesional</h4>
  Cll 12 N° 3-66<br />
     CC Villa Robledo<br />
     local 119<br />
     304 597 7500 - 209 2666<br />
     Fecha: {{ $pa->creacion }}
   </div>

        <div align="left">
        <h3><strong>Factura: </strong>{{$pa->id_pago}}</h3><br />

              CC:{{ $pa->cliente->cc }}<br />
              Recibí de:<br />{{ $pa->cliente->nombre }} {{ $pa->cliente->apellido }}<br />

              Por Concepto de: {{ $pa->valor }}<br />
              <p>En Pereira</p>

        @endforeach

    <p>Almacen<p><br/><br/>
</div>
  </body>
</html>
