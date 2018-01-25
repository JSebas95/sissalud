@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<h3>Editar el cliente: {{ $cliente->nombre }} {{ $cliente->apellido}}</h3>
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>
					{{$error}}
					</li>
				@endforeach
			</ul>
		</div>
		@endif
		</div>
</div>
{!! Form::model($cliente,['method'=>'PATCH','route'=>['pago.update',$cliente->id_user]]) !!}
{{Form::token()}}
<div class="row">
<div class="col-lg-7 col-md-7 col-dm-7 col-xs-12">
	<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" value="{{$cliente->nombre}}" class="form-control" placeholder="Nombre...">
		</div>
</div>

<div class="col-lg-7 col-md-7 col-dm-7 col-xs-12">
	<div class="form-group">
			<label for="nombrecontacto">Apellido</label>
			<input type="text" name="apellido" value="{{$cliente->apellido}}" class="form-control" placeholder="Apellido">
		</div>
</div>


<div class="col-lg-7 col-md-7 col-dm-7 col-xs-12">
	<div class="form-group">
			<label for="num_documento">Numero de documento</label>
			<input type="text" name="cc" value="{{$cliente->cc}}" class="form-control" placeholder="Numero de identificacion...">
		</div>
</div>


<div class="col-lg-7 col-md-7 col-dm-7 col-xs-12">
	<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" value="{{$cliente->telefono}}" class="form-control" placeholder="telefono...">
		</div>
</div>
<div class="col-lg-7 col-md-7 col-dm-7 col-xs-12">
	<div class="form-group">
			<label for="estado">Estado</label>
			<select name="estado" value="{{$cliente->estado}}" class="form-control">
			  <option value="Activo">Activo</option>
			  <option value="Inactivo">Inactivo</option>
			</select>

		</div>
</div>

<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
	<div class="form-group">
<label for="tipo_usuario" class="control-label">Tipo de usuario</label>
<select class="form-control" value="{{$cliente->tipo_cliente}}"  name="tipo_usuario">
	<option value="afiliado">Afiliado</option>
	<option value="otro">Otro</option>

</select>
</div>
</div>

<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
	<div class="form-group">
<label for="empresa" class="control-label">Empresa</label>
<select class="form-control" value="{{$cliente->empresa}}"  name="empresa">
<option value="Operador_Empresarial">OPERADOR EMPRESARIAL</option>
<option value="Gestion_Integral">GESTION INTEGRAL</option>

</select>
</div>
</div>

<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
	<div class="form-group">
<label for="eps" class="control-label">EPS</label>
<input type="text" value="{{$cliente->eps}}" class="form-control"  name="eps" >
</div>
</div>

<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
	<div class="form-group">
<label for="arp" class="control-label">ARP</label>
<input type="text" value="{{$cliente->arp}}" class="form-control"  name="arp" >
</div>
</div>

<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
	<div class="form-group">
<label for="pension" class="control-label">Fondo Pension</label>
<input type="text" value="{{$cliente->pension}}" class="form-control"  name="pension" >
</div>
</div>



<div class="col-lg-7 col-md-7 col-dm-7 col-xs-12">
	<div class="form-group">
			<label for="observaciones">Observaciones</label>
			<textarea class="form-control" rows="10" cols="40" name="observaciones">{{$cliente->observaciones}}</textarea>

		</div>
</div>




<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-warning" type="reset">Restablecer</button>
			<a class="btn btn-danger" href="/ppal/pago" role="button">Cancelar</a>
</form>
	</div>
</div>
</div>
{!!Form::close()!!}
@endsection
