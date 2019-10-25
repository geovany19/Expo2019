<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Autenticar cuenta");
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
						<h2 class="text-center">Autenticar cuenta</h2>
						<p class="text-center">Ingrese el pin que se le envió al correo electrónico que utilizó al momento de registrarse</p>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="codigo">Código</label>
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
	<script type="text/javascript" src="../../core/controllers/public/account.js"></script>
</body>

</html>