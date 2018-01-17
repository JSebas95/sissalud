@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<h3>Editar Proveedor: {{ $cliente->nombre }} {{ $cliente->apellido}}</h3>
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




<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Restablecer</button>
			<a class="btn btn-primary" href="/ppal/factura" role="button">Cancelar</a>
</form>
	</div>
</div>
</div>
{!!Form::close()!!}
@endsection
