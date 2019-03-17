<?php
    class navbar{
      function nav() {
        return '
        <div class="navbar-fixed">
          <nav class="navbar white">
            <div class="nav-wrapper container">
              <a href="index.php" class="brand-logo responsive-img" style="width: 267px; height: 64px;"> 
                <img class="responsive-img" src="../../resources/img/jardin-logo.png" alt="empresa-logo">
              </a>
              <a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
            </div>
          </nav>
        </div>';
      }

      function sidenav() {
        return '
        <ul id="sidenav-left" class="sidenav sidenav-fixed">
          <li>
            <div class="user-view" style="margin-bottom: 0px;">
              <div class="background responsive-img">
                <img src="../../resources/img/img1.jpg" class="responsive-img">
              </div>
              
              <a href="#user"><img class="circle" src="../../resources/img/img2.jpg"></a>
              <a href="#name"><span class="white-text name">Adam Levine</span></a>
              <a href="#email"><span class="white-text email">maroon5vocalist@gmail.com</span></a>
            </div>
          </li>
        
          <li>
            <a href="index.php" class="waves-effect green hoverable" style="background-color: #33c065;"><i class="material-icons">dashboard</i>Tablero</a>
          </li>
          
          <!--MANAGEMENT-->
          <li>
            <a class="subheader z-depth-2" style="background-color: #116f32;"><i class="material-icons">view_list</i>Gestion de productos</a>
          </li> 
                    <li><a href="admin_arboles.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">nature</i>Árboles</a></li>
                    <li><a href="admin_arreglos.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">filter_vintage</i>Arreglos florales</a></li>
                    <li><a href="admin_follaje.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">opacity</i>Follaje</a></li>
                    <li><a href="admin_flores.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">local_florist</i>Flores</a></li>
                    <li><a href="admin_herramientas.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">nature_people</i>Herramientas de jardinería</a></li>
                    <li><a href="admin_plantas.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">spa</i>Plantas ornamentales</a></li>
                    <li><a href="admin_semillas.php" class="waves-effect green hoverable"><i class="material-icons" style="margin-right:16px;">scatter_plot</i>Semillas</a></li>

          <!--Account-->

          <li>
            <a class="subheader z-depth-2" style="background-color: #116f32;"><i class="material-icons" >account_circle</i>Cuenta</a>
          </li> 
          <li>
            <a class="waves-effect green hoverable" href="admin_configuracion.php"><i class="material-icons" style="margin-right:16px;">settings</i>Configuración</a>
          </li>
          <li>
            <a class="waves-effect green hoverable" href="../../views/public/index.php"><i class="material-icons" style="margin-right:16px;">input</i>Cerrar sesión</a>
          </li>
        <!--Footer-->
          <li>
              
                <a class="subheader" style="background-color: #116f32;"><i class="material-icons" style="margin-right:16px;">copyright</i> 2019 Copyright AmaCam S.A. de C.V.</a>
              
          </li>
        </ul>
        ';
      }
    }
?>
