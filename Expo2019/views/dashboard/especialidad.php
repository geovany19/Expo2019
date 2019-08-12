<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Especialidad");
dashboard_helper::nav();
?>
<main>
	<h1 class="text-center">Especialidades</h1>
	<div  class="float-right">
		<button type="button" data-toggle="modal" data-target="#modal-create" class="btn btn-outline-success"  class="btn btn-outline-success" data-placement="top" title="Agregar Especialidad">
			<i class="fas fa-plus-circle"></i>
		</button>
	</div>
	<div  class="float-left">
		<button type="button" data-toggle="modal" data-target="#reportes	" class="btn btn-outline-warning"  class="btn btn-outline-success" data-placement="top" title="Generar Reporte">
			<i class="material-icons prefix">assignment</i>
		</button>
	</div>
	<div>
	<div>
		<table class="display responsive no-wrap dtr-inline collapsed table table-responsive table-hover" id="tabla-especialidades">
			<thead class="thead-dark">
				<!--Agregando los campos fijos a la tabla-->
				<tr role="row">
					<th scope="col">Código</th>
					<th scope="col">Especialidad</th>
					<th scope="col">Descripción</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody id="table-body"></tbody>
		</table>
	</div>
</main>
<!-- Ventana para crear un nuevo registro-->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
			</div>
			<div class="modal-body">
				<form id="form-create" enctype="multipart/form-data">
					<div class="form-group">
						<label for="create_especialidad">Especialidad</label>
						<input type="text" class="form-control" class="form-control is-valid" id="create_especialidad" name="create_especialidad" placeholder="Especialidad" maxlength="25">
					</div>
					<div class="form-group">
						<label for="create_descripcion">Descripción de especialidad</label>
						<input type="text" class="form-control" id="create_descripcion" name="create_descripcion" placeholder="Descripción de especialidad" maxlength="130">
					</div>
					<div class="modal-footer justify-content-center aling-items-center">
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
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
			</div>
			<div class="modal-body">
				<form id="form-update" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id_especialidad" name="id_especialidad">
					<div class="form-group">
						<label for="update_nombre">Especialidad</label>
						<input type="text" class="form-control" class="form-control is-valid" id="update_nombre" name="update_nombre" placeholder="Especialidad" maxlength="25">
					</div>
					<div class="form-group">
						<label for="update_descripcion">Descripción de especialidad</label>
						<input type="text" class="form-control" id="update_descripcion" name="update_descripcion" placeholder="Descripción de especialidad" maxlength="130">
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
        </button>
      </div>
      <div class="modal-body">
							
	  <form class="needs-validation" id="formEspecialidad">
	  	<div class="d-flex justify-content-center">
			<div class="row">
				<div class="form-group">
					<label for="update_nombre">Especialidad</label>
					<select name="especialidadI" id="especialidadI"></select>
				</div>
			</div>
		</div>
			<div class="modal-footer justify-content-center aling-items-center">
			<button type="submit" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Generar reporte" ><i class='material-icons'>assignment</i></button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>
<?php
dashboard_helper::footer('especialidades.js');
?>