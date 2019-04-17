<?php

    class navbar{
        function nav() {
        return '
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">
                        <img class="responsive-img" src="../../resources/img/public/logo_clinica.png" alt="empresa-logo">
                    </a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#">Sass</a></li>
                        <li><a href="#">Components</a></li>
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">Mobile</a></li>
                    </ul>
                </div>
            </nav>
            
            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="images/office.jpg">
                        </div>

                        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                        <a href="#name"><span class="white-text name">John Doe</span></a>
                        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>
                </li>
                <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                <li><a href="#!">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
            </ul>
        </div>';
        }
    }
?>