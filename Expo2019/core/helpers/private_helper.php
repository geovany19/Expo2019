<?php
error_reporting(0);
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
				<link rel="stylesheet" type="text/css" href="../../resources/css/public/estilos_login.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/sidebar.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/datatables.min.css">
				<link rel="stylesheet" type="text/css" href="../../resources/css/private/calendario.css">
				<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
								<title>SISMED - ' . $title . '</title>
            </head>
			<body>
		<input type="hidden" value='.$_SESSION['idDoctor'].' id="idDoctor">
		
		');
	}

	public function nav()
	{
		if (isset($_SESSION['idDoctor'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registro.php' && $filename != 'autenticar.php'  && $filename != 'claves.php'  && $filename != 'correo.php') {
				
				self::modals();
				print('
				<div class="wrapper">
					<!-- Sidebar  -->
					<nav id="sidebar">
						<div class="sidebar-header">
							<h3>Sismed</h3>
							<b>' . $_SESSION['aliasDoctor'] . '</b>
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
				if ($filename != 'agenda.php' && $filename != 'autenticar.php') {
					header('location: agenda.php');
				}
			}
			
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'correo.php' && $filename != 'autenticar.php' &&  $filename != 'autenticacion.php' ) {
				header('location: index.php');
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
				<script src="../../resources/js/momentjs.js"></script>

				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				
				

				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
				<script type="text/javascript" src="../../core/controllers/private/account.js"></script>
				<script type="text/javascript" src="../../core/controllers/private/consulta.js"></script>
				<script type="text/javascript" src="../../core/controllers/private/' . $controller . '"></script>
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
				<form method="post" id="form-profile" autocomplete="off">
				  <div class="form-group">
					<label for="profile_nombres" class="col-form-label">Nombres: </label>
					<input id="profile_nombres" type="text" name="profile_nombres" class="form-control" required/>
				  </div>
				 
				  <div class="form-group">
					<label for="profile_apellidos" class="col-form-label">Apellidos: </label>
					<input id="profile_apellidos" type="text" name="profile_apellidos" class="form-control" required/>
				  </div>

				  <div class="form-group">
					<label for="profile_alias" class="col-form-label">Nombre usuario: </label>
					<input id="profile_alias" type="text" name="profile_alias" class="form-control" required/>
				  </div>

				  <div class="form-group">
					<label for="profile_correo" class="col-form-label">Correo electrónico: </label>
					<input id="profile_correo" type="email" name="profile_correo" class="form-control" required/>
				  </div>
				  <button type="submit" class="btn btn-primary">Modificar</button>
				</form>
			  </div>

			</div>
		  </div>
		</div>


		<div class="modal fade" id="modal-c" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">	
					<div class="modal-body">
						<form id="crear-consulta">
							<input type="hidden" class="form-control" name="idPaciente" id="idPaciente">
							<input type="hidden" class="form-control" name="idDoctor" id="idD" readonly>
							<input type="text" class="form-control" name="idCita" id="idCi" readonly>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="paciente">Paciente</label>
									<input type="text" class="form-control" id="paciente" name="paciente" readonly>
								</div>
								<div class="form-group col-md-12">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="fecha">Fecha</label>
										<input type="date" class="form-control" id="fecha" name="fecha" value="" readonly>
									</div>
									<div class="form-group col-md-6">
										<label for="hora">Hora</label>
										<input type="text" class="form-control" id="hora" name="hora" value="" readonly>
									</div>
								</div>
								
								</div>
							</div>
							<div class="form-group">
							<label for="padecimientos">Padecimientos</label>
							<input type="text" class="form-control" id="padecimientos" name="padecimientos" placeholder="Padecimientos">
							</div>
							<div class="form-group">
							<label for="receta">Receta</label>
							<input type="text" class="form-control" id="receta" name="receta" placeholder="Receta">
							</div>


							<button type="submit" class="btn btn-primary">Guardar</button>
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
				  <form method="post" id="form-password" autocomplete="off">
				  <div class="form-group">
					<label for="clave_actual_1" class="col-form-label">Contraseña actual:</label>
					<input id="clave_actual_1" type="password" name="clave_actual_1" class="form-control" required/>
				  </div>
				  <div class="form-group">
					<label for="clave_actual_2" class="col-form-label">Confirmar contraseña:</label>
					<input id="clave_actual_2" type="password" name="clave_actual_2" class="form-control" required/>
				  </div>
				  <div class="form-group">
					<label for="clave_nueva_1">Contraseña nueva:</label>
					<input id="clave_nueva_1" type="password" name="clave_nueva_1" class="form-control" required/>
				  </div>

				  <div class="form-group">
					<label for="clave_nueva_2">Confirmar contraseña:</label>
					<input id="clave_nueva_2" type="password" name="clave_nueva_2" class="form-control" required/>
				
				  </div>
				  <button type="submit" class="btn btn-primary">Modificar</button>
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>

		
		
		');
	}
}
?>