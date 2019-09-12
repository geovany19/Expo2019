<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Iniciar sesion');
private_helper::nav();
?>

<body id="body">
    <main id="main">
        <div class="row">
            <div class="col col-sm-12">
                <div class="login-form">
                    <form method="post" id="login-1">
                        <div class="avatar">
                            <img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
                        </div>
                        <h2 class="text-center">Iniciar sesión</h2>
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control validate" placeholder="Nombre de usuario" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control validate" id="clave" name="clave" placeholder="Contraseña" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesión</button>
                        </div>
                        <div class="clearfix">
                            <!--<label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>-->
                            <a href="#" class="pull-right">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <main>
</body>
<?php
private_helper::footerTemplate('index.js');
?>