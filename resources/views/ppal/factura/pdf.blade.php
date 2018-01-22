<!DOCTYPE html>
<html>
<head>
  <style>
  #contenedor{
          width: 100%;
          padding-bottom: 5px;
  }
  #izquierda{
          float:left;
          width:50%;
          padding-bottom: 5px;
          padding-top: 6px;
          font-size:14px;
          font-weight: bold;
  }

  #derecha{
          float:right;
          width:50%;
          padding-bottom: 5px;
          padding-top: 6px;
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
  <p2>Dir: Calle 20 N° 5-23<br />
     local 4<br />
     Tels: 333 7098 <br />319 332 5999 <br />
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
                <div><strong>Pension:</strong> ${{ $pa->pension }}</div>
                <div><strong>Salud:</strong> ${{ $pa->salud }}</div>
                <div><strong>Arl:</strong> ${{ $pa->arl }}</div>
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
