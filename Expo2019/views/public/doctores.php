<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Doctores");
public_helper::nav();
?>

<main class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Doctores</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover " id="dataTableDoctores" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Especialidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-doctores">
                        <!-- cargado desde el cotrolador -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
            public_helper::modals();
    ?>
</main>



<?php
public_helper::footer();
public_helper::scripts('doctores.js');
?>