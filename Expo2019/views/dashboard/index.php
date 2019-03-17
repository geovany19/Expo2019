<?php
include "../../core/helpers/public/public_page.php";
Public_page::header("Principal");
?>
<body class="text-center">
    <div class="container">
        <form class="form-signin">
            <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
            <label for="inputEmail" class="sr-only">Correo eletrónico</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
            <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
        </form>
    </div>
</body>
<?php
Public_page::footer();
?>