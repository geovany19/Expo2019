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
                <link type="text/css" rel="stylesheet" href="../../resources/css/public/estilos_registropacientes.css"/>
                <title>Registrarse</title>
            </head>
            <body>
                <!--El login no posee nav-->
                <header>
                </header>

                <main class="">
                    <div class="main fondo">
                        <div class="row">
                            <div class="col l8 m8 s12 offset-l2 offset-m2 principal">
                                <div class="row">
                                    <div class="z-depht-2 card-panel white panelSesion">
                                        
                                        <div class="row">
                                            <div class="col l12 m12 12">
                                                <h3 class="grey-text center">Registrarse</h3>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col l8 m8 s12">
                                                <div class="row">
                                                    <form class="col l5 m5 s12 offset-l1 offset-m1">
                                                        <div class="row">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix grey-text">person</i>
                                                                <input id="nombre" type="text" class="validate">
                                                                <label for="nombre">Ingresa tus nombres</label>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <form class="col l5 m5 s12">
                                                        <div class="row">
                                                            <div class="input-field">
                                                                <input id="apellido" type="text" class="validate">
                                                                <label for="apellido">Ingresa tus apellidos</label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="row">
                                                    <form class="col l5 m5 s12 offset-l1 offset-m1">
                                                        <div class="row">
                                                            <div class="input-field">
                                                                <i class="material-icons prefix grey-text">lock</i>
                                                                <input id="contra" type="password" class="validate">
                                                                <label for="contra">Ingresa una contraseña</label>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <form class="col l5 m5 s12">
                                                        <div class="row">
                                                            <div class="input-field">
                                                            <i class="material-icons prefix grey-text">verified_user</i>
                                                                <input id="confirmar" type="password" class="validate">
                                                                <label for="confirmar">Confirma tu contraseña</label>
                                                                <span class="helper-text" data-error="wrong" data-success="right"></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="row">
                                                    <form class="col l5 m5 s12 offset-l1 offset-m1">
                                                        <div class="row">
                                                            <div class="input-field">
                                                            <i class="material-icons prefix grey-text">account_circle</i>
                                                                <input id="usuario" type="text" class="validate">
                                                                <label for="usuario">Ingresa un nombre de usuario</label>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <form class="col l5 m5 s12">
                                                        <div class="row">
                                                            <div class="input-field">
                                                            <i class="material-icons prefix grey-text">mail</i>
                                                                <input id="correo" type="email" class="validate">
                                                                <label for="correo">Ingresa tu correo electrónico</label>
                                                                <span class="helper-text" data-error="wrong" data-success="right"></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="row">
                                                    <form class="col l5 m5 s12 offset-l1 offset-m1">
                                                        <div class="row">
                                                            <div class="input-field">
                                                            <i class="material-icons prefix grey-text">event</i>
                                                                <input id="fecha" type="text" class="datepicker">
                                                                <label for="fecha">Fecha de nacimiento</label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                    <form action="#" class="col l5 m5 s12">
                                                        <p class="grey-text">
                                                        <i class="material-icons grey-text">wc</i> Género:
                                                            <label>
                                                                <input name="group1" type="radio" class="blue-darken-1 right-align"/>
                                                                <span>Hombre</span>
                                                            </label>
                                                            <label>
                                                                <input name="group1" type="radio" class="blue-darken-1 right-align"/>
                                                                <span>Mujer</span>
                                                            </label>
                                                        </p>
                                                    </form>
                                                </div>

                                                <div class="row">
                                                    <div class="col s12 l10 m10 offset-l1 offset-m1">
                                                        <form action="#">
                                                            <div class="file-field input-field">
                                                                <div class="btn">
                                                                    <span><i class="material-icons white-text medium">add_a_photo</i></span>
                                                                    <input type="file">
                                                                </div>
                                                                <div class="file-path-wrapper">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col l4 m4 s12">
                                                <img class="responsive-img logoSesion" src="../../resources/img/public/logo_clinica.png" alt="empresa-logo">
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col l12 m12 s12">
                                                <a class="waves-effect waves-light btn blue-darken-1 right" href="perfil.php">Crear cuenta</a>
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

                <footer>

                </footer>

                <script src="../../resources/js/jquery.js"></script>
                <script src="../../resources/js/materialize.min.js"></script>
                <script src="../../resources/js/init.js"></script>
            </body>
         </html>