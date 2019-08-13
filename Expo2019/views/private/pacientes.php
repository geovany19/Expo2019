<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Paciente');
?>
<form id='form-paciente'>
	<input type="hidden" name="idPaciente" id="idPaciente">
	<input type="hidden" name="idCita" id="idCita">
	<input type="hidden" name="idEstado" id="idEstado">
	<div class="form-group">
		<label for="Nombre" class="col-form-label">Nombre paciente:</label>
		<input type="text" name="nombrePaciente" id="nombrePaciente" class="form-control" required />
	</div>
	<div class="form-group">
		<label for="Peso" class="col-form-label">Peso:</label>
		<input id="Peso" type="number" name="Peso" class="form-control" required />
	</div>

	<div class="form-group">
		<label for="Estatura" class="col-form-label">Estatura:</label>
		<input id="Estatura" type="number" name="Estatura" class="form-control" required />
	</div>

	<div class="form-group">
		<label for="presion" class="col-form-label">Presion:</label>
		<input id="presion" type="number" id="presion" name="presion" class="form-control" required />
	</div>


	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">Padecimintos</span>
		</div>
		<textarea type="text" name="padecimientos" id="padecimientos" class="form-control" aria-label="With textarea"></textarea>
	</div>
	<br>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">Receta</span>
		</div>
		<textarea type="text" name="receta" id="receta" class="form-control" aria-label="With textarea"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Procesar</button>
</form>
<?php
private_helper::footerTemplate('paciente.js');
?>