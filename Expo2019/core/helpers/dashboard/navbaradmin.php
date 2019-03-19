<?php
class navbar
{
  function nav()
  {
    return '
        <div class="navbar-fixed">
          <nav class="navbar blue">
            <div class="nav-wrapper container">
              <a href="index.php" class="brand-logo responsive-img" style="width: 267px; height: 64px;"></a>
              <a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons white-text">menu</i></a>
              <a href="index.php"><i class="material-icons tooltipped white-text" data-position="bottom" data-tooltip="Cerrar sesión">exit_to_app</i></a>
            </div>
          </nav>
        </div>';
  }

  function sidenav()
  {
    return '
    <ul id="slide-out" class="sidenav sidenav-fixed">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
   
        <ul id="sidenav-left" class="sidenav sidenav-fixed">
          <li>
            <div class="user-view" style="margin-bottom: 0px;">
              <div class="background responsive-img">
                <img src="../../resources/img/dashboard/img1.jpg" class="responsive-img">
              </div>
              
              <a href="../../views/dashboard/perfil.php"><img class="circle" src="../../resources/img/dashboard/img3.jpg"></a>
              <a href="#name"><span class="white-text name">Lana del Rey</span></a>
              <a href="#email"><span class="white-text email">lanadelrey@gmail.com</span></a>
            </div>
          </li>
        
          <li>
            <a href="pagina.php" class="waves-effect blue hoverable white-text" style="background-color: #33c065;"><i class="material-icons white-text">dashboard</i>Tablero</a>
          </li>
          
          <!--MANAGEMENT-->
            <li><a href="../../views/dashboard/catalogos.php" class="waves-effect blue hoverable white-text"><i class="material-icons white-text" style="margin-right:16px;">recent_actors</i>Catálogo</a></li>
            <li><a href="../../views/dashboard/perfil.php" class="waves-effect blue hoverable white-text"><i class="material-icons white-text" style="margin-right:16px;">account_circle</i>Cuenta</a></li>
          <!--Account-->
          <li>
            <a class="waves-effect blue hoverable white-text" href="admin_configuracion.php"><i class="material-icons white-text" style="margin-right:16px;">settings</i>Configuración</a>
          </li>
          <li>
            <a class="waves-effect blue hoverable white-text"  href="index.php"><i class="material-icons white-text" style="margin-right:16px;">access_time</i>Disponibilidad de horarios</a>
          </li>
          <li>
            <a class="waves-effect blue hoverable white-text"  href="index.php"><i class="material-icons white-text" style="margin-right:16px;">input</i>Cerrar sesión</a>
          </li>
        <!--Footer-->
          <li>
            <a class="subheader" style="background-color: #1B99C9;"><i class="material-icons " style="margin-right:16px;">copyright</i> 2019 Copyright F4</a>
          </li>
        </ul>
        ';
  }
}
 