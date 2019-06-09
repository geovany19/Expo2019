<?php
class dashboard_helper
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
									<li><a href="#">Pacientes</a></li>
									<li><a href="usuarios.php">Usuarios</a></li>
									<li><a href="disponibilidad.php">Horarios de disponibilidad</a></li>
								</ul>
							</li>
							<li>
								<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
									<i class="fas fa-user"></i> Perfil
								</a>
								<ul class="collapse list-unstyled" id="pageSubmenu">
									<li>
										<a href="#">Editar perfil</a>
									</li>
									<li>
										<a href="#">Cambiar contraseña</a>
									</li>
								</ul>
							</li>
							<li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
						</ul>
					</nav>
				<div id="content">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container-fluid">
							<button type="button" id="sidebarCollapse" class="btn btn-info">
								<i class="fas fa-align-left"></i>
								<span>Minimizar menú</span>
							</button>
							<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<i class="fas fa-align-justify"></i>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
							</div>
						</div>
					</nav>
        ');
	}

	public static function footer($controller)
	{
		print('
					</div>		
				</div>
				<footer class="page-footer">
					<div class="container text-center text-md-left">
						<div class="row">
						<div class="col-md-6 mt-md-0 mt-3">
							<h5 class="text-uppercase">Técnicos de mantenimiento</h5>
							<p class="footer-text">Bryan Amaya | bryan_amaya@gmail.com</p>
							<p class="footer-text">María Campos | maria_campos@gmail.com</p>
							<p class="footer-text">Geovany Pineda | geovany_pineda@gmail.com</p>
							<p class="footer-text">Federico Ramírez | federico_ramirez@gmail.com</p>
						</div>
						<hr class="clearfix w-100 d-md-none pb-3">
						<div class="col-md-3 mb-md-0 mb-3">
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
						<!-- Grid column -->
						<div class="col-md-3 mb-md-0 mb-3">
							<!-- Links -->
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
						</div>
					</div>
					<!-- Copyright -->
					<div class="footer-copyright text-center py-3">© 2019 Copyright:
						<a href="#"> influencers</a>
					</div>
				</footer>
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
				<script type="text/javascript" src="../../resources/js/solid.js"></script>
				<script type="text/javascript" src="../../resources/js/fontawesome.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.js"></script>
				<script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
				<script type="text/javascript" src="../../resources/js/fontawesome.js"></script>
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
				<script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
            </body>
            </html>
        ');
	}

	public function modals()
	{
		print('
		<div id="modal-profile" class="modal">
		<div class="modal-content">
			<h4 class="center-align">Editar perfil</h4>
			<form method="post" id="form-profile">
				<div class="row">
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">person</i>
						<input id="profile_nombres" type="text" name="profile_nombres" class="validate" required/>
						<label for="profile_nombres">Nombres</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">person</i>
						<input id="profile_apellidos" type="text" name="profile_apellidos" class="validate" required/>
						<label for="profile_apellidos">Apellidos</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">email</i>
						<input id="profile_correo" type="email" name="profile_correo" class="validate" required/>
						<label for="profile_correo">Correo</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">person_pin</i>
						<input id="profile_alias" type="text" name="profile_alias" class="validate" required/>
						<label for="profile_alias">Alias</label>
					</div>
				</div>
				<div class="row center-align">
					<a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
					<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
				</div>
			</form>
		</div>
	</div>	
		');
	}
}
