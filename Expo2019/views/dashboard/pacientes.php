<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Pacientes");
dashboard_helper::nav();
?>
<main class="row">
<button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-success">
		<i class="fas fa-plus-circle"></i>
		<span>Agregar paciente</span>
	</button>
    <div class="col col-sm-12">
        <h1 class="text-center">Pacientes</h1>
        <div>
            <table class="table table-responsive table-hover" id="tabla-pacientes">
                <thead class="thead-dark">
                    <!--Agregando los campos fijos a la tabla-->
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Estatura</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="col col-sm-12"></tbody>
            </table>
        </div>
    </div>
</main>
<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar pacientes</h5>
			</div>
			<div class="modal-body">
				<img id="foto" height="75">
				<form id="form-update" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id_paciente" name="id_paciente">
					<input type="hidden" class="form-control" id="foto_paciente" name="foto_paciente">
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
						<input type="date" class="form-control" id="update_fecha" name="update_fecha" placeholder="Fecha de nacimiento">
					</div>
					<div class="form-group">
						<label for="update_archivo">Foto:</label>
						<input type="file" id="update_archivo" name="update_archivo" class="file-input">
					</div>
					<div class="form-group">
						<label for="update_peso">Peso del paciente (kg)</label>
						<input type="number" class="form-control" id="update_peso" name="update_peso" min="1" max="999" maxlength="" placeholder="Peso del paciente (kg)" maxlength="6">
					</div>
					<div class="form-group">
						<label for="update_estatura">Estatura del paciente (cm)</label>
						<input type="number" class="form-control" id="update_estatura" name="update_estarura" min="1" max="299" maxlength="3" placeholder="Estatura del paciente (m)" >
					</div>
					<div class="col s12 m6">
						<p>
							<div class="checked">
								<span>Estado:</span>
								<label>
									<i class="material-icons">visibility_off</i>
									<input id="update_estado" type="checkbox" data-toggle="toggle" name="update_estado" checked />
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
<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Agregar paciente</h5>
			</div>
			<div class="modal-body">
				<form id="form-create" enctype="multipart/form-data">
					<div class="form-group">
						<label for="create_nombres">Nombre</label>
						<input type="text" class="form-control" class="form-control is-valid" id="create_nombres" name="create_nombres" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="create_apellidos">Apellido</label>
						<input type="text" class="form-control" id="create_apellidos" name="create_apellidos" placeholder="Apellido" maxlength="25">
					</div>
					<div class="form-group">
						<label for="create_correo">Correo electrónico</label>
						<input type="text" class="form-control" id="create_correo" name="create_correo" placeholder="Correo electrónico" maxlength="100">
					</div>
					<div class="form-group">
						<label for="create_usuario">Usuario</label>
						<input type="text" class="form-control" id="create_usuario" name="create_usuario" placeholder="Usuario" maxlength="25">
					</div>
					<div class="form-group">
						<label for="create_fecha">Fecha de nacimiento</label>
						<input type="date" class="form-control" id="create_fecha" name="create_fecha" placeholder="Fecha de nacimiento">
					</div>
					<div class="form-group">
						<label for="create_archivo">Foto</label>
						<input type="file" id="create_archivo" name="create_archivo" class="file-input">
					</div>
					<div class="form-group">
						<label for="create_peso">Peso del paciente (kg)</label>
						<input type="number" class="form-control" id="create_peso" name="create_peso" placeholder="Peso del paciente (kg)" maxlength="6">
					</div>
					<div class="form-group">
						<label for="create_estatura">Estatura del paciente (cm)</label>
						<input type="number" class="form-control" id="create_estatura" name="create_estarura" placeholder="Estatura del paciente (m)" maxlength="4">
					</div>
					<div class="col s12 m6">
						<p>
							<div class="checked">
								<span>Estado:</span>
								<label>
									<i class="material-icons">visibility_off</i>
									<input id="create_estado" type="checkbox" data-toggle="toggle" name="create_estado" checked />
									<span class="lever"></span>
									<i class="material-icons">visibility</i>
								</label>
							</div>
						</p>
					</div>
					<div class="modal-footer justify-content-center aling-items-center">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
dashboard_helper::footer('pacientes.js');
?>