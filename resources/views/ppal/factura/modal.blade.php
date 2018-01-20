<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete">

<div class="col-lg-12">


	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 align="center">Imprimir Reporte</h4>
			</div>
			{!! Form::open(['action' => 'PagoController@imprimereporte'])!!}
			<div align="center">
				<label for="mes">Buscar por fecha</label>
					<select name="mes">
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>

			</div>




			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Confirmar</button>
{{Form::close()}}
			</div>
		</div>

	</div>

</div>
</div>
