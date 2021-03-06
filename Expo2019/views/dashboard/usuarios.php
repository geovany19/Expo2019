<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Usuarios");
dashboardHelper::nav();
?>
<h1 class="text-center">Usuarios</h1>
<div class="float-right">
	<button type="button" data-toggle="modal" data-target="#modal-create" class="btn btn-outline-success">
		<i class="fas fa-plus-circle"></i>
	</button>
</div>
<div class="float-left">
	<a href='../../core/reportes/reporteusuario.php' class="btn btn-outline-warning" class="btn btn-outline-success" data-placement="top" title="Generar Reporte" target="_blank">
		<i class="material-icons prefix">assignment</i>
	</a>
</div>
<div>
	<table class="display responsive no-wrap dtr-inline collapsed table table-responsive table-hover" id="tabla-usuarios" width="100%">
		<thead class="thead-dark">
			<!--Agregando los campos fijos a la tabla-->
			<tr role="row">
				<th scope="col">Código</th>
				<th scope="col">Nombre</th>
				<th scope="col">Apellido</th>
				<th scope="col">Correo</th>
				<th scope="col">Usuario</th>
				<th scope="col">Fecha de nacimiento</th>
				<th scope="col">Foto</th>
				<th scope="col">Sesión</th>
				<th scope="col">Estado</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody id="table-body"></tbody>
	</table>
</div>
</main>
<!--Copias este modal-->
<!-- Ventana para Crear un registro  -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modalcreate" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="modalcreate">Crear usuario</h5>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" id="form-create" autocomplete="off" novalidate>
					<div class="row">
						<div class="col-md-6 mb-4">
							<i class="material-icons prefix">person</i>
							<label for="create_nombre">Nombre</label>
							<input type="text" class="form-control" id="create_nombre" name="create_nombre" required>
						</div>
						<div class="col-md-6 mb-6">
							<i class="material-icons prefix">person</i>
							<label for="create_apellido">Apellido</label>
							<input type="text" class="form-control" id="create_apellido" name="create_apellido" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="create_correo">Correo</label>
							<input type="email" class="form-control" id="create_correo" name="create_correo" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="create_usuario">Usuario</label>
							<input type="text" class="form-control" id="create_usuario" name="create_usuario" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="create_clave1">Contraseña</label>
							<input type="password" class="form-control" id="create_clave1" name="create_clave1" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="create_clave2">Confirmar contraseña</label>
							<input type="password" class="form-control" id="create_clave2" name="create_clave2" required>
						</div>
						<div class="col-md-6 mb-4">
							<label for="create_fecha">Fecha de nacimiento</label>
							<input type="date" class="form-control" id="create_fecha" name="create_fecha" required>
						</div>
						<div class="col-sm-12">
							<label>Foto</label>
							<div class="custom-file">
								<input type="file" id="create_archivo" name="create_archivo" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Escoja un archivo</label>
							</div>
						</div>
						<div class="col-md-6 mb-4">
							<p>
								<div class="switch">
									<span>Estado</span>
									<label>
										<i class="material-icons">visibility_off</i>
										<input id="create_estado" type="checkbox" name="create_estado" />
										<span class="lever"></span>
										<i class="material-icons">visibility</i>
									</label>
								</div>
							</p>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="material-icons prefix">cancel</i></button>
						<button type="submit" class="btn btn-success"><i class="material-icons prefix">done</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
			</div>
			<div class="modal-body">
				<img id="foto" height="75">
				<form id="form-update" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" id="id_usuario" name="id_usuario">
					<input type="hidden" id="foto_usuario" name="foto_usuario">
					<div class="form-group">
						<label for="update_nombres">Nombre</label>
						<input type="text" class="form-control" class="form-control is-valid" id="update_nombres" name="update_nombres" aria-describedby="emailHelp" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="update_apellidos">Apellido</label>
						<input type="text" class="form-control" id="update_apellidos" name="update_apellidos" placeholder="Apellido">
					</div>
					<div class="form-group">
						<label for="update_correo">Correo</label>
						<input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Correo">
					</div>
					<div class="form-group">
						<label for="update_usuario">Usuario</label>
						<input type="text" class="form-control" id="update_usuario" name="update_usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<label for="update_fecha">Fecha</label>
						<input type="date" class="form-control" id="update_fecha" name="update_fecha" placeholder="Fecha">
					</div>
					<div class="col-sm-12">
						<label>Foto</label>
						<div class="custom-file">
							<input type="file" id="update_archivo" name="update_archivo" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
							<label class="custom-file-label" for="inputGroupFile01">Escoja un archivo</label>
						</div>
					</div>
					<div class="col-md-6 mb-4">
						<p>
							<div class="checked">
								<span>Estado</span>
								<label>
									<i class="material-icons">visibility_off</i>
									<input id="update_estado" type="checkbox" data-toggle="toggle" name="update_estado" />
									<span class="lever"></span>
									<i class="material-icons">visibility</i>
								</label>
							</div>
						</p>
					</div>
					<div class="modal-footer justify-content-center aling-items-center">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</main>
<?php
dashboardHelper::footer('usuarios.js');
?>