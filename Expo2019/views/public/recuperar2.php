<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Cambiar contraseña");
?>
<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="form-registro">
					<form method="post" id="form-recuperar" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Cambiar contraseña</h2>
						<div class="form-row">
							<div class="form-group col-md-12">
								<h5 class="text-center">Contraseña nueva</h5>
							</div>

							<div class="form-group col-md-6">
								<label for="clave_nueva_1">Contraseña</label>
								<input type="password" class="form-control" id="clave_nueva_1" name="clave_nueva_1" placeholder="Contraseña nueva" maxlength="15" required>
								<small id="passwordHelp" class="form-text text-muted">La contraseña debe ser mayor a 8  carácteres de longitud. Debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial, no debe contener espacios</small>
								<div class="invalid-feedback">Lea los requisitos</div>
							</div>

							<div class="form-group col-md-6">
								<label for="clave_nueva_2">Confirmar contraseña</label>
								<input type="password" class="form-control" id="clave_nueva_2" name="clave_nueva_2" placeholder="Confirmar contraseña" maxlength="15" required>
								<div class="invalid-feedback">No ha confirmado la contraseña</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Cambiar contraseña</button>
						</div>
					</form>
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