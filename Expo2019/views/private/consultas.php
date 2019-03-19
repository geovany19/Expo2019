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
        <div id="calificar" class="modal grey lighten-3">
                        <div class="fullscren">
                            <div class="card white" style="margin:0px;">
                                <div class="card-content">
                
                                </div>

                                <div class="row">
                                    <div class="center">
                                    <div class="input-field col s6">
        <form>
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5"><!--
    --><label for="radio1">★</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
    --><label for="radio2">★</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
    --><label for="radio3">★</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
    --><label for="radio4">★</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
    --><label for="radio5">★</label>
  </p>
</form>
</div>
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
                <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <a class="waves-effect waves-light btn-small modal-trigger" data-target="calificar">Finalizar</a>
                </div>
            </div>
        </div>
            
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