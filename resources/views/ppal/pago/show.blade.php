@extends ('layouts.admin')
@section('contenido')

<div class="container">


  <h1>Pago de servicios</h1>

  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

        @foreach($cliente as $cli)




              <h2 name="nombre">Nombre: {{ $cli->nombre }}</h2>
              <h2 id="apellido">Apellido: {{ $cli->apellido }}</h2>
              <h2 id="cc">CC: {{ $cli->cc }}</h2><!--Deuda-->
              <h2>Telefono: {{ $cli->telefono }}</h2>
              <h2>Concepto


              <input type="image" value="1000" id="salud" name="salud" src="{{asset('img/salud.jpg')}}"  width="100" height="100"></img>
              <input type="image" value="2000" id="arl" name="arl" src="{{asset('img/arl.png')}}"  width="100" height="100"></img>
              <input type="image" value="3000" id="pension" name="pension" src="{{asset('img/pension.jpg')}}" width="100" height="100"></img></h2>





            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            	<thead style="background-color:#caf5a9">
            		<th>opciones</th>
            		<th>Descripción</th>
            		<th>Valor Total</th>

            	</thead>
            	<tfoot>
            		<th>Total</th>
            		<th></th>
            		<th><h4 name="total" id="total">$0</h4></th>
            	</tfoot>
                <tbody></tbody>
            	</table>
  </div>
  </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
    <div class="form-group">
      <a href="{{URL::action('PpalController@stores',$cli->id_user)}}"><button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset">Cancelar</button>

    </div>

  </div>
          @endforeach


@push('scripts')
<script>

$(document).ready(function(){
  $('#salud').click(function(){
    agregarsalud();
  });
});

$(document).ready(function(){
  $('#arl').click(function(){
    agregararl();
  });
});

$(document).ready(function(){
  $('#pension').click(function(){
    agregarpension();
  });
});

var total=0;
cont=0;
total=0;
subtotal=[];


$("#guardar").hide();

function agregarsalud(){

  salud=1;
  subtotal[cont]=salud;
  total=total+subtotal[cont];

  var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><label value="'+salud+'">Pago de Salud</label></td><td>'+salud+'</td></tr>';
		cont++;
		evaluar();
		    $("#total").html("$/ " + total);
		   $("#detalles").append(fila);

}

function agregararl(){
  arl=2;
  subtotal[cont]=arl;
  total=total+subtotal[cont];

  var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><label value="'+arl+'">Pago de Arl</label></td><td>'+arl+'</td></tr>';
		cont++;
		evaluar();
		    $("#total").html("$/ " + total);
		   $("#detalles").append(fila);
}

function agregarpension(){
  pension=3;
  subtotal[cont]=pension;
  total=total+subtotal[cont];

  var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><label value="'+pension+'">Pago de Pensión</label></td><td>'+pension+'</td></tr>';
		cont++;
		evaluar();
		    $("#total").html("$/ " + total);
		   $("#detalles").append(fila);
}

function evaluar(){
  if(total>0){
    $("#guardar").show();
  }else{
    $("#guardar").hide();
  }}

function eliminar(index){
  total=total-subtotal[index];
  $('#total').html("$/ "+total);
  $('#fila'+index).remove();
  evaluar();
  }

</script>
@endpush

@stop
