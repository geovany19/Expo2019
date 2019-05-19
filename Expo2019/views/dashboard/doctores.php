<?php
include "../../core/helpers/dashboard/dashboard_helper.php";
dashboard_helper::head("Dashboard");
dashboard_helper::nav();
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
                    <th scope="col">Foto</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Disponibilidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!--Agregando registros a la tabla-->
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>juan_perez@sismed.com</td>
                    <td>juan_perez</td>
                    <td><img class="rounded" src="../../resources/img/dashboard/img2.jpg" alt="Responsive-image" width="200px" height="200px"></td>
                    <td>Medicina general</td>
                    <td>
                        <label class="btn btn-success active">
                            <input type="checkbox" autocomplete="off" checked>
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                    </td>
                    <!---Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alberto Laínez</td>
                    <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                    <td>Pediatría</td>
                    <td>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" checked="checked" disabled="disabled" />
                                <span>Disponible</span>
                            </label>
                        </p>
                    </td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pedro Andrade</td>
                    <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                    <td>Cardiología</td>
                    <td>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" checked="checked" disabled="disabled" />
                                <span>Disponible</span>
                            </label>
                        </p>
                    </td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Benjamin Contreras</td>
                    <td><img class="col col-sm-12 col-md-6" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                    <td>Ortodoncia</td>
                    <td>
                        <p>
                            <label>
                                <input type="checkbox" disabled="disabled" />
                                <span>No disponible</span>
                            </label>
                        </p>
                    </td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                    <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>
<?php
dashboard_helper::footer();
?>