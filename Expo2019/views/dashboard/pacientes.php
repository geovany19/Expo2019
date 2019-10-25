<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Pacientes");
dashboardHelper::nav();
?>
<h1 class="text-center">Pacientes</h1>
<div class="float-right">
	<button type="button" data-toggle="modal" data-target="#modal-create" class="btn btn-outline-success" data-placement="top" title="Agregar Paciente">
		<i class="fas fa-plus-circle"></i>
	</button>
</div>
<div class="float-left">
	<button type="button" data-toggle="modal" data-target="#reportes" class="btn btn-outline-warning" class="btn btn-outline-success" data-placement="top" title="Generar Reporte">
		<i class="material-icons prefix">assignment</i>
	</button>
</div>
<div>
	<table class="table table-responsive table-hover" id="table-body">
		<thead class="thead-dark">
			<!--Agregando los campos fijos a la tabla-->
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Foto</th>
				<th scope="col">Nombres</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Correo</th>
				<th scope="col">Usuario</th>
				<th scope="col">Sesión</th>
				<th scope="col">Fecha de nacimiento</th>
				<th scope="col">Peso(kg)</th>
				<th scope="col">Estatura(cm)</th>
				<th scope="col">Teléfono</th>
				<th scope="col">Estado</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody id="tabla-pacientes" class="col col-sm-12"></tbody>
	</table>
</div>

