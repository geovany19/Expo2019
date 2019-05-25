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
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
				<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
							<li>
								<a href="pagina.php">
									<i class="fas fa-home"></i>
									Inicio
								</a>
							</li>
							<li class="active">
								<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
									<i class="fas fa-book"></i> Catálogos
								</a>
								<ul class="collapse list-unstyled" id="homeSubmenu">
									<li><a href="doctores.php">Doctores</a></li>
									<li><a href="#">Pacientes</a></li>
									<li><a href="disponibilidad.php">Horarios de disponibilidad</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="fas fa-user"></i> Perfil
								</a>
								<!--<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
									<i class="fas fa-copy"></i>Pages
								</a>
								<ul class="collapse list-unstyled" id="pageSubmenu">
									<li>
										<a href="#">Page 1</a>
									</li>
									<li>
										<a href="#">Page 2</a>
									</li>
									<li>
										<a href="#">Page 3</a>
									</li>
								</ul>-->
							</li>
							<li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
						</ul>
					</nav>
				<!-- Page Content  -->
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
								<ul class="nav navbar-nav ml-auto">
										<li class="nav-item active">
										<a class="nav-link" href="#">Page</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Page</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Page</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Page</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
        ');
	}

	public static function footer()
	{
		print('
					</div>		
				</div>
				<!--<footer class="navbar navbar-light bg-light">
					<div class="row">
						<div class="col col-sm-12">
							<h1>Prueba</h1>
						</div>
						<div class="col col-sm-12 col-md-6">
							<h3 class="text-center">Técnicos de mantenimiento</h3>
							<ul>
								<li>Bryan Amaya - bryan_amaya@gmail.com</li>
								<li>María Campos - maria_campos@gmail.com</li>
								<li>Geovany Pineda - geovany_pineda@gmail.com</li>
								<li>Carlos Ramírez - carlos_ramirez@gmail.com</li>
							</ul>
						</div>
					</div>
				</footer>-->
				<footer class="page-footer">
					<div class="container-fluid text-center text-md-left">
						<div class="row">
						<div class="col-md-6 mt-md-0 mt-3">
							<h5 class="text-uppercase">Footer Content</h5>
							<p>Here you can use rows and columns to organize your footer content.</p>
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
					<div class="footer-copyright text-center py-3">© 2018 Copyright:
						<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
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
