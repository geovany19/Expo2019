<?php
include "../../core/helpers/dashboard/dashboard_helper.php";
dashboard_helper::head("Iniciar sesión");
dashboard_helper::navIndex();
?>

<body>
	<main id="main">
		<div class="login-form">
			<form action="../../views/dashboard/pagina.php" method="post">
				<div class="avatar">
					<img src="/examples/images/avatar.png" alt="Avatar">
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
			<p class="text-center small">¿No estás registrado? <a href="#">¡Registrate aquí!</a></p>
		</div>
	</main>

	<footer>

	</footer>

	<script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/materialize.min.js"></script>
</body>

</html>