</main>
<!-- Ventana para crear un registro existente -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modalcreate" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="modalcreate">Crear paciente</h5>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" id="form-create" autocomplete="off" novalidate>
					<div class="row">
						<div class="col-md-6 mb-4">
							<label for="create_nombres">Nombre</label>
							<input type="text" class="form-control" class="form-control is-valid" id="create_nombres" name="create_nombres" placeholder="Nombre">
						</div>
						<div class="col-md-6 mb-6">
							<label for="create_apellidos">Apellido</label>
							<input type="text" class="form-control" id="create_apellidos" name="create_apellidos" placeholder="Apellido" maxlength="25">
						</div>
						<div class="col-md-6 mb-3">
							<label for="create_correo">Correo electrónico</label>
							<input type="text" class="form-control" id="create_correo" name="create_correo" placeholder="Correo electrónico" maxlength="100">
						</div>
						<div class="col-md-6 mb-3">
							<label for="create_usuario">Usuario</label>
							<input type="text" class="form-control" id="create_usuario" name="create_usuario" placeholder="Usuario" maxlength="25">
						</div>
						<div class="col-md-6 mb-4">
							<label for="create_fecha">Fecha de nacimiento</label>
							<input type="date" class="form-control" id="create_fecha" name="create_fecha" max=<?php echo date('Y-m-d') ?> required>
						</div>
						<div class="col-md-6 mb-4">
							<label for="create_peso">Peso del paciente (kg)</label>
							<input type="number" class="form-control" id="create_peso" name="create_peso" min="1" max="999" step="0.01" placeholder="Peso del paciente (kg)">
						</div>
						<div class="col-md-6 mb-4">
							<label for="create_estatura">Estatura del paciente (cm)</label>
							<input type="number" class="form-control" id="create_estatura" name="create_estatura" min="1" max="250" step="1" placeholder="Estatura en (cm)">
						</div>
						<div class="col-md-6 mb-4">
							<label for="create_telefono">Teléfono</label>
							<input type="number" class="form-control" id="create_telefono" name="create_telefono" minlength="8" maxlength="8" placeholder="Teléfono">
						</div>
						<div class="col-sm-12">
							<label>Foto</label>
							<div class="custom-file">
								<input type="file" id="create_archivo" name="create_archivo" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Escoja un archivo</label>
							</div>
						</div>
						<div class="col-mb-6 mb-4">
							<p>
								<div class="switch">
									<span>Estado:</span>
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
						<button type="button" data-toggle="tooltip" data-placement="top" title="Cancelar" class="btn btn-danger" data-dismiss="modal"><i class="material-icons prefix">cancel</i></button>
						<button type="submit" data-toggle="tooltip" data-placement="top" title="Guardar" class="btn btn-success"><i class="material-icons prefix">done</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar paciente</h5>
			</div>
			<div class="modal-body">
				<div class="d-flex justify-content-center">
					<img id="foto" class="img-fluid" width="100">
				</div>
				<form id="form-update" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" id="id_paciente" name="id_paciente">
					<input type="hidden" id="foto_paciente" name="foto_paciente">
					<div class="form-group">
						<label for="update_nombres">Nombre</label>
						<input type="text" class="form-control" class="form-control is-valid" id="update_nombres" name="update_nombres" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="update_apellidos">Apellido</label>
						<input type="text" class="form-control" id="update_apellidos" name="update_apellidos" placeholder="Apellido" maxlength="25">
					</div>
					<div class="form-group">
						<label for="update_correo">Correo electrónico</label>
						<input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Correo electrónico" maxlength="100">
					</div>
					<div class="form-group">
						<label for="update_usuario">Usuario</label>
						<input type="text" class="form-control" id="update_usuario" name="update_usuario" placeholder="Usuario" maxlength="25">
					</div>
					<div class="form-group">
						<label for="update_fecha">Fecha de nacimiento</label>
						<input type="date" class="form-control" id="update_fecha" name="update_fecha" max=<?php echo date('Y-m-d') ?> placeholder="Fecha de nacimiento">
					</div>
					<div class="col-sm-12">
						<label>Foto</label>
						<div class="custom-file">
							<input type="file" id="update_archivo" name="update_archivo" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
							<label class="custom-file-label" for="inputGroupFile01">Escoja un archivo</label>
						</div>
					</div>
					<div class="form-group">
						<label for="update_peso">Peso del paciente (kg)</label>
						<input type="number" class="form-control" id="update_peso" name="update_peso" min="1" max="999" step="0.01" placeholder="Peso del paciente (kg)">
					</div>
					<div class="form-group">
						<label for="update_estatura">Estatura del paciente (cm)</label>
						<input type="number" class="form-control" id="update_estatura" name="update_estatura" min="1" max="250" step="1" placeholder="Estatura en (cm)">
					</div>
					<div class="form-group">
						<label for="update_telefono">Teléfono</label>
						<input type="number" class="form-control" id="update_telefono" name="update_telefono" minlength="8" maxlength="8" placeholder="Teléfono">
					</div>
					<div class="col-md-6 mb-4">
						<p>
							<div class="checked">
								<span>Estado:</span>
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
						<button type="button" data-toggle="tooltip" data-placement="top" title="Cancelar" class="btn btn-danger" data-dismiss="modal"><i class="material-icons prefix">cancel</i></button>
						<button type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar" class="btn btn-success"><i class="material-icons prefix">done</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--Creando moda de reportes-->
<div class="modal fade" id="reportes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Crear Reportes</h5>
				</button>
			</div>
			<div class="modal-body">

				<form class="needs-validation" id="form-reportes" autocomplete="off" novalidate>
					<div class="d-flex justify-content-center">
					</div>
					<div class="row">
						<div class="col-md-6 mb-4">
							<label for="fecha_inicio">Seleccione Fecha Inicial</label>
							<input type="date" class="form-control" id="fechaini" name="fechaini" required>
						</div>
						<div class="col-md-6 mb-6">
							<label for="fecha_fin">Seleccione Fecha Final</label>
							<input type="date" class="form-control" id="fechafin" name="fechafin" max=<?php echo date('Y-m-d') ?> required>
						</div>
					</div>
					<div class="modal-footer justify-content-center aling-items-center">
						<button onclick="reportePacientes()" type="button" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Generar reporte"><i class='material-icons'>assignment</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
dashboardHelper::footer('pacientes.js');
?>