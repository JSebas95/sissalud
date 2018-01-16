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
  </style>
</head>


<body>

<div align="center">

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
                          <div id ="izquierda">Salud: $</div>
                          <div id ="derecha">{{ $pa->valor }}</div>
                          <!--<div id ="izquierda">Pensión: $</div>
                          <div id ="derecha">{{ $pa->valor }}</div>
                          <div id ="izquierda">ARL: $</div>
                          <div id ="derecha">{{ $pa->valor }}</div>-->
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
