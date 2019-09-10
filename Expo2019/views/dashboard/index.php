<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Iniciar sesión");
?>

<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="login-form">
					<form method="post" id="form-sesion" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Iniciar sesión</h2>
						<div class="form-group">
							<input type="text" id="usuario" class="form-control" name="usuario" placeholder="Nombre de usuario" required="required">
						</div>
						<div class="form-group">
							<input type="password" id="clave" class="form-control" name="clave" placeholder="Contraseña" required="required">
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
	<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
	<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
	<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../resources/js/Chart.js"></script>
	<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
	<script type="text/javascript" src="../../core/helpers/functions.js"></script>
	<script type="text/javascript" src="../../core/controllers/dashboard/login.js"></script>
</body>
</html>