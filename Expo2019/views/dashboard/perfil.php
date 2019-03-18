<?php
include('../../core/helpers/dashboard/navbaradmin.php');
include('../../core/helpers/dashboard/footeradmin.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../resources/img/jardin-iso.png">
    <link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
    <link rel="stylesheet" href="../../resources/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/sidenav.css">
    <title>Perfil</title>
</head>

<body class="has-fixed-navbar">
    <header>
        <?php
        echo navbar::nav();
        echo navbar::sidenav();
        ?>
    </header>
    <main>
        <div class="container">
            <div class="row center-align">
                <div class="col s12">
                    <h3>Perfil</h3>
                    <form class="col s12">
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <label for="apellido">Apellido</label>
                            <input type="text" name="nombre" required>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">people</i>
                            <label for="usuario">Usuario</label>
                            <input type="text" name="nombre" required>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                                <input id="password" type="password" class="validate">
                                <label for="password">Contraseña</label>
                            </div>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Seleccionar foto</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <i class="material-icons prefix">add_a_photo</i>
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/materialize.min.js"></script>
</body>

</html> 