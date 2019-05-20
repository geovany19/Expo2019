<?php
include "../../core/helpers/private/private_helper.php";
private_helper::head("Citas");
private_helper::navbar();
?>
<main>
    <!--<div id="rechazar" class="modal grey lighten-3">
        <div class="fullscren">
            <div class="card white" style="margin:0px;">
                <div class="card-content">
                </div>
                <div class="row">
                    <div class="center">
                        <h4>¿Desea eliminar la solicitud para cita?</h4>
                    </div>
                </div>
                <div class="center">
                    <a href="#!" class=""><i class="material-icons green-text medium">check_circle</i></a>
                    <a href="#!" class=""><i class="material-icons red-text medium">cancel</i></a>
                </div>
            </div>
        </div>
    </div>
    <div id="aceptar" class="modal grey lighten-3">
        <div class="fullscren">
            <div class="card white" style="margin:0px;">
                <div class="card-content">
                </div>
                <div class="row">
                    <div class="center">
                        <h4>¿Desea aceptar la solicitud para cita?</h4>
                    </div>
                </div>
                <div class="center">
                    <a href="#!" class=""><i class="material-icons green-text medium">check_circle</i></a>
                    <a href="#!" class=""><i class="material-icons red-text medium">cancel</i></a>
                </div>
            </div>
        </div>
    </div>-->
    <div class="row">
        <div class="col col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="col col-sm-12">
                        <div class="input-field col col-sm-12">
                            <i class="material-icons prefix">search</i>
                            <input type="text" id="autocomplete-input" class="autocomplete">
                            <label for="autocomplete-input">Buscar</label>
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="card-title"><b>Nombre paciente</b></span>
                                <p class="card-tetx">Descripción de los padecimientos o sintomas del paciente</p>
                                <h6 class="card-text">Fecha: <b>02/06/2019</b></h6>
                                <h6 class="card-text">Hora: <b>09:30 am</b></h6>
                            </div>
                            <div class="card-action">
                                <button type="button" class="btn btn-success">Aceptar</button>
                                <button type="button" class="btn btn-danger">Rechazar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
private_helper::footer();
?>