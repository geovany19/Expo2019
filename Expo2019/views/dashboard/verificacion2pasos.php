<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Iniciar sesión");
dashboardHelper::nav();
?>

<body id="body">
	<main id="main">
		<div class="row">
			<div class="col col-sm-12">
				<div class="login-form">
					<form method="post" id="form-autenticacion" autocomplete="off">
						<div class="avatar">
							<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
						</div>
						<h2 class="text-center">Ingrese el PIN de verificacion </h2>
						<div class="form-group">
							<input type="text" id="codigo" class="form-control" name="codigo" placeholder="Pin de verificacion" required="required">
						</div>
						<div class="modal-header justify-content-center aling-items-center">
							<button type="submit" data-toggle="tooltip" data-placement="top" title="Verificar" class="btn btn-success" ><i class="material-icons prefix">beenhere</i></button>
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
	<script type="text/javascript" src="../../core/controllers/dashboard/autenticacion.js"></script>
	<!--<script type="text/javascript" src="../../core/controllers/dashboard/logout.js"></script>-->
</body>
</html>