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
<?php
dashboard_helper::footer('especialidades.js');
?>