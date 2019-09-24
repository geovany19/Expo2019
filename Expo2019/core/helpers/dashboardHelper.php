<?php
class dashboardHelper
{
	public static function head($title)
	{
		session_start();
		ini_set('date.timezone', 'America/El_Salvador');
		print('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<link rel="shortcut icon" href="../../resources/img/dashboard/img4.jpg">
				<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap-select.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_recuperar.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/public/estilos_login.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/sidebar.css">
				<link rel="stylesheet" type="text/css" href="../../resources/fonts/poppins.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/private/doctores.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/datatables.min.css">
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/responsive.bootstrap4.min.css">-->
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/colReorder.bootstrap4.min.css">-->
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/scroller.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/buttons.bootstrap4.min.css">-->
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/fixedColumns.bootstrap4.min.css">-->
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/fixedHeader.bootstrap4.min.css">-->
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/rowReorder.bootstrap4.min.css">-->
				<!--<link rel="stylesheet" type="text/css" href="../../resources/css/select.bootstrap4.min.css">-->
                <title>SISMED - ' . $title . '</title>
            </head>
        ');
	}

	public static function nav()
	{
		if (isset($_SESSION['idUsuario'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registrarse.php') {
				print('
					<body>
						<div class="wrapper">
							<nav id="sidebar">
								<div class="sidebar-header">
									<h3>Sismed</h3>
									<strong>SM</strong>
								</div>
								<ul class="list-unstyled components">
									<li>
										<a href="pagina.php">
											<i class="fas fa-home"></i>
											Inicio
										</a>
									</li>
									<li class="active">
										<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
											<i class="fas fa-book"></i> Tablas
										</a>
										<ul class="collapse list-unstyled" id="homeSubmenu">
											<li><a href="doctores.php">Doctores</a></li>
											<li><a href="pacientes.php">Pacientes</a></li>
											<li><a href="usuarios.php">Usuarios</a></li>
											<li><a href="especialidad.php">Especialidades</a></li>
											<li><a href="citas.php">Citas</a></li>
										</ul>
									</li>
									<li>
										<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
											<i class="fas fa-user"></i> Mi cuenta</b>
										</a>
										<ul class="collapse list-unstyled" id="pageSubmenu">
											<li>
												<a href="perfil.php">Editar perfil</a>
											</li>
										</ul>
									</li>
									<li><a href="#" onclick="signOff()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
								</ul>
							</nav>
						<div id="content">
							<nav class="navbar navbar-expand-lg navbar-light bg-light">
								<div class="container-fluid">
									<button type="button" id="sidebarCollapse" class="btn btn-info">
										<i class="fas fa-align-left"></i>
										<span>Minimizar menú</span>
									</button>
									<div class="badge badge-secondary text-wrap d-inline-block d-lg-none mr-auto" style="width: auto;">
										Cuenta: ' . $_SESSION['aliasUsuario'] . '
									</div>
									<!--<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<i class="fas fa-align-justify"></i>
									</button>-->
									<div class="collapse navbar-collapse" id="navbarSupportedContent">
									</div>
								</div>
							</nav>
							<main class="container">
							
				');
				
			} else {
				header('location: pagina.php');
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registrarse.php' && $filename != 'verificacion2pasos.php') {
				header('location: index.php');
			} 
		}
	}

	public static function footer($controller)
	{
		print('
				<footer class="page-footer">
					<div class="container text-center text-md-left">
						<div class="row">
						<div class="col-md-6 mt-md-0 mt-6">
							<h5 class="text-uppercase">Técnicos de mantenimiento</h5>
							<p class="footer-text">Bryan Amaya | bryan_amaya@gmail.com</p>
							<p class="footer-text">María Campos | maria_campos@gmail.com</p>
							<p class="footer-text">Geovany Pineda | geovany_pineda@gmail.com</p>
							<p class="footer-text">Federico Ramírez | federico_ramirez@gmail.com</p>
						</div>
						<hr class="clearfix w-100 d-md-none pb-3">
						<div class="col-md-6 mb-md-0 mb-6">
						</div>
						<!-- Grid column -->
						</div>
					</div>
					<!-- Copyright -->
					<div class="footer-copyright text-center py-3">© 2019 Copyright:
						<a href="#"> influencers</a>
					</div>
				</footer>
				</div>		
				</div>
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap-select.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
				<script type="text/javascript" src="../../resources/js/solid.js"></script>
				<script type="text/javascript" src="../../resources/js/fontawesome.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
				<script type="text/javascript" src="../../resources/js/inicializacion.js"></script>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>
				<script type="text/javascript" src="../../resources/js/datatables.min.js"></script>
				<!--<script type="text/javascript" src="../../resources/js/responsive.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/select.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/colReorder.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/scroller.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/buttons.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/rowReorder.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/fixedColumns.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/fixedHeader.bootstrap4.min.js"></script>-->
				<script type="text/javascript" src="../../resources/js/pdfmake.min.js"></script>
				<script type="text/javascript" src="../../resources/js/vfs_fonts.js"></script>
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				<script type="text/javascript" src="../../core/helpers/componentes.js"></script>
				<script type="text/javascript" src="../../core/controllers/dashboard/logout.js"></script>
				<script type="text/javascript" src="../../resources/js/moment-with-locales.js"></script>
				<script type="text/javascript" src="../../core/controllers/dashboard/' . $controller . '"></script>
				
            </body>
            </html>
        ');
	}
}
