<?php
class private_helper
{
	public static function headerTemplate($title)
	{
		session_start();
		print('
			<!DOCTYPE html>
			<html lang="es">
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
								<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
								<link rel="stylesheet" type="text/css" href="../../resources/css/font-awesome.min.css">
								<link rel="stylesheet" type="text/css" href="../../resources/css/datatables.min.css">
								<link rel="stylesheet" type="text/css" href="../../resources/css/private/calendario.css">
								<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
								<title>SISMED - '.$title.'</title>
            </head>
			<body>
		');
		self::modals();
		if (isset($_SESSION['idUsuario'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php') {
				print('
				<div class="wrapper">
					<!-- Sidebar  -->
					<nav id="sidebar">
						<div class="sidebar-header">
							<h3>Sismed</h3>
							<b>'.$_SESSION['aliasUsuario'].'</b>
							<strong>SM</strong>
						</div>
						<ul class="list-unstyled components">
							<li><a href="agenda.php"><i class="fas fa-calendar"></i> Agenda</a></li>
							<li><a href="#" onclick="modalProfile()"><i class="fas fa-users-cog"></i> Perfil</a></li>
							<li><a href="#modal-password" data-toggle="modal" data-target="#modal-password"><i class="fas fa-unlock-alt"></i> Contraseña</a></li>
							<li class="active">
								<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
									<i class="fas fa-book"></i> Citas
								</a>
								<ul class="collapse list-unstyled" id="homeSubmenu">
									<li><a href="citas.php">Realizadas</a></li>
									<li><a href="citas_pendientes.php">Pendientes</a></li>
									<li><a href="" >Horarios de disponibilidad</a></li>
								</ul>
							</li>
							<li><a href="#" onclick="signOff()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
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
							
						</div>
					</nav>
				');
			} else {
				header('location: agenda.php');
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php') {
				header('location: index.php');
			} else {
				print('
				<header>
				<main id="main">
				<div class="row">
					<div class="col col-sm-12">
						<div class="login-form" >
							<form  method="post" id="login-1">
								<div class="avatar">
									<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
								</div>
								<h2 class="text-center">Iniciar sesión</h2>
								<div class="form-group">
									<input type="text" id="name" name="name" class="form-control validate" placeholder="Nombre de usuario" required="required">
								</div>
								<div class="form-group">
									<input type="password" class="form-control validate" id="clave" name="clave" placeholder="Contraseña" required="required">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar sesión</button>
								</div>
								<div class="clearfix">
									<label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>
									<a href="#" class="pull-right">¿Olvidaste tu contraseña?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				</header>
				<main>
					
				');
				
			}
		}
	}

	public static function footerTemplate($controller)
	{
		print('
				</main>

				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/popper.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sidenav.js"></script>
				<script type="text/javascript" src="../../resources/js/fontawesome.js"></script>
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../resources/js/datatables.min.js"></script>
				

				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				
				

				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
				<script type="text/javascript" src="../../core/controllers/private/account.js"></script>
				<script type="text/javascript" src="../../core/controllers/private/'.$controller.'"></script>
			</body>
			</html>
		');
	}
	
	//AQUI EMPIEZAN LOS MODALES 

	public static function modals()
	{
		print('
		<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">

			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>

			  <div class="modal-body">
				<form method="post" id="form-profile">
				  <div class="form-group">
					<label for="profile_nombres" class="col-form-label">Nombres: </label>
					<input id="profile_nombres" type="text" name="profile_nombres" class="form-control" required/>
				  </div>
				 
				  <div class="form-group">
					<label for="profile_apellidos" class="col-form-label">Apellidos: </label>
					<input id="profile_apellidos" type="text" name="profile_apellidos" class="form-control" required/>
				  </div>

				  <div class="form-group">
					<label for="profile_alias" class="col-form-label">Usuario: </label>
					<input id="profile_alias" type="text" name="profile_alias" class="form-control" required/>
				  </div>

				  <div class="form-group">
					<label for="profile_correo" class="col-form-label">Apellidos: </label>
					<input id="profile_correo" type="email" name="profile_correo" class="form-control" required/>
				  </div>
				  <button type="submit" class="btn btn-primary">Send message</button>
				</form>
			  </div>

			</div>
		  </div>
		</div>



		<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">

			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>

			  <div class="modal-body">
			  	<form method="post" id="form-password">
				  <div class="form-group">
					<label for="clave_actual_1" class="col-form-label">Clave:</label>
					<input id="clave_actual_1" type="password" name="clave_actual_1" class="form-control" required/>
				  </div>
				 
				  <div class="form-group">
					<label for="clave_actual_2" class="col-form-label">Confirmar clave</label>
					<input id="clave_actual_2" type="password" name="clave_actual_2" class="form-control" required/>
				  </div>
				  <label>CLAVE NUEVA</label>
				  <div class="form-group">
					<label for="clave_nueva_1">Clave</label>
					<input id="clave_nueva_1" type="password" name="clave_nueva_1" class="form-control" required/>
				  </div>

				  <div class="form-group">
					<label for="clave_nueva_2">Confirmar clave</label>
					<input id="clave_nueva_2" type="password" name="clave_nueva_2" class="form-control" required/>
				
				  </div>
				  <button type="submit" class="btn btn-primary">Send message</button>
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>

		
		
		');
	}
}
?>