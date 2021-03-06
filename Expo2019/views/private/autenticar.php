<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Autenticar usuario');
private_helper::nav();
?>
<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="form-registro">
					<form method="post" id="form-autenticar" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Recuperar contraseña</h2>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="codigo">Correo electrónico</label>
								<input id="codigo" type="numer" name="codigo" class="form-control" placeholder="Código de autenticación" maxlength="10" required>
								<div class="invalid-feedback">Ingrese su código de autenticación</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Autenticar</button>
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
	<script type="text/javascript" src="../../core/controllers/private/correo.js"></script>
</body>

</html>