<?php
include "../../core/helpers/public/public_helper.php";
?>

<?php
public_helper::head("Registrarse");
?>
<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="login-form-registro">
					<form method="post" id="registro-form">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Registro</h2>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Password</label>
								<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Registrarse</button>
						</div>
					</form>
					<p class="text-center small">¿Ya tienes una cuenta? <a href="#">¡Inicia sesión!</a></p>
				</div>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
</body>

</html>