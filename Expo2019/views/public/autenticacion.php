<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Paso 2: Iniciar sesión");
?>
<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="form-registro">
					<form method="post" id="form-autenticacion" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Paso 2: Iniciar sesión</h2>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="codigo">Código</label>
								<input id="codigo" type="numer" name="codigo" class="form-control" placeholder="Código de autenticación" maxlength="10" required>
								<div class="invalid-feedback">Ingrese su código de autenticación</div>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesión</button>
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
</body>

</html>