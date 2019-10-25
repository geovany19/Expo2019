<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Doctores");
dashboardHelper::nav();
?>
<main>
	<h1 class="text-center">Doctores</h1>
	<div class="float-right">
		<button type="button" class="btn btn-outline-success" onclick="modalCreate()" data-placement="top" title="Agregar Doctor">
			<i class="fas fa-plus-circle "></i>
		</button>
	</div>
	<div  class="float-left">
		<button type="button" data-toggle="modal" data-target="#reportes" class="btn btn-outline-warning"  class="btn btn-outline-success" data-placement="top" title="Generar Reporte">
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
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Correo</th>
					<th scope="col">Usuario</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Sesión</th>
					<th scope="col">Especialidad</th>
					<th scope="col">Fecha de nacimiento</th>
					<th scope="col">Estado</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody id="tabla-doctores"></tbody>
		</table>
	</div>
</main>
<!--Ventana para crear un nuevo registro -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modalcreate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center aling-items-center">
        <h5 class="modal-title" id="modalcreate">Crear Doctor</h5>
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
      			<label for="create_usuario">Contraseña</label>
      			<input type="password" class="form-control" id="create_clave1" name="create_clave1" required>
			</div>
			<div class="col-md-6 mb-3">
      			<label for="create_usuario">Confirmar contraseña</label>
      			<input type="password" class="form-control" id="create_clave2" name="create_clave2" required>
    		</div>
			<div class="col-md-6 mb-4">
      			<label for="create_fecha">Fecha de nacimiento</label>
      			<input type="date" class="form-control" id="create_fecha" name="create_fecha" min="2000-01-01" max=<?php echo date('Y-m-d') ?> required>
			</div>
			<div class="col-md-6 mb-4">
      			<label for="create_fecha">Teléfono</label>
      			<input type="text" class="form-control" id="create_telefono" name="create_telefono" minlength="8" maxlength="8" required>
    		</div>
			<div class="col-md-6 mb-4">
				<label>Especialidad</label>
				<select id="create_especialidad" name="create_especialidad">
				</select>
			</div>
				<div class="file-field input-field col s12 m6">
					<div class="btn waves-effect">
						<input id="create_archivo" type="file" name="create_archivo"/>
					</div>
				</div>
				<div class="col s12 m6">
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
				<button type="submit" data-toggle="tooltip" data-placement="top" title="Guardar" class="btn btn-success" ><i class="material-icons prefix">done</i></button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>
<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center aling-items-center">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar Doctor</h5>
        </button>
      </div>
      <div class="modal-body">
							
	  <form class="needs-validation" id="form-update" autocomplete="off">
	  <div class="d-flex justify-content-center">
			  <img id="foto" class="img-fluid" width="100">
	  </div>	
	  		<input type="hidden" id="id_doctor" name="id_doctor">
	  		<input type="hidden" id="foto_doctor" name="foto_doctor">
			<div class="row">
			<div class="col-md-6 mb-4">
				  <label for="update_nombre">Nombre</label>
      			<input type="text" class="form-control" id="update_nombre" name="update_nombre" required>
    		</div>
			<div class="col-md-6 mb-6">
      			<label for="update_apellido">Apellido</label>
      			<input type="text" class="form-control" id="update_apellido" name="update_apellido" required>
    		</div>
			<div class="col-md-6 mb-3">
      			<label for="update_correo">Correo</label>
      			<input type="email" class="form-control" id="update_correo" name="update_correo" required>
    		</div>
			<div class="col-md-6 mb-3">
      			<label for="update_usuario">Usuario</label>
      			<input type="text" class="form-control" id="update_usuario" name="update_usuario" required>
    		</div>
			<div class="col-md-6 mb-4">
      			<label for="update_fecha">Fecha de nacimiento</label>
      			<input type="date" class="form-control" id="update_fecha" name="update_fecha" required>
			</div>
			<div class="col-md-6 mb-4">
      			<label for="update_telefono">Teléfono</label>
      			<input type="text" class="form-control" id="update_telefono" name="update_telefono" minlength="8" maxlength="8" required>
    		</div>
			<div class="col-md-6 mb-4">
				<label>Especialidad</label>
				<select class="custom-select" id="update_especialidad" name="update_especialidad">
				</select>
			</div>
				<div class="file-field input-field col s12 m6">
					<div class="btn waves-effect">
						<input id="update_archivo" type="file" name="update_archivo"/>
					</div>
				</div>
				<div class="col s12 m6">
					<p>
						<div class="switch">
							<span>Estado:</span>
							<label>
								<i class="material-icons">visibility_off</i>
								<input id="update_estado" type="checkbox" name="update_estado" />
								<span class="lever"></span>
								<i class="material-icons">visibility</i>
							</label>
						</div>	
					</p>
				</div>
			</div>
			<div class="modal-footer justify-content-center aling-items-center">
			<button type="button" data-toggle="tooltip" data-placement="top" title="Cancelar" class="btn btn-danger" data-dismiss="modal"><i class="material-icons prefix">cancel</i></button>
			<button type="submit" data-toggle="tooltip" data-placement="top" title="Actualizar" class="btn btn-success" ><i class="material-icons prefix">done</i></button>
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
      </div>
      <div class="modal-body">			
	  	<form id="formDoctor" method="POST">
			<div class="d-flex justify-content-center">
				<div class="row">
					<div class="col-md-6 mb-4">
						<label for="doctoresI">Seleccione un doctor</label>
						<select name="doctoresI" id="doctoresI"></select>
					</div>
				</div>
			</div>	
			<div class="modal-footer justify-content-center aling-items-center">
				<button type="submit" data-toggle="tooltip" data-placement="top" title="Crear Reporte" class="btn btn-success" ><i class="material-icons prefix">assignment</i></button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>
<?php
dashboardHelper::footer('doctores.js');
?>