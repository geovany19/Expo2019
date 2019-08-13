<?php
include "../../core/helpers/public/public_helper.php";
public_helper::head("Citas");
public_helper::navbar();
?>

<main class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Citas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover " id="dataTableCitas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Paciente</th>
                            <th>Dia de la cita</th>
                            <th>Hora de la cita</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-citas">
                        <!-- cargado desde el cotrolador -->
                    </tbody>
                </table>
            </div>
        </div>

        <a role="button" href="../../core/reportes/public/reporteCitas.php" class="btn btn-primary">Generar reporte</a>
    </div>
</main>

<!--Modal crear cita -->
<div class="modal fade" id="crearCita" tabindex="-1" role="dialog" aria-labelledby="modalCita" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="modalEditBrandTitle">Crear cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalCrearCita" method="post">
                <input type="hidden" name="idDoctor" id="idDoctor" required>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputDate">Fecha</label>
                            <input type="date" class="form-control" id="inputDate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTime">Hora</label>
                            <input type="time" class="form-control" id="inputTime" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
public_helper::footer();
public_helper::scripts('citas.js');
?>