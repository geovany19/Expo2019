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
		<h3 class="center-align">Iniciar Sesión</h3>
			<article class="col s6 offset-s3">
				<form method="POST" action="pagina.php">
                    <div class="input-field">
						<i class="material-icons prefix">people</i>
						<label for="usuario">Usuario</label>
						<input type="text" name="usuario" required>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" class="validate">
						<label for="contraseña" >Contraseña</label>
					
					</div>
                    <p class="center-align">
                        <label>
                            <input type="checkbox" />
                            <span>Recuerdame</span>
                        </label>
                    </p>
					<p class="center-align">
						<button class="waves-effect waves-light btn" type="submit"><i class="material-icons right">send</i>Iniciar Sesión</button>
					</p>

				</form>

			</article>
		</div>
	</section>

            <p class="text-center center-align blue-text text-darken-3">Olvidé mi contraseña</p>
            <p class="center-align">
				<a href="registrarse.php"><button class="waves-effect waves-light btn" type="submit" ><i class="material-icons right">person_add</i>Registrarse</button></a>
		    </p>
        </div>
        </form>
    </div>        
</div>

	<script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/materialize.min.js"></script>
</body>
</html>


<footer>
    <?php
    echo footer::footerbody();
    ?>
</footer>
