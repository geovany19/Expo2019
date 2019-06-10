<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Paciente');
?>
<div class="form-group">
	<label for="Nombre" class="col-form-label">Nombre paciente:</label>
	<input id="Nombre" type="text" name="Nombre" class="form-control" required/>
</div>
<div class="form-group">
	<label for="Peso" class="col-form-label">Peso:</label>
	<input id="Peso" type="number" name="Peso" class="form-control" required/>
</div>

<div class="form-group">
	<label for="Peso" class="col-form-label">Peso:</label>
	<input id="Peso" type="number" name="Peso" class="form-control" required/>
</div>

<div class="form-group">
	<label for="Estatura" class="col-form-label">Estatura:</label>
	<input id="Estatura" type="number" name="Estatura" class="form-control" required/>
</div>

<div class="form-group">
	<label for="Edad" class="col-form-label">Edad:</label>
	<input id="Edad" type="password" name="Edad" class="form-control" required/>
</div>


<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Padecimintos</span>
  </div>
  <textarea class="form-control" aria-label="With textarea"></textarea>
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Receta</span>
  </div>
  <textarea class="form-control" aria-label="With textarea"></textarea>
</div>

<?php
private_helper::footerTemplate('');
?>