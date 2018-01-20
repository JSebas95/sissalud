<!DOCTYPE html>
<html>
<head>
  <style>
  #contenedor{
          width: 100%;
  }
  #izquierda{
          float:left;
          width:50%;
          padding-bottom: 5px;
          font-size:14px;
          font-weight: bold;
  }
  #derecha{
          float:right;
          width:50%;
          padding-bottom: 5px;
          font-size:14px;
  }

  @page { margin: 1px; }
body { margin: 1px; }
p{
        font-size:12px;
        text-align: justify;
        font-family:Verdana;
        font-style:normal;
}
p2{
        font-size:12px;
        font-family:Verdana;
        font-style:normal;
}
#tit{
        font-size:16px;
        text-align: center;
        font-family:helvetica;
        font-style:normal;
        font-weight: bold;
}
#titulo{
        padding-bottom: 10px;
}
  </style>
</head>


<body>

<div align="center">
  <div id ="titulo">
<img src="C:\Laravel\sistemapago\public\img\logo.jpg" height="60" width="80" alt="Logo" />
  </div>



@foreach($pago as $pa)
<div id ="tit">Gestión Profesional</div>
  <p2>Dir: Cll 12 N° 3-66<br />
     C.C. Villa Robledo<br />
     local 119<br />
     Tels: 209 2666 <br />304 597 7500 <br />
     PEREIRA - RISARALDA
     Fecha: {{ $pa->creacion }}</p2>
     ============================
        <strong>Recibo de recaudo<br /> N°: {{$pa->id_pago}}</strong><br />
      </div>

        <div align="left">
              <p2>Recibí de: </p2><br />{{ $pa->cliente->apellido }} {{ $pa->cliente->nombre }}

              <div align="center">
              <strong>------- Concepto -------</strong>
            </div>
              <div id ="contenedor">
                @if(is_null($pa->salud) && !is_null($pa->arl) && !is_null($pa->pension))
                <div><strong>Pensión:</strong> ${{ $pa->pension }}</div>
                <div><strong>ARL:</strong> ${{ $pa->arl }}</div>
                <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif
                @if(is_null($pa->arl) && !is_null($pa->salud) && !is_null($pa->pension) )
                <div><strong>Salud:</strong> ${{ $pa->salud }}</div>
                <div><strong>Pensión:</strong> ${{ $pa->pension }}</div>
                <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif
                @if(is_null($pa->pension) && !is_null($pa->arl) && !is_null($pa->salud))
                <div><strong>Salud:</strong> ${{ $pa->salud }}</div>
                <div><strong>ARL:</strong> ${{ $pa->arl }}</div>
                <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif

                @if(is_null($pa->pension) && is_null($pa->arl) && !is_null($pa->salud))
                <div><strong>Salud:</strong> ${{ $pa->salud }}</div>
                <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif

                @if(is_null($pa->pension) && !is_null($pa->arl) && is_null($pa->salud))
                <div><strong>ARL:</strong> ${{ $pa->arl }}</div>
                <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif

                @if(!is_null($pa->pension) && is_null($pa->arl) && is_null($pa->salud))
                <div><strong>Pension:</strong> ${{ $pa->pension }}</div>
                <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif

                @if(!is_null($pa->salud) && !is_null($pa->arl) && !is_null($pa->pension) )

                          <div><strong>Salud:</strong> ${{ $pa->salud }}</div>
                          <div><strong>Pensión:</strong> ${{ $pa->pension }}</div>
                          <div><strong>ARL:</strong> ${{ $pa->arl }}</div>
                          <div><strong>Total:</strong> ${{ $pa->valor }}</div>
                @endif
              </div>

        @endforeach
        <div align="center">
        ============================
          </div>
    <strong>RECUERDE:</STRONG><br /><p>Los recaudos se realizan los primeros 5 días habiles del mes, después de esta fecha su aporte sera tomado como reactivación.</p>
**********************
</div>
  </body>
</html>
