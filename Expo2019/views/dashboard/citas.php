<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Citas");
dashboardHelper::nav();
?>
<main>
    <h1 class="text-center">Historial de citas</h1>
            <div class="float-right">
			<button type="button" class="btn btn-outline-success" onclick="modalCreate()" data-placement="top" title="Agregar Cita">
                <i class="fas fa-plus-circle "></i>
            </button>
        </div>
    <div>
        <table class="table table-responsive table-hover" id="table-body">
            <thead class="thead-dark">
                <!--Agregando los campos fijos a la tabla-->
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre Doctor</th>
                    <th scope="col">Apellido Doctor</th>
                    <th scope="col">Nombre Paciente</th>
                    <th scope="col">Apellido Paciente</th>
                    <th scope="col">Fecha de la cita</th>
                    <th scope="col">Hora de la cita</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-citas"></tbody>
        </table>
    </div>
</main>


<!--Modal que abre para crear una nueva cita con los combobox-->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modalcreate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center aling-items-center">
        <h5 class="modal-title" id="modalcreate">Crear Nueva Cita</h5>
        </button>
      </div>
      <div class="modal-body">
	  <form class="needs-validation" id="form-create" novalidate autocomplete="off">
			<div class="row">
				<div class="col-md-6 mb-4">
					<label for="create_doctor">Seleccione un doctor</label>
					<select class="custom-select" id="create_doctor" name="create_doctor" required>
					</select>
				</div>			
				<div class="col-md-6 mb-4">
					<label for="create_paciente">Seleccione el paciente</label>
					<select class="custom-select" id="create_paciente" name="create_paciente" required>
					</select>
				</div>
				<div class="col-md-6 mb-4">
					<label for="create_fecha">Fecha de la cita</label>
					<input type="date" class="form-control" id="create_fecha" name="create_fecha" min=<?php echo date('Y-m-d') ?> required>
				</div>
				<div class="col-md-6 mb-4">
					<label for="create_hora">Hora de la cita</label>
					<input type="Time" class="form-control" id="create_hora" name="create_hora" min=<?php echo date('G:i') ?> required>
				</div>
				<div class="col-md-6 mb-4">
					<label for="create_estado">Estado de la cita</label>
					<select class="custom-select" id="create_estado" name="create_estado" required>
					</select>
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
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modalupdate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center aling-items-center">
        <h5 class="modal-title" id="modalupdate">Modificar Cita</h5>
        </button>
      </div>
      <div class="modal-body">
	  <form class="needs-validation" id="form-update" novalidate>
	  <input type="hidden" id="id_cita" name="id_cita">
			<div class="row">
				<div class="col-md-6 mb-4">
					<label for="update_paciente">Seleccione un doctor</label>
					<select class="custom-select" id="update_doctor" name="update_doctor">
					</select>
				</div>			
				<div class="col-md-6 mb-4">
					<label for="update_paciente">Seleccione el paciente</label>
					<select class="custom-select" id="update_paciente" name="update_paciente">
					</select>
				</div>
				<div class="col-md-6 mb-4">
					<label for="update_fecha">Fecha de la cita</label>
					<input type="date" class="form-control" id="update_fecha" name="update_fecha" min=<?php echo date('Y-m-d') ?> required>
				</div>
				<div class="col-md-6 mb-4">
					<label for="update_hora">Hora de la cita</label>
					<input type="Time" class="form-control" id="update_hora" name="update_hora" min=<?php echo date('G:i') ?> required>
				</div>
				<div class="col-md-6 mb-4">
					<label for="update_estado">Estado de la cita</label>
					<select class="custom-select" id="update_estado" name="update_estado" required>
					</select>
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
<?php
dashboardHelper::footer('citas.js');
?>