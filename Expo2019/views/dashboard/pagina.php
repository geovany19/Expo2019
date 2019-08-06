<?php
include "../../core/helpers/dashboard_helper.php";
dashboard_helper::head("Dashboard");
dashboard_helper::nav();
?>
<main>
	<div>
		<h2>¡Bienvenido!</h2>
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
	</div>
</main>
<?php
dashboard_helper::footer('dashboard.js');
?>