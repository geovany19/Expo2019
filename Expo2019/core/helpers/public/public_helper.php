<?php
class public_helper {
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
				<link rel="stylesheet" type="text/css" href="../../resources/css/public/estilos_login.css">
                <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
				<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
                <title>SISMED - '.$title.'</title>
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

?>