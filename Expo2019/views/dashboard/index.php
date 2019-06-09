<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Iniciar sesión");
?>

<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="login-form">
					<form action="../../views/dashboard/pagina.php" method="post">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Iniciar sesión</h2>
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Nombre de usuario" required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesión</button>
						</div>
						<div class="clearfix">
							<label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>
							<a href="#" class="pull-right">¿Olvidaste tu contraseña?</a>
						</div>
					</form>
					<p class="text-center">¿No estás registrado? <a href="registrarse.php">¡Registrate aquí!</a></p>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
	<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
	<script type="text/javascript" src="../../resources/js/Chart.js"></script>
	<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
</body>
</html>