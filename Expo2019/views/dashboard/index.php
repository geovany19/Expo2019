<?php
include "../../core/helpers/public/public_page.php";
include "../../core/helpers/dashboard/footeradmin.php";
Public_page::header("Principal");
?>
<body class="text-center">
<div class="container">
    <div class="row">
    <form class="col s12">
            <img class="mb-4" src="../../resources/img/dashboard/img1.jpg" alt="" width="72" height="72">
            <h1 class="h3 center-align">Iniciar sesión</h1>
            <form class="col s12">
        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">First Name</label>
        </div>
            <div class="input-field col s6">
            <i class="material-icons prefix">lock</i>
            <input id="icon_lock" type="tel" class="validate">
            <label for="icon_lock">Contraseña</label>
            </div>
            <p class="center-align">
                <label>
                    <input type="checkbox" />
                    <span>Recuerdame</span>
                </label>
            </p>
            <p class="text-center center-align blue-text text-darken-3">Olvidé mi contraseña</p>
            <a class="btn blue darken-3 white-text waves-effect waves-light"href="registrarse.php">Registrarse</a>
            <a class="btn blue darken-3 white-text waves-effect waves-light" href="pagina.php">Iniciar sesión</a>
        </div>
        </form>
    </div>        
</div>
</body>
<footer>
    <?php
    echo footer::footerbody();
    ?>
</footer>
