<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Dashboard");
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
<?php
dashboard_helper::footer('doctores.js');
?>