<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Citas");
dashboardHelper::nav();
?>
<main>
    <h1 class="text-center">Historial de citas</h1>
    <div>
        <table class="table table-responsive table-hover" id="tabla-citas">
            <thead class="thead-dark">
                <!--Agregando los campos fijos a la tabla-->
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Día</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Nombre del doctor</th>
                    <th scope="col">Apellido del doctor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>
</main>
<?php
dashboardHelper::footer('disponibilidad.js');
?>