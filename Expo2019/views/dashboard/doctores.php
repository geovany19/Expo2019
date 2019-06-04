<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Doctores");
dashboard_helper::nav() ;
?>
<main>
    <h1 class="text-center">Doctores</h1>
    <div>
        <table class="table table-responsive table-hover">
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" >Modificar Doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="form-update">
          <div class="form-group">
            <label for="update_doctor">Nombre:</label>
            <input type="name" class="form-control" id="update_doctor" name="update_doctor" aria-describedby="emailHelp" placeholder="Nombre:">
          </div>
          <div class="form-group">
            <label for="update_apellido">Apellido:</label>
            <input type="password" class="form-control" id="update_apellido" name="update_apellido" placeholder="Apellido:">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
dashboard_helper::footer('doctores.js');
?>