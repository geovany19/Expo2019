<?php
include('../../core/helpers/private/navbarprivate.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="">
    <link rel="stylesheet" href="../../resources/css/materialize.css">
    <link rel="stylesheet" href="../../resources/css/sidenav.css">
    <link rel="stylesheet" href="../../resources/css/private/estilos_privado.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Doctor</title>
</head>
<body class="has-fixed-sidenav">
    <header>
        <?php
        echo navbar::nav();
        echo navbar::sidenav();
        ?>
    </header>
    <main class="main grey lighten-3">
        <section>
            <article>
            <div id="modal2" class="modal grey lighten-3">
                        <div class="fullscren">
                            <div class="card white" style="margin:0px;">
                                <div class="card-content">
                                </div>

                                <div class="row">
                                    <div class="center">
                                        <h4>¿Desea eliminar?</h4>
                                    </div>
                                </div>
                                

                                <div class="center">
                                    <a href="#!" class=""><i class="material-icons green-text medium">check_circle</i></a>
                                    <a href="#!" class=""><i class="material-icons red-text medium">cancel</i></a>
                                </div>
                            </div>
                        </div>
                    </div>

            <div id="modaleditar" class="modal grey lighten-3">
                        <div class="fullscren">
                            <div class="card white" style="margin:0px;">
                                <div class="card-content">
                                    <span class="card-title">
                                        Editar
                                    </span>
                                </div>

                
                                <div class="row">
                                    <div class="input-field col s9 offset-s1">
                                        <input id="nombre-act" type="text" class="validate">
                                        <label for="nombre-act">Actividad</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4 offset-s1">
                                        <input id="fecha" type="text" class="datepicker">
                                        <label for="fecha">Fecha</label>
                                    </div>
                                    <div class="input-field col s4 offset-s1">
                                        <input id="hora"type="text" class="timepicker">  
                                        <label for="hora">Hora</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4 offset-s1">
                                    <p>Estado</p>
                                     <p>
                                    <label>
                                    <input type="checkbox" checked="checked" />
                                    <span></span>
                                    </label>
                                    </p>
                                    </div>
                                </div>
                                <div class="center">
                                    <a href="#!" class=""><i class="material-icons green-text medium">check_circle</i></a>
                                    <a href="#!" class=""><i class="material-icons red-text medium">cancel</i></a>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="row">
                        <div class="col l12 m12 s12">
                        <h2>12:09:08 P.M.<i class="material-icons medium left">alarm</i></h2>
                        </div>
                        </div>

                <div class="container">
                        <div class="row" style=" padding-top: 20px; padding-bottom: 20px; margin-bottom: 0px;">
                            <h3 style=" margin: 0px;">Agenda diaria</h3>
                        </div>
                </div>

                    <div class="row">
                        <div class="card white col l12 m12 s12">
                            <div class="card-content">

                                    <div class="table">
                                        <ul class="collection">
                                            
                                            <li class="collection-item">
                                                <table class="highlight responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Actividad</th>
                                                            <th>Hora</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        <tr>
                                                            <td>Cita con herbert cornejo</td>
                                                            <td>09:00 A.M</td>
                                                            <td>
                                                            <form action="#">
                                                                <div class="row">
                                                                <p>
                                                                <label>
                                                                <input type="checkbox" checked="checked" class="center" />
                                                                <span></span>
                                                                </label>
                                                                </p>
                                                                </div>
                                                            </form>
                                                            </td>
                                                            <td>
                                                                <a data-target="modaleditar" class="modal-trigger"><i class="material-icons green-text">edit</i></a>
                                                                <a data-target="modal2" class="modal-trigger"><i class="material-icons red-text">delete</i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </li>

                                        </ul>
                                    </div>
                        </div>
                    </div>
                </div>

                <!--AGENDA SEMANAL-->
                <div class="container">
                        <div class="row" style=" padding-top: 20px; padding-bottom: 20px; margin-bottom: 0px;">
                            <h3 style=" margin: 0px;">Agenda Semanal</h3>
                        </div>
                </div>

                    <div class="row">
                        <div class="card white col l12 m12 s12">
                            <div class="card-content">

                                    <div class="table">
                                        <ul class="collection">
                                            
                                            <li class="collection-item">
                                                <table class="striped responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Horario de atención</th>
                                                            <th>DOM</th>
                                                            <th>LUN</th>
                                                            <th>MAR</th>
                                                            <th>MIER</th>
                                                            <th>JUE</th>
                                                            <th>VIER</th>
                                                            <th>SAB</th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        <tr>
                                                            <td>07:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>08:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>09:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>10:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>11:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>13:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>14:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>15:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>16:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>17:00</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                            <td>1 consulta</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </li>

                                        </ul>
                                    </div>
                        </div>
                    </div>
                </div>
                <!--AGENDA MENSUAL-->
                <div class="container">
                        <div class="row" style=" padding-top: 20px; padding-bottom: 20px; margin-bottom: 0px;">
                            <h3 style=" margin: 0px;">Agenda Mensual</h3>
                        </div>
                </div>

                    <div class="row">
                        <div class="card white col l12 m12 s12">
                            <div class="card-content">

                                    <div class="table">
                                        <ul class="collection">
                                            
                                            <li class="collection-item">
                                                <table class="striped responsive">
                                                <thead>
                                                        <tr>
                                                            <th>MARZO</th>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>DOM</th>
                                                            <th>LUN</th>
                                                            <th>MAR</th>
                                                            <th>MIER</th>
                                                            <th>JUE</th>
                                                            <th>VIER</th>
                                                            <th>SAB</th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        <tr>
                                                            <td><h5>1</h5>1 consulta</td>
                                                            <td><h5>2</h5>1 consulta</td>
                                                            <td><h5>3</h5>1 consulta</td>
                                                            <td><h5>4</h5>1 consulta</td>
                                                            <td><h5>5</h5>1 consulta</td>
                                                            <td><h5>6</h5>1 consulta</td>
                                                            <td><h5>7</h5>1 consulta</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>

                                        </ul>
                                    </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <aside>
        
        </aside>
    </main>
    <footer>
    </footer>

    <script src="../../resources/js/jquery.js"></script>
    <script src="../../resources/js/materialize.min.js"></script>
    <script src="../../resources/js/init.js"></script>
</body>
</html>