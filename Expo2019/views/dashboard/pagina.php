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
				<div class="col col-sm-12 col-md-6">
					<form id="grafico1" method="post" class="col col-sm-12 col-md-6">
						<h6>Seleccione fecha inicial</h6>
						<input type="date" id="Fecha1" name="Fecha1" required>
						<h6>Seleccione fecha fin</h6>
						<input type="date" id="Fecha2" name="Fecha2" max=<?php echo date('Y-m-d') ?> required>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartConsultas" hidden>
						<canvas id="chartConsultasPorFecha"></canvas>
					</div>
				</div>
				<div class="col col-sm-12 col-md-6">
					<form id="grafico2" method="post" class="col col-sm-12 col-md-6">
						<h6>Seleccione un mes</h6>
						<label>Mes</label>
						<select name="Mes" id="Mes" class="form-control">
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartConsultas-2" hidden>
						<canvas id="chartConsultasMensuales"></canvas>
					</div>
				</div>
				<div class="col col-sm-12 col-md-6">
					<form id="grafico3" method="post" class="col col-sm-12 col-md-6">
						<h6>Seleccione un mes</h6>
						<label>Mes</label>
						<select name="Mes" id="Mes" class="form-control">
							<option value="1">Enero</option>
							<option value="2">Febrero</option>
							<option value="3">Marzo</option>
							<option value="4">Abril</option>
							<option value="5">Mayo</option>
							<option value="6">Junio</option>
							<option value="7">Julio</option>
							<option value="8">Agosto</option>
							<option value="9">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartConsultas-3" hidden>
						<canvas id="chartConsultasMensualesDoc"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
dashboard_helper::footer('dashboard.js');
?>