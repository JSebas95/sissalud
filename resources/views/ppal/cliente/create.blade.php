@extends ('layouts.admin')
@section('contenido')

<div class="container">

  <h1>Cliente Nuevo</h1>

  <div class="col-lg-12" >

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(array('url'=>'ppal/cliente','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}


                <div class="row">


                  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                    <label for="full_name_id" class="control-label">Nombre</label>
          <input type="text" style="text-transform:uppercase;" class="form-control" id="full_name_id" name="nombre" placeholder="Nombre">

                  </div>



      <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
         <label for="street1_id" class="control-label" >Apellido</label>
         <input type="text" style="text-transform:uppercase;" class="form-control" id="street1_id" name="apellido" placeholder="Apellido">
     </div>



       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
     <label for="state_id" class="control-label">Tipo de docuemnto</label>
     <select class="form-control" style="text-transform:uppercase;" id="state_id" name="tipo">
         <option value="tipo_cc">CC</option>
         <option value="tipo_ce">Cedula de extranjeria</option>

     </select>
 </div>


  <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
     <label for="street2_id" class="control-label">Numero de documento</label>
     <input type="text" style="text-transform:uppercase;" class="form-control" id="street2_id" name="cc" placeholder="Numero">
 </div>

 <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
    <label for="correo" class="control-label">Correo electronico</label>
    <input type="text" style="text-transform:uppercase;" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
</div>



       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
         <label for="street2_id" class="control-label">Telefono</label>
         <input type="text" style="text-transform:uppercase;" class="form-control" id="street2_id" name="telefono" placeholder="Numero">
     </div>





<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Guardar</button>
      <button class="btn btn-danger" type="reset">Cancelar</button>
    </div>

  </div>
    </div>
        {!!Form::close()!!}
</div>
</div>


@stop
