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
    <title>Pacientes</title>
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

                                    <div class="table">
                                        <ul class="collection">
                                            
                                            <li class="collection-item">
                                                <table class="highlight responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre del paciente</th>
                                                            <th>Ultima consulta</th>
                                                            <th>Proxima consulta</th>
                                                            <th>Padecimientos</th>
                                                            <th>Edad</th>
                                                            <th>Peso</th>
                                                            <th>Estatura</th>
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        <tr>
                                                            <td>herbert cornejo</td>
                                                            <td>07/02/19</td>
                                                            <td>07/03/19</td>
                                                            <td>gripe</td>
                                                            <td>23</td>
                                                            <td>160lb</td>
                                                            <td>1.65</td>
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