<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!--Import Google Icon Font-->
            <link href="../../resources/css/material-icons.css" rel="stylesheet">
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.css"  media="screen,projection"/>
            <link type="text/css" rel="stylesheet" href="../../resources/css/public/estilos_paciente.css"/>
            <title>Iniciar sesión</title>
        </head>
        <body>
            <!--El login no posee nav-->
            <header>
            </header>

            
            <main>
                <div class="main fondo">
                    <div class="row">
                        <div class="col l6 m8 s12 offset-l3 offset-m2 principal">

                            <div class="row">
                                <div class="z-depht-2 card-panel white panelSesion">
                                    
                                    <div class="row">
                                        <div class="col l12 m12 12">
                                            <h3 class="grey-text center">Iniciar sesión</h3>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col l4 m4 s12">
                                            <img class="responsive-img logoSesion" src="../../resources/img/public/logo_clinica.png" alt="empresa-logo">
                                        </div>

                                        <div class="col l8 m8 s12">
                                            <div class="row">
                                                <form class="col l10 m10 s12 offset-l1 offset-m1">
                                                    <div class="row">
                                                        <div class="input-field">
                                                            <i class="material-icons prefix grey-text">account_circle</i>
                                                            <input id="usuario" type="text" class="validate">
                                                            <label for="usuario">Introduce tu nombre de usuario o correo electrónico</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="row">
                                                <form class="col l10 m10 s12 offset-l1 offset-m1">
                                                    <div class="row">
                                                        <div class="input-field">
                                                            <i class="material-icons prefix grey-text">lock</i>
                                                            <input id="contra" type="password" class="validate">
                                                            <label for="contra">Introduce tu contraseña</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col l4 m4 s12">
                                            <a href="" class="grey-text right">¿Has olvidado tu contraseña?</a>
                                        </div>

                                        <div class="col l8 m8 s12">
                                            <a class="waves-effect waves-light btn blue-darken-1 right" href="">siguiente</a>
                                        </div>
                                    </div>                            

                                </div>
                            </div>

                            <div class="row">
                                 <a href="" class="grey-text right enlacesExtra z-depth-2">Terminos</a>
                                 <a href="" class="grey-text right enlacesExtra z-depth-2">Privacidad</a>
                                 <a href="" class="grey-text right enlacesExtra z-depth-2">Ayuda</a>
                            </div>

                        </div>

                    </div>
                    
                </div>
            </main>

            <!--El login no posee footer-->
            <footer>
            </footer>

            <script src="../../resources/js/jquery.js"></script>
            <script src="../../resources/js/materialize.min.js"></script>
            <script src="../../resources/js/init.js"></script>
        </body>
</html>