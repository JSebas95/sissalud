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
                        <div id ="izquierda">Correo:</div>
                        <div id ="derecha">{{ $cli->correo }}</div>

                        <div id ="izquierda">Concepto:</div>


                          {!!Form::open(['action' => ['PpalController@stores', $cli->id_user]])!!}
                           {{Form::token()}}

                          <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
                          	<div class="form-group">
                          			<select name="concepto" id="concepto" value="11" class="form-control">
                                  <option value="99">ELEGIR CONCEPTO</option>
                                  <option value="0">SALUD</option>
                          			  <option value="1">SALUD + CONFAMILIAR</option>
                                  <option value="2">SALUD + PENSION</option>
                          			  <option value="3">SALUD + PENSION + CONFAMILIAR</option>
                                  <option value="4">SALUD + ARL 1</option>
                          			  <option value="5">SALUD + ARL 2</option>
                                  <option value="6">SALUD + ARL 3</option>
                          			  <option value="7">SALUD + ARL 4</option>
                                  <option value="8">SALUD + ARL 5</option>
                          			  <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
                                  <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
                          			  <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
                                  <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
                          			  <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
                                  <option value="12">SALUD + ARL 1 + PENSION</option>
                          			  <option value="15">SALUD + ARL 2 + PENSION</option>
                                  <option value="16">SALUD + ARL 3 + PENSION</option>
                          			  <option value="17">SALUD + ARL 4 + PENSION</option>
                                  <option value="18">SALUD + ARL 5 + PENSION</option>
                          			  <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
                                  <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
                          			  <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
                                  <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
                          			  <option value="23">SALUD + ARL 51 + PENSION + CONFAMILIAR</option>
                          			</select>

                          		</div>
                          </div>
                          <div id ="izquierda">Observaciones:</div>
                          <div id ="derecha"><textarea rows="1" cols="25" >{{$cli->observaciones}}</textarea></div>
                        </div>


            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            	<thead style="background-color:#caf5a9">
            		<th>Opciones</th>
            		<th>Descripción</th>
            		<th>Valor Total</th>
            	</thead>
            	<tfoot>
            		<th>Total</th>
            		<th type="text" id="conceptos" name="conceptos"></th>


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
  $('#concepto').click(function(){
    agregarsalud();
  });
});

function agregarsalud(){
   var valor = $("#concepto option:selected").html();
   var value = $("#concepto").val();


   if(value==0){
     conceptofinal=60000;
   }else if (value==1) {
     conceptofinal=92000;
   }else if (value==2) {
     conceptofinal=185000;
   }else if (value==3) {
     conceptofinal=217000;
   }else if (value==4) {
     conceptofinal=63000;
   }else if (value==5) {
     conceptofinal=67000;
   }else if (value==6) {
     conceptofinal=78000;
   }else if (value==7) {
     conceptofinal=93000;
   }else if (value==8) {
     conceptofinal=114000;
   }else if (value==9) {
     conceptofinal=95000;
   }else if (value==10) {
     conceptofinal=99000;
   }else if (value==11) {
     conceptofinal=110000;
   }else if (value==12) {
     conceptofinal=124000;
   }else if (value==13) {
     conceptofinal=145000;
   }else if (value==14) {
     conceptofinal=185000;
   }else if (value==15) {
     conceptofinal=189000;
   }else if (value==16) {
     conceptofinal=200000;
   }else if (value==17) {
     conceptofinal=215000;
   }else if (value==18) {
     conceptofinal=236000;
   }else if (value==19) {
     conceptofinal=217000;
   }else if (value==20) {
     conceptofinal=221000;
   }else if (value==21) {
     conceptofinal=232000;
   }else if (value==22) {
     conceptofinal=246000;
   }else if (value==23) {
     conceptofinal=267000;
   }else{
     conceptofinal=0;
   }

        document.getElementById("conceptos").innerHTML = valor;
        $("#total").val(conceptofinal);
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
