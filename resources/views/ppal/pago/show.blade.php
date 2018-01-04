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

              <h2>Nombre: {{ $cli->nombre }}</h2>
              <h2>Apellido: {{ $cli->apellido }}</h2>
              <h2>CC: {{ $cli->cc }}</h2><!--Deuda-->
              <h2>Telefono: {{ $cli->telefono }}</h2>
              <h2>Concepto

                        @endforeach
              <img src="{{asset('img/arl.png')}}"  width="100" height="100"></img>
              <img src="{{asset('img/salud.jpg')}}"  width="100" height="100"></img>
              <img src="{{asset('img/pension.jpg')}}" width="100" height="100"></img></h2>



            	<table class="table table-striped table-bordered table-condensed table-hover" id="mitabla">
            	<thead>
            		<th>Descripcion</th>
            		<th>Cantidad</th>
            		<th>Precio</th>
            		<th>Descuento</th>
            		<th>Valor Total</th>

            	</thead>
            	<tfoot>
            		<th></th>
            		<th></th>
            		<th></th>
            		<th></th>
            		<th></th>
            		<th><h4 name="total" id="total"></h4></th>
            	</tfoot>

            	<tr>
            	<td></td>


            	</table>




  </div>
  </div>
@stop
