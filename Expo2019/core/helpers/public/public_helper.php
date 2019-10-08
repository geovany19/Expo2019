<?php
class public_helper
{
	public function head($title)
	{
		ini_set('date.timezone', 'America/El_Salvador');
		print('
            <!DOCTYPE html>
            <html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta http-equiv="X-UA-Compatible" content="ie=edge">
					<link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.css">
					<link rel="stylesheet" type="text/css" href="../../resources/css/sweetalert2.min.css">
					<link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_recuperar.css">
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
	/*public function navbar()
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
						<span class="mr-2 d-none d-lg-inline text-gray-600 small">Cuenta - <b>' . $_SESSION['nombrePaciente'] .' '. $_SESSION['apellidoPaciente'] . '</b></span>
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						
						<a class="dropdown-item" href="user.php">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Editar perfil
						</a>
		
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" onclick="signOff()">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Cerrar sesión
						</a>

					</div>
				</li>
			</ul>
		</nav>
        ');
	}*/

	public static function nav()
	{
		session_start();
		if (isset($_SESSION['idPaciente'])) {
			include ('../../core/api/public/sesion.php');
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registro.php') {
				print('
					<body>
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
							<a class="nav-link" href="../../core/reportes/private/reporteExpediente.php?id='.$_SESSION['idPaciente'].'">Ver expediente<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="citas.php">Ver citas <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="doctores.php">Buscar doctores</a>
						</li>
		
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Cuenta - <b>'.$_SESSION['usuarioPaciente'].'</b></span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

								<a  class="dropdown-item" onClick="modalProfile()">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Editar perfil
								</a>
				
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" onclick="signOff()">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Cerrar sesión
								</a>
		
							</div>
						</li>
					</ul>
				</nav>
				');
				
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'registro.php') {
				header('location: index.php');
			} 
		}
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

	function modals()
	{
		print('
			<!--Modal crear cita -->
			<div class="modal fade" id="crearCita" tabindex="-1" role="dialog" aria-labelledby="modalCita" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-primary" id="modalEditBrandTitle">Crear cita</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="modalCrearCita" method="post" autocomplete="off">
							<input type="hidden" name="idDoctor" id="idDoctor" required>
							<input type="hidden" name="idPaciente" id="idPaciente" required value="'.$_SESSION['idPaciente'].'">
							<div class="modal-body">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="inputDate">Fecha</label>
										<input type="date" class="form-control" id="inputDate"  name="inputDate" required>
									</div>
									<div class="form-group col-md-6">
										<label for="inputTime">Hora</label>
										<input type="time" class="form-control" id="inputTime" name="inputTime" required>
									</div>
								</div>

							</div>
							<div class="modal-footer justify-content-right">
								<button type="submit" class="btn btn-primary btn-icon-split float-right">
									<span class="text">Guardar</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade"  tabindex="-1" id="modalEditar" role="dialog">
				<div class="modal-dialog modal-lg">
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Editar Perfil</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
						</div>

						<div class="modal-body">

							<ul class="nav nav-tabs" role="tablist" id="tabsEditar">
								<li class="nav-item well">
									<a class="nav-link active" href="#cambiarDatos" aria-controls="cambiarDatos" role="tab" data-toggle="tab">Editar datos</a>
								</li>
								<li class="nav-item well">
									<a class="nav-link" href="#cambiarContra" aria-controls="cambiarContra" role="tab" data-toggle="tab">Cambiar contraseña</a>
								</li>
							</ul>

							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="cambiarDatos" role="tabpanel" aria-labelledby="cambiarDatos-tab">
									<form method="post" id="form-profile" autocomplete="off">
										<div class="form-row">
											<div class="form-group col-sm-12 col-md-6">
												<label for="profile_nombres">Nombres</label>
												<input id="profile_nombres" type="text" name="profile_nombres" class="form-control" placeholder="Nombres" maxlength="25" required>
												<div class="invalid-feedback">Ingrese sus nombres</div>
											</div>
											<div class="form-group col-sm-12 col-md-6">
												<label for="profile_apellidos">Apellidos</label>
												<input id="profile_apellidos" type="text" name="profile_apellidos" class="form-control" placeholder="Apellidos" maxlength="25" required>
												<div class="invalid-feedback">Ingrese sus apellidos</div>
											</div>
											<div class="form-group col-md-6">
												<label for="profile_correo">Correo electrónico</label>
												<input id="profile_correo" type="email" name="profile_correo" class="form-control" placeholder="Correo electrónico" maxlength="100" required>
												<div class="invalid-feedback">Ingrese su correo electrónico</div>
											</div>
											<div class="form-group col-md-6">
												<label for="profile_usuario">Nombre de usuario</label>
												<input id="profile_usuario" type="text" name="profile_usuario" class="form-control" placeholder="Nombre de usuario" maxlength="25" required>
												<div class="invalid-feedback">Ingrese su nombre se usuario</div>
											</div>
										</div>
											
										<div class="form-group">
											<button type="submit" class="btn btn-primary float-right">Cambiar datos</button>
										</div>
									</form>
								</div>
								<div class="tab-pane fade " id="cambiarContra" role="tabpanel" aria-labelledby="cambiarContra-tab">
									<form method="post" id="form-password" autocomplete="off">
										
										<div class="form-row">
											<div class="form-group col-md-12">
												<h5 class="text-center">Contraseña actual</h5>
											</div>

											<div class="form-group col-md-6">
												<label for="clave_actual_1">Contraseña</label>
												<input type="password" class="form-control" id="clave_actual_1" name="clave_actual_1" placeholder="Contraseña actual" maxlength="15" required>
												<div class="invalid-feedback">Ingrese su contraseña actual</div>
											</div>

											<div class="form-group col-md-6">
												<label for="clave_actual_2">Confirmar contraseña</label>
												<input type="password" class="form-control" id="clave_actual_2" name="clave_actual_2" placeholder="Confirmar contraseña" maxlength="15" required>
												<div class="invalid-feedback">No ha confirmado la contraseña</div>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-12">
												<h5 class="text-center">Contraseña nueva</h5>
											</div>

											<div class="form-group col-md-6">
												<label for="clave_nueva_1">Contraseña</label>
												<input type="password" class="form-control" id="clave_nueva_1" name="clave_nueva_1" placeholder="Contraseña nueva" maxlength="15" required>
												<small id="passwordHelp" class="form-text text-muted">La contraseña debe ser mayor a 8  carácteres de longitud. Debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial, no debe contener espacios</small>
												<div class="invalid-feedback">Lea los requisitos</div>
											</div>

											<div class="form-group col-md-6">
												<label for="clave_nueva_2">Confirmar contraseña</label>
												<input type="password" class="form-control" id="clave_nueva_2" name="clave_nueva_2" placeholder="Confirmar contraseña" maxlength="15" required>
												<div class="invalid-feedback">No ha confirmado la contraseña</div>
											</div>
										</div>
										
										<div class="form-group">
											<button type="submit" class="btn btn-primary float-right">Cambiar contraseña</button>
										</div>
									</form>
								</div>
							</div>		
						</div>
				
				</div>
			</div>
        ');
	}

	function scripts($controller){

		$scri = '
				
				<script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
				<script src="../../resources/js/datatables/jquery.dataTables.js"></script>
				<script src="../../resources/js/datatables/dataTables.bootstrap4.min.js"></script>
				<script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="../../resources/js/datatables-demo.js"></script>
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				<script type="text/javascript" src="../../core/controllers/public/account.js"></script>
			</body>
		</html>
			';
		if($controller == null){
			print($scri);
		}else{
			print($scri .= '<script type="text/javascript" src="../../core/controllers/public/'.$controller.'"></script>');
		}
	}
}
