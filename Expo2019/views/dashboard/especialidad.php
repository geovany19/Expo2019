<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Especialidad");
dashboard_helper::nav();
?>
<main>
<h1 class="text-center">Especialidades</h1>
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
<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar usuario</h5>
			</div>
			<div class="modal-body">
				<form id="form-update" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
					<div class="form-group">
						<label for="update_nombre">Especialidad</label>
						<input type="text" class="form-control" class="form-control is-valid" id="update_nombre" name="update_nombre" placeholder="Especialidad">
					</div>
					<div class="form-group">
						<label for="update_apellidos">Descripción</label>
						<input type="text" class="form-control" id="update_descripcion" name="update_descripcion" placeholder="Descripción">
					</div>
					<!--<div class="col s12 m6">
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
					</div>-->
					<div class="modal-footer justify-content-center aling-items-center">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
dashboard_helper::footer('especialidades.js');
?>