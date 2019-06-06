<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Doctores");
dashboard_helper::nav() ;
?>
<main>
<button type="submit" class="btn btn-primary justify-content-center aling-items-center">Agregar</button>
    <h1 class="text-center">Doctores</h1>
    <div>
        <table class="table table-responsive table-hover"  id="tabla-doctores">
            <thead class="thead-dark">
                <!--Agregando los campos fijos a la tabla-->
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Nombre de usuario</th>
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
          <input type="hidden" id="id_doctor" name="id_doctor" >
          <input type="hidden" id="foto_doctor" name="foto_doctor" >
          <div class="form-group">
            <label for="update_nombre">Nombre:</label>
            <input type="text" class="form-control"  class="form-control is-valid" id="update_nombre" name="update_nombre" aria-describedby="emailHelp" placeholder="Nombre:">
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
          <div class="col s12 m6">
                    <p>
                        <div class="checkbox">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="create_estado"  type="checkbox" data-toggle="toggle" checked/>
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
  <div class="modal-footer justify-content-center aling-items-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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