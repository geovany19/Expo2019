<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Restablecer contraseña");
?>

<body id="body">
    <main id="main">
        <div class="row">
            <div class="col col-sm-12">
                <div class="recover-form">
                    <form method="post" id="form-correo" autocomplete="off">
                        <div class="avatar">
                            <img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
                        </div>
                        <h2 class="text-center">Restablecer contraseña</h2>
                        <div class="form-group">
                            <input type="text" id="correousu" class="form-control" name="correousu" placeholder="Correo electrónico" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="correoRecuperar()" >Enviar correo</button>
                        </div>
                        <div class="form-group">
                            <h6 class="text-center"><a href="index.php">Volver al inicio</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="../../resources/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/popper.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sidenav.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/functions.js"></script>
    <script type="text/javascript" src="../../resources/js/Chart.js"></script>
    <script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
    <script type="text/javascript" src="../../core/controllers/dashboard/correoDashboard.js"></script>
</body>

</html>