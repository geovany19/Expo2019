<?php
class public_helper
{
	function head($title)
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
					<link rel="stylesheet" type="text/css" href="../../resources/css/public/estilos_public.css">
					<link href="../../resources/js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
					<!-- Font Awesome JS -->
					<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
					<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
					<title>SISMED - ' . $title . '</title>
				</head>
        ');
	}

	//Método que contiene el navbar, tiene color azul, las opciones del navbar se pueden adaptar
	function navbar()
	{
		print('
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
			<!-- Topbar Navbar Left-->
		
			<ul class="navbar-nav">
				<!-- Nav Item - Alerts -->
				<li class="nav-item dropdown no-arrow mx-1">
					<h1 class="h3 mb-0 text-gray-500" ><a class="navbar-brand" href="home.php">SISMED</a></h1>
				</li>
			</ul>
		
			<!-- Topbar Navbar Right-->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="citas.php">Ver citas <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="doctores.php">Buscar doctores</a>
				</li>
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small">Cuenta</span>
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="user.php">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Editar perfil
						</a>
		
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Cerrar sesión
						</a>
					</div>
				</li>
			</ul>
		</nav>
        ');
	}

	function footer()
	{
		print('
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; SISMED 2019</span>
					</div>
				</div>
			</footer>
        ');
	}
	function scripts($controller){

		$scri = '
				
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				<script src="../../resources/js/datatables/jquery.dataTables.js"></script>
				<script src="../../resources/js/datatables/dataTables.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/datatables-demo.js"></script>
			</body>
		</html>
			';
		if($controller == null){
			print($scri);
		}else{
			print($scri .= '<script type="text/javascript" src="../../core/controllers/private/'.$controller.'"></script>');
		}
	}
}
