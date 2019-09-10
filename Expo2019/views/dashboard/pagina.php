<?php
include "../../core/helpers/dashboardHelper.php";
dashboardHelper::head("Dashboard");
dashboardHelper::nav();
?>
<main>
	<div>
		<h2 class="text-center">¡Bienvenido!</h2>
		<div id="chart-dashboard">
			<div class="row">
				<div class="col col-sm-12 col-md-6">
					<canvas id="chartConsultasFecha"></canvas>
				</div>
				<div class="col col-sm-12 col-md-6">
					<canvas id="chartConsultasHora"></canvas>
				</div>
				<div class="col col-sm-12 col-md-6">
					<canvas id="chartCitasEspecialidad"></canvas>
				</div>
				<div class="col col-sm-12 col-md-6">
					<canvas id="chartCitasRealizadas"></canvas>
				</div>
				<div class="col col-sm-12 col-md-6">
					<canvas id="chartCitasCanceladas"></canvas>
				</div>
				<div class="col col-sm-12 col-md-6">
					<canvas id="chartCalificacionesDoctores"></canvas>
				</div>
			</div>
		</div>
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
				</li>
				<li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</a></li>
				<li class="page-item" aria-current="page">
					<a class="page-link" href="graficos.php">2</span></a>
				</li>
				<li class="page-item">
					<a class="page-link" href="graficos.php">Siguiente</a>
				</li>
			</ul>
		</nav>
	</div>
</main>
<?php
dashboardHelper::footer('dashboard.js');
?>