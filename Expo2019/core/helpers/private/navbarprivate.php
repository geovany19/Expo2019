<?php
    class navbar{
      function nav() {
        return '
        <div id="menudesplegable" class="dropdown-content notifications">
            <div class="notifications-title black-text">NOTIFICACIONES</div>
                <div class="card">
            <div class="card-content" id="card-content1">
            <span class="card-title black-text">Joe Smith</span>
            <p class="black-text">Mensaje de la notificación</p>
          </div>
        </div>
        </div>
      </div>
      
        <div class="navbar-fixed">
        <nav class="navbar blue">
          <div class="nav-wrapper"><a href="#!" class="brand-logo white-text text-darken-4">AGENDA</a>
            <ul id="nav-mobile blue" class="right">
              <li class="hide-on-med-and-down"><a href="#!" data-target="menudesplegable" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a></li>
              <li class="hide-on-med-and-down"><a href="#!"><i class="material-icons">exit_to_app</i></a></li>
          </div>
        </nav>
      </div>';
      }

      function sidenav() {
        return '
        <!-- Modal Structure -->


        <div id="modalperfil" class="modal">
        <div class="fullscren">
        <div class="card white" style="margin:0px;">
            <div class="card-content">
                <span class="card-title">
                    Perfil
                </span>
            </div>

            <div class="row">
                <form action="#" class="col s10 offset-s1">
                <h4>Dra. Maria Grey de Shepherd</h4>
                <p>Jefa de cirugía general</p>
                <img class="" src="../../resources/img/private/perfil.jpg" style="height: 50%;width: 30%;margin-left: 150px;">
                    <div class="file-field input-field">
                        <div class="btn blue">
                            <span>IMG</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Correo</label>
        </div>
        <div class="input-field col s12">
          <input disabled value="" id="disabled" type="text" class="validate">
          <label for="disabled">Contraseña</label>
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Contraseña actual</label>
        </div>
        <div class="input-field col s6">
          <input id="newpassword" type="password" class="validate">
          <label for="newpassword">Nueva contraseña</label>
        </div>
        <div class="input-field col s6">
          <input id="confpassword" type="password" class="validate">
          <label for="confpassword">Confirmar contraseña</label>
        </div>

        <br>
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
                </form>
            </div>
            
          

          

            <div class="center">
                <a href="#!" class=""><i class="material-icons green-text medium">check_circle</i></a>
                <a href="#!" class=""><i class="material-icons red-text medium">cancel</i></a>
            </div>
        </div>
    </div>
        </div>


        <ul id="sidenav-left" class="sidenav sidenav-fixed">
          <li>
            <div class="user-view" style="margin-bottom: 0px;">
              <div class="background responsive-img">
                <img src="../../resources/img/private/fondo.jpg" class="responsive-img">
              </div>

              <a href="#user"><img class="circle" src="../../resources/img/private/perfil.jpg"></a>
              <a class="modal-trigger" href="#modalperfil">
              <i id="ico" class="material-icons" style=" margin-top: -27px; position: absolute; margin-left: 100px; color: black;">edit</i></a>
              <a href="#name"><span class="black-text name">Dra. Maria Grey de Shepherd</span></a>
              <a href="#name"><span class="black-text name">Jefa de cirugía general</span></a>
              <a href="#email"><span class="black-text email">@gmail.com</span></a>
            </div>
          </li>
          
          <!--MANAGEMENT-->
          <li><a href="#" class="waves-effect blue hoverable"><i class="material-icons" style="margin-right:16px;">content_paste</i>Agenda</a></li>
          <li><a href="#" class="waves-effect blue hoverable"><i class="material-icons" style="margin-right:16px;">wc</i>Pacientes</a></li>
          <li><a href="#" class="waves-effect blue hoverable"><i class="material-icons" style="margin-right:16px;">enhanced_encryption</i>Consultas</a></li>
          <li><a href="#" class="waves-effect blue hoverable"><i class="material-icons" style="margin-right:16px;">event</i>Citas</a></li>

       
        <!--Footer-->
        <div class="space blue" style="height:38%; width:100%;">
        <br>
        </div>
          <li>
                <a class="subheader blue"><i class="material-icons" style="margin-right:16px;">copyright</i> 2019 Copyright</a> 
          </li>
        </ul>
        <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>
        ';
      }
    }
?>
