<?php
include "../../core/helpers/private/private_helper.php";
private_helper::head("Consultas");
private_helper::navbar();
?>
<main class="main grey lighten-3">
	<div id="calificar" class="modal grey lighten-3">
		<div class="fullscren">
			<div class="card white" style="margin:0px;">
				<div class="card-content">

				</div>
				<div class="row">
					<div class="center">
						<div class="input-field col s10">
							<div class="input-field col s10">
								<input placeholder="Comentario sobre el paciente" id="comentario" type="text" class="validate">
								<label for="comentario">Comentario</label>
							</div>
							<form>
								<p class="clasificacion">
									<input id="radio1" type="radio" name="estrellas" value="5">
									<!--
		--><label for="radio1">★</label>
									<!--
		--><input id="radio2" type="radio" name="estrellas" value="4">
									<!--
		--><label for="radio2">★</label>
									<!--
		--><input id="radio3" type="radio" name="estrellas" value="3">
									<!--
		--><label for="radio3">★</label>
									<!--
		--><input id="radio4" type="radio" name="estrellas" value="2">
									<!--
		--><label for="radio4">★</label>
									<!--
		--><input id="radio5" type="radio" name="estrellas" value="1">
									<!--
		--><label for="radio5">★</label>
								</p>
							</form>
						</div>
					</div>
				</div>
				<div class="center">
					<a href="#!" class=""><i class="material-icons green-text medium">check_circle</i></a>
					<a href="#!" class=""><i class="material-icons red-text medium">cancel</i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="input-field col s6">
						<input placeholder="" id="first_name" type="text" class="validate">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s6">
						<input placeholder="" id="apellido" type="text" class="validate">
						<label for="apellido">Apellido</label>
					</div>

					<div class="input-field col s4">
						<input placeholder="" id="peso" type="text" class="validate">
						<label for="peso">Peso</label>
					</div>

					<div class="input-field col s4">
						<input placeholder="" id="edad" type="text" class="validate">
						<label for="edad">Edad</label>
					</div>

					<div class="input-field col s4">
						<input placeholder="" id="estatura" type="text" class="validate">
						<label for="estatura">Estatura</label>
					</div>

					<div class="input-field col s6">
						<input placeholder="" id="padecimientos" type="text" class="validate">
						<label for="padecimientos">Padecimientos</label>
					</div>

					<div class="input-field col s6">
						<input placeholder="" id="receta" type="text" class="validate">
						<label for="receta">Receta</label>
					</div>
					<button type="submit" class="btn btn-primary">Finalizar</button>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
private_helper::footer();
?>