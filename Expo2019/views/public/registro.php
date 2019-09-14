<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Registrarse");
?>
<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="form-registro">
					<form method="post" id="form-registro" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Registro</h2>
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
								<small id="passwordHelp" class="form-text text-muted">La contraseña debe ser de 7-15 caracteres de longitud. Debe contener letras, números y no debe contener espacios, caracteres especiales o emojis</small>
								<div class="invalid-feedback">Ingrese una contraseña</div>
							</div>
							<div class="form-group col-md-6">
								<label for="clave2">Confirmar contraseña</label>
								<input type="password" class="form-control" id="clave2" name="clave2" placeholder="Confirmar contraseña" maxlength="15" required>
								<div class="invalid-feedback">No ha confirmado la contraseña</div>
							</div>
							<div class="form-group col-md-6">
								<label for="fecha">Fecha de nacimiento</label>
								<input type="date" class="form-control" id="fecha" name="fecha" min="1939-01-01" max="2010-12-31" placeholder="Fecha de nacimiento" required>
								<div class="invalid-feedback">Ingrese una fecha válida</div>
							</div>
							<!--<div class="form-group col-sm-12 col-md-6">
								<label for="create_archivo">Seleccionar foto de perfil</label>
								<input type="file" id="create_archivo" name="create_archivo" class="file-input">
								<small id="passwordHelp" class="form-text text-muted">El archivo debe ser formato .jpg, .png, .gif. Dimensiones máximas 500px x 500px. Tamaño máximo 2MB.</small>
								<div class="invalid-feedback">Debe seleccionar un archivo.</div>
							</div>-->
							<div class="form-group col-sm-12 col-md-6">
								<label for="estatura">Estatura</label>
								<input id="estatura" type="text" name="estatura" class="form-control" placeholder="Estatura" maxlength="3">
								<small id="estaturaHelp" class="form-text text-muted">Debe ingresar su estatura en centímetros, en caso de que no la conozca deje el campo vacío.</small>
								<div class="invalid-feedback">Ingrese su estatura en centímetros</div>
							</div>
							<div class="form-group col-sm-12 col-md-6">
								<label for="peso">Peso</label>
								<input id="peso" type="text" name="peso" class="form-control" placeholder="Peso" maxlength="3">
								<small id="pesoHelp" class="form-text text-muted">Debe ingresar su peso en libras, en caso de que no lo conozca deje el campo vacío</small>
								<div class="invalid-feedback">Ingrese su peso en libras</div>
							</div>
							<div class="form-group col-sm-12 col-md-6">
                            	<div class="g-recaptcha center" data-sitekey="6Lev7bQUAAAAAByJBru1V29JWpg5oo18d6SFuHKy"></div>
							</div>
						</div>
						
						
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Registrarse</button>
						</div>
					</form>
					<p class="text-center small">¿Ya tienes una cuenta? <a href="index.php">¡Inicia sesión!</a></p>
				</div>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../core/helpers/functions.js"></script>
	<script type="text/javascript" src="../../core/controllers/public/account.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>