<?php
include('../../core/helpers/dashboard/navbaradmin.php');
include('../../core/helpers/dashboard/footeradmin.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../../resources/img/jardin-iso.png">
    <link rel="stylesheet" type="text/css" href="../../resources/css/dashboard/estilos_admin.css">
    <link rel="stylesheet" href="../../resources/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/material-icons.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/Chart.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/chart-style.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/prism.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/style-horizontal.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/sidenav.css">
    <title>Tablero</title>
</head>

<body class="has-fixed-sidenav">
    <header>
        <?php
        echo navbar::nav();
        echo navbar::sidenav();
        ?>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Disponibilidad de horarios</h3>
                    <table class="striped responsive-table">
                        <thead>
                            <!--Agregando los campos fijos a la tabla-->
                            <tr>
                                <th>Código</th>
                                <th>Hora inicio</th>
                                <th>Hora fin</th>
                                <th>Doctor</th>
                                <th>Foto</th>
                                <th>Especialidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!--Agregando registros a la tabla-->
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>8:30 AM</td>
                                <td>11:30 AM</td>
                                <td>Juan Pérez</td>
                                <td><img class="responsive-img" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
                                <td>Medicina general</td>
                                <td>
                                    <p>
                                        <label>
                                            <input type="checkbox" class="filled-in" checked="checked" disabled="disabled" />
                                            <span>Disponible</span>
                                        </label>
                                    </p>
                                </td>
                                <!--Declarando que al interactuar con el icono "delete" activará un modal que sirve para borrar o uno un registro-->
                                <td><i class="material-icons"><a class="modal-trigger" href="#modal1">border_color</a></i></td>
                                <td><i class="material-icons"><a class="modal-trigger" href="#modal15">delete</a></i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>8:30 AM</td>
                                <td>3:30 PM</td>
                                <td>Alberto Laínez</td>
                                <td><img class="responsive-img" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
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
                                <td>8:30 AM</td>
                                <td>1:30 PM</td>
                                <td>Pedro Andrade</td>
                                <td><img class="responsive-img" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
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
                                <td>10:30 AM</td>
                                <td>4:30 PM</td>
                                <td>Benjamin Contreras</td>
                                <td><img class="responsive-img" src="../../resources/img/dashboard/img2.jpg" alt=""></td>
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
            </div>
        </div>
    </main> 