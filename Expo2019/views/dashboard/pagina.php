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
					<h5>Gráfico de citas por periodo</h5>
					<form id="grafico1" method="post" class="col col-sm-12">
						<h6>Seleccione fecha inicial</h6>
						<input type="date" id="Fecha1" name="Fecha1" class="col col-sm-12 col-md-6" required>
						<h6>Seleccione fecha fin</h6>
						<input type="date" id="Fecha2" name="Fecha2" max=<?php echo date('Y-m-d') ?> class='col col-sm-12 col-md-6' required>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartConsultas" hidden>
						<canvas id="chartConsultasPorFecha"></canvas>
					</div>
				</div>
				<div class="col col-sm-12 col-md-6">
					<h5>Gráfico de consultas realizadas al mes </h5>
					<form id="grafico2" method="post" class="col col-sm-12">
						<label>Seleccione un mes</label>
						<select name="Mes" id="Mes" class="form-control col col-sm-12">
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
							<option value="12">Diciembre</option>-->
						</select>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartConsultas-2" hidden>
						<canvas id="chartConsultasMensuales"></canvas>
					</div>
				</div>
				<div class="col col-sm-12 col-md-6">
					<h5>Desempeño de consultas mensuales</h5>
					<form id="grafico3" method="post" class="col col-sm-12">
						<label>Seleccione un mes</label>
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
				<div class="col col-sm-12 col-md-6">
					<h5>Gráfico de citas por especialidad</h5>
					<form id="grafico4" method="post" class="col col-sm-12">
						<label>Seleccione una especialidad</label>
						<select name="select_especialidad" id="select_especialidad" class="form-control"></select>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartCitasParam" hidden>
						<canvas id="chartCitasEspecialidadParam"></canvas>
					</div>
				</div>
				<div class="col col-sm-12 col-md-6">
					<h5>Estadísticas de citas por doctor</h5>
					<form id="grafico5" method="post" class="col col-sm-12">
						<label>Seleccione un doctor</label>
						<select name="select_doctores" id="select_doctores" class="form-control"></select>
						<button type="submit" class="btn btn-primary">Generar gráfico</button>
					</form>
					<div id="chartDesempenoDoctor" hidden>
						<canvas id="chartCitasDesempenoDoctor"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
dashboard_helper::footer('dashboard.js');
?>