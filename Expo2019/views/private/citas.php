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
    <title>Citas</title>
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
        <div id="rechazar" class="modal grey lighten-3">
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
                    </div>

        <div class="row">
                        <div class="card white col l12 m12s12">
                            <div class="card-content">
            
                                    <div class="col l12 m12 s12">

                                        <div class="input-field col s12">
                                                <i class="material-icons prefix">search</i>
                                                <input type="text" id="autocomplete-input" class="autocomplete">
                                                <label for="autocomplete-input">Buscar</label>
                                        </div>
                                    </div>
                                    <div class="col s12 m4">
      <div class="card blue-grey darken-3 z-depth-0">
        <div class="card-content white-text">
          <span class="card-title">Nombre paciente</span>
          <p>Descripción de los padecimientos o sintomas del paciente</p>
          <h6>02/06/2019</h6>
          <h6>09:30 am</h6>          
        </div>
        <div class="card-action">
          <a data-target="aceptar" class="modal-trigger"class="white-text"href="#">Aceptar</a>
          <a data-target="rechazar" class="modal-trigger" href="#">Rechazar</a>
        </div>
      </div>
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