<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Doctores");
dashboard_helper::nav();
?>
<main>
	<h1 class="text-center">Doctores</h1>
	<button type="submit" data-toggle="modal" data-target="#modal-add" class="btn btn-success">
		<i class="fas fa-plus-circle"></i>
		<span>Agregar doctor</span>
	</button>
	<div>
		<table class="table table-responsive table-hover" id="tabla-doctores">
			<thead class="thead-dark">
				<!--Agregando los campos fijos a la tabla-->
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Foto</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Correo</th>
					<th scope="col">Nombre de usuario</th>
					<th scope="col">Fecha de nacimiento</th>
					<th scope="col">Especialidad</th>
					<th scope="col">Estado</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody id="table-body"></tbody>
		</table>
	</div>
</main>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title">Agregar doctor</h5>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="create_nombre">Nombre</label>
							<input type="text" class="form-control" id="create_nombre" placeholder="Nombre:">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Password</label>
							<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
					</div>
					<div class="form-group">
						<label for="inputAddress2">Address 2</label>
						<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputCity">City</label>
							<input type="text" class="form-control" id="inputCity">
						</div>
						<div class="form-group col-md-4">
							<label for="inputState">State</label>
							<select id="inputState" class="form-control">
								<option selected>Choose...</option>
								<option>...</option>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="inputZip">Zip</label>
							<input type="text" class="form-control" id="inputZip">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								Check me out
							</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Sign in</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- Ventana para modificar un registro existente -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-center aling-items-center">
				<h5 class="modal-title" id="exampleModalLongTitle">Actualizar Doctor</h5>
			</div>
			<div class="modal-body">
				<img id="foto" height="75">
				<form id="form-update" enctype="multipart/form-data">
					<input type="hidden" id="id_doctor" name="id_doctor">
					<input type="hidden" id="foto_doctor" name="foto_doctor">
					<div class="form-group">
						<label for="update_nombre">Nombre:</label>
						<input type="text" class="form-control" class="form-control is-valid" id="update_nombre" name="update_nombre" aria-describedby="emailHelp" placeholder="Nombre:">
					</div>
					<div class="form-group">
						<label for="update_apellido">Apellido:</label>
						<input type="text" class="form-control" id="update_apellido" name="update_apellido" placeholder="Apellido:">
					</div>
					<div class="form-group">
						<label for="update_correo">Correo:</label>
						<input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Correo:">
					</div>
					<div class="form-group">
						<label for="update_alias">Usuario:</label>
						<input type="text" class="form-control" id="update_alias" name="update_alias" placeholder="Usuario:">
					</div>
					<div class="form-group">
						<label for="update_fecha">Fecha:</label>
						<input type="date" class="form-control" id="update_fecha" name="update_fecha" placeholder="Fecha:">
					</div>
					<div class="form-group">
						<label for="update_archivo">Foto:</label>
						<input type="file" id="update_archivo" name="update_archivo" class="file-input">
					</div>
					<div class="form-group">
          <select class="form-control" id="update_especialidad">
          <option value="">Selecciona papa</option>
            <?php
           require '../../core/helpers/database.php';
           $sql_s = mysql_query("SELECT id_doctor FROM doctores ");
           while($row = mysql_fetch_array($sql_s)){
             $id_especialidad =$row_s['id_especialidad'];
             $nombre = $row_s['nombre']
             ?>
             <option value="<?php echo $id_especialidad?>"></option>
             <?php

           }

          ?>
          </select>
						<label for="update_especialidad">Especialidad:</label>
						<input type="number" class="form-control" id="update_especialidad" name="update_especialidad" class="file-input" placeholder:="Especialidad">
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
<?php
dashboard_helper::footer('doctores.js');
?>