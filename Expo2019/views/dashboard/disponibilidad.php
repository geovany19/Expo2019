<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Disponibilidad");
dashboardHelper::nav();
?>
<main>
    <h1 class="text-center">Disponibilidades</h1>
    <div>
        <table class="table table-responsive table-hover" id="tabla-disponibilidades">
            <thead class="thead-dark">
                <!--Agregando los campos fijos a la tabla-->
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre doctor</th>
                    <th scope="col">Apellido doctor</th>
                    <th scope="col">Día</th>
                    <th scope="col">Hora de inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
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
			<div class="col-md-6 mb-4">
      			<label for="create_fecha">Fecha de nacimiento</label>
      			<input type="date" class="form-control" id="create_fecha" name="create_fecha" required>
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
							
	  <form class="needs-validation" id="form-update" autocomplete="off" novalidate>
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
				<label>Especialidad</label>
				<select id="update_especialidad" name="update_especialidad">
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
<?php
dashboardHelper::footer('disponibilidad.js');
?>