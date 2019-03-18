<?php
            include('../../core/helpers/private/navbarprivate.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="">
    <link rel="stylesheet" href="../../resources/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Administrador</title>
</head>
<body class="has-fixed-sidenav">
    <header>
        <?php
            echo navbar :: nav();
            echo navbar :: sidenav();

        ?>
    </header>
    <main>
    </main>
    <footer>
    </footer>

    <script src="../../resources/js/jquery.js"></script>
    <script src="../../resources/js/materialize.min.js"></script>
    <script src="../../resources/js/init.js"></script>
</body>
</html>