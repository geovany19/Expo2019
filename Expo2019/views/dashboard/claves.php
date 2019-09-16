<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Restablecer contraseña");
?>

<body id="body">
    <main id="main">
        <div class="row">
            <div class="col col-sm-12">
                <div class="claves-form">
                    <form method="post" id="form-recuperar3" autocomplete="off">
                        <div class="avatar">
                            <img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
                        </div>
                        <h2 class="text-center">Restablecer contraseña</h2>
                        <div class="form-group">
                            <input type="password" id="nuevaclave1" class="form-control" name="nuevaclave1" placeholder="Nueva contraseña" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" id="nuevaclave2" class="form-control" name="nuevaclave2" placeholder="Confirmar contraseña" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Restablecer contraseña</button>
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
    <script type="text/javascript" src="../../resources/js/Chart.js"></script>
    <script type="text/javascript" src="../../resources/js/Chart.bundle.js"></script>
    <script type="text/javascript" src="../../core/helpers/functions.js"></script>
    <script type="text/javascript" src="../../core/controllers/dashboard/correoDashboard.js"></script>
</body>

</html>