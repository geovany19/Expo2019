<?php
class Public_page{
    public static function header($title){
        print('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"  media="screen,projection"/>
            <title>'.$title.'</title>
        </head>
        <body>
        <nav class="green">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Clínica Dra. Alma Rocío</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
            </ul>
            </div>
        </nav>
        ');
    }

    public static function footer(){
        print('
                <footer class="page-footer green">
                <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                    </div>
                </div>
                </div>
                <div class="footer-copyright">
                <div class="container">
                © 2019 Los 4 Fantásticos
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
                </div>
            </footer>
            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="../../resources/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
            <script type="text/javascript" src="../../resources/js/public.js"></script>
        </body>
        </html>
        ');
    }
}
?>