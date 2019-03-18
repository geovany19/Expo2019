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
	<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/material_icons.css">
    <title>Administrador</title>
</head>
<body class="has-fixed-sidenav">
    <header>
        <?php
            echo navbar :: nav();
            echo navbar :: sidenav();
        ?>
    </header>
</body>
</html>