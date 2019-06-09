<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Usuarios");
dashboard_helper::nav();
?>
<main>
	<h1 class="text-center">Usuarios</h1>
	<button type="button" id="add" class="btn btn-success">
		<i class="fas fa-plus-circle"></i>
		<span>Agregar usuario</span>
	</button>
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
					<th scope="col">Estado</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody id="table-body"></tbody>
		</table>
	</div>
</main>
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
			</div>
			<div class="modal-body">
				<img id="foto" height="75">
				<form id="form-update" enctype="multipart/form-data">
					<input type="hidden" id="id_usuario" name="id_usuario">
					<input type="hidden" id="foto_usuario" name="foto_usuario">
					<div class="form-group">
						<label for="update_nombre">Nombre</label>
						<input type="text" class="form-control" class="form-control is-valid" id="update_nombre" name="update_nombre" aria-describedby="emailHelp" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="update_apellido">Apellido</label>
						<input type="text" class="form-control" id="update_apellido" name="update_apellido" placeholder="Apellido">
					</div>
					<div class="form-group">
						<label for="update_correo">Correo electrónico</label>
						<input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Correo electrónico">
					</div>
					<div class="form-group">
						<label for="update_usuario">Usuario</label>
						<input type="text" class="form-control" id="update_usuario" name="update_usuario" placeholder="Usuario">
					</div>
					<div class="form-group">
						<label for="update_fecha">Fecha de nacimiento</label>
						<input type="date" class="form-control" id="update_fecha" name="update_fecha" placeholder="Fecha">
					</div>
					<div class="form-group">
						<label for="update_archivo">Foto</label>
						<input type="file" id="update_archivo" name="update_archivo" class="file-input">
					</div>
					<div class="col s12 m6">
						<p>
							<div class="checkbox">
								<span>Estado</span>
								<label>
									<i class="material-icons">visibility_off</i>
									<input id="create_estado" type="checkbox" data-toggle="toggle" checked />
									<span class="lever"></span>
									<i class="material-icons">visibility</i>
								</label>
							</div>
						</p>
					</div>
					<div class="modal-footer justify-content-center aling-items-center">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-success">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
dashboard_helper::footer('usuarios.js');
?>