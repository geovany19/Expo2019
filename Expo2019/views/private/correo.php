<?php
require_once('../../core/helpers/private_helper.php');
private_helper::headerTemplate('Recuperar contraseña');
?>            
                <div class="row">
					<div class="col col-sm-12">
						<div class="login-form" >
							<form  method="post" id="login-1">
								<div class="avatar">
									<img src="../../resources/img/dashboard/img4.jpg" class="rounded-circle" alt="Avatar" width="30" height="65">
								</div>
								<h2 class="text-center">Recuperar Contraseña</h2>
								<div class="form-group">
									<input type="text" id="e-mail" name="e-mail" class="form-control validate" placeholder="Correo electronico" required="required">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
<?php 
private_helper::footerTemplate('correo.js');
?>