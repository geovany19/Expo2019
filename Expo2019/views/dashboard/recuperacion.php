<?php
include "../../core/helpers/public/public_page.php";
include "../../core/helpers/dashboard/footeradmin.php";
Public_page::header("Principal");
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de recuperacion</title>
	<link rel="stylesheet" href="../../resources/css/materialize.min.css">
	 <link href="../../resources/css/fonts.css" rel="stylesheet">
</head>
<body>
	<section class="container">
		<div class="row">
		<h3 class="center-align">Recuperar contraseña</h3>
			<article class="col s6 offset-s3">
				<form method="POST" action="">
				<div class="row">
				<div class="input-field col s12">
					<input disabled value="Federico1" id="Nombre" type="text" class="validate">
					<label for="disabled">Disabled</label>
					</div>
				</div>	
				<div class="row">
                            <form class="col s12">
                            <div class="row">
                                <div class="input-field col s7">
                                <i class="material-icons prefix">comment</i>
                                <select>
                                    <option value="" disabled selected>Escoge tu pregunta</option>
                                    <option value="1"disabled selected>¿Color favorito?</option>
                                    <option value="2">¿Nombre de la mascota?</option>
                                    <option value="3">¿Apodo favorito?</option>
                                    <option value="3">¿Cuál fue tu última mascota?</option>
                                    </select>
                                    <label>Pregunta</label>
                                </div>
                                <div class="input-field col s5">
                                <i class="material-icons prefix">description</i>
                                <input id="respuesta" type="tel" class="validate">
                                <label for="respuesta">Respuesta</label>
                                </div>
                            </div>
							<div class="input-field">
								<i class="material-icons prefix">vpn_key</i>
								<input id="password" type="password" class="validate">
								<label for="contraseña">Contraseña</label>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">vpn_lockey</i>
								<input id="password" type="password" class="validate">
								<label for="Confirmar contraseña">Confirmar contraseña</label>
							</div>
                            </form>
                    </div>
					<p class="center-align">
						<button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>Recuperar</button>
					</p>
				</form>

			</article>
		</div>
	</section>



	<script src="../../resources/js/jquery.js"></script>
    <script src="../../resources/js/inicializacion.js"></script>
	<script src="../../resources/js/materialize.min.js"></script>
</body>
</html>