<?php
class private_helper
{
    public static function head($title)
	{
		print('
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
				<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/sidebar.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
				<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
                <title>SISMED - '.$title.'</title>
            </head>
        ');
    }
    
    //Método que contiene el navbar, tiene color azul, las opciones del navbar se pueden adaptar
    public static function navbar()
	{
		print('
            <body>
				<div class="wrapper">
					<!-- Sidebar  -->
					<nav id="sidebar">
						<div class="sidebar-header">
							<h3>Sismed</h3>
							<strong>SM</strong>
						</div>
						<ul class="list-unstyled components">
							<li><a href="agenda.php"><i class="fas fa-home"></i> Agenda</a></li>
							<li><a href="pacientes.php"><i class="fas fa-user"></i> Pacientes</a></li>
							<li><a href="consultas.php"><i class="fas fa-sign-out-alt"></i> Consultas</a></li>
							<li><a href="citas.php"><i class="fas fa-sign-out-alt"></i> Citas</a></li>
						</ul>
					</nav>
        ');
	}

	public static function footer()
	{
		print('
					</div>		
				</div>
				<footer>
					<div class="row">
						<div class="col col-sm-12">
							<h1>Footer de prueba</h1>
						</div>
					</div>
				</footer>
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
            </body>
            </html>
        ');
	}
}