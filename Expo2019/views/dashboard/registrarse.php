<?php
include "../../core/helpers/public/public_page.php";
include "../../core/helpers/dashboard/footeradmin.php";
Public_page::header("Principal");
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de registrarse</title>
	<link rel="stylesheet" href="../../resources/css/materialize.min.css">
	 <link href="../../resources/css/fonts.css" rel="stylesheet">
</head>
<body>
	<section class="container">
		<div class="row">
		<h3 class="center-align">Registrarse</h3>
			<article class="col s6 offset-s3">
				<form method="POST" action="form">
					<div class="input-field">
						<i class="material-icons prefix">perm_identity</i>
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required>
					</div>

					<div class="input-field">
						<i class="material-icons prefix">person_pin</i>
						<label for="apellido">Apellido</label>
						<input type="text" name="apellido" required>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">email</i>
						<label for="email">Correo electrónico</label>
						<input type="email" name="email" required>
					</div>
                    <div class="input-field">
						<i class="material-icons prefix">people</i>
						<label for="usuario">Usuario</label>
						<input type="text" name="usuario" required>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">vpn_key</i>
						<label for="contraseña">Contraseña</label>
						<textarea name="contraseña" id="" rows="10" class="materialize-textarea"  length="140" required></textarea>
					</div>
					
					<p class="center-align">
						<button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>Registrarse</button>
					</p>

				</form>

			</article>
		</div>
	</section>


	<script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/materialize.min.js"></script>
</body>
</html>

 
        