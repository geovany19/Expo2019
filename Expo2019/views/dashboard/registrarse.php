<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Registrarse");
?>

<body id="body-registrarse">
	<main class="container">
		<h2 class="text-center">Registrate</h2>
		<form method="post" id="form-register" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="form-group col-sm-12 col-md-6">
					<label for="nombres">Nombres</label>
					<input id="nombres" type="text" name="nombres" class="form-control" placeholder="Nombres" maxlength="25" required>
					<div class="invalid-feedback">Ingrese sus nombres</div>
				</div>
				<div class="form-group col-sm-12 col-md-6">
					<label for="apellidos">Apellidos</label>
					<input id="apellidos" type="text" name="apellidos" class="form-control" placeholder="Apellidos" maxlength="25" required>
					<div class="invalid-feedback">Ingrese sus apellidos</div>
				</div>
				<div class="form-group col-md-6">
					<label for="correo">Correo electrónico</label>
					<input id="correo" type="email" name="correo" class="form-control" placeholder="Correo electrónico" maxlength="100" required>
					<div class="invalid-feedback">Ingrese su correo electrónico</div>
				</div>
				<div class="form-group col-md-6">
					<label for="usuario">Nombre de usuario</label>
					<input id="usuario" type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" maxlength="25" required>
					<div class="invalid-feedback">Ingrese su nombre se usuario</div>
				</div>
				<div class="form-group col-md-6">
					<label for="clave1">Contraseña</label>
					<input type="password" class="form-control" id="clave1" name="clave1" placeholder="Contraseña" maxlength="15" required>
					<small id="passwordHelp" class="form-text text-muted">La contraseña debe ser de 7-15 caracteres de longitud. Debe contener letras, números y no debe contener espacios, caracteres especiales o emojis.</small>
					<div class="invalid-feedback">Ingrese una contraseña</div>
				</div>
				<div class="form-group col-md-6">
					<label for="clave2">Confirmar contraseña</label>
					<input type="password" class="form-control" id="clave2" name="clave2" placeholder="Confirmar contraseña" maxlength="15" required>
					<div class="invalid-feedback">No ha confirmado la contraseña</div>
				</div>
				<div class="form-group col-md-6">
					<label for="fecha">Fecha de nacimiento</label>
					<input type="date" class="form-control" id="fecha" name="fecha" min="2000-01-01" max="2019-06-11" placeholder="Fecha de nacimiento" required>
					<div class="invalid-feedback">Ingrese una fecha válida</div>
				</div>
				<!--<div class="form-group col-sm-12 col-md-6">
					<label for="create_archivo">Seleccionar foto de perfil</label>
					<input type="file" id="create_archivo" name="create_archivo" class="file-input">
					<small id="passwordHelp" class="form-text text-muted">El archivo debe ser formato .jpg, .png, .gif. Dimensiones máximas 500px x 500px. Tamaño máximo 2MB.</small>
					<div class="invalid-feedback">Debe seleccionar un archivo.</div>
				</div>-->
				<div class="form-group col-sm-12">
					<input type="hidden" id="create_estado" name="create_estado" value="1">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Registrarse</button>
					<a href="index.php">Volver al inicio</a>
				</div>
			</div>
		</form>
	</main>
	<?php
	dashboard_helper::footer('registrarse.js');
	?>