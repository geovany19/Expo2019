<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Pacientes");
dashboard_helper::nav();
?>
<main class="row">
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
<?php
dashboard_helper::footer('pacientes.js');
?>