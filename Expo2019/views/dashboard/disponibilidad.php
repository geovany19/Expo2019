<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Iniciar sesión");
dashboard_helper::nav();
?>
<main>
    <h1 class="text-center">Disponibilidades</h1>
    <div>
        <table class="table table-responsive table-hover" id="tabla-disponibilidades">
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
dashboard_helper::footer('disponibilidad.js');
?>