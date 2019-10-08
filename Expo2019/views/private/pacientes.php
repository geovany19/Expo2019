<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Paciente');
private_helper::nav();
?>
<form id='form-paciente' autocomplete="off">
	<input type="hidden" name="idPaciente2" id="idPaciente2">
	<input type="hidden" name="idCita" id="idCita">
	<input type="hidden" name="idEstado" id="idEstado">
	<div class="form-group">
		<label for="Nombre" class="col-form-label">Nombre paciente:</label>
		<input type="text" name="nombrePaciente" id="nombrePaciente" class="form-control" required />
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
	<br>
	<button type="submit" class="btn btn-primary">Procesar</button>
</form>
<?php
private_helper::footerTemplate('paciente.js');
?>