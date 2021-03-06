<?php
include "../../core/helpers/public/public_helper.php";
?>

<?php
public_helper::head("Iniciar sesión");
public_helper::nav();
?>

<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="login-form">
					<form  method="post" id="form-sesion" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Iniciar sesión</h2>
						<div class="form-group">
							<input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="clave" placeholder="Contraseña" required="required">
						</div>
						
						<div class="form-group text-center">
							<a href="recuperar1.php" class="text-center">¿Olvidaste tu contraseña?</a> 
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block" href="home.php">Iniciar sesión</button>
						</div>
						<div class="clearfix text-center">
							<!--<label class="pull-left checkbox-inline text-center"><input type="checkbox">Recuerdame</label>-->
						</div
						
						<div class="form-group text-center">
							<p class="text-center">¿No estás registrado? <a href="registro.php">¡Registrate aquí!</a></p>
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
	<script type="text/javascript" src="../../core/controllers/public/index.js"></script>

</body>

</html>