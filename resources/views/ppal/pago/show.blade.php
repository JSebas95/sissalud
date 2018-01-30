
@extends ('layouts.admin')
@section('contenido')
<style>
#contenedor{
  width: 100%;
  display: inline-block;
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
  display: inline;
}

</style>
<div class="container">


  <h1>Pago de servicios</h1>

  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif



    <div id ="contenedor">
      <div id ="izquierda">Nombres: </div>
      <div id ="derecha">{{ $cliente->nombre }}</div>
    </div>
    <div id ="contenedor">
      <div id ="izquierda">Apellidos: </div>
      <div id ="derecha">{{ $cliente->apellido }}</div>
      </div>
    <div id ="contenedor">
      <div id ="izquierda">CC: </div>
      <div id ="derecha">{{ $cliente->cc }}</div>
      </div>
    <div id ="contenedor">
      <div id ="izquierda">Telefono: </div>
      <div id ="derecha">{{ $cliente->telefono }}</div>
      </div>
    <div id ="contenedor">
      <div id ="izquierda">Correo:</div>
      <div id ="derecha">{{ $cliente->correo }}</div>
      </div>
    <div id ="contenedor">
      <div id ="izquierda">Arl:</div>
      <div id ="derecha">{{ $cliente->arl }}</div>
</div>
    <div id ="contenedor">
      <div id ="izquierda">EPS:</div>
      <div id ="derecha">{{ $cliente->eps }}</div>
</div>
    <div id ="contenedor">
      <div id ="izquierda">Pension:</div>
      <div id ="derecha">{{ $cliente->pension }}</div>
<div id ="contenedor">
      <div id ="izquierda">Concepto:</div>


      {!!Form::open(['action' => ['PpalController@stores', $cliente->id_user]])!!}
      {{Form::token()}}

      @if($cliente->ultimo_pago == NULL || $cliente->ultimo_pago == 0000-00-00)
      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>

      @elseif($pago->concepto == 0)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" selected>SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 1)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0">SALUD</option>
            <option value="1" selected>SALUD + CONFAMILIAR</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 2)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2" selected>SALUD + PENSION</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 3)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3" selected>SALUD + PENSION + CONFAMILIAR</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 4)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4" selected>SALUD + ARL 1</option>
            <option value="5">SALUD + ARL 2</option>
            <option value="6">SALUD + ARL 3</option>
            <option value="7">SALUD + ARL 4</option>
            <option value="8">SALUD + ARL 5</option>
            <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 5)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4">SALUD + ARL 1</option>
            <option value="5" selected>SALUD + ARL 2</option>
            <option value="6">SALUD + ARL 3</option>
            <option value="7">SALUD + ARL 4</option>
            <option value="8">SALUD + ARL 5</option>
            <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 6)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4">SALUD + ARL 1</option>
            <option value="5">SALUD + ARL 2</option>
            <option value="6" selected>SALUD + ARL 3</option>
            <option value="7">SALUD + ARL 4</option>
            <option value="8">SALUD + ARL 5</option>
            <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 7)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4">SALUD + ARL 1</option>
            <option value="5">SALUD + ARL 2</option>
            <option value="6">SALUD + ARL 3</option>
            <option value="7" selected>SALUD + ARL 4</option>
            <option value="8">SALUD + ARL 5</option>
            <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 8)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4">SALUD + ARL 1</option>
            <option value="5">SALUD + ARL 2</option>
            <option value="6">SALUD + ARL 3</option>
            <option value="7">SALUD + ARL 4</option>
            <option value="8" selected>SALUD + ARL 5</option>
            <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 9)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4">SALUD + ARL 1</option>
            <option value="5">SALUD + ARL 2</option>
            <option value="6">SALUD + ARL 3</option>
            <option value="7">SALUD + ARL 4</option>
            <option value="8">SALUD + ARL 5</option>
            <option value="9" selected>SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10">SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 10)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
            <option value="1">SALUD + CONFAMILIAR</option>
            <option value="2">SALUD + PENSION</option>
            <option value="3">SALUD + PENSION + CONFAMILIAR</option>
            <option value="4">SALUD + ARL 1</option>
            <option value="5">SALUD + ARL 2</option>
            <option value="6">SALUD + ARL 3</option>
            <option value="7">SALUD + ARL 4</option>
            <option value="8">SALUD + ARL 5</option>
            <option value="9">SALUD + ARL 1 + CONFAMILIAR</option>
            <option value="10" selected>SALUD + ARL 2 + CONFAMILIAR</option>
            <option value="11">SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 11)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="11" selected>SALUD + ARL 3 + CONFAMILIAR</option>
            <option value="12">SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 12)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="12" selected>SALUD + ARL 4 + CONFAMILIAR</option>
            <option value="13">SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 13)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="13" selected>SALUD + ARL 5 + CONFAMILIAR</option>
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 14)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14" selected>SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 15)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15" selected>SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 16)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16" selected>SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 17)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17" selected>SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 18)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18" selected>SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 19)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19" selected>SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 20)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20" selected>SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 21)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21" selected>SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 22)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
            <option value="99">ELEGIR CONCEPTO</option>
            <option value="0" >SALUD</option>
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22" selected>SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23">SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      @elseif($pago->concepto == 23)

      <div id="derecha" class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
        <div class="form-group">
          <select name="concepto" id="concepto" class="form-control">
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
            <option value="14">SALUD + ARL 1 + PENSION</option>
            <option value="15">SALUD + ARL 2 + PENSION</option>
            <option value="16">SALUD + ARL 3 + PENSION</option>
            <option value="17">SALUD + ARL 4 + PENSION</option>
            <option value="18">SALUD + ARL 5 + PENSION</option>
            <option value="19">SALUD + ARL 1 + PENSION + CONFAMILIAR</option>
            <option value="20">SALUD + ARL 2 + PENSION + CONFAMILIAR</option>
            <option value="21">SALUD + ARL 3 + PENSION + CONFAMILIAR</option>
            <option value="22">SALUD + ARL 4 + PENSION + CONFAMILIAR</option>
            <option value="23" selected>SALUD + ARL 5 + PENSION + CONFAMILIAR</option>
          </select>

        </div>
      </div>
      </div>

      @endif
<div id ="contenedor">
      <div id ="izquierda">Observaciones:</div>
      <div id ="derecha"><textarea rows="1" cols="25" >{{$cliente->observaciones}}</textarea></div>
    </div>
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

agregarsalud()
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


</script>

{!!Form::close()!!}

@endpush

@stop
