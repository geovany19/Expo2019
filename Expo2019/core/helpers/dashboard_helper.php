<?php
class dashboard_helper
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
				<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap-select.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/sidebar.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/private/doctores.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/datatables.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/responsive.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/colReorder.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/scroller.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/buttons.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/fixedColumns.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/fixedHeader.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/rowReorder.bootstrap4.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/select.bootstrap4.min.css">
                <title>SISMED - ' . $title . '</title>
            </head>
        ');
	}

	public static function navIndex()
	{
		print('
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand mb-0  h1"><img src="../../resources/img/dashboard/img4.jpg" width="30" height="30" class="d-inline-block align-top" alt="">    Sismed</a>
			</nav>
		');
	}

	public static function nav()
	{
		if (isset($_SESSION['idUsuario'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registrarse.php') {
				self::modals();
				print('
					<body onload="startTime()">
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
											<li><a href="disponibilidad.php">Horarios de disponibilidad</a></li>
										</ul>
									</li>
									<li>
										<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
											<i class="fas fa-user"></i> Mi perfil - <b>' . $_SESSION['aliasUsuario'] . '</b>
										</a>
										<ul class="collapse list-unstyled" id="pageSubmenu">
											<li>
												<a href="#" onclick="modalProfile()">Editar perfil</a>
											</li>
											<li>
												<a href="#modal-password" class="modal-trigger" data-toggle="modal" data-target="#modal-password">Cambiar contraseña</a>
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
									<!--<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<i class="fas fa-align-justify"></i>
									</button>
									<div class="collapse navbar-collapse" id="navbarSupportedContent">
									</div>-->
								</div>
							</nav>
							<main class="container">
				');
			} else {
				header('location: pagina.php');
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registrarse.php') {
				header('location: index.php');
			} else {
				print('
					<nav class="navbar navbar-light bg" id="nav-registrarse">
						<a class="navbar-brand" href="#">
							<img src="../../resources/img/dashboard/img4.jpg" width="30" height="30" alt="">
						</a>
					</nav>
				');
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
							<h5 class="text-uppercase">Links</h5>
							<ul class="list-unstyled">
							<li>
								<a href="#!">Link 1</a>
							</li>
							<li>
								<a href="#!">Link 2</a>
							</li>
							<li>
								<a href="#!">Link 3</a>
							</li>
							<li>
								<a href="#!">Link 4</a>
							</li>
							</ul>
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
				<script type="text/javascript" src="../../resources/js/datatables.min.js"></script>
				<script type="text/javascript" src="../../resources/js/responsive.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/select.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/colReorder.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/scroller.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/buttons.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/rowReorder.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/fixedColumns.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/fixedHeader.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/pdfmake.min.js"></script>
				<script type="text/javascript" src="../../resources/js/vfs_fonts.js"></script>
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				<script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
				<script type="text/javascript" src="../../core/controllers/dashboard/' . $controller . '"></script>
            </body>
            </html>
        ');
	}

	public function modals()
	{
		print('
		<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Editar perfil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="form-profile" enctype="multipart/form-data">
						<div class="form-group">
							<label for="profile_nombre">Nombres</label>
							<input type="text" class="form-control" id="profile_nombre" name="profile_nombre" placeholder="Nombres">
						</div>
						<div class="form-group">
							<label for="profile_apellido">Apellidos</label>
							<input type="text" class="form-control" id="profile_apellido" name="profile_apellido" placeholder="Apellidos">
						</div>
						<div class="form-group">
							<label for="profile_nombre">Correo electrónico</label>
							<input type="email" class="form-control" id="profile_correo" name="profile_correo" placeholder="Correo electrónico">
						</div>
						<div class="form-group">
							<label for="profile_usuario">Nombre de usuario</label>
							<input type="text" class="form-control" id="profile_usuario" name="profile_usuario" placeholder="Nombre de usuario">
						</div>
						<div class="form-group">
							<label for="profile_nombre">Fecha de nacimiento</label>
							<input type="date" class="form-control" id="profile_fecha" name="profile_fecha" placeholder="Fecha de nacimiento">
						</div>
						<!--<div class="form-group">
							<label for="update_archivo">Foto</label>
							<input type="file" id="update_archivo" name="update_archivo" class="file-input">
						</div>-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
				</div>
			</div>
		</div>
	</div>
			<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalScrollableTitle">Cambiar contraseña</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" id="form-password">
								<div class="form-group">
									<label for="clave_actual_1">Contraseña antigua</label>
									<input type="password" class="form-control" id="clave_actual_1" name="clave_actual_1" placeholder="Contraseña actual">
								</div>
								<div class="form-group">
									<label for="clave_actual_2">Confirmar contaseña antigua</label>
									<input type="password" class="form-control" id="clave_actual_2" name="clave_actual_2" placeholder="Confirmar contraseña actual">
								</div>
								<div class="form-group">
									<label for="clave_nueva_1">Nueva contraseña</label>
									<input type="password" class="form-control" id="clave_nueva_1" name="clave_nueva_1" placeholder="Nueva contraseña">
								</div>
								<div class="form-group">
									<label for="clave_actual_2">Confirmar nueva contraseña</label>
									<input type="password" class="form-control" id="clave_nueva_2" name="clave_nueva_2" placeholder="Confirmar nueva contraseña">
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Cambiar contraseña</button>
						</div>
					</div>
				</div>
			</div>
		');
	}
}
