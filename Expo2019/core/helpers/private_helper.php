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
								
								<link rel="stylesheet" type="text/css" href="../../resources/css/material-bootstrap.min.css">

								<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
								<link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
								<link rel="stylesheet" type="text/css" href="../../resources/css/font-awesome.min.css">

								<link rel="stylesheet" type="text/css" href="../../resources/css/private/calendario.css">
			
								<title>SISMED - '.$title.'</title>
								




						</head>
			<body>
		');
		self::modals();
		if (isset($_SESSION['idUsuario'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php') {
				print('
				<div id="sidebar" class="sidenav sidenav-fixed expand">
				<div class="sidenav-header">
					<div class="font-18 font-weight-strong mt-2"><a href="javascript:;">MATERIAL DESIGN<br>FOR BOOTSTRAP</a></div>
				</div>
				<div class="divider"></div>
				<form action="javascript:;">
					<div class="input-group-icon input-group-icon-right">
					<button type="submit" class="btn btn-icon-only btn-flat btn-rounded input-icon input-icon-right mr-2"><i class="material-icons" style="font-size:24px">search</i></button>
					<input class="form-control form-control-line border-0" type="text" placeholder="Search" style="padding-left:30px">
					</div>
				</form>
				<div class="divider"></div>
				<ul class="collapsible collapsible-accordion">
					<li><a href="#"><i class="material-icons sidenav-item-icon">notification_important</i>Notifications</a></li>
					<li><a href="#"><i class="material-icons sidenav-item-icon">shopping_cart</i>Shopping cart</a></li>
					<li><a href="#"><i class="material-icons sidenav-item-icon">local_shipping</i>My Delivery</a></li>
					<li><div class="divider"></div></li>
					<li><a class="active" href="#"><i class="material-icons sidenav-item-icon">place</i>Locations</a></li>
					<li><a href="#"><i class="material-icons sidenav-item-icon">settings</i>Another Link</a></li>
					<li><div class="divider"></div></li>
					
					
					<li><div class="divider"></div></li>
					<li><a href="javascript:;" class="subheader">Subheader</a></li>
					<li><a class="waves-effect" href="#"><i class="material-icons sidenav-item-icon">drafts</i>Link With Waves</a></li>     
				</ul>
				</div>

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
									<button type="submit" onclick="signOff()" class="btn btn-primary btn-lg btn-block">Iniciar sesión</button>
								</div>
								<div class="clearfix">
									<label class="pull-left checkbox-inline"><input type="checkbox"> Recuerdame</label>
									<a href="#" class="pull-right">¿Olvidaste tu contraseña?</a>
								</div>
							</form>
							<p class="text-center small">¿No estás registrado? <a href="#">¡Registrate aquí!</a></p>
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
				<script type="text/javascript" src="../../resources/js/material-bootstrap.min.js"></script>
				
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../resources/js/popper.min.js"></script>


				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				<script type="text/javascript" src="../../core/controllers/private/account.js"></script>
				

				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
				<script type="text/javascript" src="../../core/controllers/private/'.$controller.'"></script>
				<script type="text/javascript" src="../../resources/js/calendario.js"></script>
			</body>
			</html>
		');
	}
	
	//AQUI EMPIEZAN LOS MODALES 

	public static function modals()
	{
		print('
			
		');
	}
}
?>