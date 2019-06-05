<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Usuarios");
dashboard_helper::nav();
?>
<main>
    <h1 class="text-center">Usuarios</h1>
    <div>
        <table class="display responsive no-wrap dtr-inline collapsed table table-responsive table-hover" id="tabla-usuarios" width="100%">
            <thead class="thead-dark">
                <!--Agregando los campos fijos a la tabla-->
                <tr role="row">
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal-update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
dashboard_helper::footer('usuarios.js');
?>