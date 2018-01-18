@extends ('layouts.admin')
@section('contenido')
<style>
#contenedor{
        width: 80%;
}
#izquierda{
        height:50%;
        float:left;
        width:15%;
        padding-bottom: 5px;
        font-size:22px;
        font-weight: bold;
}
#derecha{
        height:50%;
        float:right;
        width:85%;
        padding-bottom: 5px;
        font-size:22px;
}

</style>
<div class="container">


  <h1>Pago de servicios</h1>

  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

            @foreach($cliente as $cli)

            <div id ="contenedor">
                        <div id ="izquierda">Nombres: </div>
                        <div id ="derecha">{{ $cli->nombre }}</div>
                        <div id ="izquierda">Apellidos: </div>
                        <div id ="derecha">{{ $cli->apellido }}</div>
                        <div id ="izquierda">CC: </div>
                        <div id ="derecha">{{ $cli->cc }}</div>
                        <div id ="izquierda">Telefono: </div>
                        <div id ="derecha">{{ $cli->telefono }}</div>
                        <div id ="izquierda">Concepto:</div>




              <input type="image" id="salud" name="salud" src="{{asset('img/salud.jpg')}}"  width="120" height="120"></img>
              <input type="image" id="arl" name="arl" src="{{asset('img/arl.png')}}"  width="120" height="120"></img>
              <input type="image" id="pension" name="pension" src="{{asset('img/pension.jpg')}}" width="120" height="120"></img>


              <input type="image" value="3000" onclick="cambiar();" id="calcular" src="{{asset('img/hoja.jpg')}}" width="50" height="50"></img>

              </div>
              {!!Form::open(['action' => ['PpalController@stores', $cli->id_user]])!!}
               {{Form::token()}}


            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            	<thead style="background-color:#caf5a9">
            		<th>Opciones</th>
            		<th>Descripción</th>
            		<th>Valor Total</th>
            	</thead>
            	<tfoot>
            		<th>Total</th>
            		<th></th>


                <th><input type="text" id="total" name="total" value="0"/></th>
            	</tfoot>
                <tbody></tbody>
            	</table>

  </div>
  </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset">Cancelar</button>
    </div>

  </div>



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

  salud=87300;
  subtotal[cont]=salud;
  total=total+subtotal[cont];

  var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><label value="'+salud+'">Salud</label></td><td><input type="text" id="pagarsalud"  name="pagarsalud" value="'+salud+'"/></td></tr>';
		cont++;
		evaluar();
		    $("#total").val(total);
		   $("#detalles").append(fila);

}

function agregararl(){
  arl=42500;
  subtotal[cont]=arl;
  total=total+subtotal[cont];

  var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><label value="'+arl+'">Arl</label></td><td><input type="text" id="pagararl" name="pagararl" value="'+arl+'"/></td></tr>';
		cont++;
		evaluar();
		    $("#total").val(total);
		   $("#detalles").append(fila);
}

function agregarpension(){
  pension=35700;
  subtotal[cont]=pension;
  total=total+subtotal[cont];

  var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><label value="'+pension+'">Pensión</label></td><td><input type="text" id="pagarpension" name="pagarpension" value="'+pension+'"/></td></tr>';
		cont++;
		evaluar();
		    $("#total").val(total);
		   $("#detalles").append(fila);
}

function evaluar(){
  if(total>0){
    $("#guardar").show();
  }else{
    $("#guardar").hide();
  }}

  function cambiar(){
    var x= $('#pagarsalud').val();
    var y = $('#pagararl').val();
    var z = $('#pagarpension').val();

    if(isNaN(x)){
      total=parseInt(y)+parseInt(z);
      $('#total').val(total);
    }else if (isNaN(y)) {
      total=parseInt(x)+parseInt(z);
      $('#total').val(total);
    }else if (isNaN(z)) {
      total=parseInt(x)+parseInt(y);
      $('#total').val(total);
    }else{
      total=parseInt(x)+parseInt(y)+parseInt(z);
      $('#total').val(total);

    }



}



function eliminar(index){
  total=total-subtotal[index];
  $('#total').val(total);
  $('#fila'+index).remove();
  evaluar();
  }


</script>
{!!Form::close()!!}
          @endforeach
@endpush

@stop
